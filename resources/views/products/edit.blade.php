@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row py-2">
            <div class="col-md-12">
                <div class="float-right">
                    <a href="{{route('home')}}" class="btn btn-primary">Volver <i class="fas fa-backspace"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('includes.message')
                @include('includes.errors')
                <div class="card">
                    <div class="card-header text-center"> <h2>Actualizar Producto</h2> </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{route('producto.update',$producto->id)}}" method="POST" class="formproductos" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-group">
                                          <label for="title">Nombre del Producto</label>
                                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$producto->name}}" placeholder="Ingrese un producto">
                                          @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                          @enderror
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="form-group">
                                          <label for="pricing">Precio del Producto</label>
                                          <input type="number" min="1" step="any" class="form-control @error('pricing') is-invalid @enderror" id="pricing" name="pricing" value="{{$producto->pricing}}" placeholder="Ingrese el precio">
                                          @error('pricing')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                          @enderror
                                        </div>
                                      </div>

                                                            
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="description">Descripcion del producto</label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">
                                            
                                                {!!$producto->description!!}
                                            </textarea>
                                        </div>
                                        @if ($errors->has('description'))
                                        <div class="text-danger">
                                        <small>{{$errors->first('description')}}</small>
                                        </div>
                                    @endif
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success btn-block">Actualizar Información</button>
    
                                    </div>
                                </form>

                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    CKEDITOR.replace( 'description' );
</script>


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
    $(".formproductos").submit(function(e){
      e.preventDefault();
      Swal.fire({
        title: 'Esta seguro de editar estos datos',
        text: "Solo Podras editarlos no borrarlos",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'SI, quiero editarlos',
        cancelButtonText: 'cancelar'
  
      }).then((result) => {
        if (result.isConfirmed) {
          this.submit();
        }
      })
    });
   
    
    </script>   
  
@endsection