@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">Prueba Jose Ruiz Regalado CRUD de Productos</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="float-left ">
                        <form action="" method="GET">
                            <div class="form-group">
                                <div class="form-inline">
                                    <input type="search" id="producto" name="producto" class="form-control"/>
                                    <button type="submit" class="btn btn-outline-primary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                               
                            </div>
                        </form>
                    </div><br>
                    <div class="float-right ">
                        <a href="{{route('altasform')}}" class="btn btn-primary">Alta de productos <i class="far fa-plus-square"></i></a>
                    </div><br>

                    @include('products.tabla')
                    {{ $producto->links('pagination::bootstrap-4') }}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')


@if (session("message") == "actualizado")
<script>
  Swal.fire(
    'RECIBIDO',
    'Ha actualizado la información del producto',
    'success'
  )
</script>
  
@endif

@endsection