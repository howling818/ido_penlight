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
        Schema::create('m_idol_group', function (Blueprint $table) {
            $table->unsignedInteger('id')->nullable(false)->autoIncrement()->comment('ID');
            $table->string('group_name', 255);
            $table->string('group_kana', 255)->default(null)->nullable(true);
            $table->string('url', 255)->default(null)->nullable(true);
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
        Schema::dropIfExists('m_idol_group');
    }
};
