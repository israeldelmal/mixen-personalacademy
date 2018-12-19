<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

use App\User;
use App\Profile;

class AuthController extends Controller
{
	// Index
    public function index()
    {
    	if (Auth::check()) {
    		if (Auth::user()->status == true) {
    			return redirect('/escritorio');
    		} else {
    			Auth::logout();
    			return redirect('/');
    		}
    	} else {
    		return view('auth.auth');
    	}
    }

    // Autenticación
    public function auth(Request $request)
    {
		$rules = [
			'email'    => 'required|email',
			'password' => 'required|min:8'
		];

		$messages = [
			'email.required'    => 'Este campo es requerido',
			'email.email'       => 'No tiene formato de e-mail',
			
			'password.required' => 'Este campo es requerido',
			'password.min'      => 'Mínimo 8 caracteres',
		];

		$validator = Validator::make($request->all(), $rules, $messages);

		if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
        	if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => true])) {
                return redirect('/escritorio');
        	} else {
        		return redirect('/autenticacion')
                        ->with('permission', '');
        	}
        }
    }

    // Crear usuario
    public function create()
    {
        return view('auth.create');
    }

    // Almacenar usuario
    public function store(Request $request)
    {
		$rules = [
			'name'      => 'required|min:3',
			'lastname'  => 'required|min:3',
			'email'     => 'required|email|unique:users',
			'password'  => 'required|min:8',
			'cpassword' => 'same:password'
		];

		$messages = [
			'name.required'     => 'Este campo es requerido',
			'name.min'          => 'Mínimo 3 caracteres',
			
			'lastname.required' => 'Este campo es requerido',
			'lastname.min'      => 'Mínimo 3 caracteres',
			
			'email.required'    => 'Este campo es requerido',
			'email.email'       => 'No tiene formato de e-mail',
			'email.unique'      => 'Ya esta registrado este correo',
			
			'password.required' => 'Este campo es requerido',
			'password.min'      => 'Mínimo 8 caracteres',
			
			'cpassword.same'    => 'Las contraseñas no coinciden'
		];

		$validator = Validator::make($request->all(), $rules, $messages);

		if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
            $user           = new User($request->all());
            $user->name     = $request->name;
            $user->lastname = $request->lastname;
            $user->email    = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();

            return redirect('/autenticacion')
                    ->with('access', '');
        }
    }

    // Cerrar sesión
    public function logout()
    {
    	if (Auth::check()) {
    		Auth::logout();
    		return redirect('/');
    	} else {
    		return redirect('/autenticacion');
    	}
    }
}