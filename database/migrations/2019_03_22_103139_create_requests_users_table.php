<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateRequestsUsersTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('requests_users', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('request_id')->unsigned();
                $table->integer('user_id')->unsigned()->nullable();
                $table->string('email')->nullable();
                $table->boolean('paid');

                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('request_id')->references('id')->on('payment_requests')->onDelete('cascade');


            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('requests_users');
        }
    }
