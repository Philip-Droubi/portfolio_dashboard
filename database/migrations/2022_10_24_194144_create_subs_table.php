<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('subs', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('IP');
            $table->string("country")->nullable();
            $table->string("city")->nullable();
            $table->string("region")->nullable();
            $table->string("code")->nullable();
            $table->string('key')->unique();
            $table->dateTime('deactive_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subs');
    }
};
