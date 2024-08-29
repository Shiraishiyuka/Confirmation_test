<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
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
            $table->string('first_name',255);
            $table->string('last_name', 255);
            $table->enum('gender',['男性','女性','その他']);
            $table->string('email',255);
            $table->string('tell1',255);
            $table->string('tell2',255);
            $table->string('tell3',255);
            $table->string('address', 255);
            $table->string('building',255)->nullable();
            $table->string('inquiry');
            $table->text('content');
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
        Schema::dropIfExists('contacts');
    }
}
