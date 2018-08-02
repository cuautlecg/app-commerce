@extends('layouts.app') 

@section('body-class', 'profile-page sidebar-collapse') 

@section('title', 'Fiction Commerce - Productos')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city')}}.jpg')"></div>
<div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <h2 class="title">Dashboard</h2>
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        {{ session('success') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <ul class="nav nav-pills nav-pills-icons" role="tablist">
                    <!--
                        color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                    -->
                    <li class="nav-item">
                        <a class="nav-link active" href="#schedule-1" role="tab" data-toggle="tab">
                            <i class="fa fa-list-ol"></i>
                            Pedidos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#shopping-cart" role="tab" data-toggle="tab">
                            <i class="fa fa-shopping-cart"></i>
                            Carrito
                        </a>
                    </li>
                </ul>              

                <hr>

                @if(auth()->user()->cart->details->count() === 0)
                    <h5 class="text-left">Tú carrito está vacio =(! <a href="{{route('inicio')}}" target="_blank">Porqué no vamos a comprar algo?</a></h5>
                @elseif(auth()->user()->cart->details->count() === 1)
                    <h5 class="text-left">Tú carrito tiene {{auth()->user()->cart->details->count()}} producto</h5>
                @elseif(auth()->user()->cart->details->count() > 1)
                    <h5 class="text-left">Tú carrito tiene {{auth()->user()->cart->details->count()}} producto</h5>
                @endif

                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(auth()->user()->cart->details as $detail)
                        <tr>
                            <td class="text-center">
                                <img src="{{$detail->product->featured_image_url}}" alt="Thumbnail" height="70">
                            </td>
                            <td style="width: 16%">
                                <a href="{{ route('show-product', [$detail->product->id]) }}" target="_blank">{{$detail->product->name}}</a>
                            </td>
                            <td style="width: 30%">
                                {{$detail->product->description}}
                            </td>
                            <td class="text-center">${{$detail->product->price}}</td>
                            <td class="text-center">{{$detail->quantity}}</td>
                            <td class="text-center">${{$detail->quantity * $detail->product->price}}</td>
                            <td class="td-actions">
                                <form action="{{ route('carrito-delete')}}" method="POST">
                                    <a rel="tooltip" title="Ver producto" class="btn btn-info btn-just-icon" target="_blank" href="{{ route('show-product', [$detail->product->id]) }}">
                                        <i class="fa fa-info"></i>
                                    </a>
                                    <input type="hidden" name="_method" value="DELETE">
                                    {{csrf_field()}}
                                    <input type="hidden" name="cart_detail_id" value="{{$detail->id}}">
                                    <button type="submit" rel="tooltip" title="Eliminar producto" class="btn btn-danger btn-just-icon">
                                        <i class="fa fa-remove"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>                            
                </table>

                <form action="{{ route('ordenar') }}" method="POST">
                    {{csrf_field()}}
                    
                    @if(auth()->user()->cart->details->count() === 0)
                    @elseif(auth()->user()->cart->details->count() > 0)
                        <button type="submit" class="btn btn-primary btn-round">
                            <i class="fa fa-check"></i> Realizar pedido
                        </button>

                        <a href="{{route('inicio')}}" role="button" class="btn btn-warning btn-round">
                            <i class="fa fa-arrow-left"></i> Seguir comprando
                        </a>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
