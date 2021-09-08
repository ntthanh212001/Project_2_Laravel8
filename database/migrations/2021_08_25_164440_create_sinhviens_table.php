<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinhviensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinhviens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('masv')->unique();
            $table->string('hoten');
            $table->boolean('gioitinh');
            $table->date('ngaysinh');
            $table->string('phone',20)->unique();
            $table->string('address',200);
            $table->string('email')->unique();
            $table->string('password')->default('$2a$12$iApuCFcePiW66rrO8jVO5.xMnylVmfNUvvwhvhU8KsobbmRVYwqYe')->comment('123456');
            $table->integer('nganh_id')->unsigned();
            $table->foreign('nganh_id')->references('id')->on('nganhs')->onDelete('cascade');
            $table->integer('lop_id')->unsigned();
            $table->foreign('lop_id')->references('id')->on('lops')->onDelete('cascade');
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
        Schema::dropIfExists('sinhviens');
    }
}
