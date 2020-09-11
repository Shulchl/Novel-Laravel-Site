@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="float-left">
                <h2>Ler Novel</h2>
            </div> 
            <div class="float-right">
                <a href="{{ route('novels.index') }}" class="btn btn-primary">Voltar</a>    
            </div>   
        </div>    
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $novel->title }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Content:</strong>
                {{ $novel->content }}
            </div>
        </div>
    </div>
@endsection