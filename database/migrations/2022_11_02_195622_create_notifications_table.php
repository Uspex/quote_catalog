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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('object_id')->unsigned();
            $table->string('object_type')->default('quote');
            $table->string('source');
            $table->string('source_address');

            $table->text('message');
            $table->timestamp('send_at')->nullable();

            $table->timestamps();

            $table->index('object_id');
            $table->index('object_type');
            $table->index('send_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
};
