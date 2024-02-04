<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;

trait RedirectsUsers
{
    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if(Auth::user()->is_admin){
            return '/admin/articles';
        } else {
            return $this->redirectTo;
        }

    }
}