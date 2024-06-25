<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReplySentToContactUsTable extends Migration
{
    public function up()
    {
        Schema::table('contact_us', function (Blueprint $table) {
            $table->boolean('reply_sent')->default(false);
        });
    }

    public function down()
    {
        Schema::table('contact_us', function (Blueprint $table) {
            $table->dropColumn('reply_sent');
        });
    }
}
