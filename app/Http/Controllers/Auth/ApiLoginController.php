<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ApiLoginController extends Controller
{
    use AuthenticatesUsers;

    protected function authenticated(Request $request, $user)
    {               
        dd('hello');
        // implement your user role retrieval logic, for example retrieve from `roles` database table
        $admin = $user->isAdmin();

        // grant scopes based on the role that we get previously
        if ($admin) {
            $request->request->add([
                'scope' => 'manage-users' // grant manage order scope for user with admin role
            ]);
        } else {
            $request->request->add([
                'scope' => 'read-only' // read-only order scope for other user role
            ]);
        }

        // forward the request to the oauth token request endpoint
        $tokenRequest = Request::create(
            '/oauth/token',
            'post'
        );
        return Route::dispatch($tokenRequest);
    }
}