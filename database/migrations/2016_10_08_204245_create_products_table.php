<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('status_product_id')->unsigned();
//            $table->integer('coin_id')->unsigned();
            $table->string('name')->unique();
            $table->string('url')->unique();
            $table->text('description')->nullable();
            $table->text('bar_code');
            $table->integer('stock');
            $table->text('image')->nullable();
            $table->float('price',14,5);
            $table->boolean('active')->nullable()->default(false);
            $table->timestamps();

            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')
                ->on('categories')->onDelete('cascade');
//            $table->foreign('coin_id')->references('id')
//                ->on('coins')->onDelete('cascade');
            $table->foreign('type_product_id')->references('id')
                ->on('type_products')->onDelete('cascade');
            $table->foreign('status_product_id')->references('id')
                ->on('status_products')->onDelete('cascade');
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
