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
        Schema::create('signs', function (Blueprint $table) {
            $table->id();
            $table->text('title_women')->nullable()->comment('Назва ознаки жіноча');
            $table->text('title_men')->nullable()->comment('Назва ознаки чоловіча');
            $table->text('short_description')->nullable()->comment('Опис суті 1 реченням');
            $table->text('full_description')->nullable()->comment('Детальний опис ознаки');
            $table->integer('icon_id')->default(0)->comment('(32х32)px');  
            $table->integer('type_id')->default(0)->comment('-1/0/1');
            $table->integer('people_count')->default(0)->comment('Скільки я знаю таких людей');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('people_signs', function (Blueprint $table) {
            $table->id();
            $table->integer('people_id')->default(0);  
            $table->integer('sign_id')->default(0);  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('signs');
        Schema::dropIfExists('people_signs');
    }
};
