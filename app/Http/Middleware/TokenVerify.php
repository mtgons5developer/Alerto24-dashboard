<?php

namespace App\Http\Middleware;

use App\Models\TokenVerify as verifyToken;
use Closure;
class TokenVerify
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next)
    {
        $check=verifyToken::where('id',1)->first();
        if($request->api_token==$check->key){
            return $next($request);
        }else {
            return response()->json([
                'success'   =>false,
                'status'    =>400,
                'message'   => 'App Not Verified'
            ], 200);
        }
    }
}
