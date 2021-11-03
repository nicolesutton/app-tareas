<div class="card card-body mb-3">
	
	@if($project->status == 'En proceso')
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
		<hr>
		<a href="" data-toggle="modal" data-target= "#modalCreateTask_{{ $project->sid }}" class="btn btn-outline-dark btn-sm mb-3">Crear Tarea</a>
		<br>
		<br>
        @foreach($project->tasks as $task)
          <p class="mb-0">{{ $task->title }}</p>
          <p>Terminar para: {{ $task->deadline }}</p>
        @endforeach
		<hr>
		<p class="mb-0">Creado el: {{ Carbon\Carbon::parse($project->created_at)->diffForHumans() }}</p>
		<p>Creado el: {{ Carbon\Carbon::parse($project->created_at)->format('d M Y H:i') }}</p>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalCreateTask_{{ $project->sid }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear tarea</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('tareas.store') }}">
      <div class="modal-body">
    					{{ csrf_field() }}

    					<input type="hidden" name="source" value="proyectos" readonly="">

    					<input type="hidden" name="project_id" value="{{ $project->id }}" readonly="">
    					
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>