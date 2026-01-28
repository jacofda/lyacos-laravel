<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DatabaseBackup extends Command
{
    protected $signature = 'db:backup {--filename=backup.sql}';
    protected $description = 'Create a MySQL dump of the database';

    public function handle()
    {
        $filename = $this->option('filename');
        $ds = DIRECTORY_SEPARATOR;
        
        $host = config('database.connections.mysql.host');
        $database = config('database.connections.mysql.database');
        $username = config('database.connections.mysql.username');
        $password = config('database.connections.mysql.password');
        
        $backupPath = database_path('backups');
        
        if (!is_dir($backupPath)) {
            mkdir($backupPath, 0755, true);
        }
        
        $fullPath = $backupPath . $ds . $filename;
        
        $command = sprintf(
            'mysqldump -h%s -u%s -p%s %s > %s',
            escapeshellarg($host),
            escapeshellarg($username),
            escapeshellarg($password),
            escapeshellarg($database),
            escapeshellarg($fullPath)
        );
        
        $this->info('Creating database backup...');
        
        exec($command, $output, $returnVar);
        
        if ($returnVar === 0) {
            $this->info("Database backup created successfully: {$fullPath}");
            $this->info("File size: " . number_format(filesize($fullPath) / 1024 / 1024, 2) . " MB");
        } else {
            $this->error('Database backup failed!');
        }
        
        return $returnVar;
    }
}
