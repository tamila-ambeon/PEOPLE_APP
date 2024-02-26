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
        Schema::create('backups', function (Blueprint $table) {
            $table->id();
            $table->integer('db_size')->default(0);  
            $table->integer('zip_size')->default(0);  
            $table->text('last_ids_json')->nullable();
            $table->text('local_json')->nullable();
            $table->text('email_json')->nullable();
            $table->text('google_json')->nullable();
            $table->text('telegram_json')->nullable();
            $table->text('discord_json')->nullable();
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
        Schema::dropIfExists('backups');
    }
};
