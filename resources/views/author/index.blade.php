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
            @forelse($authors as $author)
            <tr>
                <th scope="row">{{$author->id}}</th>
                <td scope="row">{{$author->name}}</td>
                <td scope="row">{{$author->created_at->format('H:i:s d/m/Y')}}</td>
                <td scope="row">
                    <a href="{{route('author.show', ['author' => $author->id])}}">
                        <button type="button" class="btn btn-primary">Visualizar</button>
                    </a>
                    <a href="{{route('author.edit', ['author' => $author->id])}}">
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