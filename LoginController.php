<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Services\Business\SecurityService;

class LoginController extends Controller
{
    //To obtain an instance of the current HTTP request from a post
    public function login(Request $request){
        // This is from the next step d in the activity.
        // Create a UserModel with username and password
        //$credentials = new UserModel(request()->get('user_name'), request()->get('password'));
        
        $username = request()->get('user_name');
        $password = request()->get('password');
        
        
        $model= new UserModel($username, $password);
       
        // Instantiate the Business Logic Layer
        $serviceLogin = new SecurityService();
        // Pass the credentials to the Business Layer
        $isValid = $serviceLogin->login($model);
        
        // Determine with view to display;
        if ($isValid) 
        {
            $user = ['model'=>$model];
            return view('loginPassed2')->with($user);
        }
        else 
        {
            return view('loginFailed');
        }
    }
}
