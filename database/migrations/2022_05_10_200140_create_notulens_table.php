<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotulensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notulens', function (Blueprint $table) {
            $table->id('id_notulen');
            $table->foreignIdFor(User::class);
            $table->foreignId('id_rapat');
            $table->string('tempat')->NULL();
            $table->string('hari')->NULL();
            $table->date('tanggal')->NULL();
            $table->string('jam')->NULL();
            $table->string('keterangan')->NULL();
            $table->string('isi')->NULL();
            $table->enum('status', ['Draft', 'Publish']);
            $table->string('file')->NULL();
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
        Schema::dropIfExists('notulens');
    }
}
