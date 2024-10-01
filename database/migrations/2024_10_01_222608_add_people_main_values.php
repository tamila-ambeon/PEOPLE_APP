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
        Schema::table('people', function (Blueprint $table) {
            $table->integer('circle')->default(0)->comment('Круг: ближній, дальній, вороги');
            $table->integer('religion')->default(0)->comment('Релігійні погляди');
            $table->integer('wing')->default(0)->comment('Політичне крило: ліві чи праві?');
            $table->integer('weight')->default(0)->comment('Вага у суспільстві');
            $table->integer('radicalism')->default(0)->comment('Рівень радикальності');
            $table->integer('trust_in_person')->default(0)->comment('Чи довіряю я цій людині?');
            $table->integer('trust_in_me')->default(0)->comment('Чи відчуваю Я, що людина мені довіряє?');
            $table->integer('decision')->default(0)->comment('Рішення. Чи хочу я цю людину в своєму житті?');
            $table->integer('dangerous')->default(0)->comment('На скільки ця людина є небезпечною для мене?');
            $table->integer('respect_in_me')->default(0)->comment('Чи відчуваю я повагу до себе?');
            $table->integer('benefits_for_me')->default(0)->comment('Чим більше користі приносить, тим більше значення має слово цієї людини.
            Якщо ця людина для мене не є корисною, то навіщо я витрачаю на неї час?');

            $table->text('personal_resources')->nullable()->comment('Що ця людина може дати мені?');
            $table->text('potential_contributions')->nullable()->comment('Що я можу дати цій людині?');
            $table->text('vibe')->nullable()->comment('Який вайб випромінює? Що я відчуваю після спілкування з цією людиною?');
            $table->text('content_preferences')->nullable()->comment('Який контент споживає? Хто є кумиром людини? Ким ця людина захоплюється? Що її вражає?');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('people', function (Blueprint $table) {
            $table->dropColumn('circle');
            $table->dropColumn('wing');
            $table->dropColumn('weight');
            $table->dropColumn('religion');
            $table->dropColumn('radicalism');
            $table->dropColumn('trust_in_person');
            $table->dropColumn('trust_in_me');
            $table->dropColumn('decision');
            $table->dropColumn('dangerous');
            $table->dropColumn('respect_in_me');
            $table->dropColumn('benefits_for_me');
            $table->dropColumn('personal_resources');
            $table->dropColumn('potential_contributions');
            $table->dropColumn('vibe');
            $table->dropColumn('content_preferences');
        });
    }
};
