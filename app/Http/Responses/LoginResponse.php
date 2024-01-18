<?php

namespace app\Http\Responses;

use App\Models\AdminUser;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Laravel\Fortify\Fortify;

class LoginResponse implements LoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed $user

     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        // dd(auth()->guard());
        $user = AdminUser::find(auth()->guard('admin_users')->user()->id );
        // dd($request->ip());
        $user->ip = $request->ip();
        $user->user_agent = $request->server('HTTP_USER_AGENT');
        $user->update();
        return $request->wantsJson()
                    ? response()->json(['two_factor' => false])
                    : redirect()->intended('admin_users/dashboard');
    }
    
}
