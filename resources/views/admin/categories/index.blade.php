@extends('layouts.app') 

@section('body-class', 'profile-page sidebar-collapse') 

@section('title', 'Fiction Commerce - Categorías')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city')}}.jpg')"></div>
<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Categorías disponibles</h2>
            @if(session('status'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <a href="{{ url('/admin/categories/create') }}" class="btn btn-primary btn-round">
                Agregar Categoría
            </a>
            <div class="team">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td class="text-center">{{$category->id}}</td>
                                <td style="width: 16%">{{$category->name}}</td>
                                <td style="width: 30%">{{$category->description}}</td>
                                <td class="td-actions text-center">
                                    <form action="{{ route('delCategory', [$category->id])}}" method="POST">
                                        <a rel="tooltip" title="Ver categoría" class="btn btn-info btn-just-icon">
                                            <i class="fa fa-info"></i>
                                        </a>
                                        <a href="{{ route('editCategory', $category->id) }}" rel="tooltip" title="Editar categoría" class="btn btn-success btn-just-icon">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{csrf_field()}}
                                        <button type="submit" rel="tooltip" title="Eliminar categoría" class="btn btn-danger btn-just-icon">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>                            
                    </table>
                    <div class="paginacion">
                        {{$categories->links()}}
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
