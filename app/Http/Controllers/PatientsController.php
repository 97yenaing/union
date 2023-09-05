<?php
namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
// Exports
use App\Exports\Patient_export;
use App\Exports\ExportPatients;
use Illuminate\Database\Eloquent\Builder;
use DateTime;
use Illuminate\Support\Facades\Response;

//namespace App\Exports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\patient;
class PatientsController extends Controller
{
  public function patients_view(){
    return view('Patients.pt_process');
  }
  public function patients_process(Request $request){
    $notice=$request->input("notice");
    if($notice=="save"){
      patient::create([
        'name'=>$request->input("pt_name"),
        'email'=>$request->input("pt_email"),
        'phone'=>$request->input("pt_phone"),
        'address'=>$request->input("pt_address"),
        'age'=>$request->input("pt_age"),
        'township'=>$request->input("pt_town"),
      ]);
      return response()->json([
          "successfully"
      ]);
    }

    if($notice=="excel"){
      $export_town=$request->input("ex_town");
      if($export_town =="All"){
          $export_data = patient::select("name","email","phone","address","age","township")->get();
         
      }else{
          $export_data=patient::select("name","email","phone","address","age","township")->where("township",$export_town)->get();
        
      }
      return response()->json([
        $export_data
      ]);
      //  return Excel::download(new Patient_export($export_data), 'Patients.xlsx');
    }

    if($notice=="View Patient"){
        $view_town=$request->input("view_town");
        if($view_town =="All"){
            $view_data = patient::select("id","name","email","phone","address","age","township")->get();
           
        }else{
            $view_data=patient::select("id","name","email","phone","address","age","township")->where("township",$view_town)->get();
          
        }
        return response()->json([
          $view_data
        ]);
        //  return Excel::download(new Patient_export($export_data), 'Patients.xlsx');
    }

    if($notice=="Update Patient"){
      $id=$request["update_id"];

      patient::where("id",$id)->update([
        'name'=>$request->input("pt_name"),
        'email'=>$request->input("pt_email"),
        'phone'=>$request->input("pt_phone"),
        'address'=>$request->input("pt_address"),
        'age'=>$request->input("pt_age"),
        'township'=>$request->input("pt_town"),
      ]);
      return response()->json([
          "successfully"
      ]);
    }


    if($notice=="Delete Patient"){
      $id=$request["id"];

      patient::where("id",$id)->delete();
      return response()->json([
          "successfully"
      ]);
    }
    
    
  }
  public function export_patient() 
    {
        return Excel::download(new ExportPatients, 'patients.xlsx');
    }
  
}