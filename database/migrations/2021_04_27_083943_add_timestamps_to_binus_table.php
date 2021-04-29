<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToBinusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gunabayar', function (Blueprint $table) {
            $table->timestamps();
            $table->renameColumn('idgunabayar', 'id');
        });
        Schema::table('kelas', function (Blueprint $table) {
            $table->timestamps();
            $table->renameColumn('idkelas', 'id');
        });
        Schema::table('keterangan', function (Blueprint $table) {
            $table->timestamps();
            $table->renameColumn('idket', 'id');
        });
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->timestamps();
            $table->renameColumn('idpembayaran', 'id');
        });
        Schema::table('pengeluaran', function (Blueprint $table) {
            $table->timestamps();
            $table->renameColumn('idpengeluaran', 'id');
        });
        Schema::table('siswa', function (Blueprint $table) {
            $table->timestamps();
            $table->renameColumn('idsiswa', 'id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gunabayar', function (Blueprint $table) {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
        Schema::table('kelas', function (Blueprint $table) {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
        Schema::table('keterangan', function (Blueprint $table) {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
        Schema::table('pengeluaran', function (Blueprint $table) {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
        Schema::table('siswa', function (Blueprint $table) {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }
}
