@extends('layout.main')


@section('content')
<div>
    @if(session('sucess'))

    {{session('sucess')}}
    @endif
</div>

<section>
    Titulo do livro: {{$bookModel->title}} <br>
    Categoria do livro: {{$bookModel->category}} <br>
    Ano de publicação: {{$bookModel->published}}
</section>