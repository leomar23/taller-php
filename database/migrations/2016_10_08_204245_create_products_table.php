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
            $table->integer('category_id')->unsigned();
            $table->integer('status_product_id')->unsigned();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->text('bar_code');
            $table->text('image')->nullable();
            $table->timestamps();
            //$table->integer('user_id')->unsigned();
            //$table->integer('type_product_id')->unsigned();
            //$table->string('url')->unique();
            //$table->integer('stock');
            //$table->boolean('active')->nullable()->default(false);

            
            $table->foreign('category_id')->references('id')
                ->on('categories')->onUpdate('cascade')->onDelete('cascade');            
            $table->foreign('status_product_id')->references('id')
                ->on('status_products')->onUpdate('cascade')->onDelete('cascade');
            /*$table->foreign('type_product_id')->references('id')
                ->on('type_products')->onUpdate('cascade')->onDelete('cascade');*/
            /*$table->foreign('user_id')->references('id')
                ->on('users')->onUpdate('cascade')->onDelete('cascade');*/
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
