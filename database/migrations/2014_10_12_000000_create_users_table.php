<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('tenant_id');
            $table->uuid('uuid');
            $table->string('name',50);
            $table->string('social_name',50)->nullable();
            $table->string('nickname',30)->nullable();
            $table->string('social_security_number',20)->nullable();
            $table->date('birth')->nullable();
            $table->string('image')->nullable();
            $table->decimal('user_type',1,0);  //1-Master 2-Administrator 3-Users = 4-Patients
            $table->decimal('zip_code', 8,0)->nullable(); 
            $table->string('address',70)->nullable();
            $table->string('house_number',10)->nullable();
            $table->string('complement',30)->nullable();
            $table->string('neighborhood',30)->nullable();
            $table->string('city',50)->nullable();
            $table->string('state',2)->nullable();
            $table->decimal('ibge',7,0)->nullable();
            $table->decimal('telephone',10,0)->nullable();
            $table->decimal('cell_phone',11,0)->nullable();
            $table->decimal('whatsapp',11,0)->nullable();
            $table->decimal('telegram',11,0)->nullable();
            $table->string('facebook',80)->nullable();
            $table->string('instagram',80)->nullable();
            $table->string('twitter',80)->nullable();
            $table->string('linkedin',80)->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('position_id')->nullable();
            $table->date('registration_date')->nullable();
            $table->date('suspension_date')->nullable();
            $table->longText('user_note')->nullable();
            $table->longText('profile_note')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
            $table->index('social_security_number');
            $table->index('name');
            $table->index('social_name');
            $table->index('nickname');
        });
    }




    public function down()
    {
        Schema::dropIfExists('users');
    }
};
