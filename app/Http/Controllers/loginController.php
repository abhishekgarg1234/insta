<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class loginController extends BaseController
{
	public function login(Request $req){
		$username = $req->input('username');
		$password = $req->input('password');
		$users = DB::table('followTable')
				 ->where(['userid'=>$username])
				 ->pluck('followid');
		$data=array("id"=>$username);
		return view('main', ['users' => $users , 'login' => $data]);
	}


	public function login2(Request $req , $user){


		$data = json_decode($user,true);
		$userid=$data["username"];
		$str = $data["str"];

		$use  = DB::table('userTable')
				->where([
					['userid', 'LIKE', $str.'%'],
					['userid','!=',$userid]
					])
				->pluck('userid');
		
		$use2 = DB::table('followTable')
				->where( [ 
					['userid','=',$userid],
					['followid', 'LIKE', $str.'%']
					])
				->pluck('followid');

		$arr1=array();
		$arr2=array();
		$arr=array();
		foreach ($use as $key) {
			array_push($arr1,$key);
		}
		foreach ($use2 as $key) {
			array_push($arr2,$key);
		}

		$arr = array_diff($arr1, $arr2);
		
		$ht='';
		foreach ($arr as $title) {
    		$ht .= '<div class="show" id="';
    		$ht .= $title;
    		$ht .= ' " align="left">';
    		$ht .= '<span class="name">';
    		$ht.=  $title;
    		$ht.= '</span>';
    		$ht .= '<input type="button" size="30" onclick="addButtonClick(event)"  id="but" class="';
    		$ht .= $title;
    		$ht .= ' "value="Follow">';
    		$ht .= '</div>';
		}		
		return $ht;
	}


	public function login3(Request $req, $user_1){
		$data = json_decode($user_1,true);
			DB::table('followtable')->insert(
    		['userid' => $data['first_user'] ,'followid' => $data['sec_user']]
			);

		return "success";
	}
}
	