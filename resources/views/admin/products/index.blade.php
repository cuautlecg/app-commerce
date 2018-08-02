@extends('layouts.app') 

@section('body-class', 'profile-page sidebar-collapse') 

@section('title', 'Fiction Commerce - Productos')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city')}}.jpg')"></div>
<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Productos disponibles</h2>
            @if(session('status'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <a href="{{ url('/admin/products/create') }}" class="btn btn-primary btn-round">
                Agregar Producto
            </a>
            <div class="team">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Nombre</th>
                                <th>Categoría</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td class="text-center">{{$product->id}}</td>
                                <td style="width: 16%">{{$product->name}}</td>
                                <td>{{$product->category ? $product->category->name : 'General'}}</td>
                                <td style="width: 30%">{{$product->description}}</td>
                                <td class="text-center">${{$product->price}}</td>
                                <td class="td-actions text-right">
                                    <form action="{{ route('delProd', [$product->id])}}" method="POST">
                                        <a rel="tooltip" title="Ver producto" class="btn btn-info btn-just-icon">
                                            <i class="fa fa-info"></i>
                                        </a>
                                        <a href="{{ route('editProd', $product->id) }}" rel="tooltip" title="Editar producto" class="btn btn-success btn-just-icon">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('view-images', $product->id) }}" rel="tooltip" title="Editar imagenes" class="btn btn-warning btn-just-icon">
                                            <i class="fa fa-image"></i>
                                        </a>
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{csrf_field()}}
                                        <button type="submit" rel="tooltip" title="Eliminar producto" class="btn btn-danger btn-just-icon">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>                            
                    </table>
                    <div class="paginacion">
                        {{$products->links()}}
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
