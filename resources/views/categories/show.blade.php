@extends('layouts.app') @section('body-class', 'profile-page sidebar-collapse') @section('title', 'Fiction Commerce - Categorías')
@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/city-profile')}}.jpg');"></div>
<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                    <div class="profile">
                        <div class="avatar">
                            <img src="{{$category->featured_image_url}}" alt="{{$category->name}}" class="img-raised rounded-circle img-fluid">
                        </div>
                        <div class="name">
                            <h3 class="title">{{$category->name}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="description text-center">
                <p>{{$category->description}}</p>
            </div>
            <div class="section text-center">
                    <h2 class="title">Productos disponibles</h2>
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
