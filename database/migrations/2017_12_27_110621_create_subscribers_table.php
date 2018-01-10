<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::HasTable('subscribers'))
        {
            Schema::create('subscribers', function (Blueprint $table) 
            {
                $table->increments('id');
                $table->string('name',100);
                $table->string('email',200);
                $table->string('subject',255);
                $table->text('description');
                $table->string('gender');
                $table->string('news',255); 
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscribers');
    }
}
