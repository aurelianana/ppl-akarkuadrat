<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkarKuadratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akar_kuadrats', function (Blueprint $table) {
            $table->id();
            $table->double('angka');
            $table->double('hasil');
            $table->double('execution_time')->nullable();
            $table->enum('method', ['api', 'sql'])->default('api');
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
        Schema::dropIfExists('akar_kuadrats');
    }
}
