<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBancotipopagoinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bancotipopagoinfo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('entidad_id')->unsigned()->nullable();
            $table->enum('tipo_pago', ['efectivo', 'cheque', 'transferencia'])->nullable();
            $table->text('comentario_efectivo')->nullable();
            $table->string('nombre_cheque', 255)->nullable();
            $table->text('comentario_cheque')->nullable();
            $table->string('numero_cuenta', 100)->nullable();
            $table->string('nombre_transferencia', 255)->nullable();
            $table->integer('rnc')->nullable();
            $table->text('comentario_transferencia')->nullable();
            $table->enum('estatus', ['active', 'inactive']);
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->foreign('entidad_id')
                ->references('id')->on('entidadbancarias')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bancotipopagoinfo');
    }
}
