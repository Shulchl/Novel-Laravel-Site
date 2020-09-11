@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="float-left">
                <h2>Todas as postagens</h2>
            </div>
            <div class="float-right">
                <a href="{{ route('novels.create') }}" class="btn btn-success">Criar Postagem</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-succes">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">    
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th width="280px">Ações</th>
            </tr>
            @foreach ($novels as $novel)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $novel->title }}</td>
                <td>{{ $novel->content }}</td>
                <td>
                    <form action="{{ route('novels.destroy', $novel->id) }}" method="POST">
                        <a href="{{ route('novels.show', $novel->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('novels.edit', $novel->id) }}" class="btn btn-primary">Editar</a>
                        
                        @csrf
                        @method('DELETE')
                        
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {!! $novels->links() !!}  
    </div>
@endsection