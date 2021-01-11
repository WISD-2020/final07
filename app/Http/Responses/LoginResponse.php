<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {

        // below is the existing response
        // replace this with your own code
        // the user can be located with Auth facade

        $status=Auth::user()->type;

        if ($status=="0")
            return redirect()->route('index');
        else
            return redirect()->route('admin.reservations.index');


    }

}
