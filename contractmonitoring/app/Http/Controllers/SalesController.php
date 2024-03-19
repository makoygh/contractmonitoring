<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\DQClients;
use App\Models\clientcontract;
use App\Models\Proposals;

use DB;

class SalesController extends Controller
{
       //
       public function SalesDashboard(){

        //  new clients metric
        $clientDataDB = DQClients::whereDate('created_at', '>', now()->subDays(30))
        ->select('id')
        ->count();

        //  new contracts metric
        $contractDataDB = clientcontract::whereDate('created_at', '>', now()->subDays(30))
        ->select('id')
        ->count();

       // $nearContractExpiration = clientcontract::whereDate('contract_end', '>',now()->addDays(60))

       //  contracts approaching expiration metric
       $nearContractExpiration = clientcontract::whereBetween('contract_end', [now(),now()->addDays(60)])
        ->select('id')
        ->count();

        //  active contracts metric
        $activeContracts = clientcontract::where('contract_status', '=', 'active')
        ->select('id')
        ->count();

        //  Generated Prosalcs metric (column chart)
        $quarterlyProposals = Proposals::whereDate('created_at', '>', now()->subDays(90))
                        ->selectRaw('MONTH(created_at) as month, MONTHNAME(created_at) as monthname, count(id) as total')
                        ->groupBy('month','monthname')
                        //->having('total', '>', 1000)
                        ->get();
        //->select('id')
        //->count();
        
        // Proposal Metrics (Charts)
        $newProposals = Proposals::whereDate('created_at', '>', now()->subDays(90))
        //->where('proposal_status', '=', 'draft')
        ->select('id')
        ->count();
        
        $submittedProposals = Proposals::whereDate('created_at', '>', now()->subDays(90))
        ->where('proposal_status', '=', 'submitted')
        ->select('id')
        ->count();

        $reviewProposals = Proposals::whereDate('created_at', '>', now()->subDays(90))
        ->where('proposal_status', '=', 'client review')
        ->select('id')
        ->count();

        $deniedProposals = Proposals::whereDate('created_at', '>', now()->subDays(90))
        ->where('proposal_status', '=', 'denied')
        ->select('id')
        ->count();        
        // end of proposal metrics


        // Approved Proposals Rate chart
        $numSubmitted = Proposals::where('proposal_status', '<>', 'approved')
        ->select('id')
        ->count(); 
        
        $numApproved = Proposals::where('proposal_status', '=', 'approved')
        ->select('id')
        ->count(); 

        $approvalRate = round(($numApproved / $numSubmitted) * 100);

        $approvalRate = '[' . strval($approvalRate) . ']';
        //dd($approvalRate);


        // end of approved proposals rate chart


        return view('sales.index', ['client_count'=>$clientDataDB,
        'contract_count'=>$contractDataDB,
        'contract_expire'=>$nearContractExpiration,
        'contract_active'=>$activeContracts,
        'quarterly_proposals'=>$quarterlyProposals,
        'new_proposals'=>$newProposals,
        'submitted_proposals'=>$submittedProposals,
        'review_proposals'=>$reviewProposals,
        'denied_proposals'=>$deniedProposals,
        'approval_rate'=>$approvalRate
        ]);

        //return view('sales.index');

    } // end of Sales Dashboard



    /**
     * Destroy an authenticated session.
     */
    public function SalesLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }


    // View all clients
    public function SalesAllClient(){

        $registeredClients = DQClients::latest()->get();
        
        $quarterly_proposals = '';
        $approval_rate = '';

        return view('backend.client.sales_all_client',compact('registeredClients','quarterly_proposals','approval_rate'));

    }


        // Add new clients
    public function SalesNewClient(){

        $quarterly_proposals = '';
        $approval_rate = '';

        return view('backend.client.sales_new_client', compact('quarterly_proposals','approval_rate'));

    }


    // Save new client to DB
    public function SalesStoreNewClient(Request $request){


        //validation
        $request->validate([
            'client_name' => 'required|unique:clients',
            'client_address' => 'required',
            'client_country' => 'required',
            'client_contactperson' => 'required',
            'client_status' => 'required'
        ]);

        // insert record to DB
        DQClients::insert([
            'client_name' => $request->client_name,
            'client_addr' => $request->client_address,
            'client_country' => $request->client_country,
            'client_contactperson' => $request->client_contactperson,
            'client_status' => $request->client_status,
            'created_at' => now()
        ]);


        $notification = array(
            'message' => 'New Client Added Successfully',
            'alert-type' => 'success'
        );

        // page refresh
        return redirect()->route('sales.all.client')->with($notification);

    }  


    
    // Edit client
    public function SalesEditClient($id){

        $clientData = DQClients::findOrFail($id);

        $quarterly_proposals = '';
        $approval_rate = '';

        return view('backend.client.sales_edit_client',compact('clientData','quarterly_proposals','approval_rate'));

    }


  // Save to db the updated client details
  public function SalesSaveEditClient(Request $request){


    //validation
    $request->validate([
        'client_name' => 'required',
        'client_address' => 'required',
        'client_country' => 'required',
        'client_contactperson' => 'required',
        'client_status' => 'required'
    ]); 

    $cid = $request->id;

    // Update the record to DB
    DQClients::findOrFail($cid)->update([
        'client_name' => $request->client_name,
        'client_addr' => $request->client_address,
        'client_country' => $request->client_country,
        'client_contactperson' => $request->client_contactperson,
        'client_status' => $request->client_status,
        'updated_at' => now()
    ]);


    $notification = array(
        'message' => 'Client Details Updated Successfully',
        'alert-type' => 'success'
    );

    // page refresh
    return redirect()->route('sales.all.client')->with($notification);


}



  // Delete client
  public function SalesDeleteClient($id){

    DQClients::findOrFail($id)->delete();

    $notification = array(
        'message' => 'Client Deleted Successfully',
        'alert-type' => 'success'
    );

    // page refresh
    return redirect()->route('sales.all.client')->with($notification);

}



