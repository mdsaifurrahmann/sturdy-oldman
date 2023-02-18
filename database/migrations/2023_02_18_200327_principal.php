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
        Schema::create('principal', function (Blueprint $table) {
            $table->id();
            $table->string('principal_name');
            $table->string('qop');
            $table->string('position');
            $table->string('institute');
            $table->text('pi');
            $table->text('pip');
            $table->mediumText('description');
            $table->mediumText('message');
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
        Schema::dropIfExists('principal');
    }
};
