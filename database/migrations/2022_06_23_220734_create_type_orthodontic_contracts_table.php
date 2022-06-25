<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_orthodontic_contracts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('tenant_id');
            $table->string('description', 50);
            $table->boolean('receive_bracket')->nullable();
            $table->integer('amount_orthodontic_bracket')->nullable();
            $table->float('orthodontic_bracket_price', 8, 2)->nullable();
            $table->boolean('receive_band')->nullable();
            $table->integer('amount_orthodontic_band')->nullable();
            $table->float('orthodontic_band_price', 12, 2)->nullable();
            $table->float('orthodontic_appliance_price', 12, 2)->nullable();
            $table->float('orthodontic_appliance_installation_price', 12, 2)->nullable();
            $table->float('orthodontic_appliance_maintenance_price', 12, 2)->nullable();
            $table->boolean('fixed_value_contract')->nullable();
            $table->boolean('suspended')->nullable();
            $table->timestamps();
            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_orthodontic_contracts');
    }
};
