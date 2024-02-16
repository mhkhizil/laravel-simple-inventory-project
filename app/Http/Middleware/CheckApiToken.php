<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->has("token")) {
            return response()->json(["message"=>"Api token is required"],401);
         }else if($request->token!=="hhz") {
             return response()->json(["message"=>"Api token is not correct"],401);
         }
         //success
        return $next($request);
    }
}
