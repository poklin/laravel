<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddPostTypeToCommentsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('comments', 'post_type'))
        {
        } else
        {
            Schema::table('comments', function (Blueprint $table)
            {
                $table->string('post_type')->nullable();
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table)
        {
            $table->dropColumn('post_type');
        });
    }
}
