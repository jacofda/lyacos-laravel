<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Import the SQL dump file
        $sqlPath = base_path('lyacos-db.sql');
        
        if (!file_exists($sqlPath)) {
            throw new \Exception("SQL file not found: {$sqlPath}");
        }

        $sql = file_get_contents($sqlPath);
        
        // Split by statements and execute
        DB::unprepared($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop all tables created by the SQL import
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        $tables = ['apperances', 'books', 'contact_us', 'excerpts', 'formats', 
                   'forms', 'languages', 'media', 'primitives', 'publications', 
                   'readings', 'reviews', 'translations', 'users'];
        
        foreach ($tables as $table) {
            DB::statement("DROP TABLE IF EXISTS {$table}");
        }
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
};
