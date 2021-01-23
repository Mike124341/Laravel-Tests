<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBandRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('band_requests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('band_admin_name');
            $table->string('request_sender_namde');
            $table->string('band_admin_id');
            $table->string('request_sender_id');
            $table->string('request_join_band_name');
            $table->boolean('accepted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('band_request');
    }
}
