@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Criar uma postagem</h2>
            </div>
            <div class="pull-right">
                <a href="{{ route('novels.index') }}" class="btn-primary">Voltar</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Opa!</strong> Você deve ter escrito algo errado... <br><br>
            <ul>
                @foreach ( $errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('novels.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control-lg" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md12">
                <div class="form-group">
                    <strong>Content:</strong>
                    <textarea class="form-control-lg" style="height:150px" name="content" placeholder="Content"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md12 text-center">
                <button type="submit" class="btn btn-primary">Postar</button>
            </div>
        </div>
    </form>
@endsection