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
            <form action="{{route('category.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name">Nome da categoria: </label>
                    <input type="text" name="name" id="name" value="{{old('name')}}">
                </div>

                <div class="mb-3">
                    <input type="submit" value="Cadastrar" class="btn btn-primary">
                    <input type="reset" value="Limpar" class="btn btn-secondary">
                </div>

            </form>
        </div>
    </div>
</section>

@endsection