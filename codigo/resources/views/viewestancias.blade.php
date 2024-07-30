 @extends('layouts.app')
    
        @section('content')
<form method="Post" action="{{ config('app.url')}}/filtrarestancia">
                    @csrf
    <input
      type="datetime-local"
      id="inicio"
      name="inicio"
       />

      <input
      type="datetime-local"
      id="final"
      name="final"
      />
                     <button id="buscar" name='buscar' type="submit">Filtrar</button>                                                
                </form>

            <div class="content">
                <h1>Estancias</h1>
                <table id="table_id" class="table table-striped table-dark">

                    <thead class="thead-dark">
                        <td>Placa</td>
                        <td>Tiempo Estacionado (min.)</td>
                        <td>Tipo</td>
                        <td>Cantidad a pagar</td>
                        
                    </thead>
                    <tbody>
                        @foreach ($allEstancias as $estancia)
                            <tr>
                                <td>{{ $estancia['placa'] }}</td>
                                <td class="inner-table">{{ $estancia['tiempo_estacionado'] }}</td>
                                <td class="inner-table">{{ $estancia['tipo'] }}</td>
                                <td class="inner-table">{{ $estancia['cuota'] }}</td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <script>
                $(document).ready(function() {
            $('#table_id').DataTable({

                dom: 'Bfrtip',
                pageLength: 25,
                // lengthMenu: [0, 5, 10, 20, 50, 100, 200, 500],

                buttons: [
                     'csv', 'excel', 'pdf'
                ]

            });
        });
            </script>
            @endSection