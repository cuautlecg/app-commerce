@extends('layouts.app') @section('body-class', 'landing-page sidebar-collapse') @section('title', 'Bienvenido a Fiction Commerce') @section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city')}}.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="title">Bienvenido a Cuautle Commerce</h1>
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
                            <p>Puedes contactarnos cualquier día cualquier hora para poder aclarar tus dudas resultantes con la plataforma o cualquier otra cosa que te interese.</p>
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
            <h2 class="title">Vista nuestras categorías disponibles</h2>

            <div class="search-form">
                <form action="{{route('search')}}" class="form-inline" type="GET">
                    <input type="text" name="query" id="query" placeholder="Busca un producto" class="form-control">
                    <button class="btn btn-primary btn-just-icon" type="submit">
                        <i class="material-icons">search</i>
                    </button>
                </form>
            </div>

            <div class="team">
                <div class="row">
                    @foreach($categories as $category)
                    <div class="col-md-4">
                        <div class="card team-player">
                            <div class="card card-plain">
                                <div class="col-md-6 ml-auto mr-auto">
                                    <a href="{{route('show-category', [$category->id])}}">
                                            <img src="{{ $category->featured_image_url }}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                                        </a>
                                </div>
                                <h4 class="card-title">{{$category->name}}
                                </h4>
                                <div class="card-body">
                                    <p class="card-description">{{$category->description}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <hr>
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

@section('scripts')
    <script src="{{asset('js/typeahead.bundle.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            //
            var products = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                prefetch: '{{url('/products/json')}}'
            });
        
            //Inicializar typeheand sobre el input de busqueda
            $('#query').typeahead({
                hint: true,
                highlight: true,
                minLenght: 1
            }, {
                name: 'products',
                source: products
            });
        });
    </script>
@endsection