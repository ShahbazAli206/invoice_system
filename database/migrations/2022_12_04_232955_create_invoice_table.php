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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('invoice_no', 10);
            $table->string('customer_name');
            $table->string('status')->default('DRAFT');
            $table->string('amount_status')->default('UNPAID');
            $table->integer('quantity');
            $table->double('price');
            $table->string('amount_due', 10)->default(0);
            $table->string('total', 10)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wishlists');
    }
};
