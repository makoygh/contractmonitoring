<?php

namespace App\Http\Controllers;
//use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\DQClients;
use App\Models\clientcontract;
use App\Models\Proposals;
use DB;

use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{
   
    //
    public function AdminDashboard(){

        //  new clients metric
        $clientDataDB = DQClients::whereDate('created_at', '>', now()->subDays(30))
        //$clientDataDB = DB::table('clients')
        //->whereDate('created_at', '>', now()->subDays(30))
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


        return view('admin.index', ['client_count'=>$clientDataDB,
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
        //return view('admin.admin_dashboard');

    } // end of Admin Dashboard

 //
 public function AdminDBoard(){

    $clientDataDB = DQClients::whereDate('created_at', '>', now()->subDays(30))
    //$clientDataDB = DB::table('clients')
    ->whereDate('created_at', '>', now()->subDays(30))
    ->select('id')
    ->count();

    $contractDataDB = clientcontract::whereDate('created_at', '>', now()->subDays(30))
    ->select('id')
    ->count();

   // $nearContractExpiration = clientcontract::whereDate('contract_end', '>',now()->addDays(60))
   $nearContractExpiration = clientcontract::whereBetween('contract_end', [now(),now()->addDays(60)])
    ->select('id')
    ->count();

    $activeContracts = clientcontract::where('contract_status', '=', 'active')
    ->select('id')
    ->count();


    //$quarterlyProposals = Proposals::whereDate('created_at', '>', now()->subDays(90))->get();

    $quarterlyProposals = Proposals::whereDate('created_at', '>', now()->subDays(90))
                    ->selectRaw('MONTH(created_at) as month, MONTHNAME(created_at) as monthname, count(id) as total')
                    ->groupBy('month','monthname')
                    //->having('total', '>', 1000)
                    ->get();
    //->select('id')
    //->count();
    
    return view('admin.index2', ['client_count'=>$clientDataDB,
    'contract_count'=>$contractDataDB,
    'contract_expire'=>$nearContractExpiration,
    'contract_active'=>$activeContracts,
    'quarterly_proposals'=>$quarterlyProposals
    ]);
    
    //return view('admin.admin_dboard', compact('clientDataDB'));
    //return view('admin.admin_dashboard');

} // end of Admin Dashboard 2


    /**
     * Destroy an authenticated session.
     */
    public function AdminLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function AdminLogin(){

        return view('admin.admin_login');
        //return view('admin.admin_dashboard');

    } // end of Admin Dashboard

    public function AdminProfile(){

        $id = Auth::user()->id;
        $profileData = User::find($id);
        $quarterly_proposals = '';
        $approval_rate = '';
        return view('admin.admin_profile_view',compact('profileData','quarterly_proposals','approval_rate'));

    }

    public function AdminProfileUpdate(Request $request){

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        //$data->password = $request->password;

        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        // page refresh
        return redirect()->back()->with($notification);

        //return view('admin.admin_profile_view',compact('profileData'));

    }

    public function AdminChangePassword(){

        $id = Auth::user()->id;
        $profileData = User::find($id);

        $quarterly_proposals = '';
        $approval_rate = '';
        return view('admin.admin_change_password',compact('profileData','quarterly_proposals','approval_rate'));

    }

    public function AdminUpdatePassword(Request $request){

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
            'message' => 'Admin Password Updated Successfully',
            'alert-type' => 'success'
        );

        // page refresh
        return redirect()->back()->with($notification);

        //return view('admin.admin_profile_view',compact('profileData'));

    }    

    // View all registered users
    public function AdminViewUsers(){

        $registeredUsers = User::latest()->get();

        $quarterly_proposals = '';
        $approval_rate = '';

        return view('admin.admin_view_users',compact('registeredUsers','quarterly_proposals','approval_rate'));

    }

    // Add new user
    public function AdminRegisterUser(){

        //$registeredUsers = User::latest()->get();
        $quarterly_proposals = '';
        $approval_rate = '';
        return view('admin.admin_register_user',compact('quarterly_proposals','approval_rate'));

    }

    // Saving the information of New User to DB
    public function AdminStoreNewUser(Request $request){

        //validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users', // email should be unique in users table
            'roleSelect' => 'required',
            'userStatus' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        // insert record to DB
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->userStatus,
            'role' => $request->roleSelect,
            'password' => Hash::make($request->new_password),
            'created_at' => now()
        ]);


        $notification = array(
            'message' => 'New User Added Successfully',
            'alert-type' => 'success'
        );

        // page refresh
        return redirect()->route('admin.view.users')->with($notification);

        //$registeredUsers = User::latest()->get();
       
        //return view('admin.admin_view_users',compact('registeredUsers'))->with($notification);

    }    

    // Edit user page
    public function AdminEditUser($id){

        //$id = Auth::user()->id;
        $userData = User::findOrFail($id);

        $quarterly_proposals = '';
        $approval_rate = '';

        return view('admin.admin_edit_user',compact('userData','quarterly_proposals','approval_rate'));

    }


    // Saving the information of Edit User to DB
    public function AdminStoreEditUser(Request $request){

        //validation
        $request->validate([
            'name' => 'required',
            //'email' => 'required|unique:users', // email should be unique in users table
            'roleSelect' => 'required',
            'userStatus' => 'required',
            //'new_password' => 'required|confirmed'
        ]);

        $uid = $request->id;

        // Update the record to DB
        User::findOrFail($uid)->update([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->userStatus,
            'role' => $request->roleSelect,
            'updated_at' => now()
            //'password' => Hash::make($request->new_password)
        ]);


        $notification = array(
            'message' => 'User Details Updated Successfully',
            'alert-type' => 'success'
        );

        // page refresh
        return redirect()->route('admin.view.users')->with($notification);

        //$registeredUsers = User::latest()->get();
       
        //return view('admin.admin_view_users',compact('registeredUsers'))->with($notification);

    }   

    // Delete user from DB
    public function AdminDeleteUser($id){

        User::findOrFail($id)->delete();

        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'success'
        );

        // page refresh
        return redirect()->back()->with($notification);        

    }


  // User's updated password
  public function AdminUpdateUserPassword(Request $request){

  
        //validation
        $request->validate([
            'new_password' => 'required|confirmed'
        ]);

        $uid = $request->userid_reset;

        // should match the old password
       /* if (!Hash::check($request->old_password, auth::user()->password)){

            $notification = array(
                'message' => 'Old Password does not match!',
                'alert-type' => 'error'
            );
    
            // page refresh
            return back()->with($notification);
        } */


        // Update user password
        User::findOrFail($uid)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Password reset Successfully',
            'alert-type' => 'success'
        );

        // page refresh
        return redirect()->route('admin.view.users')->with($notification);

        //return view('admin.admin_profile_view',compact('profileData'));

    }        





} # end of controller
