<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electrum_wallets', function (Blueprint $table) {
            $table->id();
            //  $table->text('bitgo_id');
            // $table->string('currency');
            $table->longText('passphrase');
            $table->longText('seed_phrase');
            $table->string('label')->nullable();
            //  $table->json('keys')->nullable();
            // $table->json('keySignatures')->nullable();
            $table->json('metas')->nullable();
            // $table->text('resource')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('bitgo_wallets');
    }
};
