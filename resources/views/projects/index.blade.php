@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12 text-right">
          <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modalProyectos">Crear nuevo proyecto</a>
       </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <h4>Mis proyectos</h4>
        <hr>
      </div>
      @foreach($projects as $project)
      <div class="col-md-4">
        <div class="card card-body">
        @include ('projects.utilities._project_card')
        </div>
      </div>  
      @endforeach
    </div>
</div>

@include ('projects.utilities._create_modal')

  @endsection