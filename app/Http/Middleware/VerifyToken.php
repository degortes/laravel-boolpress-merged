<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
class VerifyToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $pass_token = $request->header('authorization');
        if (empty($pass_token)) {
            return response()->json([
                'success' => false,
                'error' => 'inserire token'
            ]);
        }

        $pass_beared_token = substr($pass_token , 7);
        $user = User::where('api_token' , $pass_beared_token)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'error' => 'token invalido'
            ]);
        }

        return $next($request);
    }
}
