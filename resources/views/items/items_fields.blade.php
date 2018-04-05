<div class="box-body">
  	<div class="col-md-6">
        <div class="form-group col-md-12">
			<label for="id_item">Código:<span class="required"></span></label>
			<input placeholder="Código" id="id_item" required="true" name="id_item" spellcheck="false" class="form-control input-sm" value="{{ $item->id_item }}">
        </div>
        <div class="form-group col-md-12">
			<label for="name">Nombre:<span class="required"></span></label>
			<input placeholder="Nombre" id="name" required="true" name="name" spellcheck="false" class="form-control input-sm" value="{{ $item->name }}">
        </div>
        <div class="form-group col-md-12">
			<label for="description">Descripción:<span class="required"></span></label>
			<input placeholder="Descripción" id="description" required="true" name="description" spellcheck="false" class="form-control input-sm" value="{{ $item->description }}">
        </div>
		@if($locations != null)
			<div class="form-group col-md-6">
				<label for="location_id">Ubicación:<span class="required"></span></label>
				<select class="form-control input-sm" id="location_id" name="location_id">
		    		<option value="X">-- Seleccione Ubicación --</option>
		    		@foreach($locations as $location)
		    			@if($location->id == $item->location_id)
							<option value="{{ $location->id }}" selected="true">{{ $location->name }}</option>
		      			@else
		        			<option value="{{ $location->id }}">{{ $location->name }}</option>
		      			@endif
		    		@endforeach
				</select>
			</div>
		@endif
		@if($units != null)
			<div class="form-group col-md-6">
				<label for="unit_id">Unidad de Medida:<span class="required"></span></label>
				<select class="form-control input-sm" id="unit_id" name="unit_id">
		    		<option value="X">-- Seleccione Ubicación --</option>
		    		@foreach($units as $unit)
		    			@if($unit->id == $item->unit_id)
							<option value="{{ $unit->id }}" selected="true">{{ $unit->name }}</option>
		      			@else
		        			<option value="{{ $unit->id }}">{{ $unit->name }}</option>
		      			@endif
		    		@endforeach
				</select>
			</div>
		@endif
        <div class="form-group col-md-6">
			@if($item->state == 0)
				<input class="" type="checkbox" id="state" name="state">
			@else
				<input class="" type="checkbox" id="state" name="state" checked>
			@endif
			<label for="state">Activo<span class="required"></span></label>
        </div>
    </div>
    <div class="col-md-6">
    	<div class="col-md-6">
	        <div class="form-group">
				<label for="stock">Existencia Actual:<span class="required"></span></label>
				<input placeholder="Existencia Actual" id="stock" required="true" name="stock" spellcheck="false" class="form-control input-sm" value="{{ $item->stock }}">
	        </div>
	        <div class="form-group">
				<label for="stock_min">Existencia Mínima:<span class="required"></span></label>
				<input placeholder="Existencia Mínima" id="stock_min" required="true" name="stock_min" spellcheck="false" class="form-control input-sm" value="{{ $item->stock_min }}">
	        </div>
	        <div class="form-group">
				<label for="stock_max">Existencia Máxima:<span class="required"></span></label>
				<input placeholder="Existencia Máxima" id="stock_max" required="true" name="stock_max" spellcheck="false" class="form-control input-sm" value="{{ $item->stock_max }}">
	        </div>
	        <div class="form-group">
				<label for="cost">Costo:<span class="required"></span></label>
				<input placeholder="Costo" id="cost" required="true" name="cost" spellcheck="false" class="form-control input-sm" value="{{ $item->cost }}">
	        </div>
        </div>
        <div class="col-md-6">
	        <div class="form-group">
				<label for="price">Precio de Venta:<span class="required"></span></label>
				<input placeholder="Precio de Venta" id="price" required="true" name="price" spellcheck="false" class="form-control input-sm" value="{{ $item->price }}">
	        </div>
	        <div class="form-group">
				<label for="include_iva">IVA Incluido:<span class="required"></span></label>
				<label class="form-control input-sm">
					@if($item->include_iva == 0)
						<input class="" type="checkbox" id="include_iva" name="include_iva">
					@else
						<input class="" type="checkbox" id="include_iva" name="include_iva" checked>
					@endif
				</label>
	        </div>
	        <div class="form-group">
				<label for="tax_iva">Tarifa IVA:<span class="required"></span></label>
				<input placeholder="Tarifa IVA" id="tax_iva" required="true" name="tax_iva" spellcheck="false" class="form-control input-sm" value="{{ $item->tax_iva }}">
	        </div>
	        <div class="form-group">
				<label for="max_discount">Descuento Máximo:<span class="required"></span></label>
				<input placeholder="Descuento Máximo" id="max_discount" required="true" name="max_discount" spellcheck="false" class="form-control input-sm" value="{{ $item->max_discount }}">
	        </div>
	    </div>
        <div class="form-group col-md-6">
            <label for="image">Imagen:</label>
            <input type="file" id="image" name="image">
            <!--<p class="help-block">Example block-level help text here.</p>-->
        </div>                
    </div>
</div>