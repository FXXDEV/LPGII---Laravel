@extends('layouts.app')
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
                        
                        {{ Form::label('nameCity', 'Nome', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                        {{ Form::text('nameCity',null,['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}

                        </br>

                        {{ Form::label('hab','Quantidade de habitantes',['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                        {{ Form::text('hab'),null,['class' => 'col-sm-2 col-form-label col-form-label-sm'] }}
                       

                        <br/>
                        
                     <div class="form-group row">
                                {{ Form::label('estado', 'Selecione um estado:', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                                <div class="col-sm-10">
                                        <select name="nameState">';
                                                <option>Selecione...</option>
                                                @foreach($states as $s)
                                                <option value="{{$s->name}}"> {{$s->name}} </option>
                                                @endforeach
                                        </select>
                                </div>
                            </div>  
                        {{ Form::submit('Salvar') }}
                       
                    {!! Form::close() !!}

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
