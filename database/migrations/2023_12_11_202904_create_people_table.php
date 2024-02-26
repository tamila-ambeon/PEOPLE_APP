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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('middlename')->nullable();
            $table->integer('gender')->default(0);
            $table->date('date_we_met')->nullable();
            $table->date('birth_date')->nullable();

            $table->text('adresses')->nullable();
            $table->text('contacts')->nullable();

            $table->integer('avatar_id')->default(0);    
            $table->text('resume')->nullable();            
            $table->text('weaknesses')->nullable();            

            $table->text('other_info')->nullable()->comment('Усі інші відомості про людину');

            $table->integer('range_x')->default(1000);
            $table->integer('range_y')->default(1000);
            
            // Лічильники:
            $table->integer('relationship_quality')->default(0);
            $table->integer('history_count')->default(0);
            $table->integer('photos_count')->default(0);
            

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
        Schema::dropIfExists('people');
    }
};
