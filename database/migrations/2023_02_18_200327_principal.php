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
            $table->string('principal_name')->default('Principal');
            $table->string('qop')->default('QOP');
            $table->unsignedBigInteger('position')->default(1);
            $table->foreign('position')->references('id')->on('designations');
            $table->string('institute')->default('Institute');
            $table->text('pi')->default('PI');
            $table->text('pip')->default('PI');
            $table->mediumText('description')->default('Description');
            $table->mediumText('message')->default('Message');
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
