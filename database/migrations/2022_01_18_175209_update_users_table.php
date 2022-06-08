<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('users', function (Blueprint $table) {
            $table->string('nif')->after('id')->unique();
            $table->string('last_name')->after('name');
            $table->string('phone_number')->unique()->after('password');
            $table->string('address')->after('phone_number')->nullable();
            $table->tinyInteger('status')->after('address')->default(0);
            $table->string('profile_picture')->nullable()->after('status');
            $table->unsignedBigInteger('role_id')->default(2)->after('profile_picture');
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['nif', 'last_name', 'phone_number', 'address', 'status', 'profile_picture','role_id']);
        });
    }
}
