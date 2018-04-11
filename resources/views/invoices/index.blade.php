@extends('adminlte::page')

@section('content')
	<div class="box">
        <div class="box-header">
			<h3 class="box-title">Facturas de Venta</h3>
			<a href="" class="pull-right btn btn-primary">Crear Nueva Factura</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
			<div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
				<div class="row">
					<div class="col-sm-6"><!--Filtro de numero de registros-->
						<div class="dataTables_length" id="example1_length">
							<label>{{ trans('adminlte::adminlte.show') }} 
								<select name="example1_length" aria-controls="example1" class="form-control input-sm">
									<option value="10">10</option>
									<option value="25">25</option>
									<option value="50">50</option>
									<option value="100">100</option>
								</select> {{ trans('adminlte::adminlte.entries') }}
							</label>
						</div>
					</div>
					<div class="col-sm-6"><!--Cuadro del buscador-->
						<div id="example1_filter" class="dataTables_filter">
							<label>{{ trans('adminlte::adminlte.search') }}:
								<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1">
							</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                			<thead>
                				<tr role="row">
                					<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 211px;">
                					Numero
                					</th>
                					<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 160px;">
                					Cliente
                					</th>
                					<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 160px;">
                					Fecha
                					</th>
                					<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 160px;">
                					Valor
                					</th>
                					<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 182px;" colspan="3">
                					{{ trans('adminlte::adminlte.actions') }}
                					</th>
                				</tr>
                			</thead>
            				<tbody>
            					@foreach ($users as $user)
            						@foreach($user->invoices as $invoice)
										<tr role="row" class="odd">
											<td class="text-capitalize">{{ $invoice->id_invoice }}</td>
											<td>{{ $invoice->person->name }}</td>
											<td class="text-right">{{ $invoice->invoice_date }}</td>
											<td class="text-right">{{ $invoice->expire_date }}</td>
											<td><a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-primary btn-xs">{{ trans('adminlte::adminlte.view') }}</a></td>
											<td><a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-warning btn-xs">{{ trans('adminlte::adminlte.edit') }}</a></td>
											<td>Acciones</td>
										</tr>
									@endforeach
								@endforeach
							</tbody>
			                <tfoot>
				                <tr>
				                	<th rowspan="1" colspan="1">Nombre</th>
				                	<th rowspan="1" colspan="1">Identificacion</th>
				                	<th rowspan="1" colspan="1">Teléfono</th>
				                	<th rowspan="1" colspan="1">Celular</th>
				                	<th rowspan="1" colspan="3">{{ trans('adminlte::adminlte.actions') }}</th>
				                </tr>
			                </tfoot>
						</table>
		      		</div>
		      	</div>
		      	<div class="row">
		      		<div class="col-sm-5">
		      			<div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of {{ $users->count() }} entries
		      			</div>
		      		</div>
		      		<div class="col-sm-7">
		      			<div class="pull-right">
		      				
		      			</div>
		      		</div>
		      	</div>
			</div>
		</div>
    	<!-- /.box-body -->
	</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
