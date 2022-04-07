<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedInteger('tenant_id');
            $table->unsignedBigInteger('user_id');
            $table->string('social_name',50)->nullable();
            $table->string('nickname',30)->nullable();
            $table->date('birth')->nullable();
            $table->string('image',80)->nullable();
            $table->decimal('zip_code', 8,0);
            $table->string('address',70);
            $table->string('number',10);
            $table->string('complement',30)->nullable();
            $table->string('neighborhood',30);
            $table->string('city',50);
            $table->string('state',2);
            $table->decimal('ibge',7,0);
            $table->decimal('telephone',10,0)->nullable();
            $table->decimal('cell_phone',11,0)->nullable();
            $table->decimal('whatsapp',11,0)->nullable();
            $table->string('facebook',80)->nullable();
            $table->string('instagram',80)->nullable();
            $table->string('twitter',80)->nullable();
            $table->string('linkedin',80)->nullable();
            $table->decimal('cpf',12,0)->nullable();
            $table->longText('note')->nullable();
            $table->timestamps();
            $table->foreign('tenant_id')->references('id')->on('tenants')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->index('cpf');
        });
    }

    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
