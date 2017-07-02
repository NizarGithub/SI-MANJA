<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKegiatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('number');
            $table->string('name');
            $table->string('date');
            $table->string('kecamatan_code');
            $table->string('place');
            $table->string('created_by');
            $table->string('team');
            $table->string('pic');
            $table->string('note')->nullable();
            $table->text('description');
            $table->string('status');
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
        Schema::dropIfExists('kegiatan');
    }
}
