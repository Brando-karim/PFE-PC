<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class AdminUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next) 
    { 
        $user = Auth::user(); 
                 if (!$user) { 
            return redirect()->route('login'); 
        }          if ($user->role !== User::ROLE_ADMIN) {return redirect()->route('login'); 
        }  
        return $next($request); 
    } } 
