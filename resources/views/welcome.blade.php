@extends('layouts.app') 

@section('body-class', 'landing-page sidebar-collapse') 

@section('title', 'Bienvenido a Fiction Commerce')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city')}}.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="title">Bienvienido a "Fiction-Commerce"</h1>
                <h4>Tú mejor elección a la hora de comprar en línea.</h4>
                <br>
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="btn btn-danger btn-raised btn-lg">
                    <i class="fa fa-play"></i> ¿Como comprar?
                </a>
            </div>
        </div>
    </div>
</div>
<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <h2 class="title">¿Porqué elegirnos a nosotros?</h2>
                    <h5 class="description">Somos una empresa innovadora, con la cuál contamos con una variedad vasta de productos, que los podrás encontrar al mejor precio</h5>
                </div>
            </div>
            <div class="features">
                <div class="row">
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-info">
                                <i class="material-icons">chat</i>
                            </div>
                            <h4 class="info-title">Contacto frecuente</h4>
                            <p>Puedes contactarnos cualquier día  cualquier hora para poder aclarar tus dudas resultantes con la plataforma
                                o cualquier otra cosa que te interese.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-success">
                                <i class="material-icons">verified_user</i>
                            </div>
                            <h4 class="info-title">Compras seguras</h4>
                            <p>Contamos con la seguridad necesaria para hacer que tus compras estén protegidas.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-danger">
                                <i class="material-icons">fingerprint</i>
                            </div>
                            <h4 class="info-title">Datos seguros</h4>
                            <p>Ten la seguridad que tus datos están celosamente resguardados, tú y solamente tú podran hacer uso de ellos.</p>
                        </div>
                    </div>
                </div>
            </div>
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
                                    <h4 class="card-title">{{$product->name}}
                                        <br>
                                        <small class="card-description text-muted">{{ $product->category ? $product->category->name : 'General' }}</small>
                                    </h4>
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
        <div class="section section-contacts">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <h2 class="text-center title">Contactanos</h2>
                    <h4 class="text-center description">Por favor envíanos tus inquietudes, prometemos contestar lo más pronto posible.</h4>
                    <form class="contact-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nombre</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Correo Electrónico</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleMessage" class="bmd-label-floating">Escribe tú mensaje</label>
                            <textarea type="email" class="form-control" rows="4" id="exampleMessage"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4 ml-auto mr-auto text-center">
                                <button class="btn btn-primary btn-raised">
                                    Enviar mensaje
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
