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
        Schema::create('institute_info', function (Blueprint $table) {
            $table->id();
            $table->text('institute_name')->default('Institute Name')->nullable();
            $table->string('location')->default('Location')->nullable();
            $table->mediumText('address')->default('Address')->nullable();
            $table->string('phone')->default('019000000')->nullable();
            $table->string('phone_2')->default('019000000')->nullable();
            $table->string('email')->default('mail@example.example')->nullable();
            $table->string('email_2')->nullable();
            $table->string('website')->default('www.example.com')->nullable();
            $table->text('logo');
            $table->text('institute_image');
            $table->text('image_left')->nullable();
            $table->text('image_right')->nullable();
            $table->text('favicon');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('whatsapp')->nullable();

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
        Schema::dropIfExists('institute_info');
    }
};
