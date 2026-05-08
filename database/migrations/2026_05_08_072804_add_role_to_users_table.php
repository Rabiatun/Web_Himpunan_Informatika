<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // role: 'mahasiswa' atau 'admin'
            $table->string('role')->default('mahasiswa')->after('email');
            $table->string('nim')->nullable()->after('role'); // khusus mahasiswa
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'nim']);
        });
    }
};
