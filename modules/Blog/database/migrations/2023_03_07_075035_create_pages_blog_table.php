<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Ellite\MigrationUtil;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages_blog', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
        Schema::create('pages_blog_translations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            MigrationUtil::translationsColumns($table, 'pages_blog', 'page_blog_id');
            
            $table->mediumtext('description')->nullable();
            $table->mediumtext('keywords')->nullable();
            
            $table->string('title')->nullable();
            $table->string('title_1')->nullable();
            
            $table->mediumtext('text')->nullable();
            $table->mediumtext('text_1')->nullable();
            $table->mediumtext('text_2')->nullable();
            $table->mediumtext('text_3')->nullable();
            $table->mediumtext('text_4')->nullable();
            
            $table->string('video')->nullable();
            $table->string('video_1')->nullable();
            $table->string('video_2')->nullable();
            $table->string('video_3')->nullable();
            $table->string('video_4')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages_blog_translations');
        Schema::dropIfExists('pages_blog');
    }
};
