<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNextOfKinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('next_of_kin', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('member_id');
            $table->string('title')->nullable();
            $table->string('initials')->nullable();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('relationship')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('email')->nullable();
            $table->string('postal_address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('address_line_1')->nullable();
            $table->string('suburb')->nullable();
            $table->string('city')->nullable();
            $table->string('area_code')->nullable();
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
        Schema::dropIfExists('next_of_kin');
    }
}
