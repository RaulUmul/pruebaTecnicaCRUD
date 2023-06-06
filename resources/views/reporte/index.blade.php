@extends('layouts.plantilla')

@section('content')

<div class="container" style="padding:2rem">

  <div class="row">
    <div class="input-field col s12 m6">
      <select name="tipo_reporte" id="tipo_reporte">
        <option value="general" selected>General</option>
        <option value="proveedor">Por proveedor</option>
      </select>
      <label>Seleccione el tipo de reporte</label>
    </div>
    <div class="input-field col s12 m6" id="input-proveedor" hidden>
      <select name="proveedor" id="proveedor">
        <option value="{{null}}" selected disabled></option>
        @foreach ($proveedor as $key => $value)
        <option value="{{$value->id_proveedor}}" >{{$value->descripcion}}</option>
        @endforeach
      </select>
      <label>Seleccione el proveedor</label>
    </div>
    
    {{-- Table de Reportes --}}
    <div class="col s12 align-center" id="tabla-reporte">
    </div>

    <div class="col s12 align-center">
      <a id="imprimir-reporte" class="btn "><i class="material-icons">print</i>Imprimir</a>
    </div>

  </div>
</div>

@endsection

@push('scripts')
  <script>
    $(document).ready(function(){
      $('select').formSelect();
      // El reporte que se carga por defecto es el General, porque el selected por defecto es general.
      cargaReporteGeneral();
      $('#tipo_reporte').on('change',function(){
        let tipo_reporte = $('#tipo_reporte').val();
        if(tipo_reporte == "general"){
          $('#input-proveedor').attr('hidden','hidden');
          cargaReporteGeneral();
        }else if(tipo_reporte == "proveedor"){
          $('#input-proveedor').removeAttr('hidden');
          $('#proveedor').on('change',function(){
            cargarReporteProveedor($('#proveedor').val());
          })
        }
      })
    });


    function cargaReporteGeneral(){
      $.ajax({
        type: "get",
        url: "{{route('reportes.general')}}",
        data: {},
        dataType: "text",
      })
      .done(function(response){
        $('#tabla-reporte').html(response);
      })
      .fail(function(){
        console.log('didnt-work-cargarGeneral');
      });
    }

    function cargarReporteProveedor(proveedor){
      $.ajax({
        type: "get",
        url: "{{route('reportes.proveedor')}}",
        data: {proveedor},
        dataType: "text",
      })
      .done(function(response){
        $('#tabla-reporte').html(response);
      })
      .fail(function(){
        console.log('didnt-work-cargarProveedor')
      });
    }

    // Funcion para impresion de Reporte, utilizando libreria jspdf
    $('#imprimir-reporte').on('click',function () {

      // Inicalizacion de objeto PDF
      var pdf = new jsPDF('p','pt','letter');
      source = $('#tabla-reporte')[0];
      pdf.text('Reporte:',20,20,{align:'center'});
      // Configuraciones
      specialElementHandlers = {
        '#bypassme': function (element, renderer) {
          return true
        }
      };      
      margins = {
        top: 20,
        bottom: 10,
        left: 10,
        // width: 522
      };

      pdf.fromHTML(
      source,
      margins.left, // x coord
      margins.top, { // y coord
            'width': margins.width,
            'elementHandlers': specialElementHandlers
      },
      function (dispose){
        pdf.save('Reporte.pdf');
      }
      );
    })

    

  </script>    
@endpush

