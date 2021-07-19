<div class="row mt-5">
    <table class="table table-hover table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Producto</th>
            <th scope="col">Precio</th>
            <th scope="col">Descripcion</th>
            <th>Creado por:</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
         @foreach ($producto as $productos)
             <tr>
                 <td>{{$productos->id}}</td>
                 <td>{{$productos->name}}</td>
                 <td>{{'$'.$productos->pricing .".mxn"}}</td>
                 <td>{!!$productos->description!!}</td>
                 <td>{{$productos->user->name}}</td>
                 <td>
                     <a href="{{route('editar.producto',$productos->id)}}" class="btn btn-primary btn-sm"> <i class="fas fa-pen-square"></i></a>
                     <form action="{{route('producto.delete',$productos->id)}}" class="d-inline deleteproducto" method="post">
                        @csrf
                         <button type="submit" class="btn btn-danger btn-sm"> 
                            <i class="fas fa-trash"></i>
                         </button>
                     </form>
                 </td>

             </tr>
         @endforeach
        </tbody>
      </table>

      
</div>
@section('script')
@if (session("message") == "Se ha eliminado el producto con exito")
<script>
Swal.fire(
    'BORRAD0',
    'Se ha eliminado el registro',
    'success'
)
</script>

@endif


@if (session("message") == "actualizado")
<script>
  Swal.fire(
    'RECIBIDO',
    'Ha actualizado la información del producto',
    'success'
  )
</script>
  
@endif
<script>
    $(".deleteproducto").submit(function(e){
e.preventDefault();
Swal.fire({
 title: '¿Esta seguro de borrar este producto?',
 text: "No podras recuperarlo",
 icon: 'warning',
 showCancelButton: true,
 confirmButtonColor: '#3085d6',
 cancelButtonColor: '#d33',
 confirmButtonText: 'SI, quiero borrarlo',
 cancelButtonText: 'cancelar'

}).then((result) => {
 if (result.isConfirmed) {
   this.submit();
 }
})
});
</script>
@endsection