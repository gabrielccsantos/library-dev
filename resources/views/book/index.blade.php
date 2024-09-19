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
                <th scope="col">Categoria</th>
                <th scope="col">Ano de publicação</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <th scope="row">{{$book->id}}</th>
                <td scope="row">{{$book->title}}</td>
                <td scope="row">{{$book->category}}</td>
                <td scope="row">{{$book->published}}</td>
                <td scope="row">
                    <a href="{{route('book.show', ['bookModel' => $book->id])}}">
                        <button type="button" class="btn btn-primary">Visualizar</button>
                    </a>
                    <a href="{{route('book.edit', ['bookModel' => $book->id])}}">
                        <button type="button" class="btn btn-primary">Editar</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>

@endsection