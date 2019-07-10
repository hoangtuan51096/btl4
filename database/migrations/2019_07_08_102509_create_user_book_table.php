<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_book', function (Blueprint $table) {
            $table->unsignedbigInteger('user_id');
            $table->foreign('user_id')
                  ->references('id')->on('users');
            $table->unsignedbigInteger('book_id');
            $table->foreign('book_id')
                  ->references('id')->on('books');
            $table->integer('status');
            $table->dateTime('end_at')->nullable();
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
        Schema::dropIfExists('users_books');
    }
}
