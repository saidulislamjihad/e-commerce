<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalInformationToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->longText('product_address');
            $table->string('shipping_to');
            $table->float('shipping_charge', 8, 2);
            $table->string('delivery_time');
            $table->string('seo_title')->nullable();
            $table->longText('seo_description')->nullable();
            $table->text('seo_keyword')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            Schema::dropIfExists('products');
        });
    }
}
