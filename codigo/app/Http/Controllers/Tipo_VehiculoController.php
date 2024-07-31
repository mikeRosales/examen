<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tipo_VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        
        $data = \App\Models\TipoVehiculo::select('tipo_vehiculos.id','tipo_vehiculos.paga', 'tipo_vehiculos.descripcion', 'tipo_vehiculos.cuota_minuto')                
                ->get();
                
                $elementos = array();
                 foreach ($data as $tipo_vehiculo){
                        $miArray = new \App\Models\TipoVehiculo();
                       
                        
                        $miArray->id_tipo = $tipo_vehiculo->id;                                         

                       $elementos[]=[
                            'id_tipo' => $tipo_vehiculo->id,
                            'paga' => $tipo_vehiculo->paga,
                            'descripcion' => $tipo_vehiculo->descripcion,
                            'cuota_minuto' => $tipo_vehiculo->cuota_minuto];                      
                 }
                     // $coleccionElementos = collect($elementos);

            

         
        return view('tipovehiculo',['allVehiculos' => $elementos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createVehiculo');
    }
    public function buscarVehiculo(Request $request)
    {
       
       
       $data = \App\Models\TipoVehiculo::select('tipo_vehiculos.id','tipo_vehiculos.paga', 'tipo_vehiculos.descripcion', 'tipo_vehiculos.cuota_minuto')  
       ->where('id','=',$request->id_tipo)              
                ->get();
                return view('updateVehiculo',['allVehiculos' => $data]);
        
    }
    public function guardarVehiculo(Request $request)
    {
       
         $cobrable=0;
        if($request->has('paga')){
            $cobrable=1;
         }
       
       
       $vehiculo =\App\Models\TipoVehiculo::find($request->id_tipo);
       
       $vehiculo->descripcion = $request->descripcion;
       $vehiculo->paga = $cobrable;
       $vehiculo->cuota_minuto = $request->cuota_minuto;
       $vehiculo->save();
        

                 
                  return redirect('/tipo_vehiculo');
    
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cobrable=0;
        if($request->has('paga')){
            $cobrable=1;
         }
        \App\Models\TipoVehiculo::create([
                  'descripcion' => $request->get('descripcion'),
                  'paga' => $cobrable,
                  'cuota_minuto' => $request->get('cuota'),                                  
                ]);
        return redirect('/tipo_vehiculo');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        dd($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
