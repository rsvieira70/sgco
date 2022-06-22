<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bank_slip_types', function (Blueprint $table) {
            $table->id();
            $table->string('description', 50);
            $table->boolean('pay_commission');
            $table->boolean('issue_invoice');
            $table->boolean('used_financial_agreement');
            $table->boolean('pay_receipt');
            $table->boolean('suspended')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('bank_slip_types');
    }
};
