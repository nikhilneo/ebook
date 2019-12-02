<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_id')->unsigned();
            $table->string('book_name');
            $table->float('price', 12, 2);
            $table->integer('quantity')->default(0)->unsigned();
            $table->integer('user_id')->unsigned();
            $table->float('grand_total', 12, 2);
            $table->enum('status', ['Cart', 'Removed', 'CheckedOut']) ->default('Cart');
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
        Schema::dropIfExists('cart');
    }
}
