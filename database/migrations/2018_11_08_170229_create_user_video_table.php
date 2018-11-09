<?php

use App\User;
use App\Video;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_video', function (Blueprint $table) {
            $table->increments('id');

            // Connected user
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            // Video
            $table->unsignedInteger('video_id');
            $table->foreign('video_id')->references('id')->on('videos');

            $table->timestamps();
        });

        $user1 = new User([
            'name' => 'User 1',
        ]);
        $user1->save();
        $user2 = new User([
            'name' => 'User 2',
        ]);
        $user2->save();

        $video1 = new Video([
            'title' => 'Title 1',
            'author' => 'Author 1',
            'views' => 10,
            'description_title' => 'Description title 1',
            'description' => 'Description 1',
        ]);
        $video1->save();
        $video1->users()->sync([$user1->id, $user2->id]);

        $video2 = new Video([
            'title' => 'Title 2',
            'author' => 'Author 2',
            'views' => 10,
            'description_title' => 'Description title 2',
            'description' => 'Description 2',
        ]);
        $video2->save();
        $video2->users()->sync([$user1->id, $user2->id]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_video');
    }
}
