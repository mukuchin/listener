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
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->string("body", 255);
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->nullable();
            $table->string('image', 100)->nullable();
            $table->foreignId('question_id')->constrained()->OnDelete('cascade');
            $table->unsignedBigInteger('answer_id')->nullable();
            $table->softDeletes();
            $table->boolean('is_anonymous')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
};
