<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('membership_no')->nullable();
            $table->string('title')->nullable();
            $table->string('initials')->nullable();
            $table->string('f_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('surname')->nullable();
            $table->string('maiden_name')->nullable();
            $table->string('id_passport_no')->nullable();
            $table->string('tel_number')->nullable();
            $table->string('cell_number')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('insolvency')->nullable();
            $table->string('liquidation')->nullable();
            $table->string('application_type')->nullable();
            $table->string('completed_at')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('members');
    }
}
