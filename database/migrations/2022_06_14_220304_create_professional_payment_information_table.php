<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('professional_payment_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('tenant_id');
            $table->unsignedInteger('professional_id');
            $table->integer('maintenance_payment_type');
            $table->float('maintenance_payment_amount', 12, 2)->nullable();
            $table->integer('clinical_payment_type');
            $table->float('clinical_payment_amount', 12, 2)->nullable();
            $table->float('fixed_value', 12, 2)->nullable();
            $table->integer('cut_off_day_for_payment');
            $table->integer('day_for_payment');
            $table->integer('pix_key_type');
            $table->string('pix_key')->nullable();
            $table->timestamps();
            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade');
            $table->foreign('professional_id')->references('id')->on('professionals')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('professional_payment_information');
    }
};
