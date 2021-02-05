<?php
namespace application\middleware;


use Closure;

class Authenticate
{
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
