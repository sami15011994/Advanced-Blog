<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
			Schema::create('post_category', function (Blueprint $table) {
			$table->unsignedBigInteger('post_id');
			$table->unsignedBigInteger('category_id');
			$table->timestamps();
			$table->primary(['post_id', 'category_id']);
			$table->foreign('post_id')->references('id')->on('posts');
			$table->foreign('category_id')->references('id')->on('categories');
			$table->boolean('is_primary')->default(false); //Additional attribute
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
