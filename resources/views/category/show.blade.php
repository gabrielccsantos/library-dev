@extends('layout.main')


@section('content')
<div>
    @if(session('sucess'))

    {{session('sucess')}}
    @endif
</div>

<section>
    <div class="d-flex justify-content-center align-items-center">
        <div class="bg-light rounded p-3" style="width: 500px;">
            Titulo do livro: {{$category->name}} <br>
            Data de Cadastro na livraria: {{$category->created_at->format('H:i:s d/m/Y')}}
            <br>
            <br>
            <div>
                <form action="{{route('category.destroy', ['category' => $category->id])}}" method="post">
                    <a href="{{route('category.edit', ['category' => $category->id])}}">
                        <button type="button" class="btn btn-primary">Editar</button>
                    </a>
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection