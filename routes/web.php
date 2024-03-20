<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ClientController; // Client
use App\Http\Controllers\ClientContractController; // Client - Contract Relationship
use App\Http\Controllers\ProposalController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

// Admin Group - to protect the pages, user must be logged in first (USER MANAGEMENT)
Route::middleware(['auth','role:admin'])->group(function() {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    
    //post - saving to database
    Route::post('/admin/profile/update', [AdminController::class, 'AdminProfileUpdate'])->name('admin.profile.update');
   
    // link in the sidebar to access change password page
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
   
    ////post - saving to database - updated user password
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

    // View all registered users
    Route::get('/admin/view/users', [AdminController::class, 'AdminViewUsers'])->name('admin.view.users');

    // Add new user page
    Route::get('/admin/register/user', [AdminController::class, 'AdminRegisterUser'])->name('admin.register.user');   
    
    // Saving to database the new user information
    Route::post('/admin/store/newuser', [AdminController::class, 'AdminStoreNewUser'])->name('admin.store.newuser');      

    // Edit user page
    Route::get('/admin/edit/user/{id}', [AdminController::class, 'AdminEditUser'])->name('admin.edit.user');      

    // Saving to database the edit user information
    Route::post('/admin/store/edit', [AdminController::class, 'AdminStoreEditUser'])->name('admin.store.edituser');      

    // Deleting user info from DB
    Route::get('/admin/delete/user/{id}', [AdminController::class, 'AdminDeleteUser'])->name('admin.delete.user');      

    // Saving to database the updated user password
    Route::post('/admin/update/userpassword', [AdminController::class, 'AdminUpdateUserPassword'])->name('admin.update.userpassword');


    Route::get('/admin/dboard', [AdminController::class, 'AdminDBoard'])->name('admin.dboard');

}); // end of Admin middleware

// Sales Group 
Route::middleware(['auth','role:sales'])->group(function() {
    Route::get('/sales/dashboard', [SalesController::class, 'SalesDashboard'])->name('sales.dashboard');
    Route::get('/sales/logout', [SalesController::class, 'SalesLogout'])->name('sales.logout');
    Route::get('/sales/profile', [SalesController::class, 'SalesProfile'])->name('sales.profile');
    Route::post('/sales/profile/update', [SalesController::class, 'SalesProfileUpdate'])->name('sales.profile.update');
    Route::get('/sales/change/password', [SalesController::class, 'SalesChangePassword'])->name('sales.change.password');
    Route::post('/sales/update/password', [SalesController::class, 'SalesUpdatePassword'])->name('sales.update.password');

   
}); // end of Sales middleware


