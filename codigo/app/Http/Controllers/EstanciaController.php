<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Estancia;
class EstanciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estancias = \App\Models\Estancia::all();
        $collection = collect([]);
        $data = \App\Models\Estancia::select('estancias.placa','tipo_vehiculos.paga', 'tipo_vehiculos.descripcion', 'estancias.entrada', 'estancias.salida','tipo_vehiculos.cuota_minuto')
                ->join('tipo_vehiculos', 'estancias.id_tipo_vehiculo', '=', 'tipo_vehiculos.id_tipo')
                ->get();
                
                $elementos = array();
                 foreach ($data as $estancia){
                        $miArray = new \App\Models\Estancia();
                        if($estancia->salida == null){
                            $to = \Carbon\Carbon::parse($estancia->entrada);
                            $from = \Carbon\Carbon::parse(\Carbon\Carbon::now());
                            $diff_in_minutes = $to->diffInMinutes($from);  
                            $diff_in_minutes = round($diff_in_minutes);
                        }else
                        {
                            $from = \Carbon\Carbon::parse($estancia->salida);
                            $to = \Carbon\Carbon::parse($estancia->entrada);
                    

                    
                            $diff_in_minutes = $to->diffInMinutes($from);    
                            $diff_in_minutes = round($diff_in_minutes);
                        }
                        
                        $miArray->placa = $estancia->placa;
                        $costo = 0;
                       if($estancia->paga==1){
                            $costo = $estancia->cuota_minuto * $diff_in_minutes;
                       }

                       $elementos[]=[
                            'placa' => $estancia->placa,
                            'tiempo_estacionado' => $diff_in_minutes,
                            'tipo' => $estancia->descripcion,
                            'cuota' => $costo];                      
                 }
                     // $coleccionElementos = collect($elementos);

            

         return view('viewestancias', ['allEstancias' => $elementos]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipo_vehiculos = \App\Models\TipoVehiculo::all();
        return view('createestancia',['allTipo_Vehiculos' => $tipo_vehiculos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $current_date = date('Y-m-d H:i:s');
        
        \App\Models\Estancia::create([
                  'placa' => $request->get('placa'),
                  'id_tipo_vehiculo' => $request->get('id_tipo_vehiculo'),
                  'entrada' => $current_date,
                  'salida' => null,
                  'cuota' => null,
                  
                ]);

        return redirect('/estancias');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }
     public function buscarEstancia(Request $request)
    {
       
         $estancias = \App\Models\Estancia::all();
        $collection = collect([]);
        $data = \App\Models\Estancia::select('estancias.id','estancias.placa','tipo_vehiculos.paga', 'tipo_vehiculos.descripcion', 'estancias.entrada', 'estancias.salida','tipo_vehiculos.cuota_minuto')
                ->join('tipo_vehiculos', 'estancias.id_tipo_vehiculo', '=', 'tipo_vehiculos.id_tipo')
                ->where('estancias.placa','=',$request->placa)
                ->whereNull('estancias.salida')
                ->get();
               
                $wordCount = count($data);
                if($wordCount==0){
                    session()->flash('msg', 'Favor de validar la placa');
                return redirect()->back();
                    

                }

                $elementos = array();
                 foreach ($data as $estancia){
                        $miArray = new \App\Models\Estancia();
                        if($estancia->salida == null){
                            $to = \Carbon\Carbon::parse($estancia->entrada);
                            $from = \Carbon\Carbon::parse(\Carbon\Carbon::now());
                            $diff_in_minutes = $to->diffInMinutes($from);  
                            $diff_in_minutes = round($diff_in_minutes);
                        }else
                        {
                            $from = \Carbon\Carbon::parse($estancia->salida);
                            $to = \Carbon\Carbon::parse($estancia->entrada);
                    

                    
                            $diff_in_minutes = $to->diffInMinutes($from);    
                            $diff_in_minutes = round($diff_in_minutes);
                        }
                        
                        $miArray->placa = $estancia->placa;
                        $costo = 0;
                       if($estancia->paga==1){
                            $costo = $estancia->cuota_minuto * $diff_in_minutes;
                       }

                       $elementos[]=[
                            'placa' => $estancia->placa,
                            'tiempo_estacionado' => $diff_in_minutes,
                            'tipo' => $estancia->descripcion,
                            'cuota' => $costo,
                            'id'=>$estancia->id];                      
                 }
                 return view('salidaestancia', ['allEstancias' => $elementos]);
    }
    public function guardarEstancia(Request $request)
    {
       
       $from = \Carbon\Carbon::parse(\Carbon\Carbon::now());
       
       $estancia =\App\Models\Estancia::find($request->id);
       $estancia->salida = $from;
       $estancia->save();
        

                 session()->flash('msg', 'Salida exitosa');                                      
                 return view('buscarEstancia');
    
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, $id)
    {
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
