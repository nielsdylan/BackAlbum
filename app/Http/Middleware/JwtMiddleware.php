<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard = 'api'): Response
    {
        // 1. Le decimos a Laravel qué guard (configuración) usar en esta petición
        auth()->shouldUse($guard);
        // try {
        //     JWTAuth::parseToken()->authenticate();
        // } catch (Exception $e) {

        //     if ($e instanceof TokenInvalidException) {
        //         return response()->json(["status" => "Invalid Token/Token inválido", "session" => false]);
        //     }

        //     if ($e instanceof TokenExpiredException) {
        //         return response()->json(["status" => "Experid Token/Token Expirado", "session" => false]);
        //     }
        //     return response()->json(["status" => "Token not fount/Token no encontrado", "session" => false]);
        // }
        try {
            // 1. OBTENEMOS EL PAYLOAD DEL TOKEN (donde están tus etiquetas personalizadas)
            $payload = JWTAuth::parseToken()->getPayload();

            // 2. LEEMOS EL ROL QUE LE PUSISTE EN EL MODELO
            $role = $payload->get('role');

            // 3. VALIDAMOS ESTRICTAMENTE EL ROL
            // Si la ruta es de admin, el token DEBE tener el rol 'admin'
            if ($guard === 'api' && $role !== 'admin') {
                return response()->json(["status" => "Acceso denegado: Token inválido para este panel", "session" => false], 403);
            }

            // Si la ruta es de cliente, el token DEBE tener el rol 'cliente'
            if ($guard === 'api_cliente' && $role !== 'cliente') {
                return response()->json(["status" => "Acceso denegado: Token inválido para clientes", "session" => false], 403);
            }

            // 4. Si todo está bien, lo autenticamos
            JWTAuth::parseToken()->authenticate();

        } catch (Exception $e) {

            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(["status" => "Invalid Token/Token inválido", "session" => false], 401);
            }

            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json(["status" => "Expired Token/Token Expirado", "session" => false], 401);
            }

            return response()->json(["status" => "Token not found/Token no encontrado", "session" => false], 401);
        }

        return $next($request);
    }
}
