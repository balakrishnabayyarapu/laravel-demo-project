<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customer_dashboard()
    {
        return "Hello customer this is your dashboard";
    }

    public function customers_list()
    {
    	$logged_in_user = auth()->user();

    	if($logged_in_user->role == 'customer')
    		return $this->error("you don't have admin access");

    	$get_managers_list = User::where('role','customer')->get();
    	if(!$get_managers_list)
    		return $this->error("customers details not found.");

    	return response()->json(['data'=>$get_managers_list,'status'=>'success']);
    }

    public function get_customer_details()
    {
    	$logged_in_user = auth()->user();
    	if($logged_in_user->role != 'customer')
    		return $this->error("you don't have customer access");

    	$user_id = $logged_in_user->id;
    	$get_admin_details = User::where('id',$user_id)
    								->where('role',$logged_in_user->role)
    								->first();
    	if(!$get_admin_details)
    		return $this->error("manager details not found.");

    	return response()->json(['data'=>$get_admin_details,'status'=>'success']);
    }
}
