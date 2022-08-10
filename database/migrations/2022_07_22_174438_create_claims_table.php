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
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->string('employee', 155)->comment('Employee name');
            $table->tinyInteger('department')->comment('Emp department: 1 - HR, 2 - Finance, 3 - IT');
            $table->tinyInteger('category')->comment('1 - Petrol, 2 - Meal, 3 - Office, 4 - Others');
            $table->integer('value')->comment('Value of the claim');
            $table->string('description', 155)->nullable();
            $table->string('filepath', 155)->comment('file path for attachment');
            $table->tinyInteger('status')->default(0)->comment('0 - Waiting for Approval or new, 1 - Approved, 9 - Rejected');
            $table->string('comment', 155)->nullable()->comment('Comment of status if any');
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
        Schema::dropIfExists('claims');
    }
};
