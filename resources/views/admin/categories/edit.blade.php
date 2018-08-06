@extends('layouts.app') @section('body-class', 'profile-page sidebar-collapse') @section('title', 'Modificar producto') @section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/city-profile')}}.jpg');"></div>

<div class="main main-raised">
    <div class="container">
        <div class="section">
            <h2 class="title text-center">Moficar categoría "{{$category->name}}"</h2>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('actuaCategory', [$category->id]) }}">
                <input type="hidden" name="_method" value="PUT">
                {{csrf_field()}}
                <div class="row">                
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre de la categoría</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $category->name) }}">
                        </div>
                    </div>
                </div>
                <textarea class="form-control" rows="5" placeholder="Descripción de la categoría" name="description">{{ old('description', $category->description) }}</textarea>
                <div class="separador"></div>
                <button type="submit" class="btn btn-primary">Modificar categoría</button>
            </form>
        </div>
    </div>
</div>

@endsection
