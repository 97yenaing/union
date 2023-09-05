<?php
namespace App\Http\Controllers;
//namespace App\Exports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class AdminController extends Controller
{
  public function register_view(){
    return view('Admin.Register');
  }
  public function admin_do(Request $data){
    User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'state' => $data['state'],
        'township' => $data['township'],

    ]);
    return view ('Admin.Register');
  }
  public function user_view(){
    return view('Admin.viewUser');
  }
  public function user_process(Request $request){
    $notice=$request->input("notice");
    if($notice=="Find User"){
      $userType=$request->input("find");
      if($userType=="All"){
        $user_list=User::all();
      }else{
        $user_list=User::where("name",$userType)->get();
      }
      return response()->json([
        $user_list
      ]);
    }
    if($notice=="User updated"){
      $id=$request->input("update_rid");
      User::where("id",$id)->update([
        'name' => $request['name'],
        'email' => $request['email'],
        'state' => $request['state'],
        'township' => $request['township'],

      ]);

      return response()->json([
        $notice,
      ]);
    }
    if($notice=="Delete User"){
      $id=$request->input("delete_rid");
      User::where("id",$id)->delete();
      return response()->json([
        $notice,
      ]);
    }
   
  }

}