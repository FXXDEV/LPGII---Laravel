@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Produtos
                    <a href="/products/create" class="float-right btn btn-success">Novo Produto</a>
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
                            <th>Nome</th>
                            <th>Valor</th>
                            <th>Ações</th>
                        </tr>
                        
                        @foreach($products as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->nome }}</td>
                                <td>{{ $p->valor }}</td>
                                <td>
                                    <a href="/products/{{ $p->id }}/edit" class="btn btn-warning">Editar</a>

                                    {!! Form::open(['url' => "/products/$p->id", 'method' => 'delete']) !!}
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
