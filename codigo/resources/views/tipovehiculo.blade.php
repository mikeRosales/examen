 @extends('layouts.app')
    
        @section('content')
         <div class="content">
                <h1>Tipo de Vehiculos</h1>
                <a class="nav-link" href="{{config('app.url')}}/tipo_vehiculo/create">Agregar Tipo de Vehiculo</a>
                <table id="table_id" class="table table-striped table-dark">

                    <thead class="thead-dark">
                        <td>Editar</td>
                        <td>Tiempo Estacionado (min.)</td>
                        <td>Cobrable</td>
                        <td>Cantidad a pagar</td>
                        
                    </thead>
                    <tbody>
                        @foreach ($allVehiculos as $tipo)
                            <tr>
                                <td> 
                                    <form method="Post" action="{{ config('app.url')}}/buscarVehiculo">
                                         @csrf                                         
                                         <div class="form-input">
                                              <input type="hidden" id="id_tipo"  name="id_tipo" value ="{{$tipo['id_tipo']}}">
                                         </div>
                                          <button id="buscar" name='buscar' type="submit">Editar</button>                                                
                                     </form>
                                 </td>
                                <td class="inner-table">{{ $tipo['descripcion'] }}</td>
                                
                                <td class="inner-table">
                                   @if($tipo['paga'] == 0)
         
                        No                      
         
         @else
                        Si
         
         @endif
                          </td>
                                <td class="inner-table">{{ $tipo['cuota_minuto'] }}</td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endsection