<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PCBuild;
use App\Models\Article;
use App\Models\PCPartSpecs;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PCBuildController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pcbuilds = PCBuild::paginate(25);
        $user = Auth::user();
        if ($user->role === User::ROLE_USER)
            $pcbuilds = PCBuild::where('user_id', $user->id)->paginate(25);
        return view('pcbuilds.index', compact('pcbuilds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $build_articles = [];
        foreach (array_keys(PCPartSpecs::TYPE_ICONS) as $type) {
            $build_articles[$type] = Article::whereRelation('specs', 'type', $type)
                                                ->paginate(6);
        }
        return view('pcbuilds.create', compact('build_articles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->role === User::ROLE_USER ? $user->id : null;
        $build = PCBuild::create([
            'name' => $request->name,
            'user_id' => $user_id,
            'is_ordered' => (isset($request->order) ? '1' : '0'),
        ]);

        foreach (array_keys(PCPartSpecs::TYPE_ICONS) as $type) {
            $type_name = str_replace(" ", "_", $type);

            if ($type_name === "processor_cooler" &&
                $request->processor_cooler === $request->processor)
                continue;

            if ($article = Article::find($request[$type_name]))
                $build->articles()->attach($article->id);
        }

        return redirect()->route('pcbuilds.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $build = PCBuild::find($id);
        if ($request->order === '1') {
            $build->is_ordered = '1';
            $build->save();
        }
        else {
            $build->is_ordered = '0';
            $build->save();
        }
        return back()->with('success', 'PC Build updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $build = PCBuild::find($id);
        $user = Auth::user();
        if ($user->role == User::ROLE_ADMIN || $build->user_id == $user->id) {
            $build->delete();
            return back()->with(
                'success', 'PC Build deleted successfully.'
            );
        }

        return back()->with(
            'error', 'Failed to delete PC Build.'
        );
    }
    /*
    public function addToNewBuild($specs_type, $article_id) {
        $build = session()->get('newbuild');
        if (!$build) {
            $array = [];
            foreach (array_keys(PCPartSpecs::TYPE_ICONS) as $type) {
                $array[$type] = null;
            }
            $build = session()->put('newbuild', $array);
        }
        $build[$specs_type] = $article_id;
        session()->put('newbuild', $build);
        return back();
    }

    public function removeFromNewBuild($specs_type) {
        $build = session()->get('newbuild');
        if ($build) {
            $build[$specs_type] = null;
            session()->put('newbuild', $build);
        }
        return back();
    }*/
}
