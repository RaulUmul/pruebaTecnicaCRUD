@extends('layouts.plantilla')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col s12 center-align">
          <span>Agregar un nuevo Producto</span>
        </div>
      </div>
      <div class="row">
        <div class="col s12">
          <form action="{{route('producto.store')}}" method="post">
            @csrf
            @method('post')
            <div class="row">
              <div class="input-field col s12 m4">
                <i class="material-icons prefix">chevron_right</i>
                <select name="id_proveedor" id="id_proveedor">
                  <option value="{{null}}" selected disabled>Proveedor</option>
                  @foreach ($proveedor as $key => $value)
                  <option value="{{$value->id_proveedor}}" >{{$value->descripcion}}</option>
                  @endforeach
                </select>
              </div>

              <div class="input-field col s12 m4">
                <i class="material-icons prefix">chevron_right</i>
                <select name="id_presentacion" id="id_presentacion">
                  <option value="{{null}}" selected disabled>Presentacion</option>
                  @foreach ($presentacion as $key => $value)
                  <option value="{{$value->id_presentacion}}" >{{$value->descripcion}}</option>
                  @endforeach
                </select>
              </div>

              <div class="input-field col s12 m4">
                <i class="material-icons prefix">chevron_right</i>
                <select name="id_marca" id="id_marca">
                  <option value="{{null}}" selected disabled>Marca</option>
                  @foreach ($marca as $key => $value)
                  <option value="{{$value->id_marca}}" >{{$value->descripcion}}</option>
                  @endforeach
                </select>
              </div>

              <div class="input-field col s12 m4">
                <i class="material-icons prefix">chevron_right</i>
                <select name="id_zona" id="id_zona">
                  <option value="{{null}}" selected disabled>Zona</option>
                  @foreach ($zona as $key => $value)
                  <option value="{{$value->id_zona}}" >{{$value->descripcion}}</option>
                  @endforeach
                </select>
              </div>

              <div  class="input-field col s12 m6 l4">
                <i class="material-icons prefix">chevron_right</i>
                <input type="text" id="codigo" name="codigo" value="{{old('codigo')}}">
                <label for="codigo" >Codigo producto</label>
              </div>
              <div  class="input-field col s12 m6 l4">
                <i class="material-icons prefix">chevron_right</i>
                <input type="text" id="descripcion" name="descripcion" value="{{old('descripcion')}}">
                <label for="descripcion" >Descripcion producto</label>
              </div>
              <div  class="input-field col s12 m6 l4">
                <i class="material-icons prefix">chevron_right</i>
                <input type="number" step="any" id="precio" name="precio" value="{{old('precio')}}">
                <label for="precio" >Precio</label>
              </div>

              <div  class="input-field col s12 m6 l4">
                <i class="material-icons prefix">chevron_right</i>
                <input type="number" id="stock" name="stock" value="{{old('stock')}}">
                <label for="stock" >Stock</label>
              </div>
              
              <div  class="input-field col s12 m6 l4">
                <i class="material-icons prefix">chevron_right</i>
                <input type="number" step="any" id="iva" name="iva" value="{{old('iva')}}">
                <label for="iva" >IVA</label>
              </div>

              <div  class="input-field col s12 m6 l4">
                <i class="material-icons prefix">chevron_right</i>
                <input type="number" step="any" id="peso" name="peso" value="{{old('peso')}}">
                <label for="peso" >Peso *lbs</label>
              </div>

            </div>
            
              <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
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