@extends('layouts.app')
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
                        
                        {{ Form::label('nameCity', 'Nome', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                        {{ Form::text('nameCity',$city->name,['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}


                        <br />
                        
                        {{ Form::label('habt','Quantidade de habitantes',['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                        {{ Form::text('hab',$city->hab,['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                       
                        
                        <div class="form-group row">
                                {{ Form::label('state', 'Selecione um estado:', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                                <div class="col-sm-10">
                                        <select name="state_id">';
                                                
                                                @foreach($states as $s)
                                                <option value="{{$s->id}}"> {{$s->nameState}} </option>
                                                @endforeach
                                        </select>
                                </div>
                            </div>  
                

                        <br/>
                        

                        {{ Form::submit('Salvar') }}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
