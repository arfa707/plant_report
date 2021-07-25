<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_headers', function (Blueprint $table) {
            $table->id();
            $table->string('PLANT_ID', 50);
            $table->string('SERIAL_NO', 50);
            $table->foreignId('PRODUK_ID')->references('ID')->on('produks')->onDelete('restrict');
            $table->dateTime('DATE');
            $table->decimal('BERAT_SUPPLIER'. 16,2)->nullable();
            $table->decimal('QTY_DOC'. 16,2)->nullable();
            $table->string('TRANSPORTER'. 50);
            $table->string('PELANGGAN'. 50)->nullable();
            $table->decimal('BERAT1'. 16,2)->nullable();
            $table->decimal('BERAT2'. 16,2)->nullable();
            $table->decimal('NETT'. 16,2)->nullable();
            $table->decimal('NETTO'. 16,2)->nullable();
            $table->decimal('VARIANCE'. 16,2)->nullable();
            $table->decimal('RATA_RATA'. 16,2)->nullable();
            $table->decimal('LCL'. 16,2)->nullable();
            $table->decimal('UCL'. 16,2)->nullable();
            $table->decimal('TOLERANSI'. 16,2)->nullable();
            $table->decimal('BJ'. 16,2)->nullable();
            $table->string('SATUAN'. 10)->nullable();
            $table->string('PACKING_TYPE'. 10)->nullable();
            $table->string('GROUP_ITEM'. 10)->nullable();
            $table->decimal('BERAT_BONUS'. 16,2)->nullable();
            $table->decimal('QTY_BONUS'. 16,2)->nullable();
            $table->decimal('BJ_BONUS'. 10,4)->nullable();

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
        Schema::dropIfExists('registration_headers');
    }
}
