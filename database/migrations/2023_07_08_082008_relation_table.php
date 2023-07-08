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
        Schema::table('user', function (Blueprint $table) {
            $table->foreign("role_id")->references("id")->on("role")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("divisi_id")->references("id")->on("divisi")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("user_mentor_id")->references("id")->on("user")->onDelete("cascade")->onUpdate("cascade");
        });

        Schema::table('silabus', function (Blueprint $table) {
            $table->foreign("user_mentor_id")->references("id")->on("user")->onDelete("cascade")->onUpdate("cascade");
        });

        Schema::table('materi', function (Blueprint $table) {
            $table->foreign("silabus_id")->references("id")->on("silabus")->onDelete("cascade")->onUpdate("cascade");
        });

        Schema::table('tugas', function (Blueprint $table) {
            $table->foreign("silabus_id")->references("id")->on("silabus")->onDelete("cascade")->onUpdate("cascade");
        });

        Schema::table('file', function (Blueprint $table) {
            $table->foreign("pengumpulan_id")->references("id")->on("pengumpulan")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("materi_id")->references("id")->on("materi")->onDelete("cascade")->onUpdate("cascade");
        });

        Schema::table('pengumpulan', function (Blueprint $table) {
            $table->foreign("tugas_id")->references("id")->on("tugas")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("user_pengumpulan_id")->references("id")->on("user")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropForeign(["role_id"]);
            $table->dropForeign(["divisi_id"]);
            $table->dropForeign(["user_mentor_id"]);
        });

        Schema::table('silabus', function (Blueprint $table) {
            $table->dropForeign(["user_mentor_id"]);
        });

        Schema::table('materi', function (Blueprint $table) {
            $table->dropForeign(["silabus_id"]);
        });

        Schema::table('tugas', function (Blueprint $table) {
            $table->dropForeign(["silabus_id"]);
        });

        Schema::table('file', function (Blueprint $table) {
            $table->dropForeign(["pengumpulan_id"]);
            $table->dropForeign(["materi_id"]);
        });

        Schema::table('pengumpulan', function (Blueprint $table) {
            $table->dropForeign(["tugas_id"]);
            $table->dropForeign(["user_pengumpulan_id"]);
        });
    }
};
