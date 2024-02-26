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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->text('file_type')->nullable()->comment("Розділ, що це: фото, документ?");  
            $table->text('original_file_name')->nullable();
            $table->text('path')->nullable();
            $table->text('extension')->nullable();
            $table->integer('size')->default(0);  
            $table->integer('people_id')->default(0)->comment("Якої людини стосується");  
            $table->text('title')->nullable()->comment("Вводиться у відповідному розділі");  
            $table->text('content')->nullable()->comment("Вводиться у відповідному розділі");  
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
        Schema::dropIfExists('files');
    }
};
