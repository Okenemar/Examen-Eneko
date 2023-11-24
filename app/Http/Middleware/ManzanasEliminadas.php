<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use App\Models\Manzanas;



class ManzanasEliminadas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $manzana = Manzanas::where('id', $request->input('manzana_id'))->first();

        // Antes de cargar la página de inicio
        Log::info("Manzana eliminada");

        return $next($request);
    }
}
