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
    
    {!! Form::open(['route'=>['products.images.store',$product->id],'method'=>'post','files'=>true]) !!}
        
        <div class="form-group">
            {!! Form::label('image','Image:') !!}
            {!! Form::file('image', null, ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::submit('Add Image',['class'=>'btn btn-primary']) !!}
        </div>    
    {!! Form::close() !!}
	
</div>
@endsection