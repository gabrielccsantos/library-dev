@extends('layout.main')

@section('content')

@if(session('sucess'))

<span style="color: green;">
    {{session('sucess')}}
</span>

@endif
</div>
<div>
    @if(session('unsucess'))
    <span style="color: red;">
    {{session('unsucess')}}
    </span> 
    @endif
</div>
<section>
    <table class="table table-primary table-striped-columns">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nome</th>
                <th scope="col">Data de cadastro</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td scope="row">{{$category->name}}</td>
                <td scope="row">{{$category->created_at->format('H:i:s d/m/Y')}}</td>
                <td scope="row">
                    <a href="{{route('category.show', ['category' => $category->id])}}">
                        <button type="button" class="btn btn-primary">Visualizar</button>
                    </a>
                    <a href="{{route('category.edit', ['category' => $category->id])}}">
                        <button type="button" class="btn btn-primary">Editar</button>
                    </a>
                </td>
            </tr>
            @empty
            <p style="color: red;">A lista está vazia.</p>
            @endforelse
        </tbody>
    </table>
</section>

@endsection