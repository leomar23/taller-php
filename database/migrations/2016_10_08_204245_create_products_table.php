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
            $table->integer('brand_id')->unsigned();
            $table->integer('supplier_id')->unsigned();
            $table->integer('status_product_id')->unsigned();
            $table->integer('coin_id')->unsigned();
            $table->integer('type_product_id');
            $table->string('name')->unique();
            $table->string('url')->unique();
            $table->string('title');
            //Talle
            //Color
            $table->text('description_short');
            $table->text('description');
            $table->text('address')->nullable();
            $table->text('cover_route');
            $table->text('video_route')->nullable();
            $table->text('tags')->nullable();
            $table->text('coord')->nullable();
            $table->float('price',14,5);
            $table->float('value_now',14,5);
            $table->boolean('active')->nullable()->default(false);
            $table->timestamps();

            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')
                ->on('categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')
                ->on('brands')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')
                ->on('suppliers')->onDelete('cascade');
            $table->foreign('coin_id')->references('id')
                ->on('coins')->onDelete('cascade');
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
