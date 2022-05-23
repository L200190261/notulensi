<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRapatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapats', function (Blueprint $table) {
            $table->id('id_rapat');
            $table->foreignIdFor(User::class);
            $table->longText('id_asn')->nullable();
            $table->longText('id_non')->nullable();
            $table->string('penyelenggara');
            $table->string('tempat');
            $table->string('hari');
            $table->date('tanggal');
            $table->string('jam');
            $table->string('keterangan');
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
        Schema::dropIfExists('rapats');
    }
}
