@if(Session::has('info'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Atención!</strong> {{ Session::get('info') }}

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  	<span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if(Session::has('alert'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Alerta!</strong> {{ Session::get('alert') }}

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  	<span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if(Session::has('exito'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong>Acción Éxitosa!</strong> {{ Session::get('exito') }}

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  	<span aria-hidden="true">&times;</span>
  </button>
</div>
@endif