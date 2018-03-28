{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Articulos</h1>
@stop

@section('content')
  <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
    <div class="panel panel-primary">
      <div class="panel-heading">Projects <a class="pull-right btn btn-primary btn-sm" href="/projects/create">New Project</a> </div>
      <div class="panel-body">
        <!-- List group -->
        <ul class="list-group">
          @foreach ($items as $item)
            <li class="list-group-item"><a href="/projects/{{ $item->id }}">{{ $item->name }}</a></li>
          @endforeach
        </ul>
        {{ $projects->links('vendor.pagination.default') }}
      </div>
    </div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop