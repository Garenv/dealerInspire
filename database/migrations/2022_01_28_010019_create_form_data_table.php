<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormDataTable extends Migration
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
            // Including the ->default('') so that the DB doesn't throw the error below.
            // SQLSTATE[HY000]: General error: 1364 Field 'full_name' doesn't have a default value
            $table->string('full_name')->default('');
            $table->string('email')->default('');
            $table->string('phone_number')->default('');
            $table->string('message')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_data');
    }
}
