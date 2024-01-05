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
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('p_id')->default(0);
            $table->string('name', 255)->default('');
            $table->string('path', 255)->default('');
            $table->string('title', 255)->default('');
            $table->string('icon', 100)->default('');
            $table->unsignedInteger('sort')->default(0);
            $table->string('component', 100)->default('');
            $table->string('meta', 255)->default('');
            $table->boolean('hidden')->unsigned()->default(true);
            $table->dateTime('created_at')->nullable()->useCurrent();
            $table->dateTime('updated_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
};
