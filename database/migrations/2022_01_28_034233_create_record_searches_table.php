<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordSearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_searches', function (Blueprint $table) {
            $table->id();
            $table->string('ip');
            $table->string('device');
            $table->string('navigator');
            $table->string('version');
            $table->string('searchCity');
            $table->string('searchCountryState');
            $table->string('countryId');
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
        Schema::dropIfExists('record_searches');
    }
}
