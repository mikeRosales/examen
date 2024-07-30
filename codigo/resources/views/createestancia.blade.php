    @extends('layouts.app')
    
        @section('content')
            <div class="content">
                <form method="POST" action="{{ config('app.url')}}/estancias">
                    @csrf
                    <h1> Registre los datos del vehiculo</h1>
                    <div class="form-input">
                        <label>Placa</label> <input type="text" name="placa">
                    </div>

                    <div class="form-input">
                        <label>Tipo Vehiculo</label>
                        <select name="id_tipo_vehiculo">
                            <option>Tipo de Vehiculo</option>
                            @foreach($allTipo_Vehiculos as $tipo_vehiculo)
                                <option value="{{$tipo_vehiculo->id_tipo}}">{{$tipo_vehiculo->descripcion}}</option>
                            @endforeach 
                        </select>               

                         <!-- <input type="text" name="id_tipo_vehiculo"> -->
                    </div>

                

                    <button type="submit">Registrar</button>
                </form>
            </div>
        @endSection
    