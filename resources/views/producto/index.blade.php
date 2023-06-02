@extends('layouts.plantilla')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col s12 center-align">
                <span>Administrador de Catalogos</span>
            </div>
        </div>
        <div class="row">
            <a id="btn_proveedor" class=" col s12 m3 btn large">Proveedor</a>
            <a id="btn_presentacion" class=" col s12 m3 btn large">Presentacion</a>
            <a id="btn_marca" class=" col s12 m3 btn large">Marca</a>
            <a id="btn_zona" class=" col s12 m3 btn large">Zona</a>
        </div>

        <div class="divider"></div>

        <div class="row">
          <div class="col s12">
            <a href="{{route('producto.create')}}" class="btn">Ingresar producto </a>
          </div>
          {{-- Card para cada Producto --}}
          <div class="row">
          @foreach ( $productos as $producto )
            <div class="col s12 m4">
              <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                  <span class="card-title">Producto No. {{$producto->id_producto}}</span>
                  <ul>
                    <li>Proveedor: {{$producto->proveedor->descripcion}}</li>
                    <li>Marca: {{$producto->marca->descripcion}}</li>
                    <li>Presentacion: {{$producto->presentacion->descripcion}}</li>
                    <li>Codigo: {{$producto->codigo}}</li>
                    <li>Descripcion: {{$producto->descripcion_producto}}</li>
                  </ul>
                </div>
                <div class="card-action">
                  <a href="{{route('producto.delete',$producto->id_producto)}}">Eliminar</a>
                  <a href="{{route('producto.edit',$producto->id_producto)}}">Editar</a>
                </div>
              </div>
            </div>
            @endforeach
          </div>

        </div>



    </div>

    {{-- Seccion de Modales --}}
    <div id="modal_proveedor" class="modal">
        <div class="modal-content">
            <h4>Proveedor</h4>
            <div class="row">
                <div id="lista-proveedor" class="col s6">
                </div>
                <div id="inputs-proveedor" class="col s6">
                    <div class="input-field col s12">
                        <input type="text" id="descripcion_proveedor" name="descripcion_proveedor"
                            placeholder="Nombre proveedor">
                        <label for="descripcion_proveedor">Nombre Proveedor</label>
                    </div>
                    <a class="btn col s12" id="agregar_proveedor">Agregar</a>
                </div>

            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
        </div>
    </div>

    <div id="modal_marca" class="modal">
        <div class="modal-content">
            <h4>Marca</h4>
            <div class="row">
                <div id="lista-marca" class="col s6">
                </div>
                <div id="inputs-marca" class="col s6">
                    <div class="input-field col s12">
                        <input type="text" id="descripcion_marca" name="descripcion_marca" placeholder="Nombre marca">
                        <label for="descripcion_marca">Nombre Marca</label>
                    </div>
                    <a class="btn col s12" id="agregar_marca">Agregar</a>
                </div>

            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
        </div>
    </div>

    <div id="modal_presentacion" class="modal">
      <div class="modal-content">
          <h4>Presentacion</h4>
          <div class="row">
              <div id="lista-presentacion" class="col s6">
              </div>
              <div id="inputs-presentacion" class="col s6">
                  <div class="input-field col s12">
                      <input type="text" id="descripcion_presentacion" name="descripcion_presentacion" placeholder="Nombre presentacion">
                      <label for="descripcion_presentacion">Nombre presentacion</label>
                  </div>
                  <a class="btn col s12" id="agregar_presentacion">Agregar</a>
              </div>
    
          </div>
      </div>
      <div class="modal-footer">
          <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
      </div>
    </div>

    <div id="modal_zona" class="modal">
      <div class="modal-content">
          <h4>Zona</h4>
          <div class="row">
              <div id="lista-zona" class="col s6">
              </div>
              <div id="inputs-zona" class="col s6">
                  <div class="input-field col s12">
                      <input type="text" id="descripcion_zona" name="descripcion_zona" placeholder="Nombre zona">
                      <label for="descripcion_zona">Nombre zona</label>
                  </div>
                  <a class="btn col s12" id="agregar_zona">Agregar</a>
              </div>
    
          </div>
      </div>
      <div class="modal-footer">
          <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
      </div>
    </div>
