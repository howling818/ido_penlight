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
        Schema::create('t_member', function (Blueprint $table) {
            $table->unsignedInteger('id')->nullable(false)->autoIncrement()->comment('ID');
            $table->unsignedInteger('group_id')->nullable(false);
            $table->string('member_name', 255);
            $table->string('member_kana', 255)->default(null)->nullable(true);
            $table->string('member_nickname', 255)->default(null)->nullable(true);
            $table->date('birthday')->default(null)->nullable(true);
            $table->unsignedInteger('pen_light_id1')->default(null)->nullable(true);
            $table->unsignedInteger('pen_light_id2')->default(null)->nullable(true);
            $table->unsignedInteger('pen_light_id3')->default(null)->nullable(true);
            $table->string('twitter', 255)->default(null)->nullable(true);
            $table->string('instagram', 255)->default(null)->nullable(true);
            $table->string('tiktok', 255)->default(null)->nullable(true);
            $table->string('Youtube', 255)->default(null)->nullable(true);
            $table->tinyInteger('is_display')->default(1);
            $table->tinyInteger('is_active')->default(1);
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
        Schema::dropIfExists('t_member');
    }
};
