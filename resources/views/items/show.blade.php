@extends('adminlte::page')

@section('content')
	<div class="row"> 
    	<div class="col-md-12">  
      		<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title text-capitalize"><strong>{{$item->name}}</strong></h3>
					<div class="pull-right">
						<a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning btn-xs">Editar</a>

						<a class="dropdown-toggle btn btn-success btn-xs" data-toggle="dropdown" href="#">
							Más Acciones <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Ingresar Compra</a></li>
							<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Facturar</a></li>
							<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
							<li role="presentation" class="divider"></li>
							<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
						</ul>
					</div>
				</div>
				<form class="">
		      		<div class="box-body">
						<div class="col-md-5">
							<div class="form-group">
								<label>Código:</label>
								<label class="form-control input-sm">{{ $item->id_item }}</label>
					        </div>
					        <div class="form-group">
								<label>Nombre:</label>
								<label class="form-control input-sm">{{ $item->name }}</label>
					        </div>
					        <div class="form-group">
								<label >Descripción:</label>
								<label class="form-control input-sm">{{ $item->description }}</label>
					        </div>
					        <div class="form-group col-md-6" style="padding-left: 0px;">
								<label >Ubicación:</label>
								<label class="form-control input-sm">{{ $item->location->name }}</label>
					        </div>
					        <div class="form-group col-md-6" style="padding-left: 0px;">
								<label >Unidad de Medida::</label>
								<label class="form-control input-sm">{{ $item->unit->name }}</label>
					        </div>
					        <div class="form-group">
								<input type="checkbox" checked="{{ $item->state }}">
								<label for="state">Activo</label>
					        </div>
						</div>
						<div class="col-md-4">
					    	<div class="col-md-6">
						        <div class="form-group">
									<label>Existencia Actual:</label>
									<label class="form-control input-sm">{{ $item->stock }}</label>
						        </div>
						        <div class="form-group">
									<label>Existencia Mínima:</label>
									<label class="form-control input-sm">{{ $item->stock_min }}</label>
						        </div>
						        <div class="form-group">
									<label>Existencia Máxima:</label>
									<label class="form-control input-sm">{{ $item->stock_max }}</label>
						        </div>
						        <div class="form-group">
									<label>Costo:</label>
									<label class="form-control input-sm">{{ $item->cost }}</label>
						        </div>
					        </div>
					        <div class="col-md-6">
						        <div class="form-group">
									<label>Precio de Venta:</label>
									<label class="form-control input-sm">{{ $item->price }}</label>
						        </div>
						        <div class="form-group">
									<label>IVA Incluido:</label>
									<label class="form-control input-sm"><input class="" type="checkbox" id="include_iva" checked="{{ $item->include_iva }}"></label>
						        </div>
						        <div class="form-group">
									<label>Tarifa IVA:</label>
									<label class="form-control input-sm">{{ $item->tax_iva }}</label>
						        </div>
						        <div class="form-group">
									<label>Descuento Máximo:</label>
									<label class="form-control input-sm">{{ $item->max_discount }}</label>
						        </div>
						    </div>							
						</div>
						<div class="col-md-3">
							<img class="img-responsive center-block img-thumbnail" src="{{ $item->image }}" alt="Item Image">
						</div>
			      	</div>
				</form>
				<div class="box box-footer">
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab_Ventas" data-toggle="tab" aria-expanded="false">Ventas</a></li>
							<li class=""><a href="#tab_Compras" data-toggle="tab" aria-expanded="false">Compras</a></li>
							<li class=""><a href="#tab_Inventario" data-toggle="tab" aria-expanded="true">Inventario</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane" id="tab_Ventas">
								<b>How to use:</b>

								<p>Exactly like the original bootstrap tabs except you should use
								  the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.</p>
								A wonderful serenity has taken possession of my entire soul,
								like these sweet mornings of spring which I enjoy with my whole heart.
								I am alone, and feel the charm of existence in this spot,
								which was created for the bliss of souls like mine. I am so happy,
								my dear friend, so absorbed in the exquisite sense of mere tranquil existence,
								that I neglect my talents. I should be incapable of drawing a single stroke
								at the present moment; and yet I feel that I never was a greater artist than now.
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane" id="tab_Compras">
								The European languages are members of the same family. Their separate existence is a myth.
								For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
								in their grammar, their pronunciation and their most common words. Everyone realizes why a
								new common language would be desirable: one could refuse to pay expensive translators. To
								achieve this, it would be necessary to have uniform grammar, pronunciation and more common
								words. If several languages coalesce, the grammar of the resulting language is more simple
								and regular than that of the individual languages.
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane active" id="tab_Inventario">
								Lorem Ipsum is simply dummy text of the printing and typesetting industry.
								Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
								when an unknown printer took a galley of type and scrambled it to make a type specimen book.
								It has survived not only five centuries, but also the leap into electronic typesetting,
								remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
								sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
								like Aldus PageMaker including versions of Lorem Ipsum.
							</div>
							<!-- /.tab-pane -->
						</div>
			            <!-- /.tab-content -->
					</div>
				</div>
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