<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_logs', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->bigInteger('userId');
            $table->timestamp('usedTime');
            $table->string('currency');
            $table->decimal('price', 12, 2);
            $table->integer('methodId');
            $table->string('statement')->nullable();
            $table->string('place')->nullable();
            $table->string('address')->nullable();
            $table->string('location')->nullable();
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
        Schema::dropIfExists('m_logs');
    }
}
