<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientcontracts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('client_id');
            $table->string('project_name');
             $table->date('contract_start');
            $table->date('contract_end');
            $table->date('contract_signed');
            $table->string('contract_filename');
            $table->enum('contract_status',['active','inactive','on-hold'])->default
            ('active');
            $table->bigInteger('createdby_user_id');
            $table->bigInteger('updatedby_user_id')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientcontracts');
    }
};
