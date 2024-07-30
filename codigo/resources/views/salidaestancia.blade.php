 @extends('layouts.app')
    
        @section('content')
            <div class="content">
                <h1>Estancias</h1>
                
                <table class="table table-striped table-dark">

                    <thead class="thead-dark">
                        <td>Placa</td>
                        <td>Tiempo Estacionado (min.)</td>
                        <td>Tipo</td>
                        <td>Cantidad a pagar</td>
                        
                    </thead>
                    <tbody>
                        @foreach ($allEstancias as $estancia)
                             <form method="POST" action="/guardarestancia">
                                @csrf
                            <!-- <form action="{{ route('estancias.update', $estancia['id']) }}"> -->
                     

                            <tr>
                                <td>{{ $estancia['placa'] }}</td>
                                <td class="inner-table">{{ $estancia['tiempo_estacionado'] }}</td>
                                <input type="hidden" id="id" name="id" value="{{$estancia['id']}}">
                                <td class="inner-table">{{ $estancia['tipo'] }}</td>
                                <td class="inner-table">{{ $estancia['cuota'] }}</td>
                                
                            </tr>
                           
                        @endforeach
                         <h1> Marcar Salida</h1>
                    
                     <button id="buscar" name='buscar' type="submit">Marcar Salida</button>                                                
                </form>
                    </tbody>
                </table>
            </div>
             
                   
            @endSection