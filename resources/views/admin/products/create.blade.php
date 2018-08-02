@extends('layouts.app') @section('body-class', 'profile-page sidebar-collapse') @section('title', 'Añadir producto') @section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/city-profile')}}.jpg');"></div>

<div class="main main-raised">
    <div class="container">
        <div class="section">
            <h2 class="title text-center">Añadir nuevo producto</h2>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ url('/admin/products') }}">
                {{csrf_field()}}
                <div class="row">                
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre del producto</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                        <label class="control-label">Precio del producto</label>
                            <input type="number" class="form-control" name="price" step="0.10" value="{{old('price')}}">
                        </div>
                    </div>
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">Descripción corta</label>
                    <input type="text" class="form-control" name="description" value="{{old('description')}}">
                </div>
                <textarea class="form-control" rows="5" placeholder="Descripción extensa del producto" name="long-description">
                    {{old('long-description')}}
                </textarea>
                <div class="separador"></div>
                <button type="submit" class="btn btn-primary">Registrar producto</button>
                <a role="button" class="btn btn-default" href="{{url('/admin/products')}}">Cancelar</a>
            </form>
        </div>
    </div>
</div>

@endsection
