<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\DQClients;
use App\Models\clientcontract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DB;


class ClientContractController extends Controller
{
    //
    // View all contracts
    public function AllContracts(){

        //$createdContracts = clientcontract::latest()->get();
        $createdContracts = DB::table('clients')
        ->join('clientcontracts','clients.id','=','clientcontracts.client_id')
        ->join('users','users.id','=','clientcontracts.createdby_user_id')
        ->select('clientcontracts.*','clients.client_name','users.name')
        ->get();

        $quarterly_proposals = '';
        
        return view('backend.contract.all_contracts',compact('createdContracts','quarterly_proposals'));

    }    


    // Add new contract
    public function NewContract(){

        //$clientData = DQClients::latest()
        $clientData = DQClients::query()
        ->orderBy('client_name')
        ->get();
        //$userData = User::latest()->get();
        $id = Auth::user()->id;
        $userData = User::find($id);
        //$selectedRole = User::first()->role_id;
    
        //return view('my_view', compact('roles', 'selectedRole');

        return view('backend.contract.new_contract',compact('clientData','userData'));

    }

  // Save new contract to DB
  public function StoreNewContract(Request $request){


    //validation
    $request->validate([
        'client_id' => 'required',
        'project_name' => 'required',
        'contract_start' => 'required',
        'contract_end' => 'required',
        'contract_signed' => 'required',
        'contract_filename' => 'required',
        'contract_status' => 'required'
      ]);

    //set the document to correct path and format
    if($request->file('contract_filename')){
        $docfile = $request->file('contract_filename');
        $docfilename = date('YmdHi').$docfile->getClientOriginalName();
        $docfile->move(public_path('upload/contracts'),$docfilename);
    }

    // insert record to DB
    clientcontract::insert([
        'client_id' => $request->client_id,
        'project_name' => $request->project_name,
        'contract_start' => $request->contract_start,
        'contract_end' => $request->contract_end,
        'contract_signed' => $request->contract_signed,
        'contract_filename' => $docfilename, //$request->contract_filename,
        'contract_status' =>   $request->contract_status,              
        'createdby_user_id' => $request->userid,
        'created_at' => now()
    ]);


    $notification = array(
        'message' => 'New Contract Added Successfully',
        'alert-type' => 'success'
    );

    // page refresh
    return redirect()->route('all.contracts')->with($notification);

}    


    // Edit contract
    public function EditContract($id){

        $contractData = clientcontract::findOrFail($id);

        $clientData = DQClients::query()
        ->orderBy('client_name')
        ->get();

        $id = Auth::user()->id;
        $userData = User::find($id);

        return view('backend.contract.edit_contract',compact('contractData','userData','clientData'));

    }


   // Save to db the updated contract details
   public function SaveEditContract(Request $request){


    //validation
    $request->validate([
        'client_id' => 'required',
        'project_name' => 'required',
        'contract_start' => 'required',
        'contract_end' => 'required',
        'contract_signed' => 'required',
        'contract_filename' => 'required',
        'contract_status' => 'required'
      ]);

    $cid = $request->contract_id;


    //set the document to correct path and format
    if($request->file('contract_filename')){
        $docfile = $request->file('contract_filename');
        $docfilename = date('YmdHi').$docfile->getClientOriginalName();
        $docfile->move(public_path('upload/contracts'),$docfilename);
    }

    // Update the record to DB
    clientcontract::findOrFail($cid)->update([
        'client_id' => $request->client_id,
        'project_name' => $request->project_name,
        'contract_start' => $request->contract_start,
        'contract_end' => $request->contract_end,
        'contract_signed' => $request->contract_signed,
        'contract_filename' => $docfilename, //$request->contract_filename,
        'contract_status' =>   $request->contract_status,              
        'updatedby_user_id' => $request->userid,
        'updated_at' => now()
    ]);


    $notification = array(
        'message' => 'Contract Details Updated Successfully',
        'alert-type' => 'success'
    );

    // page refresh
    return redirect()->route('all.contracts')->with($notification);

    //$registeredUsers = User::latest()->get();
   
    //return view('admin.admin_view_users',compact('registeredUsers'))->with($notification);

}












}




