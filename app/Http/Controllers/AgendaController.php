<?php

namespace App\Http\Controllers;

use App\agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    

    public function __construct() {
        $this->middleware('jwt.validation');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
* @OA\Get(
* path="/api/schedule/all",
* summary="Obtener todas las agendas",
* description="Obtener todas las agendas",
* operationId="schedule-all",
* tags={"Agendas"},
* security={{ "bearer_token": {} }},
* @OA\Response(
*    response=200,
*    description="Todos las agendas",
*    @OA\JsonContent(
*      @OA\Property(property="id", type="integer"),
*      @OA\Property(property="client_id", type="integer"),
*      @OA\Property(property="subject", type="string"),
*      @OA\Property(property="date_time", type="string"),
*      @OA\Property(property="status", type="string"),
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
          //VAMOS A CONSULTAR TODOS LOS RECURSO DE LA BD
        //traer los recursos
        $agendas = Agenda::all();
        return $agendas;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     /**
* @OA\Post(
* path="/api/schedule/create",
* summary="Crear una agenda",
* description="Crear una agenda",
* operationId="schedule-create",
* tags={"Agendas"},
* security={{ "bearer_token": {} }},
* @OA\RequestBody(
*    required=true,
*    description="Datos para crear una agenda",
*    @OA\JsonContent(
*      required={"client_id","subject","date_time", "status"},
*      @OA\Property(property="client_id", type="integer"),
*      @OA\Property(property="subject", type="string"),
*      @OA\Property(property="date_time", type="string"),
*      @OA\Property(property="status", type="string"),
*    ),
* ),
* @OA\Response(
*    response=201,
*    description="Estado del proceso",
*    @OA\JsonContent(
*      @OA\Property(property="message", type="string", example="Agenda creada exitosamente")
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
          //crear agenda
          $agendas = Agenda::create($request->all());
          return $agendas;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    /**
* @OA\Put(
* path="/api/schedule/update/{id}",
* summary="Editar una agenda",
* description="Editar un agenda",
* operationId="schedule-update",
* tags={"Agendas"},
* security={{ "bearer_token": {} }},
* @OA\Parameter(
*    description="Id de la agenda",
*    in="path",
*    name="id",
*    required=true,
*    example="1",
*    @OA\Schema(
*       type="integer",
*       format="int64"
*    )
* ),
* @OA\RequestBody(
*    required=true,
*    description="Datos para actualizar una agenda",
*    @OA\JsonContent(
*      required={"client_id","subject","date_time", "status"},
*      @OA\Property(property="client_id", type="integer"),
*      @OA\Property(property="subject", type="string"),
*      @OA\Property(property="date_time", type="string"),
*      @OA\Property(property="status", type="string"),
*    ),
* ),
* @OA\Response(
*    response=201,
*    description="Estado del proceso",
*    @OA\JsonContent(
*      @OA\Property(property="message", type="string", example="Agenda actualizada exitosamente")
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

    public function update(Request $request,  $id)
    {   
      $edit = Agenda::find($id)->pluck('estado')[0];
    //   return $edit;

    if ($edit == "Programada") {
        $Agenda= Agenda::findOrFail($id);
          $Agenda->asunto = $request->asunto;
          $Agenda->hora = $request->hora;
          $Agenda->fecha = $request->fecha;
          $Agenda->estado = $request->estado;
          $Agenda->save();
        //   return $Agenda;
          return response()->json(['message' => 'Agenda actualizada exitosamente'], 201);

    } else {
        return response()->json(['message' => 'No se pudo actualizar la agenda, el estado no es Programada'], 201);
    }
    

 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(agenda $agenda)
    {
        //
    }
}
