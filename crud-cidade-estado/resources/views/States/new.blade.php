@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Novo Estado                  
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => '/states', 'method' => 'post']) !!}
                        
                        {{ Form::label('name', 'Nome') }}
                        {{ Form::text('nameState') }}

                        <br /><br />

                        {{ Form::label('sig', 'Sigla') }}
                        {{ Form::text('sigla') }}

                        <br/>
                        {{ Form::submit('Salvar') }}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
