<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('sub_cat_id');
            $table->unsignedBigInteger('vendor_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('name');
            $table->string('slug');
            $table->integer('qty');
            $table->float('regular_price', 8, 2);
            $table->float('discount_price', 8, 2)->nullable();
            $table->float('buy_price', 8, 2)->nullable();
            $table->float('inside_dhaka', 8, 2);
            $table->float('outside_dhaka', 8, 2);
            $table->string('sku')->unique();
            $table->string('stock');
            $table->text('short_description');
            $table->text('long_description');
            $table->float('vat_tax', 8, 2);
            $table->string('image');
            $table->string('product_type');
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('products');
    }
}
