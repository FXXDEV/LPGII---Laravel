@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Novo Produtos                    
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => "/products/$product->id", 'method' => 'put']) !!}
                        
                        {{ Form::label('nome', 'Nome') }}
                        {{ Form::text('nome', $product->nome) }}

                        <br /><br />

                        {{ Form::label('valor', 'Valor') }}
                        {{ Form::text('valor', $product->valor) }}

                        <br /><br />

                        {{ Form::submit('Salvar') }}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
