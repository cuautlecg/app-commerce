@extends('layouts.app') @section('body-class', 'profile-page sidebar-collapse') @section('title', 'Añadir categoría') @section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/city-profile')}}.jpg');"></div>

<div class="main main-raised">
    <div class="container">
        <div class="section">
            <h2 class="title text-center">Añadir nueva categoría</h2>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ url('/admin/categories') }}">
                {{csrf_field()}}
                <div class="row">                
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre de la categoría</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}">
                        </div>
                    </div>
                </div>
                <textarea class="form-control" rows="5" placeholder="Descripción la categoría" name="description">
                    {{old('description')}}
                </textarea>
                <div class="separador"></div>
                <button type="submit" class="btn btn-primary">Registrar categoría</button>
                <a role="button" class="btn btn-default" href="{{url('/admin/categories')}}">Cancelar</a>
            </form>
        </div>
    </div>
</div>

@endsection
