<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFightersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fighters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',255);
            $table->string('image', 255)->nullable();
            $table->string('alias', 100)->unique();
            $table->text('description')->nullable();
            $table->string('nickname', 200)->nullable();
            $table->string('nationality', 200)->nullable();
            $table->string('date', 200)->nullable();
            $table->string('height', 200)->nullable();
            $table->string('arm_span', 200)->nullable();
            $table->string('w_category', 200)->nullable();
            $table->string('insta', 200)->nullable();
            $table->string('tw', 200)->nullable();
            $table->integer('wins')->default(0);
            $table->integer('loses')->default(0);
            $table->integer('not_heald')->default(0);
            $table->string('meta_title', 255)->nullable();
            $table->string('meta_description', 255)->nullable();
            $table->string('meta_keyword', 255)->nullable();
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
        Schema::dropIfExists('fighters');
    }
}
