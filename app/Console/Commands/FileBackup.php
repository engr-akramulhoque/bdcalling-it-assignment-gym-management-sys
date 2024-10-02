<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ZipArchive;

class FileBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:folder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a file backup';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $sourceDirectory = public_path('static'); // public puth backup
        $sourceDirectory = storage_path('app/laravel');

        // Check if the source directory exists
        if (File::exists($sourceDirectory)) {
            // Create a zip file
            $zipFileName = 'backup_' . date('Y-m-d_H-i-s') . '.zip';
            $zipFilePath = storage_path('app/laravel/' . $zipFileName);

            $zip = new ZipArchive();
            if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
                // Add files to the zip file
                $files = new \RecursiveIteratorIterator(
                    new \RecursiveDirectoryIterator($sourceDirectory),
                    \RecursiveIteratorIterator::LEAVES_ONLY
                );

                foreach ($files as $name => $file) {
                    if (!$file->isDir()) {
                        $filePath = $file->getRealPath();
                        $relativePath = \substr($filePath, \strlen($sourceDirectory) + 1);

                        $zip->addFile($filePath, $relativePath);
                    }
                }

                $zip->close();

                $this->info("Backup created successfully.");
            } else {
                $this->error("Failed to create backup.");
            }
        } else {
            $this->error("Source directory does not exist.");
        }
    }
}
