<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('nik')->unique();
            $table->string('fullname');
            $table->integer('role_id');
            $table->integer('organization_id');
            $table->string('phone')->nullable();
            $table->integer('mobile_access')->default(0);
            $table->string('erp_id');
            $table->string('bank_name');
            $table->string('bank_account');
            $table->integer('has_npwp')->default(0);
            $table->string('postalcode_id');
            $table->text('address')->nullable();
            $table->dateTime('create_date', $precision = 0)->useCurrent();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('active')->default(0);
            $table->integer('cti_usage')->default(0);
            $table->integer('tmm')->default(0);
            $table->string('limit_days')->nullable();
            $table->string('limit_amount')->nullable();
            $table->string('warehouse_id');
            $table->string('profil_pic')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
