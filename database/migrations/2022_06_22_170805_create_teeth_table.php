<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Type\Integer;

return new class extends Migration
{
    public function up()
    {
        Schema::create('teeth', function (Blueprint $table) {
            $table->id();
            $table->integer('tooth_code')->index();
            $table->string('tooth_name', 50)->index();
            $table->boolean('mesial')->nullable();
            $table->boolean('distal')->nullable();
            $table->boolean('lingual')->nullable();
            $table->boolean('palatal')->nullable();
            $table->boolean('cervical')->nullable();
            $table->boolean('incisal')->nullable();
            $table->boolean('occlusal')->nullable();
            $table->boolean('buccal')->nullable();
            $table->boolean('multiple_teeth')->nullable();
            $table->boolean('suspended')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('teeth');
    }
};
