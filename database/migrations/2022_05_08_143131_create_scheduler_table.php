<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheduler', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('group_id')->unsigned();
            $table->bigInteger('subject_id')->unsigned();
            $table->bigInteger('cabinet_id')->unsigned();
            $table->datetime('date');
            $table->timestamps();

            $table->foreign( 'group_id' )->references( 'id' )->on( 'groups' );
            $table->foreign( 'subject_id' )->references( 'id' )->on( 'subjects' );
            $table->foreign( 'cabinet_id' )->references( 'id' )->on( 'cabinets' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scheduler');
    }
}
