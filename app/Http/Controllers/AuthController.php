<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller {
    /**
     * @OA\SecurityScheme(
     *     type="http",
     *
     *     name="Token based Based",
     *     in="header",
     *     scheme="bearer",
     *     bearerFormat="JWT",
     *     securityScheme="bearer_token",
     * )
    */
    // siempre se deba llamar el constructor jwt
    public function __construct() {
        $this->middleware('jwt.validation', ['except' => ['login']]);
    }

    /**
    * @OA\Post(
    *   path="/api/login",
    *   summary="Iniciar sesion",
    *   description="Login por email y contraseña",
    *   operationId="login",
    *   tags={"Autenticación"},
    *   @OA\RequestBody(
    *       required=true,
    *       description="Credenciales para inicio de sesion",
    *       @OA\JsonContent(
    *           required={"email","password"},
    *           @OA\Property(property="email", type="string", format="email", example="kim@likeu.com"),
    *           @OA\Property(property="password", type="string", format="password", example="98765"),
    *       ),
    *   ),
    *   @OA\Response(
    *       response=200,
    *       description="Login con exito",
    *       @OA\JsonContent(
    *           @OA\Property(property="access_token", type="string"),
    *           @OA\Property(property="token_type", type="string", example="bearer"),
    *           @OA\Property(property="expires_in", type="string", example="3600")
    *       )
    *   ),
    *   @OA\Response(
    *       response=401,
    *       description="Credenciales invalidas",
    *       @OA\JsonContent(
    *           @OA\Property(property="message", type="string", example="Credenciales invalidas, verifique y vuelva a intentarlo")
    *       )
    *    )
    * )
    */
    public function login()
    {
        // logiamos el usuario creado - con los datos insertados desde UserSeeder
        $credentials = request(['email', 'password']);

        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
// envia de respuesta el token unico del usuario
        return $this->respondWithToken($token);
    }

    /**
    * @OA\Post(
    *   path="/api/me",
    *   summary="Obtener informacion del usuario autenticado",
    *   description="Obtener informacion de usuario autenticado",
    *   operationId="me",
    *   tags={"Autenticación"},
    *   security={{ "bearer_token": {} }},
    *   @OA\Response(
    *       response=200,
    *       description="Informacion del usuario",
    *       @OA\JsonContent(
    *           @OA\Property(property="id", type="integer"),
    *           @OA\Property(property="name", type="string"),
    *           @OA\Property(property="email", type="string")
    *       )
    *   ),
    *   @OA\Response(
    *       response=404,
    *       description="Token no encontrado en la peticion",
    *       @OA\JsonContent(
    *           @OA\Property(property="message", type="string", example="Authorization Token not found")
    *       )
    *   ),
    *   @OA\Response(
    *       response=422,
    *       description="Token es invalido",
    *       @OA\JsonContent(
    *           @OA\Property(property="message", type="string", example="Token is Invalid")
    *       )
    *   ),
    *   @OA\Response(
    *       response=423,
    *       description="Token ha expirado",
    *       @OA\JsonContent(
    *           @OA\Property(property="message", type="string", example="Token is Expired")
    *       )
    *    )
    * )
    */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}