// Sales Group - to protect the pages, user must be logged in first (CLIENT and CONTRACT MANAGEMENT)
Route::middleware(['auth','role:sales'])->group(function() {

    // Sales Controller routes 
    Route::controller(SalesController::class)->group(function(){

        // Client Management
        Route::get('/sales/all/client', 'SalesAllClient')->name('sales.all.client');
        Route::get('/sales/new/client', 'SalesNewClient')->name('sales.new.client');
        Route::post('/sales/store/client', 'SalesStoreNewClient')->name('sales.store.newclient');
        Route::get('/sales/edit/client/{id}', 'SalesEditClient')->name('sales.edit.client');
        Route::post('/sales/save/editclient', 'SalesSaveEditClient')->name('sales.save.editclient');
        Route::get('/sales/delete/client/{id}', 'SalesDeleteClient')->name('sales.delete.client');

        // CONTRACT Management
        Route::get('/sales/all/contracts', 'SalesAllContracts')->name('sales.all.contracts');
        Route::get('/sales/new/contract', 'SalesNewContract')->name('sales.new.contract');
        Route::post('/sales/store/newcontract', 'SalesStoreNewContract')->name('sales.store.newcontract');
        Route::get('/sales/edit/contract/{id}', 'SalesEditContract')->name('sales.edit.contract');
        Route::post('/sales/save/editcontract', 'SalesSaveEditContract')->name('sales.save.editcontract');
        Route::get('/sales/delete/contract/{id}', 'SalesDeleteContract')->name('sales.delete.contract');

        // SALES CONTRACTS REPORTS
        Route::get('/sales/all/expire/contracts', 'SalesAllExpireContracts')->name('sales.all.expire.contracts');
        Route::get('/sales/new/contracts/report', 'SalesNewContractsReport')->name('sales.new.contracts.report');
        Route::get('/sales/new/clients/report', 'SalesNewClientsReport')->name('sales.new.clients.report');

    });

    // Proposal Controller routes
    Route::controller(ProposalController::class)->group(function(){

        Route::get('/sales/all/proposals', 'SalesAllProposals')->name('sales.all.proposals');
        Route::get('/sales/new/proposal', 'SalesNewProposal')->name('sales.new.proposal');
        Route::post('/sales/store/newproposal', 'SalesStoreNewProposal')->name('sales.store.newproposal');
        Route::get('/sales/edit/proposal/{id}', 'SalesEditProposal')->name('sales.edit.proposal');
        Route::post('/sales/save/editproposal', 'SalesSaveEditProposal')->name('sales.save.editproposal');
        Route::get('/sales/delete/proposal/{id}', 'SalesDeleteProposal')->name('sales.delete.proposal');



    });

});



// Admin Group - to protect the pages, user must be logged in first (CLIENT MANAGEMENT)
Route::middleware(['auth','role:admin'])->group(function() {

    // Client Controller routes
    Route::controller(ClientController::class)->group(function(){

        Route::get('/all/client', 'AllClient')->name('all.client');
        Route::get('/new/client', 'NewClient')->name('new.client');
        Route::post('/store/newclient', 'StoreNewClient')->name('store.newclient');
        Route::get('/edit/client/{id}', 'EditClient')->name('edit.client');
        Route::post('/save/editclient', 'SaveEditClient')->name('save.editclient');
        Route::get('/delete/client/{id}', 'DeleteClient')->name('delete.client');

        Route::get('/new/clients/report', 'NewClientsReport')->name('new.clients.report');

    });


    // Proposal Controller routes
    Route::controller(ProposalController::class)->group(function(){

        Route::get('/all/proposals', 'AllProposals')->name('all.proposals');
        Route::get('/proposal/new/proposal', 'NewProposal')->name('new.proposal');
        Route::post('/proposal/store/newproposal', 'StoreNewProposal')->name('store.newproposal');
        Route::get('/proposal/edit/proposal/{id}', 'EditProposal')->name('edit.proposal');
        Route::post('/proposal/save/editproposal', 'SaveEditProposal')->name('save.editproposal');
        Route::get('/delete/proposal/{id}', 'DeleteProposal')->name('delete.proposal');


    });    

});




// Client Contract Admin Group - to protect the pages, user must be logged in first (CLIENT CONTRACT MANAGEMENT)
Route::middleware(['auth','role:admin'])->group(function() {

    // Client Contract Controller routes
    Route::controller(ClientContractController::class)->group(function(){

        Route::get('/all/contracts', 'AllContracts')->name('all.contracts');
        Route::get('/new/contract', 'NewContract')->name('new.contract');
        Route::post('/store/newcontract', 'StoreNewContract')->name('store.newcontract');
        Route::get('/edit/contract/{id}', 'EditContract')->name('edit.contract');
        Route::post('/save/editcontract', 'SaveEditContract')->name('save.editcontract');
        Route::get('/delete/contract/{id}', 'DeleteContract')->name('delete.contract');

        // CONTRACTS REPORT
        Route::get('/all/expire/contracts', 'AllExpireContracts')->name('all.expire.contracts');
        Route::get('/new/contracts/report', 'NewContractsReport')->name('new.contracts.report');

    });

});

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');


