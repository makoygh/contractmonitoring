<?php

namespace App\Http\Controllers;
use App\Models\Proposals;
use App\Models\DQClients;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Query\Builder;
use DB;

class ProposalController extends Controller
{
        // View all proposals
        public function AllProposals(){

            //$allProposals = Proposals::latest()->get();

            $allProposals = DB::table('proposals')
            ->join('clients','proposals.client_id','=','clients.id')
            ->join('users','users.id','=','proposals.createdby_user_id')
            ->select('proposals.*', 'clients.client_name','users.name')
            ->get();

           // dd($allProposals);
            $quarterly_proposals = ''; 
            $approval_rate = '';    

            return view('backend.proposal.all_proposal',compact('allProposals','quarterly_proposals','approval_rate'));
    
        }


    // Add new proposal
    public function NewProposal(){

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

        return view('backend.proposal.new_proposal',compact('clientData','userData','quarterly_proposals','approval_rate'));

    }


// Save new proposal to DB
public function StoreNewProposal(Request $request){


    //validation
    $request->validate([
        'client_id' => 'required',
        'project_name' => 'required',
        'contact_person' => 'required',
        'proposal_status' => 'required'

      ]);

    //set the document to correct path and format
    /* if($request->file('contract_filename')){
        $docfile = $request->file('contract_filename');
        $docfilename = date('YmdHi').$docfile->getClientOriginalName();
        $docfile->move(public_path('upload/contracts'),$docfilename);
    } */

    // insert record to DB
    Proposals::insert([
        'client_id' => $request->client_id,
        'proposal_project' => $request->project_name,
        'proposal_contactperson' => $request->contact_person,
        'date_submitted' => $request->submitted_date,
        'proposal_status' => $request->proposal_status,
        //'contract_filename' => $docfilename, //$request->contract_filename,
        'createdby_user_id' => $request->userid,
        'created_at' => now()
    ]);


    $notification = array(
        'message' => 'New Proposal Added Successfully',
        'alert-type' => 'success'
    );

    // page refresh
    return redirect()->route('all.proposals')->with($notification);

}    


    // Edit proposal
    public function EditProposal($id){

        $proposalData = Proposals::findOrFail($id);

        $clientData = DQClients::query()
        ->orderBy('client_name')
        ->get();

        $id = Auth::user()->id;
        $userData = User::find($id);

        $quarterly_proposals = '';
        $approval_rate = '';

        return view('backend.proposal.edit_proposal',compact('proposalData','userData','clientData','quarterly_proposals','approval_rate'));

    }


 // Save to db the updated proposal details
 public function SaveEditProposal(Request $request){


    //validation
    $request->validate([
        'client_id' => 'required',
        'project_name' => 'required',
        'contact_person' => 'required',
        'proposal_status' => 'required'
      ]);

    $pid = $request->proposal_id;


    //set the document to correct path and format
   /* if($request->file('contract_filename')){
        $docfile = $request->file('contract_filename');
        $docfilename = date('YmdHi').$docfile->getClientOriginalName();
        $docfile->move(public_path('upload/contracts'),$docfilename);
    } */

    // Update the record to DB
    Proposals::findOrFail($pid)->update([
        'client_id' => $request->client_id,
        'proposal_project' => $request->project_name,
        'proposal_contactperson' => $request->contact_person,
        'date_submitted' => $request->submitted_date,
        'proposal_status' => $request->proposal_status,
        //'contract_filename' => $docfilename, //$request->contract_filename,
        'updatedby_user_id' => $request->userid,
        'updated_at' => now()
    ]);




    $notification = array(
        'message' => 'Proposal Details Updated Successfully',
        'alert-type' => 'success'
    );

    // page refresh
    return redirect()->route('all.proposals')->with($notification);

}


    // Delete proposal
    public function DeleteProposal($id){

        Proposals::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Proposal Deleted Successfully',
            'alert-type' => 'success'
        );

        // page refresh
        return redirect()->back()->with($notification); 

    }

