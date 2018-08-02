@extends('layouts.app') 

@section('body-class', 'profile-page sidebar-collapse') 

@section('title', 'Imagenes productos')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city')}}.jpg')"></div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <div class="card card-nav-tabs text-center">
                <div class="card-header card-header-primary">
                    <h2 class="title">Imagenes del producto {{$product->name}}</h2>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="file" name="photo" class="form-control-file" required>
                        <button type="submit" class="btn btn-primary btn-round">Subir nueva imagen</button>
                        <a href="{{url('admin/products')}}" role="button" class="btn btn-default btn-round">Regresar a la lista de productos</a>
                    </form>
                </div>
            </div>
            <div class="row">
                    @foreach($images as $image)
                    <div class="col-md-3">
                        
                        <div class="card">
                            <div class="card-body">
                                    <img src="{{ $image->url }}" alt="Thumbnail" class="card-img">
                            </div>
                            <div class="card-footer">
                                <form action="{{ route('delete-image', [$image->id])}}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    {{csrf_field()}}
                                    <button type="submit" class="btn btn-danger btn-round">Eliminar imagen</button>
                                    @if($image->featured)
                                    <button type="button" class="btn btn-danger btn-fab btn-fab-mini btn-round disabled" aria-disabled="true" 
                                            data-toggle="tooltip" data-placement="right" title="Imagen destacada">
                                        <i class="material-icons">favorite</i>
                                    </button>
                                    @else
                                        <a href="{{route('destacar', [ $product->id, $image->id ])}}" class="btn btn-primary btn-fab btn-fab-mini btn-round">
                                            <i class="material-icons">favorite</i>
                                        </a>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
    </div>
</div>




@endsection