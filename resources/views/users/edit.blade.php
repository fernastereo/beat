@extends('adminlte::page')

@section('title', 'Editar Perfil')

@section('content')
	
  <div class="row"> 
    <div class="col-md-6">  
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Perfil</h3>
        </div>
        <form action="{{ route('user.update', [$user->id]) }}" method="post" enctype="multipart/form-data">
          <div class="box-body">
            @csrf
            @method('put')

            <div class="form-group">
              <label for="first_name">Nombres:<span class="required"></span></label>
              <input placeholder="Nombres"
                id="first_name"
                required="true" 
                name="first_name"
                spellcheck="false" 
                class="form-control"
                value="{{ $user->first_name }}">
            </div>      
            <div class="form-group">
              <label for="last_name">Apellidos:<span class="required"></span></label>
              <input placeholder="Apellidos"
                id="last_name"
                required="true" 
                name="last_name"
                spellcheck="false" 
                class="form-control"
                value="{{ $user->last_name }}">
            </div>      
            <div class="form-group">
              <label for="email">E-mail:<span class="required"></span></label>
              <input placeholder="E-mail"
                id="email"
                required="true" 
                name="email"
                spellcheck="false" 
                class="form-control"
                value="{{ $user->email }}" disabled>
            </div>      
            <div class="form-group">  
              <label for="company_id">Company:</label>
              <input placeholder="Company" 
                  id="company_id" 
                  name="company_id" 
                  class="form-control"
                  value="{{ $user->company->name }}" disabled>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Avatar:</label>
                <input type="file" id="avatar" name="avatar">
                <!--<p class="help-block">Example block-level help text here.</p>-->
            </div>                
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Enviar</button>
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