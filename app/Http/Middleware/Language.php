<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $session = app(SessionManager::class);

        if ($session->get("locale") != null) {
            App::setLocale($session->get("locale"));
        } else {
            $session->put("locale", "en");
            App::setLocale($session->get("locale"));
        }

        return $next($request);
    }
}
