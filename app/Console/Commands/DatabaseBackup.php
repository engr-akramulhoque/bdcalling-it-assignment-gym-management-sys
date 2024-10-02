<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use ZipArchive;

class DatabaseBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:db';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a database backup';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Database configuration
        $dbHost = env('DB_HOST');
        $dbPort = env('DB_PORT');
        $dbName = env('DB_DATABASE');
        $dbUser = env('DB_USERNAME');
        $dbPass = env('DB_PASSWORD');

        // Backup file name
        $backupFileName = 'backup_' . date('Y-m-d_H-i-s') . '.sql';

        // Backup directory
        $backupDir = storage_path('app/laravel');

        // Ensure the backup directory exists
        if (!file_exists($backupDir)) {
            mkdir($backupDir, 0755, true);
        }

        // Execute mysqldump command to create backup
        $command = sprintf(
            'mysqldump --host=%s --port=%s --user=%s --password=%s %s > %s',
            $dbHost,
            $dbPort,
            $dbUser,
            $dbPass,
            $dbName,
            $backupDir . '/' . $backupFileName
        );

        // Execute the command
        exec($command, $output, $returnValue);

        // Check if backup file was created successfully
        if ($returnValue === 0 && file_exists($backupDir . '/' . $backupFileName)) {
            // Create a ZIP archive containing the backup file
            $zip = new ZipArchive;
            $zipFileName = $backupDir . '/' . str_replace('.sql', '.zip', $backupFileName);
            if ($zip->open($zipFileName, ZipArchive::CREATE) === TRUE) {
                $zip->addFile($backupDir . '/' . $backupFileName, $backupFileName);
                $zip->close();
                // Delete the original backup file
                unlink($backupDir . '/' . $backupFileName);
                $this->info('Backup created successfully: ' . $zipFileName);
            } else {
                $this->error('Failed to create ZIP archive.');
            }
        } else {
            $this->error('Failed to create backup.');
        }
    }
}
