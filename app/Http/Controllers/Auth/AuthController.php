<?php namespace CodeCommerce\Http\Controllers\Auth;

use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Validator;
use CodeCommerce\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest', ['except' => 'getLogout']);
	}
	
	/**
	 * Show the application registration form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getRegister()
	{
	    return view('auth.register');
	}
	
	public function validaCadastro(array $data)
	{
	    return Validator::make($data, [
	        'name' => 'required|max:255',
	        'email' => 'required|email|max:255|unique:users',
	        'password' => 'required|confirmed|min:6',
	        'cep' => 'required',
	        'endereco' => 'required',
	        'numero' => 'required',
	        'bairro' => 'required',
	        'cidade' => 'required',
	        'estado' => 'required',
	    ]);  
	}
	
	/**
	 * Handle a registration request for the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function postRegister(Request $request)
	{
	    $validator = $this->validaCadastro($request->all());
	
	    if ($validator->fails()) {
	        $this->throwValidationException(
	            $request, $validator
	        );
	    }
	
	    Auth::login($this->create($request->all()));
	
	    return redirect($this->redirectPath());
	}
	
	
	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
	    return Validator::make($data, [
	        'name' => 'required|max:255',
	        'email' => 'required|email|max:255|unique:users',
	        'password' => 'required|confirmed|min:6',
	    ]);
	}
	
	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
	    return User::create([
	        'name' => $data['name'],
	        'email' => $data['email'],
	        'password' => bcrypt($data['password']),
	        'cep' => $data['cep'],
	        'endereco' => $data['endereco'],
	        'numero' => $data['numero'],
	        'cidade' => $data['cidade'],
	        'estado' => $data['estado'],
	        'bairro' => $data['bairro'],
	    ]);
	}
	

}
