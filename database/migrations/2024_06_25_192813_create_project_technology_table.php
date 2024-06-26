<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * CREATE TABLE `project_technology` (
     * 
     *      `project_id` BIGINT UNSIGNED,
     *      FOREIGN KEY `project_id` REFERENCES projects(`id`),
     * 
     *      `technology_id` BIGINT UNISGNED,
     *      FOREIGN KEY `technology_id` REFERENCES technologies(`id`),
     * 
     *      PRIMARY KEY (`project_id`, `technology_id`)
     * 
     * 
     * )
     */
    public function up(): void
    {
        Schema::create('project_technology', function (Blueprint $table) {

            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->cascadeOnDelete();

            $table->unsignedBigInteger('technology_id');
            $table->foreign('technology_id')->references('id')->on('technologies')->cascadeOnDelete();

            $table->primary(['project_id', 'technology_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_technology');
    }
};
