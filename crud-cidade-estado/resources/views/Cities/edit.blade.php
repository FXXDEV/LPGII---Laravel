@extends('layouts.app')

<?php
use App\State;
$state = State::all();
?>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Editar cidade                 
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => "/cities/$city->id", 'method' => 'put']) !!}
                        
                        {{ Form::label('nome', 'Nome') }}
                        {{ Form::text('nameCity', $city->name) }}

                        <br />
                        <select name="nameState" multiple>
                            @foreach ($state as $s)
                                <option  value="{{ $s->name }}">{{ $s->name }}</option>
                            @endforeach
                        </select>
                

                        <br />

                        {{ Form::submit('Salvar') }}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
