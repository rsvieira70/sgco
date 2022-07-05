<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('patents', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('short_name', 10);
            $table->boolean('suspended')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('patents');
    }
};
