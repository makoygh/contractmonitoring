<?php

namespace App\Http\Controllers;
use App\Models\DQClients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ClientController extends Controller
{
    //

    // View all clients
    public function AllClient(){

        $registeredClients = DQClients::latest()->get();
        
        $quarterly_proposals = '';
        
        return view('backend.client.all_client',compact('registeredClients','quarterly_proposals'));

    }

    // Add new clients
    public function NewClient(){

        //return view('backend.client.new_client');
        $quarterly_proposals = '';

        return view('backend.client.new_client',compact('quarterly_proposals'));

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

        // page refresh
        return redirect()->route('all.client')->with($notification);
        //return view('backend.client.all_client',compact('quarterly_proposals'))->with($notification);

    }    
    

    // Edit client
    public function EditClient($id){

        $clientData = DQClients::findOrFail($id);

        $quarterly_proposals = '';

        return view('backend.client.edit_client',compact('clientData','quarterly_proposals'));

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

        // page refresh
        return redirect()->route('all.client')->with($notification);
        //return route('all.client')->compact('quarterly_proposals')->with($notification);

        //$registeredUsers = User::latest()->get();
       
        //return view('admin.admin_view_users',compact('registeredUsers'))->with($notification);

    }



    // Delete client
    public function DeleteClient($id){

        DQClients::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Client Deleted Successfully',
            'alert-type' => 'success'
        );

        // page refresh
        return redirect()->back()->with($notification); 
        //$quarterly_proposals = '';
        //return view('backend.client.all_client',compact('quarterly_proposals'))->with($notification);

    }





}
