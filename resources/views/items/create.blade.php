@extends('adminlte::page')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-tittle text-capitalize"><strong>Nuevo Artículo</strong></h3>
				</div>
				<form action="{{ route('items.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="company_id" value="{{ $company_id }}">
					@include('items.items_fields')
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
