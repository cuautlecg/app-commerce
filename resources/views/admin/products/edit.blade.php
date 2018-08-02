@extends('layouts.app') @section('body-class', 'profile-page sidebar-collapse') @section('title', 'Modificar producto') @section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/city-profile')}}.jpg');"></div>

<div class="main main-raised">
    <div class="container">
        <div class="section">
            <h2 class="title text-center">Moficar producto "{{$product->name}}"</h2>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('actuaProd', [$product->id]) }}">
                <input type="hidden" name="_method" value="PUT">
                {{csrf_field()}}
                <div class="row">                
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre del producto</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                        <label class="control-label">Precio del producto</label>
                            <input type="number" class="form-control" name="price" step="0.10" value="{{ old('price', $product->price) }}">
                        </div>
                    </div>
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">Descripción corta</label>
                    <input type="text" class="form-control" name="description" value="{{ old('description', $product->description) }}">
                </div>
                <textarea class="form-control" rows="5" placeholder="Descripción extensa del producto" name="long-description">{{ old('long_description', $product->long_description) }}</textarea>
                <div class="separador"></div>
                <button type="submit" class="btn btn-primary">Modificar producto</button>
            </form>
        </div>
    </div>
</div>

@endsection
