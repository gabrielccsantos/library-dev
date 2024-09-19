@extends('layout.main')

@section('content')

<div>
    @if($errors->any())

    @foreach($errors->all() as $error)

    {{$error}} <br>

    @endforeach
    @endif
</div>

<section>
    <div class="d-flex justify-content-center align-items-center">

        <div class="bg-light rounded p-3 " style="width: 500px;">
            <form action="{{route('book.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="title">Titulo do livro: </label>
                    <input type="text" name="title" id="title" value="{{old('title')}}">
                </div>

                <div class="mb-3">
                    <label for="category">Categoria do livro: </label>
                    <input type="text" name="category" id="category" value="{{old('category')}}">
                </div>

                <div class="mb-3">
                    <label for="published">Ano de publicação: </label>
                    <input type="text" name="published" id="published" value="{{old('published')}}">
                </div class="mb-3">

                <div class="mb-3">
                    <input type="submit" value="Cadastrar" class="btn btn-primary">
                    <input type="reset" value="Limpar" class="btn btn-secondary">
                </div>

            </form>
        </div>
    </div>
</section>

@endsection