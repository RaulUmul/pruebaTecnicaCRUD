@if (!empty($productos))
<table>
  <thead>
    <th>ID</th>
    <th>Proveedor</th>
    <th>Presentacion</th>
    <th>Marca</th>
    <th>Zona</th>
    <th>Descripcion</th>
    <th>Precio</th>
    <th>Stock</th>
  </thead>
  <tbody>
    @foreach ($productos as $producto)
      <tr>
        <td>{{$producto->id_producto}}</td>
        <td>{{$producto->proveedor->descripcion}}</td>
        <td>{{$producto->presentacion->descripcion}}</td>
        <td>{{$producto->marca->descripcion}}</td>
        <td>{{$producto->zona->descripcion}}</td>
        <td>{{$producto->descripcion_producto}}</td>
        <td>{{$producto->precio}}</td>
        <td>{{$producto->stock}}</td>
      </tr>
    @endforeach
  </tbody>
</table>
@else
    <h4>No se han ingresado productos, ingrese uno nuevo</h4>
@endif

