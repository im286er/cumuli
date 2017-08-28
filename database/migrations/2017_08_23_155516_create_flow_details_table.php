<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlowDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flow_details', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->integer('flow_id')->unsigned()->comment('流程ID');
            $table->integer('level')->unsigned()->comment('审批级别');
            $table->string('form')->nullable()->comment('表单地址');
            $table->string('view')->nullable()->comment('查看地址');
            $table->string('success')->nullable()->comment('成功回调地址');
            $table->string('fail')->nullable()->comment('失败回调地址');
            $table->text('check')->default('{"structures":[],"roles":[],"users":[]}')->comment('审核人');
            $table->timestamps();
            $table->unique(['flow_id', 'level']);
            $table->foreign('flow_id')->references('id')->on('flows');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flow_details');
    }
}
