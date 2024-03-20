<?php

namespace App\Http\Controllers;
use App\Models\DQClients;
use App\Models\clientcontract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

class ClientController extends Controller
{
    //

    // View all clients
    public function AllClient(){

        $registeredClients = DQClients::latest()->get();
        //$registeredClients = DB::table('clients')
        //->latest()
        //->get();
        
        $quarterly_proposals = '';
        $approval_rate='';
        
        return view('backend.client.all_client',compact('registeredClients','quarterly_proposals','approval_rate'));

    }

    // Add new clients
    public function NewClient(){

        //return view('backend.client.new_client');
        $quarterly_proposals = '';
        $approval_rate = '';

        return view('backend.client.new_client',compact('quarterly_proposals','approval_rate'));

    }

    
    // Save new client to DB
    public function StoreNewClient(Request $request){


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

        $quarterly_proposals = '';
        $approval_rate = '';

        // page refresh
        return redirect()->route('all.client')->with($notification);
        //return view('backend.client.all_client',compact('quarterly_proposals'))->with($notification);

    }    
    

    // Edit client
    public function EditClient($id){

        $clientData = DQClients::findOrFail($id);
        //$clientData = DB::table('clients')
        //->findOrFail($id);

        $quarterly_proposals = '';
        $approval_rate = '';

        return view('backend.client.edit_client',compact('clientData','quarterly_proposals','approval_rate'));

    }

    // Save to db the updated client details
    public function SaveEditClient(Request $request){


        //validation
       /* $request->validate([
            'client_name' => 'required',
            'client_address' => 'required',
            'client_country' => 'required',
            'client_contactperson' => 'required',
            'client_status' => 'required'
        ]); */

        $cid = $request->id;

        // Update the record to DB
        DQClients::findOrFail($cid)->update([
        //DB::table('clients')->findOrFail($cid)->update([
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

        $quarterly_proposals = '';
        $approval_rate = '';

        // page refresh
        return redirect()->route('all.client')->with($notification);
        //return route('all.client')->compact('quarterly_proposals')->with($notification);

        //$registeredUsers = User::latest()->get();
       
        //return view('admin.admin_view_users',compact('registeredUsers'))->with($notification);

    }



    // Delete client
    public function DeleteClient($id){

        //DQClients::findOrFail($id)->delete();
        //DB::table('clients')->findOrFail($id)->delete();

        $haveContract = clientcontract::where('client_id','=',$id)
        ->select('id')
        ->count();

        //dd($haveContract);

        if($haveContract == 0){

            DQClients::findOrFail($id)->delete();

            $notification = array(
                'message' => 'Client Deleted Successfully',
                'alert-type' => 'success'
            );
        }
        else{

            $notification = array(
                'message' => 'Cannot delete a client with an existing contract!',
                'alert-type' => 'warning'
            );
    
        }
        


        // page refresh
        return redirect()->back()->with($notification); 
        //$quarterly_proposals = '';
        //return view('backend.client.all_client',compact('quarterly_proposals'))->with($notification);

    }



    // View all new clients
    public function NewClientsReport(){

        $newClientsData = DQClients::whereDate('created_at', '>', now()->subDays(30))
        //$registeredClients = DB::table('clients')
        //->latest()
        ->get();
        
        $quarterly_proposals = '';
        $approval_rate='';
        
        return view('backend.client.new_clients_report',compact('newClientsData','quarterly_proposals','approval_rate'));

    }




}