//###########################  SALES ACCOUNT ######################3

        // View all proposals
        public function SalesAllProposals(){

            //$allProposals = Proposals::latest()->get();

            $allProposals = DB::table('proposals')
            ->join('clients','proposals.client_id','=','clients.id')
            ->join('users','users.id','=','proposals.createdby_user_id')
            ->select('proposals.*', 'clients.client_name','users.name')
            ->get();

           // dd($allProposals);
            $quarterly_proposals = '';     
            $approval_rate = '';

            return view('backend.proposal.sales_all_proposal',compact('allProposals','quarterly_proposals','approval_rate'));
    
        }


    // Add new proposal
    public function SalesNewProposal(){

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

        return view('backend.proposal.sales_new_proposal',compact('clientData','userData','quarterly_proposals','approval_rate'));

    }



// Save new proposal to DB
public function SalesStoreNewProposal(Request $request){


    //validation
    $request->validate([
        'client_id' => 'required',
        'project_name' => 'required',
        'contact_person' => 'required',
        'proposal_status' => 'required'

      ]);

    //set the document to correct path and format
    /* if($request->file('contract_filename')){
        $docfile = $request->file('contract_filename');
        $docfilename = date('YmdHi').$docfile->getClientOriginalName();
        $docfile->move(public_path('upload/contracts'),$docfilename);
    } */

    // insert record to DB
    Proposals::insert([
        'client_id' => $request->client_id,
        'proposal_project' => $request->project_name,
        'proposal_contactperson' => $request->contact_person,
        'date_submitted' => $request->submitted_date,
        'proposal_status' => $request->proposal_status,
        //'contract_filename' => $docfilename, //$request->contract_filename,
        'createdby_user_id' => $request->userid,
        'created_at' => now()
    ]);


    $notification = array(
        'message' => 'New Proposal Added Successfully',
        'alert-type' => 'success'
    );

    // page refresh
    return redirect()->route('sales.all.proposals')->with($notification);

}     


    // Sales Edit proposal
    public function SalesEditProposal($id){

        $proposalData = Proposals::findOrFail($id);

        $clientData = DQClients::query()
        ->orderBy('client_name')
        ->get();

        $id = Auth::user()->id;
        $userData = User::find($id);

        $quarterly_proposals = '';
        $approval_rate = '';

        return view('backend.proposal.sales_edit_proposal',compact('proposalData','userData','clientData','quarterly_proposals','approval_rate'));

    }


    // Save to db the updated proposal details
 public function SalesSaveEditProposal(Request $request){


    //validation
    $request->validate([
        'client_id' => 'required',
        'project_name' => 'required',
        'contact_person' => 'required',
        'proposal_status' => 'required'
      ]);

    $pid = $request->proposal_id;


    //set the document to correct path and format
   /* if($request->file('contract_filename')){
        $docfile = $request->file('contract_filename');
        $docfilename = date('YmdHi').$docfile->getClientOriginalName();
        $docfile->move(public_path('upload/contracts'),$docfilename);
    } */

    // Update the record to DB
    Proposals::findOrFail($pid)->update([
        'client_id' => $request->client_id,
        'proposal_project' => $request->project_name,
        'proposal_contactperson' => $request->contact_person,
        'date_submitted' => $request->submitted_date,
        'proposal_status' => $request->proposal_status,
        //'contract_filename' => $docfilename, //$request->contract_filename,
        'updatedby_user_id' => $request->userid,
        'updated_at' => now()
    ]);




    $notification = array(
        'message' => 'Proposal Details Updated Successfully',
        'alert-type' => 'success'
    );

    // page refresh
    return redirect()->route('sales.all.proposals')->with($notification);

}


    // Delete proposal
    public function SalesDeleteProposal($id){

        Proposals::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Proposal Deleted Successfully',
            'alert-type' => 'success'
        );

        // page refresh
        return redirect()->back()->with($notification); 

    }

} // end of controller
