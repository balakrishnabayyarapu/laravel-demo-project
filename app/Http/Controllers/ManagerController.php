<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function manager_dashboard()
    {
        return "Hello Manager this is your dashboard";
    }

    public function managers_list()
    {
    	$logged_in_user = auth()->user();

    	if($logged_in_user->role != 'admin')
    		return $this->error("you don't have admin access");

    	$get_managers_list = User::where('role','manager')->get();
    	if(!$get_managers_list)
    		return $this->error("managers details not found.");

    	return response()->json(['data'=>$get_managers_list,'status'=>'success']);
    }

    public function get_manager_details()
    {
    	$logged_in_user = auth()->user();
    	if($logged_in_user->role != 'manager')
    		return $this->error("you don't have manager access");

    	$user_id = $logged_in_user->id;
    	$get_admin_details = User::where('id',$user_id)
    								->where('role',$logged_in_user->role)
    								->first();
    	if(!$get_admin_details)
    		return $this->error("manager details not found.");

    	return response()->json(['data'=>$get_admin_details,'status'=>'success']);


    }
}
