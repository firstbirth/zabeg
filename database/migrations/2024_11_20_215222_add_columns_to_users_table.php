<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')->default(false);
            $table->integer('admin_perm')->default(0);
            $table->foreignId('races_id')->nullable()->constrained('races')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'is_admin')) {
                $table->dropColumn('is_admin');
            }

            // Проверка существования столбца admin_perm
            if (Schema::hasColumn('users', 'admin_perm')) {
                $table->dropColumn('admin_perm');
            }

            // Проверка существования внешнего ключа
            if (Schema::hasColumn('users', 'races_id')) {
                // Проверка наличия внешнего ключа через SQL
                $foreignKey = DB::select("SELECT constraint_name
                                      FROM information_schema.key_column_usage
                                      WHERE table_name = 'users'
                                      AND column_name = 'races_id'");

                if (count($foreignKey) > 0) {
                    $table->dropForeign(['races_id']);
                }

                $table->dropColumn('races_id');
            }
        });
    }
};
