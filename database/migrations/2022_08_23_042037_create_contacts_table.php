<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('subject');
            $table->text('message');
            $table->timestamps();// дата создания и изменения записи

//            Создаём связанные таблицы
//            $table->bigInteger('user_id')->unsigned()->nullable();
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

//            Создаём связанные таблицы, только синтаксис покороче
//            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
};
