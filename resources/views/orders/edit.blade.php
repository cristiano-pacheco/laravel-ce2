@extends('app')

@section('content')
<div class="container">

    <h1>Editar Status</h1>
    
    {!! Form::open( ['route'=>['orders.update',$order->id],'method'=>'put'] ) !!}
        
        <div class="row">
            
            <div class="col-md-2">
            
                <div class="form-group">
                    {!! Form::label('id','ID:') !!}
                    {!! Form::text('id',$order->id, ['class'=>'form-control','disabled']) !!}
                </div>
            
            </div>
        
        </div>
        
        <div class="row">
            
            <div class="col-md-3">
            
                <div class="form-group">
                    {!! Form::label('status','Status:') !!}
                    {!! Form::select('status',$status, $order->status, ['class'=>'form-control']) !!}
                </div>
            
            </div>
        
        </div>

        <div class="form-group">
            {!! Form::submit('Alterar Status',['class'=>'btn btn-primary']) !!}
        </div>    
    {!! Form::close() !!}
	
</div>
@endsection