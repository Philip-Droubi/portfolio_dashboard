<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('subject');
            $table->longText('msg');
            $table->boolean('checked')->default(0);
            $table->string('IP');
            $table->string("country")->nullable();
            $table->string("city")->nullable();
            $table->string("region")->nullable();
            $table->string("code")->nullable();
            $table->dateTime('answered_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
