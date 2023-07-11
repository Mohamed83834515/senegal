<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class globalViewVariable
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $profil_modules_attribuer = DB::table('modules')
                        ->join('profil_modules', function ($join) {
                            $join->on('modules.id', '=', 'profil_modules.module_id')
                                ->where('profil_modules.profil_id', '=', Auth::user()->profil_id)
                                ->where('profil_modules.deleted_at', '=', null);

                            })
                        ->orderBy('modules.rang', 'ASC')
                        ->get();

            // dd(
            //     $profil_modules_attribuer
            // );
            View::share('profil_modules_attribuer', $profil_modules_attribuer);
        }
        return $next($request);
    }
}
