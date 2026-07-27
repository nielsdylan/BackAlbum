<?php

namespace App\Http\Controllers\PanelControl\Auth;

use App\Http\Controllers\Controller;
use App\Models\Albumqr\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    //
    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register() {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = new Cliente();
        $user->name = request()->name;
        $user->email = request()->email;
        $user->password = bcrypt(request()->password);
        $user->save();

        return response()->json($user, 201);
    }


    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {

        $credentials = request(['email', 'password']);
        // Agregamos la condición de que el estado sea 1 (Activo)
        $credentials['estado'] = 1;
        if (! $token = Auth::guard('api_cliente')->attempt($credentials)) {
        // if (! $token = auth('api_cliente')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function loggedUser()
    {
        return response()->json(Auth::guard('api_cliente')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::guard('api_cliente')->logout();

        return response()->json(['message' => 'Successfully logged out', 'status'=>true]);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refreshToken()
    {
        return $this->respondWithToken(Auth::guard('api_cliente')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('api_cliente')->factory()->getTTL() * 60
        ]);
    }
    public function sessionToken() {
        $session = Auth::guard('api_cliente')->user() ? true : false;

        return response()->json(["status"=>"Validated Token/Token validado", "session"=>$session]);
    }
}
