<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->unsignedInteger('cashier_id');
            $table->timestamp('saleTime');
            $table->unsignedInteger('stock_id');
            $table->unsignedInteger('customer_id');
            $table->integer('quantity')->lenght(10)->unsigned();
            $table->integer('total_price')->lenght(10)->unsigned();
            $table->timestamps();
            
            $table->primary(['cashier_id', 'saleTime']);
            
            $table->foreign('cashier_id')
                ->references('id')->on('cashiers')
                ->onDelete('cascade');

            $table->foreign('stock_id')
                ->references('id')->on('stocks')
                ->onDelete('cascade');

            $table->foreign('customer_id')
                ->references('id')->on('customers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
