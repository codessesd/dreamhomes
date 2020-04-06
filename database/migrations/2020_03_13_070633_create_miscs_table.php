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
          $table->string('membership_no')->nullable();
          $table->string('member_certified_id')->nullable()->default('Not Received');
          $table->string('pop')->nullable()->default('Not Received');
          $table->string('join_fee')->nullable()->default('Not Paid');
          $table->date('date_payment')->nullable();
          $table->integer('position')->nullable();
          $table->string('beneficiary')->nullable()->default('Not Confirmed');
          $table->string('beneficiary_id')->nullable()->default('Not Received');
          $table->string('nok')->nullable()->default('Not Confirmed');
          $table->string('nok_id')->nullable()->default('Not Received');
          $table->string('life_cover')->nullable()->default('No Life Cover');
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