@endsection

@push('scripts')
<script>
  $(document).ready(function() {
      $('.modal').modal();
  })
  // Mostrar Catologo Proveedor
  function mostrarCatalogo() {
      $.ajax({
              url: "{{ route('proveedor.index') }}",
              type: 'get',
              data: {},
              dataType: 'text'
          })
          .done(function(response) {
              $('#lista-proveedor').html(JSON.parse(response).map(el => {
                  return `<li>${el.descripcion}</li>`
              }))
              $('#modal_proveedor').modal('open');


          })
          .fail(function() {
              console.log('doesnt-work-Proveedor')
          })

  }

  $('#btn_proveedor').on('click', function() {
      mostrarCatalogo();
  });
  // Agregar Proveedor
  $('#agregar_proveedor').on('click', function() {

      $.ajax({
              url: "{{ route('proveedor.create') }}",
              type: 'get',
              data: {
                  descripcion: $('#descripcion_proveedor').val()
              },
              dataType: 'text'
          })
          .done(function(response) {
              mostrarCatalogo();
              $('#descripcion_proveedor').val('');
          })
          .fail(function() {})
  })


  // Mostrar Catologo Marca
  function mostrarCatalogoMarca() {
      $.ajax({
              url: "{{ route('marca.index') }}",
              type: 'get',
              data: {},
              dataType: 'text'
          })
          .done(function(response) {
              $('#lista-marca').html(JSON.parse(response).map(el => {
                  return `<li>${el.descripcion}</li>`
              }))
              $('#modal_marca').modal('open');


          })
          .fail(function() {
              console.log('doesnt-work-marca')
          })

  }

  $('#btn_marca').on('click',function () {
    mostrarCatalogoMarca();
  })

  // Agregar Marca
  $('#agregar_marca').on('click', function() {
    $.ajax({
        url: "{{ route('marca.create') }}",
        type: 'get',
        data: {
            descripcion: $('#descripcion_marca').val()
        },
        dataType: 'text'
    })
    .done(function(response) {
        mostrarCatalogoMarca();
        $('#descripcion_marca').val('');

    })
    .fail(function() {})
  });

  // Mostrar Catalogo Presentacion

  function mostrarCatalogoPresentacion() {
    $.ajax({
        url: "{{ route('presentacion.index') }}",
        type: 'get',
        data: {},
        dataType: 'text'
    })
    .done(function(response) {
        $('#lista-presentacion').html(JSON.parse(response).map(el => {
            return `<li>${el.descripcion}</li>`
        }))
        $('#modal_presentacion').modal('open');


    })
    .fail(function() {
        console.log('doesnt-work-presentacion')
    })
  }

  $('#btn_presentacion').on('click',function () {
    mostrarCatalogoPresentacion();
  })

  // Agregar Presentacion

  $('#agregar_presentacion').on('click', function() {
    $.ajax({
        url: "{{ route('presentacion.create') }}",
        type: 'get',
        data: {
            descripcion: $('#descripcion_presentacion').val()
        },
        dataType: 'text'
    })
    .done(function(response) {
        mostrarCatalogoPresentacion();
        $('#descripcion_presentacion').val('');

    })
    .fail(function() {})
  });

  // Mostrar Catologo Zona
  function mostrarCatalogoZona() {
    $.ajax({
        url: "{{ route('zona.index') }}",
        type: 'get',
        data: {},
        dataType: 'text'
    })
    .done(function(response) {
        $('#lista-zona').html(JSON.parse(response).map(el => {
            return `<li>${el.descripcion}</li>`
        }))
        $('#modal_zona').modal('open');


    })
    .fail(function() {
        console.log('doesnt-work-zona')
    })
  }

  $('#btn_zona').on('click',function () {
    mostrarCatalogoZona();
  })

  // Agregar Zona
  $('#agregar_zona').on('click', function() {
    $.ajax({
        url: "{{ route('zona.create') }}",
        type: 'get',
        data: {
            descripcion: $('#descripcion_zona').val()
        },
        dataType: 'text'
    })
    .done(function(response) {
        mostrarCatalogoZona();
        $('#descripcion_zona').val('');
    })
    .fail(function() {})
  });

</script>
@endpush
