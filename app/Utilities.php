<?php

namespace Taller;

use Auth;
use DB;

class Utilities
{
    /*public function getUserRole($userId)
    {
        $aux = DB::table('role_user')->select('role_id')->where('user_id', '=', $userId)->get()->toArray();
        return            
            $aux[0]->role_id;
    }*/

    public function getUserLogged()
    {        
        return            
            Auth::user()->id;
    }

}