<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendingUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pending_users', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('f_name');
          $table->string('surname');
          $table->string('email');
          $table->string('contact_no');
          $table->string('email_token');
          $table->string('verify_token');
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
      Schema::dropIfExists('pending_users');
    }
}
