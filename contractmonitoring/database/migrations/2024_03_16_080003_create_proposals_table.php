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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('client_id');
            $table->enum('proposal_status',['draft','internal review','submitted','client review','on-hold','denied','approved'])->default
            ('draft');
            $table->timestamp('date_submitted')->nullable();
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
        Schema::dropIfExists('proposals');
    }
};
