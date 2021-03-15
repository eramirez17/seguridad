<?php

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\changePasswordRequest;
use App\Http\Requests\changeEmailRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Profile;
use App\Models\Option;

class pageController extends Controller
{
    public function inicio() {
    	return view('welcome');
	}
	//llama al formulario para cambiar la contraseña del usuario en sesión
	//marzo 2021. evelio ramirez
	public function mypassword() {
    	return view('session.mypassword',compact('id'));
	}
	//actualiza la contraseña del usuario en sesión
	//marzo 2021. evelio ramirez
	public function savepassword(changePasswordRequest $request) {
		
	}
	//actualiza los datos generales del usuario en sesion
	//marzo 2021. evelio ramirez
	public function savemyinfo(changePasswordRequest $request) {
		switch ($request->form) {
			case 'password':
				if (isset($request->password)>=8 && $request->password===$request->password_confirmation ) {
					$user = User::find($request->id);
					$password = Hash::make($request->password);
					$user->password = $password;
			        $user->save();
			    	$info = 'Contraseña actualizada con éxito';
				} else {
			    	$info ='Cambio no realizado: Alguna de las contraseñas estaba vacia o no coincidia';
				}
			break;
			
			default:
				$user = User::find($request->id);
				$save = false;
	            if (strlen($request->password)<=0) {
	                $password = $user->password;
	                $info = "Datos actualizados con éxito.";
	                $save = true;
	            }else{
	            	if (strlen($request->password)>=8 && $request->password===$request->password_confirmation ){
	            		$password = Hash::make($request->password);
	            		if (strlen($request->name)>0 && strlen($request->email)>0) {
	            			$save = true;
	            			$info = "Datos actualizados con éxito.";
	            		}else{
	            			$save = false;
	            			$info = "Datos no actualizados. Nombre o email vacios";
	            		}
	            	}else{
	            		$info = "Datos no actualizados. Alguna de las contraseñas estaba vacia o no coincidia";
	            	}
	            }
	            if ($save){
	            	$password = $password;
		            $user->name = $request->name;
				    $user->email = $request->email;
				    $user->password = $password;
				    $user->save();	
	            }
			break;
		}
		return view('dashboard')
    				->with('info',$info);
	}
}
