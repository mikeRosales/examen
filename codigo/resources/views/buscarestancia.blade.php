 @extends('layouts.app')
    
        @section('content')
            <div class="content">
                
                @if (Session::has('msg'))

                   <div class="alert alert-danger">
        <ul>
            <li>{!!  Session::get("msg") !!}</li>
        </ul>
    </div>
    @endif
                


                <form method="Post" action="{{ config('app.url')}}/buscarestancia">
                    @csrf
                    <h1> Ingrese la placa para buscar el vehiculo</h1>
                    <div class="form-input">
                        <label>Placa</label> <input type="text" id="placa"  name="placa">
                    </div>
                     <button id="buscar" name='buscar' type="submit">Buscar</button>                                                
                </form>
       
            </div>
       

        
        @endSection
        