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
            Titulo do livro: {{$bookModel->title}} <br>
            Categoria do livro: {{$bookModel->category}} <br>
            Ano de publicação: {{$bookModel->published}}
        </div>
    </div>
</section>
@endsection