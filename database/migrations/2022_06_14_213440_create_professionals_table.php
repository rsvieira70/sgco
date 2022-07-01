<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('professionals', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('tenant_id');
            $table->uuid('uuid');
            $table->integer('patent');
            $table->string('name',50);
            $table->string('social_name',50);
            $table->string('nickname',30);
            $table->string('social_security_number',20);
            $table->string('inbde',30);
            $table->integer('inbde_state_id');
            $table->date('birth');
            $table->string('image')->nullable();
            $table->decimal('zip_code', 8,0); 
            $table->string('address',70);
            $table->string('house_number',10);
            $table->string('complement',30)->nullable();
            $table->string('neighborhood',30);
            $table->string('city',50);
            $table->string('state',2);
            $table->string('dceu',20);
            $table->decimal('telephone',10, 0)->nullable();
            $table->decimal('cell_phone',11,0);
            $table->decimal('whatsapp',11,0)->nullable();
            $table->decimal('telegram',11,0)->nullable();
            $table->string('facebook',80)->nullable();
            $table->string('instagram',80)->nullable();
            $table->string('twitter',80)->nullable();
            $table->string('linkedin',80)->nullable();
            $table->date('registration_date');
            $table->boolean('responsible_dentist')->nullable();
            $table->date('suspension_date')->nullable();
            $table->longText('note')->nullable();
            $table->string('email')->unique();
            $table->timestamps();
            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade');
            $table->foreign('inbde_state_id')->references('id')->on('states')->onDelete('cascade');
            $table->index('social_security_number');
            $table->index('name');
            $table->index('social_name');
            $table->index('nickname');
        });
    }

    public function down()
    {
        Schema::dropIfExists('professionals');
    }
};
