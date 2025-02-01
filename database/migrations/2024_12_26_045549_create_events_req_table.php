<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsReqTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('events_req')) {
            Schema::create('events_req', function (Blueprint $table) {
                $table->string('event_name');
                $table->string('institute');
                $table->string('location');
                $table->string('mode');
                $table->date('start_date');
                $table->date('end_date');
                $table->timestamps();
            });
        }
    }
    

    public function down()
    {
        Schema::dropIfExists('events_req');
    }
}
