<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiangViensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giangviens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hoten');
            $table->string('email')->unique();
            $table->string('password')->default('$2a$12$00S/d806OemZuOuYkbuiz.hMz9aSrzK/9oyQI76jC4tL.EhfZ0zAi')->comment('admin');
            $table->date('ngaysinh');
            $table->boolean('gioitinh');
            $table->string('phone',10)->unique();
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('giangviens');
    }
}
