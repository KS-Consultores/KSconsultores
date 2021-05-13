<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class VerifyCsrfToken extends BaseVerifier {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		try{
			return parent::handle($request, $next);
		}catch(TokenMismatchException $tme){
			$errors = [
				'_token' => [
					'El token del formulario ha caducado.'
				]
			];

			Session::regenerateToken();

			return Redirect::back()->withInput(Input::except('_token'))->withErrors($errors);
		}
	}

}
