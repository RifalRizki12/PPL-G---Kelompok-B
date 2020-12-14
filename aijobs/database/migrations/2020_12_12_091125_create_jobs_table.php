<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id');
            $table->integer('owner_id');
            $table->string('url');
            $table->string('job_name');
            $table->mediumText('job_descrip');
            $table->integer('job_capacity')->nullable();
            $table->string('job_image');
            $table->mediumText('job_req');
            $table->integer('job_salary');
            $table->tinyInteger('job_status')->default('0');
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
        Schema::dropIfExists('jobs');
    }
}
