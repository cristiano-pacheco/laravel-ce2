@extends('app')

@section('content')
<div class="container">

    <h1>Create Product</h1>
    
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    
    @endif
    
    {!! Form::open(['route'=>'products.store']) !!}
        
        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name',null, ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('description','Description:') !!}
            {!! Form::textarea('description',null, ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('price','Price:') !!}
            {!! Form::text('price',null, ['class'=>'form-control']) !!}
        </div>

        <div class="checkbox">
            <label>
            {!! Form::checkbox('featured',1 ,false) !!} Featured
            </label>
        </div>
        
        <div class="checkbox">
            <label>
            {!! Form::checkbox('recommend',1 , false) !!} Recommend
            </label>
        </div>
        
        <div class="form-group">
            {!! Form::submit('Add Categoty',['class'=>'btn btn-primary']) !!}
        </div>    
    {!! Form::close() !!}
	
</div>
@endsection