@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Editar estado                 
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => "/states/$states->id", 'method' => 'put']) !!}
                        
                        {{ Form::label('name', 'Nome') }}
                        {{ Form::text('nameState', $states->nameState) }}

                        <br />
                        {{ Form::label('sig', 'Sigla') }}
                        {{ Form::text('sigla',$states->sigla) }}

                        <br/>
                        {{ Form::submit('Salvar') }}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
