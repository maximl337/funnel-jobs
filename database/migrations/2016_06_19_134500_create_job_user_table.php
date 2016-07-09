<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('job_id')->unsigned();
            $table->decimal('bid_amount', 19, 4);
            $table->text('bid_message');
            $table->dateTime('accepted_at')->nullable();
            $table->dateTime('completed_at')->nullable();
            $table->timestamps();
        });

        Schema::table('job_user', function(Blueprint $table) {

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('job_id')
                ->references('id')->on('jobs')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('job_user');
    }
}
