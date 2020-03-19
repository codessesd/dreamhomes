<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_addresses', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->integer('member_id');
          $table->string('addr_line1');
          $table->string('addr_line2')->nullable();
          $table->string('surbub');
          $table->string('city');
          $table->string('area_code');
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
        Schema::dropIfExists('home_addresses');
    }
}
