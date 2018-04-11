@extends('adminlte::page')

@section('content')
	<div class="row"> 
    	<div class="col-md-12">  
      		<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title text-capitalize"><strong>Nuevo @if($type == 'C') Cliente @elseif($type == 'S') Proveedor @else Tercero @endif</strong></h3>
				</div>
				<form class="" action="{{ route('persons.store') }}" method="post">
					@csrf
					<input type="hidden" name="company_id" value="{{ $company_id }}">
					@include('persons.persons_fields')
					<div class="box box-footer">
						<div class="pull-right">
							<button type="submit" class="btn btn-primary">Guardar</button>
						</div>
					</div>
				</form>
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