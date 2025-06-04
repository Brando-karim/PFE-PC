<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // 🔴 Required for Auth::user()
use Illuminate\Support\Facades\DB;   // 🔴 Required for DB::table()

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        $emailStats = [];
        if ($user->role === 'admin') {
            $emailStats = [
                'emails_sent' => DB::table('email')->where('sender_id', $user->id)->count(),
                'last_sent' => DB::table('email')->where('sender_id', $user->id)->latest()->first()?->created_at,
            ];
        }

        return view('dashboard', compact('user', 'emailStats'));
    }
}
