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
            $table->integer('department')->nullable();
            $table->integer('position')->nullable();
            $table->date('registration_date')->nullable();
            $table->date('suspension_date')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade');
        });
    }




    public function down()
    {
        Schema::dropIfExists('users');
    }
};
