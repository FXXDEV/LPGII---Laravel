@extends('layouts.app')
<?php
use App\State;
$state = State::all();
?>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   Nova Cidade
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => '/cities', 'method' => 'post']) !!}
                        
                        {{ Form::label('nome', 'Nome') }}
                        {{ Form::text('nameCity') }}
                       

                        <br/>


                        <select name="nameState" multiple>
                            @foreach ($state as $s)
                                <option value="{{ $s->name }}">{{ $s->name }}</option>
                            @endforeach
                        </select>
                        </br>
                        {{ Form::submit('Salvar') }}
                       
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
