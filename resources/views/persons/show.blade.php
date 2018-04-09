@extends('adminlte::page')

@section('content')
	<div class="row"> 
    	<div class="col-md-12">  
      		<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title text-capitalize"><strong>{{$person->name}}</strong></h3>
					<div class="pull-right">
						<a href="{{ route('persons.edit', $person->id) }}" class="btn btn-warning btn-xs">Editar</a>

						<a class="dropdown-toggle btn btn-success btn-xs" data-toggle="dropdown" href="#">
							Más Acciones <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Ingresar Compra</a></li>
							<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Facturar</a></li>
							<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('persons.company', ['companyid' => $person->company_id, 'type' => $person->person_type]) }}">Artículos</a></li>
							<li role="presentation" class="divider"></li>
							<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
						</ul>
					</div>
				</div>
				<form class="">
		      		<div class="box-body">
						<div class="row" style="border: 1px solid red">
							<div class="form-group col-md-6" style="border: 1px solid blue" >
								<div class="col-md-6" style="border: 1px solid yellow">
									<label>Identificación:</label>
									<div class="input-group input-group-sm">
										<label class="form-control input-sm">{{ $person->id_person }}</label>
										<span class="input-group-addon">
										    {{ $person->verification_digit }}
										</span>
									</div>
								</div>
  					        </div>
  					        <div class="form-group col-md-6">
						        <div class="form-group col-md-6">
									<label>Teléfono 1:</label>
									<label class="form-control input-sm">{{ $person->phone_number_1 }}</label>
						        </div>
						        <div class="form-group col-md-6">
									<label>Teléfono 2:</label>
									<label class="form-control input-sm">{{ $person->phone_number_2 }}</label>
						        </div>
					    	</div>
						</div>

						<div class="row" style="border: 1px solid red">
					        <div class="form-group col-md-6">
								<div class="col-md-12">
									<label>Nombre:</label>
									<label class="form-control input-sm">{{ $person->name }}</label>
								</div>
					        </div>
					        <div class="form-group col-md-6">
								<div class="form-group col-md-6">
									<label>Teléfono Celular:</label>
									<label class="form-control input-sm">{{ $person->cellphone_number_1 }}</label>
						        </div>
					        </div>
						</div>
						<div class="row">
					        <div class="form-group col-md-12">
								<label >Dirección:</label>
								<label class="form-control input-sm">{{ $person->address }}</label>
					        </div>
						</div>
						<div class="row">
					        <div class="form-group col-md-12">
								<label >Ciudad:</label>
								<label class="form-control input-sm">{{ $person->city_name }}</label>
					        </div>
						</div>
						<div class="row">
					        <div class="form-group col-md-12">
								<label >E-mail:</label>
								<a href="mailto:{{ $person->email }}">{{ $person->email }}</a>
					        </div>
					        <div class="form-group">
								@if($person->state == 0)
									<input class="" type="checkbox" id="state" name="state">
								@else
									<input class="" type="checkbox" id="state" name="state" checked>
								@endif
								<label for="state">Activo</label>
					        </div>
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