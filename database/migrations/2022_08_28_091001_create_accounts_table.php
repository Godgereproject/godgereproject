<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id('id_accounts');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('code_par');
            $table->string('password');
            $table->string('type_account');
            $table->string('email_validate')->default(1);
            $table->string('bio')->nullable();
            $table->string('profil_pic')->default("default_profil.jpg");
            $table->string('cover_pic')->default("default_cover.jpg");
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
        Schema::dropIfExists('accounts');
    }
}
