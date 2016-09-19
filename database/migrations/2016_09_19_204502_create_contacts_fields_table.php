<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value', 255);

            $table->integer('contact_id')->unsigned();
            $table->foreign('contact_id')
                        ->references('id')
                        ->on('contacts')
                        ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contacts_fields');
    }
}
