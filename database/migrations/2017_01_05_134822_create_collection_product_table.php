<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("collection_id")->unsigned();
            $table->foreign("collection_id")
                ->references("id")
                ->on("collections")
                ->onDelete("cascade");
            $table->integer("product_id")->unsigned();
            $table->foreign("product_id")
                ->references("id")
                ->on("products")
                ->onDelete("cascade");

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
        Schema::dropIfExists('collection_product');
    }
}
