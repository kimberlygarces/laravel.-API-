<?php

namespace App\Http\Controllers;

use App\cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function __construct() {
        $this->middleware('jwt.validation');
        // esta validacion se aplica en los metodos - para estos soliciten el token antes de autenticarse
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     /**
* @OA\Get(
* path="/api/cliente/all",
* summary="Obtener todos los usuarios",
* description="Obtener todos los usuarios",
* operationId="user-all",
* tags={"Usuarios"},
* security={{ "bearer_token": {} }},
* @OA\Response(
*    response=200,
*    description="Todos los usuarios",
*    @OA\JsonContent(
*      @OA\Property(property="id", type="integer"),
*      @OA\Property(property="name", type="string"),
*      @OA\Property(property="email", type="string")
*    )
* ),
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
*)
*/
    
    public function index()
    {
        
        $clientes = Cliente::all();
        return $clientes;
        //CONSULTA REALIZADA A LA TABLA CLIENTES PARA TRAER TODOS LOS DATOS


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     /**
* @OA\Post(
* path="/api/cliente/store",
* summary="Crear un usuario",
* description="Crear un usuario",
* operationId="user-create",
* tags={"Usuarios"},
* security={{ "bearer_token": {} }},
* @OA\RequestBody(
*    required=true,
*    description="Datos para crear un usuario",
*    @OA\JsonContent(
*       required={"name","email","password"},
*       @OA\Property(property="name", type="string"),
*       @OA\Property(property="email", type="string", format="email"),
*       @OA\Property(property="password", type="string", format="password"),
*    ),
* ),
* @OA\Response(
*    response=201,
*    description="Estado del proceso",
*    @OA\JsonContent(
*      @OA\Property(property="message", type="string", example="Usuario creado exitosamente")
*    )
* ),
*   @OA\Response(
*       response=400,
*       description="Errores de validacion",
*       @OA\JsonContent(
*           @OA\Property(property="message", type="string", example="The given data was invalid."),
*           @OA\Property(property="errors", type="object")
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
*)
*/
    public function store(Request $request)
    {
        //RECIBE TODO LA INFORMACION PARA CREAR CLIENTE
        $cliente = Cliente::create($request->all());
        return $cliente;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(cliente $cliente)
    {
        //
    }
}

