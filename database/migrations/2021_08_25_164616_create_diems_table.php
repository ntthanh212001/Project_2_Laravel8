<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diems', function (Blueprint $table) {
            $table->increments('id');
            // $table->string('madiem',10)->unique();
            $table->integer('diemlt');
            $table->integer('diemtt');
            $table->integer('diemtong');
            $table->integer('monhoc_id')->unsigned();
            $table->foreign('monhoc_id')->references('id')->on('monhocs')->onDelete('cascade');
            $table->integer('lop_id')->unsigned();
            $table->foreign('lop_id')->references('id')->on('lops')->onDelete('cascade');
            $table->integer('sinhvien_id')->unsigned();
            $table->foreign('sinhvien_id')->references('id')->on('sinhviens')->onDelete('cascade');
            $table->integer('giangvien_id')->unsigned();
            $table->foreign('giangvien_id')->references('id')->on('giangviens')->onDelete('cascade');

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
        Schema::dropIfExists('diems');
    }
}
