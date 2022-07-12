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
            $table->integer('patent_id');
            $table->string('name',50)->index();
            $table->string('social_name',50)->index();
            $table->string('nickname',30)->index();
            $table->string('social_security_number',20)->index();
            $table->integer('specialty_id');
            $table->integer('council_id');
            $table->string('council_number',10);
            $table->integer('council_state_id');
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
            $table->boolean('make_clinical_budget')->nullable();
            $table->boolean('responsible_dentist')->nullable();
            $table->date('suspension_date')->nullable();
            $table->longText('note')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->unique();
            $table->timestamps();
            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade');
            $table->foreign('council_state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('council_id')->references('id')->on('councils')->onDelete('cascade');
            $table->foreign('specialty_id')->references('id')->on('specialties')->onDelete('cascade');
            $table->foreign('patent_id')->references('id')->on('patents')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('professionals');
    }
};
