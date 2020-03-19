<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiscsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miscs', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->integer('member_id');
          $table->string('member_certified_id')->nullable();
          $table->string('pop_sent')->nullable();
          $table->string('join_fee_paid')->nullable();
          $table->date('date_pay_received')->nullable();
          $table->string('position')->nullable();
          $table->string('beneficiary_confirmed')->nullable();
          $table->string('beneficiary_id')->nullable();
          $table->string('spouse_confirmed')->nullable();
          $table->string('spouse_id')->nullable();
          $table->string('life_cover')->nullable();
          $table->string('status')->nullable();
          $table->date('date_received')->nullable();
          $table->date('date_processed')->nullable();
          $table->string('processed_by')->nullable();
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
        Schema::dropIfExists('miscs');
    }
}
