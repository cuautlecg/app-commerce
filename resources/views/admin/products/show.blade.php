@extends('layouts.app') @section('body-class', 'profile-page sidebar-collapse') @section('title', 'Fiction Commerce - Productos')
@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/city-profile')}}.jpg');"></div>
<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                    <div class="profile">
                        <div class="avatar">
                            <img src="{{$product->featured_image_url}}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                        </div>
                        <div class="name">
                            <h3 class="title">{{$product->name}}</h3>
                            <h6>{{$product->category ? $product->category->name : 'General' }}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="description text-center">
                <p>{{$product->long_description}}</p>
            </div>

            <div class="text-center">
                <!-- Para abrir la ventana modal del carrito -->
                <button class="btn btn-primary btn-round" type="button" data-toggle="modal" data-target="#modalShoppingCart">
                    <i class="fa fa-shopping-cart"></i> Agregar al carrito
                </button>
            </div>
            
            <div class="tab-pane text-center gallery" id="favorite">
                <div class="row">
                        @foreach($images as $image)
                        <div class="col-md-3">
                            
                            <div class="card">
                                <div class="card-body">
                                        <img src="{{ $image->url }}" alt="Thumbnail" class="card-img">
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalShoppingCart" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Selecciona la cantidad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('carrito' ) }}">
                {{csrf_field()}}
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="modal-body">
                    <input type="number" name="quantity" value="1" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Añadir al carrito</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
