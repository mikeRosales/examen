@extends('layouts.app')
    
        @section('content')
            <div class="content">
                @foreach ($allVehiculos as $vehiculo)
                <form method="POST" action="/guardarVehiculo">
                                @csrf
                    <h1> Actualize los datos del tipo de vehiculo</h1>
                    <div class="form-input">
                        
                        <input type="hidden" name="id_tipo" value="{{$vehiculo->id}}">                        
                    </div>
                    <div class="form-input">
                        <label>Descripcion</label>
                        <input type="text" name="descripcion" value="{{$vehiculo->descripcion}}">                        
                    </div>
                    <div class="form-input">
                        <label>¿Se cobrara cuota?</label>
                        @if($vehiculo->paga == 0)
         
                        <input type="checkbox" name="paga">                        
         
         @else
                        <input type="checkbox" name="paga" checked>                        
         
         @endif
           
                    </div>
                    <div class="form-input">
                        <label>Cuota por Minuto</label>
                        <input type="text" name="cuota_minuto" value="{{$vehiculo->cuota_minuto}}">                        
                    </div>                            
                    <button type="submit">Actualizar</button>
                </form>
                @endforeach
            </div>
        @endSection