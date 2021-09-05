<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonHocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monhocs', function (Blueprint $table) {
            $table->increments('id');
            // $table->string('mamon',10)->unique();
            $table->string('tenmon')->comment('tên môn học');
            $table->integer('sogio');
            $table->integer('hocki_id')->unsigned();
            $table->foreign('hocki_id')->references('id')->on('hockis')->onDelete('cascade');
            $table->integer('nganh_id')->unsigned();
            $table->foreign('nganh_id')->references('id')->on('nganhs')->onDelete('cascade');
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
        Schema::dropIfExists('monhocs');
    }
}
