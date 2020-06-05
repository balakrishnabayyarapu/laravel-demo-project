<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin_dashboard()
    {
        return "Hello Admin this is your dashboard";
    }
    
    public function admin_details()
    {
    	$logged_in_user = auth()->user();

    	if($logged_in_user->role != 'admin')
    		return $this->error("you don't have admin access");

    	$user_id = $logged_in_user->id;
    	$get_admin_details = User::where('id',$user_id)
    								->first();
    	if(!$get_admin_details)
    		return $this->error("admin details not found.");

    	return response()->json(['data'=>$get_admin_details,'status'=>'success']);
    }
}
