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
            $table->string('name_product');
            $table->string('description');
            $table->string('image_product');
            $table->double('old_price');
            $table->double('price');
            $table->date('release_date');
            $table->integer('availability');
            $table->unsignedBigInteger('genre_id');
            $table->unsignedBigInteger('distributor_id');
            $table->timestamps();

            $table->foreign('genre_id')
                ->references('id')
                ->on('genres')
                ->onDelete('cascade');
            $table->foreign('distributor_id')
                ->references('id')
                ->on('distributors')
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
        Schema::dropIfExists('products');
    }
}
