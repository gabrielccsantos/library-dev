@extends('layout.main')

@section('content')

@if(session('sucess'))

<span style="color: green;">
    {{session('sucess')}}
</span>

@endif
</div>
<section>
    <table class="table table-primary table-striped-columns">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Título</th>
                <th scope="col">Ano de publicação</th>
                <th scope="col">Data de Cadastro</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
            @forelse($books as $book)
            <tr>
                <th scope="row">{{$book->id}}</th>
                <td scope="row">{{$book->title}}</td>
                <td scope="row">{{$book->published}}</td>
                <td scope="row">{{$book->created_at->format('H:i:s d/m/Y')}}</td>
                <td scope="row">
                    <a href="{{route('book.show', ['book' => $book->id])}}">
                        <button type="button" class="btn btn-primary">Visualizar</button>
                    </a>
                    <a href="{{route('book.edit', ['book' => $book->id])}}">
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