<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');

            $table->string('short_description')->nullable();

            $table->longText('full_description')->nullable();

            $table->longText('requirements')->nullable();

            $table->string('event_nature')->nullable();

            $table->string('address')->nullable();

            $table->boolean('top_rated')->default(0)->nullable();

            $table->string('salary');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
