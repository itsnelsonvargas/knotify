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
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->string('salutation')->nullable(); 
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('ext_name')->nullable(); 
            $table->string('post_nominal')->nullable(); 
            $table->string('gender')->nullable();
            $table->date('birth_date')->nullable();   
            
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('phone_1st')->nullable(); 
            $table->string('phone_2nd')->nullable(); 
    
            // Use foreignId for better Laravel integration
            $table->foreignId('affiliation_id')->nullable()->constrained('affiliations')->onDelete('set null');
            
            $table->date('date_confirmed')->nullable(); 
            $table->boolean('is_allowed_to_invite')->default(false); 
            $table->integer('total_allowed_invites')->default(0);  
            $table->json('names_of_invites')->nullable();   
            
            $table->timestamps();
            $table->softDeletes(); // Better than is_deleted boolean
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
