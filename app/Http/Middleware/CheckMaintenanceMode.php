<?php

namespace App\Http\Middleware;

use App\Models\Settings;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMaintenanceMode
{
    public function handle(Request $request, Closure $next): Response
    {
        $site = Settings::first();

        if ($site && $site->maintenance_mode) {
            
            if (! $request->is('admin/*') && ! $request->is('filament/*') && ! $request->is('login') && ! $request->is('logout')) {
                
                return response()
                    ->view('errors.503', [], Response::HTTP_SERVICE_UNAVAILABLE); 
            }
        }

        return $next($request);
    }
}
