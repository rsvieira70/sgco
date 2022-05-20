<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('social_reason',60);
            $table->string('fancy_name',50);
            $table->string('administrative_responsibility',50);
            $table->string('responsible_dentist',50);
            $table->string('image',80)->nullable();
            $table->decimal('zip_code', 8,0);
            $table->string('address',70);
            $table->string('house_number',10);
            $table->string('complement',30)->nullable();
            $table->string('neighborhood',30);
            $table->string('city',50);
            $table->string('state',2);
            $table->decimal('ibge',7,0);
            $table->string('website',100)->nullable();
            $table->string('email',100)->nullable();
            $table->decimal('telephone',10,0)->nullable();
            $table->decimal('cell_phone',11,0)->nullable();
            $table->decimal('whatsapp',11,0)->nullable();
            $table->string('facebook',80)->nullable();
            $table->string('instagram',80)->nullable();
            $table->string('twitter',80)->nullable();
            $table->string('linkedin',80)->nullable();
            $table->decimal('cnpj',14,0);
            $table->string('state_registration',15)->nullable();
            $table->string('municipal_registration',15)->nullable();
            $table->date('opening_date');
            $table->date('suspension_date')->nullable();
            $table->longText('note')->nullable();
            $table->timestamps();
            $table->index('cnpj');

        });
    }

    public function down()
    {
        Schema::dropIfExists('tenants');
    }
};
