@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    	<div class="col-md-6">
    		<div class="card">
    			<div class="card-header">CREAR TAREA</div>

    			<div class="card-body">
    				<form method="POST" action="{{ route('tareas.store') }}">
    					{{ csrf_field() }}
    					
    					<div class="form-group">
    						<label>Titulo de Tarea</label>
    						<input type="text" name="title" class="form-control" required="">
    					</div>

    					<div class="form-group">
    						<label>Fecha de Entrega</label>
    						<input type="date" name="deadline" class="form-control">
    					</div>

    					<div class="form-group">
    						<label>Descripción</label>
    						<textarea class="form-control" name="description" rows="5"></textarea>
    					</div>

    					<button type="submit" class="btn btn-primary">Guardar tarea en la base de datos</button>
    				</form>
    			</div>
    		</div>
    	</div>
    </div>
</div>
@endsection