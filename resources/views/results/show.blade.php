@extends('layouts.app') @section('body-class', 'profile-page sidebar-collapse') @section('title', 'Fiction Commerce - Resultado de la busqueda')
@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/city-profile')}}.jpg');"></div>
<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                    <div class="profile">
                        <div class="avatar">
                            <img src="/img/lupa.jpg" alt="lupa de busqueda" class="img-raised rounded-circle img-fluid">
                        </div>
                        <div class="name">
                            <h3 class="title">Resultado de la búsqueda</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="description text-center">
                @if($products->count() == 0)
                    <h5>No encontramos resultados con el criterio {{$query}}</h5>
                @elseif($products->count() == 1)
                    <h5>Encontramos {{ $products->count() }} coincidencia con el criterio {{$query}} </h5>
                @elseif($products->count() > 1)
                    <h5>Encontramos {{ $products->count() }} coincidencias con el criterio {{$query}} </h5>
                @endif
                <a href="/" role="button" class="btn btn-info text-center">Regresar</a>
            </div>
            <div class="section text-center">
                <div class="team">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-md-4">
                                <div class="card team-player">
                                    <div class="card card-plain">
                                        <div class="col-md-6 ml-auto mr-auto">
                                            <a href="{{route('show-product', [$product->id])}}">
                                                    <img src="{{ $product->featured_image_url }}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                                            </a>                                        
                                        </div>
                                        <h4 class="card-title">{{$product->name}}</h4>
                                        <div class="card-body">
                                            <p class="card-description">{{$product->description}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <nav aria-label="Page navigation example">
                        {{$products->links()}}
                    </nav>
                    <div class="row">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
