@extends('store.store')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">CEP</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="cep" value="{{ old('cep') }}">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">Endereço</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="endereco" value="{{ old('endereco') }}">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">Numero</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="numero" value="{{ old('numero') }}" maxlength="8">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">Bairro</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="bairro" value="{{ old('bairro') }}">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">Cidade</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="cidade" value="{{ old('cidade') }}">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">Estado</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="estado" value="{{ old('estado') }}">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
