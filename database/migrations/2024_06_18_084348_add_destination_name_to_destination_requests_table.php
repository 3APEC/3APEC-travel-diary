<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDestinationNameToDestinationRequestsTable extends Migration
{
    public function up()
    {
        Schema::table('destination_requests', function (Blueprint $table) {
            $table->string('destination_name')->after('id');
        });
    }

    public function down()
    {
        Schema::table('destination_requests', function (Blueprint $table) {
            $table->dropColumn('destination_name');
        });
    }
}
