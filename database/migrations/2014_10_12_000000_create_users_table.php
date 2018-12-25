<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('avatar')->default('default.jpg');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('tp')->nullable()->unique();
            $table->date('birthday');
            $table->bigInteger('IDC')->unique();;
            $table->string('course')->nullable();
            $table->string('intake')->nullable();
            $table->string('phone_number');
            $table->string('department')->nullable();
            $table->string('token_2fa')->nullable();
            $table->datetime('token_2fa_expiry')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