// SALES USER PROFILE

public function SalesProfile(){

    $id = Auth::user()->id;
    $profileData = User::find($id);

    $quarterly_proposals = '';
    $approval_rate = '';

    return view('sales.sales_profile_view',compact('profileData','quarterly_proposals','approval_rate'));

}


public function SalesProfileUpdate(Request $request){

    $id = Auth::user()->id;
    $data = User::find($id);
    $data->name = $request->name;
    $data->email = $request->email;
    //$data->password = $request->password;

    $data->save();

    $notification = array(
        'message' => 'User Profile Updated Successfully',
        'alert-type' => 'success'
    );

    // page refresh
    return redirect()->back()->with($notification);

}



public function SalesChangePassword(){

    $id = Auth::user()->id;
    $profileData = User::find($id);

    $quarterly_proposals = '';
    $approval_rate = '';

    return view('sales.sales_change_password',compact('profileData'.'quarterly_proposals','approval_rate'));

}


public function SalesUpdatePassword(Request $request){

    //validation
    $request->validate([
        'old_password' => 'required',
        'new_password' => 'required|confirmed'
    ]);

    // should match the old password
    if (!Hash::check($request->old_password, auth::user()->password)){

        $notification = array(
            'message' => 'Old Password does not match!',
            'alert-type' => 'error'
        );

        // page refresh
        return back()->with($notification);
    }

    // update the new password
    User::whereId(auth()->user()->id)->update([
        'password' => Hash::make($request->new_password)

    ]);


    $notification = array(
        'message' => 'User Password Updated Successfully',
        'alert-type' => 'success'
    );

    // page refresh
    return redirect()->back()->with($notification);

}   


// CLIENT - CONTRACT MANAGEMENT

 // View all contracts
 public function SalesAllContracts(){

    //$createdContracts = clientcontract::latest()->get();
    $createdContracts = DB::table('clients')
    ->join('clientcontracts','clients.id','=','clientcontracts.client_id')
    ->join('users','users.id','=','clientcontracts.createdby_user_id')
    ->select('clientcontracts.*','clients.client_name','users.name')
    ->get();
    
    $quarterly_proposals = '';
    $approval_rate = '';

    return view('backend.contract.sales_all_contracts',compact('createdContracts','quarterly_proposals','approval_rate'));

}    


    // Add new contract
    public function SalesNewContract(){

        //$clientData = DQClients::latest()
        $clientData = DQClients::query()
        ->orderBy('client_name')
        ->get();
        //$userData = User::latest()->get();
        $id = Auth::user()->id;
        $userData = User::find($id);
        //$selectedRole = User::first()->role_id;
    
        //return view('my_view', compact('roles', 'selectedRole');

        $quarterly_proposals = '';
        $approval_rate = '';

        return view('backend.contract.sales_new_contract',compact('clientData','userData','quarterly_proposals','approval_rate'));

    }


// Save new contract to DB
public function SalesStoreNewContract(Request $request){


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
    return redirect()->route('sales.all.contracts')->with($notification);

}    


    // Edit contract
    public function SalesEditContract($id){

        $contractData = clientcontract::findOrFail($id);

        $clientData = DQClients::query()
        ->orderBy('client_name')
        ->get();

        $id = Auth::user()->id;
        $userData = User::find($id);

        $quarterly_proposals = '';
        $approval_rate = '';

        return view('backend.contract.sales_edit_contract',compact('contractData','userData','clientData','quarterly_proposals','approval_rate'));

    }



  // Save to db the updated contract details
  public function SalesSaveEditContract(Request $request){


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
    return redirect()->route('sales.all.contracts')->with($notification);


}







} // end of controller
