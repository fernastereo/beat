<div class="box-body">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group col-md-12">
				<label for="id_person">Identificación:</label>
				<div class="row">
					<div class="col-md-4">
						<input placeholder="Identificación" id="id_person" required="true" name="id_person" spellcheck="false" class="form-control input-sm" value="{{ old('id_person', $person->id_person) }}">
					</div>
					<div class="col-md-2">
					    <input placeholder="DV" id="verification_digit" required="true" name="verification_digit" type="text" class="form-control input-sm" value="{{ old('verification_digit', $person->verification_digit) }}">
					</div>
				</div>
			</div>
        </div>
        <div class="col-md-6">
	        <div class="form-group col-md-6">
				<label for="phone_number_1">Teléfono 1:</label>
				<input placeholder="Teléfono 1" id="phone_number_1" name="phone_number_1" class="form-control input-sm" value="{{ old('phone_number_1', $person->phone_number_1) }}"></input>
	        </div>
	        <div class="form-group col-md-6">
				<label for="phone_number_2">Teléfono 2:</label>
				<input placeholder="Teléfono 2" id="phone_number_2" name="phone_number_2" class="form-control input-sm" value="{{ old('phone_number_2', $person->phone_number_2) }}"></input>
	        </div>
    	</div>
	</div>

	<div class="row">
        <div class="col-md-6">
			<div class="form-group col-md-12">
				<label for="name">Nombre:</label>
				<input placeholder="Nombre" id="name" name="name" type="text" spellcheck="true" class="form-control input-sm" value="{{ old('name', $person->name) }}">
			</div>
        </div>
        <div class="col-md-6">
			<div class="form-group col-md-6">
				<label for="cellphone_number_1">Teléfono Celular:</label>
				<input placeholder="Teléfono Celular" id="cellphone_number_1" name="cellphone_number_1" type="text" class="form-control input-sm" value="{{ old('cellphone_number_1', $person->cellphone_number_1) }}">
	        </div>
        </div>
	</div>

	<div class="row">
		<div class="col-md-6">
	        <div class="form-group col-md-12">
				<label for="address">Dirección:</label>
				<input placeholder="Dirección" id="address" name="address" type="text" class="form-control input-sm" value="{{ old('address', $person->address) }}">
	        </div>
	    </div>
	    <div class="col-md-6">
	    	<div class="form-group col-md-6">
	    		<label for="credit_limit">Cupo de Crédito:</label>
	    		<input placeholder="Cupo de Crédito" id="credit_limit" name="credit_limit" type="text" class="form-control input-sm text-right" value="{{ old('credit_limit', $person->credit_limit) }}">
	    	</div>
	    	<div class="form-group col-md-6">
	    		<label for="credit_used">Crédito Usado:</label>
	    		<input placeholder="Crédito Usado" id="credit_used" name="credit_used" type="text" class="form-control input-sm text-right" value="{{ old('credit_used', $person->credit_used) }}">
	    	</div>
	    </div>
	</div>

	<div class="row">
		<div class="col-md-6">
	        <div class="form-group col-md-12">
				<label for="city_name">Ciudad:</label>
				<input placeholder="Ciudad" id="city_name" name="city_name" spellcheck="true" type="text" class="form-control input-sm" value="{{ old('city_name', $person->city_name) }}">
	        </div>
		</div>
        <div class="col-md-6">
			<div class="form-group col-md-6">
		        <div class="checkbox">
					<label>
						@if(old('person_type', $person->person_type) == 'C' || old('person_type', $person->person_type) == 'B')
							<input class="" type="checkbox" id="customer_type" name="customer_type" checked>Cliente
						@else
							@if($type == 'C')
								<input class="" type="checkbox" id="customer_type" name="customer_type" checked disabled="true">Cliente
							@else
								<input class="" type="checkbox" id="customer_type" name="customer_type">Cliente
							@endif
						@endif
					</label>
		        </div>
		        <div class="checkbox">
					<label>
						@if(old('person_type', $person->person_type) == 'S' || old('person_type', $person->person_type) == 'B')
							<input class="" type="checkbox" id="supplier_type" name="supplier_type" checked>Proveedor
						@else
							@if($type == 'S')
								<input class="" type="checkbox" id="supplier_type" name="supplier_type" checked disabled="true">Proveedor
							@else
								<input class="" type="checkbox" id="supplier_type" name="supplier_type">Proveedor
							@endif
						@endif
					</label>
		        </div>
			</div>					        	
        </div>
	</div>

	<div class="row">
        <div class="col-md-6">
        	<div class="form-group col-md-12">
				<label for="email">E-mail:</label>
				<input placeholder="E-mail" id="email" name="email" type="text" class="form-control input-sm" value="{{ old('email', $person->email) }}">
				<div class="checkbox">
					<label>
						@if(old('state', $person->state) == 0)
							<input class="" type="checkbox" id="state" name="state">Activo
						@else
							<input class="" type="checkbox" id="state" name="state" checked>Activo
						@endif
					</label>
		        </div>
			</div>
        </div>
        <div class="col-md-6">
			<div class="form-group col-md-12">
				<label for="comments">Observaciones:</label>
				<textarea class="form-control" rows="3" placeholder="Comentarios" id="comments" name="comments">{{ old('comments', $person->comments) }}</textarea>
			</div>
        </div>
	</div>
</div>