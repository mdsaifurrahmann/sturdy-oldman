<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('notice_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('notices', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('desc');
            $table->date('date');
            $table->unsignedBigInteger('category_id');
            $table->string('time');
            $table->json('file');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('notice_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notice_categories');
        Schema::dropIfExists('notices');
    }
};
