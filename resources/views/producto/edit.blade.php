@extends('layouts.plantilla')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col s12 center-align">
          <span>Editar producto No. {{$producto->id_producto}}</span>
        </div>
      </div>
      <div class="row">
        <div class="col s12">
          <form action="{{route('producto.update')}}" method="post">
            @csrf
            @method('post')
            <div class="row">
              <div class="input-field col s12 m4">
                <i class="material-icons prefix">chevron_right</i>
                <select name="id_proveedor" id="id_proveedor">
                  <option value="{{$producto->proveedor->id_proveedor}}" selected disabled>{{$producto->proveedor->descripcion}}</option>
                  @foreach ($proveedor as $key => $value)
                  <option value="{{$value->id_proveedor}}" >{{$value->descripcion}}</option>
                  @endforeach
                </select>
              </div>

              <div class="input-field col s12 m4">
                <i class="material-icons prefix">chevron_right</i>
                <select name="id_presentacion" id="id_presentacion">
                  <option value="{{$producto->presentacion->id_presentacion}}" selected disabled>{{$producto->presentacion->descripcion}}</option>
                  @foreach ($presentacion as $key => $value)
                  <option value="{{$value->id_presentacion}}" >{{$value->descripcion}}</option>
                  @endforeach
                </select>
              </div>

              <div class="input-field col s12 m4">
                <i class="material-icons prefix">chevron_right</i>
                <select name="id_marca" id="id_marca">
                  <option value="{{$producto->marca->id_marca}}" selected disabled>{{$producto->marca->descripcion}}</option>
                  @foreach ($marca as $key => $value)
                  <option value="{{$value->id_marca}}" >{{$value->descripcion}}</option>
                  @endforeach
                </select>
              </div>

              <div class="input-field col s12 m4">
                <i class="material-icons prefix">chevron_right</i>
                <select name="id_zona" id="id_zona">
                  <option value="{{$producto->zona->id_zona}}" selected disabled>{{$producto->zona->descripcion}}</option>
                  @foreach ($zona as $key => $value)
                  <option value="{{$value->id_zona}}" >{{$value->descripcion}}</option>
                  @endforeach
                </select>
              </div>

              <div  class="input-field col s12 m6 l4">
                <i class="material-icons prefix">chevron_right</i>
                <input type="text" id="codigo" name="codigo" value="{{$producto->codigo}}">
                <label for="codigo" >Codigo producto</label>
              </div>
              <div  class="input-field col s12 m6 l4">
                <i class="material-icons prefix">chevron_right</i>
                <input type="text" id="descripcion" name="descripcion" value="{{$producto->descripcion_producto}}">
                <label for="descripcion" >Descripcion producto</label>
              </div>
              <div  class="input-field col s12 m6 l4">
                <i class="material-icons prefix">chevron_right</i>
                <input type="number" step="any" id="precio" name="precio" value="{{$producto->precio}}">
                <label for="precio" >Precio</label>
              </div>

              <div  class="input-field col s12 m6 l4">
                <i class="material-icons prefix">chevron_right</i>
                <input type="number" id="stock" name="stock" value="{{$producto->stock}}">
                <label for="stock" >Stock</label>
              </div>
              
              <div  class="input-field col s12 m6 l4">
                <i class="material-icons prefix">chevron_right</i>
                <input type="number" step="any" id="iva" name="iva" value="{{$producto->iva}}">
                <label for="iva" >IVA</label>
              </div>

              <div  class="input-field col s12 m6 l4">
                <i class="material-icons prefix">chevron_right</i>
                <input type="number" step="any" id="peso" name="peso" value="{{$producto->peso}}">
                <label for="peso" >Peso *lbs</label>
              </div>

            </div>
            
              <button class="btn waves-effect waves-light" type="submit" name="action">Actualizar
                <i class="material-icons right">send</i>
              </button>
        
          </form>
  
        </div>
      </div>
    </div>
@endsection

@push('scripts')
<script> 
  $(document).ready(function(){
    $('select').formSelect();
  });
</script>

@endpush