<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_profile', function (Blueprint $table) {
            $table->id();

             $table->bigInteger('option_id')->unsigned()->default(0);
              $table->bigInteger('profile_id')->unsigned()->default(0);

            $table->timestamps();

            $table->foreign('option_id')->references('id')->on('options')
                ->onDelete('cascade')
                ->onUpdate('cascade');
                $table->foreign('profile_id')->references('id')->on('profiles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('option_profile');
    }
}
