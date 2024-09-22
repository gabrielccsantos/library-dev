@extends('layout.main')

@section('content')

<section>
    <div class="d-flex justify-content-center align-items-center">
        <div class="bg-light rounded p-3" style="width: 500px;">
            <form action="{{route('author.update', ['author' => $author->id])}}" method="post">
                @csrf
                @method('PUT')
                <div>
                    <label for="name">Nome do Autor: </label>
                    <input type="text" name="name" id="name" value="{{old('name', $author->name)}}">
                </div>
                <br>
                <div>
                    <input type="submit" value="Editar" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</section>
@endsection