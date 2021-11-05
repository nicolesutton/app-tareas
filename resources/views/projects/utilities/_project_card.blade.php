<div class="card mb-3">

	@if($project->status == 'En Proceso')
	<div class="text-white px-2 text-center bg-info">{{ $project->status }}</div>
	@endif


	@if($project->status == 'Terminado')
	<div class="text-white px-2 text-center bg-success">{{ $project->status }}</div>
	@endif


	@if($project->status == 'Atrasado')
	<div class="text-white px-2 text-center bg-warning">{{ $project->status }}</div>
	@endif


	@if($project->status == 'Cancelado')
	<div class="text-white px-2 text-center bg-danger">{{ $project->status }}</div>
	@endif


	<div class="card-body">

		<h5>{{ $project->name }}</h5>
		<p>{{ $project->description }}</p>
		@foreach($project->users as $user)
		<p>{{ $user->name }}</p>
		@endforeach
		<hr>

		<a href="" data-toggle="modal" data-target="#modalCrearTarea_{{ $project->id }}" class="btn btn-outline-dark btn-sm mb-3">Crear Tarea</a>


		@foreach($project->tasks as $task)
			<div class="d-flex align-items-center justify-content-between">
				<div style="width:60%;">
					<p class="mb-1">{{ $task->title }}</p>
					
					<p class="mb-0">A cargo: {{ $task->user->name }}</p>
					
					@if($task->is_complete == false)
                      <span class="badge badge-warning">Pendiente</span>
                      @else
                      <span class="badge badge-success">Completada</span>
                      @endif
				</div>
			<div>
			@if($task->is_complete == false)
                      <a href="{{ route('tareas.status', $task->id) }}" class="btn btn-outline-success btn-sm" data-toggle="tooltip" data-placement="top" title="Completar"><ion-icon name="checkbox-outline"></ion-icon></a>
                      @endif
                      <a href="{{ route('tareas.edit', $task->id) }}" class="btn btn-outline-info btn-sm" data-toggle="tooltip" data-placement="top" title="Editar"><ion-icon name="create-outline"></ion-icon></a>
                      <form method="POST" style="display: inline-block;" action="{{ route('tareas.destroy', $task->id) }}">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <button type="submit" data-toggle="tooltip" data-placement="top" title="Borrar" class="btn btn-danger btn-sm"><ion-icon name="trash-outline"></ion-icon></button>
                      </form>
                      </div>
                </div>
		@endforeach

		<hr>	

		<p>Creado el: {{ Carbon\Carbon::parse($project->created_at)->format('d M Y H:i') }}</p>

	</div>

</div>

<!-- Modal -->
<div class="modal fade" id="modalCrearTarea_{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear tarea</h5>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      </div>
      <form method="POST" action="{{  route('tareas.store')  }}">
      <div class="modal-body">
        {{ csrf_field() }}

        <input type="hidden" name="source" value="proyectos" readonly="">

        <input type="hidden" name="project_id" value="{{ $project->id }}" readonly="">

        <input type="hidden" name="user_id" value="{{ $project->id }}" readonly="">

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
					<div class="form-group">
				    <label for="exampleFormControlSelect1">Selecciona usuario</label>
				    <select class="form-control" id="exampleFormControlSelect1" name="user_id">
				    	@foreach($project->users as $user)
				      <option value="{{ $user->id }}">{{ $user->name }}</option>
				        @endforeach
				    </select>
				  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
      </div>
     </form>
    </div>
  </div>
</div>