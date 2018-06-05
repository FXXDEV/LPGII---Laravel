@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Cidades
                    <a href="/cities/create" class="float-right btn btn-success">Nova Cidade</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                            <th>Ações</th>
                        </tr>
                        
                        @foreach($cities as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->state }}</td>
                                <td>
                                    <a href="/cities/{{ $p->id }}/edit" class="btn btn-warning">Editar</a>

                                    {!! Form::open(['url' => "/cities/$p->id", 'method' => 'delete']) !!}
                                        {{ Form::submit('Deletar', null, ['class' => 'btn btn-danger']) }}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
