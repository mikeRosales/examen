    @extends('layouts.app')
    
        @section('content')
            <div class="content">
                <form method="POST" action="{{ config('app.url')}}/tipo_vehiculo">
                    @csrf
                    <h1> Registre los datos del tipo de vehiculo</h1>
                    <div class="form-input">
                        <label>Descripcion</label>
                        <input type="text" name="descripcion">                        
                    </div>
                    <div class="form-input">
                        <label>¿Cobrable?</label>
                        <input type="checkbox" name="paga">                        
                    </div>
                    <div class="form-input">
                        <label>Cuota por Minuto</label>
                        <input type="text" name="cuota">                        
                    </div>                            
                    <button type="submit">Registrar</button>
                </form>
            </div>
        @endSection
    