<?php

namespace App\Http\Controllers\Api\BackupTraits;

use Illuminate\Support\Facades\Schema;
use Config;
use DB;

use Spatie\DbDumper\DbDumper as Dumper;

trait LocalTrait
{
    public $localSteps = [];
    public $isLocalSuccess = true;
    public $pathToDBZip = null;


    public function createLocalBackup()
    {
        $time_start = microtime(true); 
        $this->getLastIdsFromAllTables();
        $this->createDatabaseDump();
        // $this->createFilesZIP();
        $time_end = microtime(true);


        $this->logLocal(($time_end - $time_start));
        
    }


    public function createDatabaseDump()
    {
        try {
            \Spatie\DbDumper\Databases\MySql::create()
            ->setDumpBinaryPath("/Users/Shared/DBngin/mysql/8.0.33/bin")
            ->setDbName(Config::get('database.connections.mysql.database'))
            ->setUserName(Config::get('database.connections.mysql.username'))
            ->setPassword(Config::get('database.connections.mysql.password'))
            ->setHost('127.0.0.1') // this line of code works on mac!
            ->dumpToFile('uploaded_files/backups/database__people-app.sql');

            $this->backup->db_size = \File::size(public_path('uploaded_files/backups/database__people-app.sql'));
            $this->backup->save();
            $this->localSteps[] = 'Бекап бази створено.';

            // $this->createDBZIP();

        } catch(Exception $e) {
            $this->isLocalSuccess = false;
        }

    }
    
    public function createDBZIP()
    {
        $zipFile = new \PhpZip\ZipFile();
        $path = public_path('uploaded_files');
        $name = "Hsow87dws";
        $p = $name . Config::get('filesystems.secret');

        $this->pathToDBZip = 'uploaded_files/backups/people_app_db_' . $name . '.zip';
        

        try {
            $zipFile
                // Дамп бази:
                ->addFile($path . '/backups/database__people-app.sql', 'database/database__people-app.sql')
                
                // Пароль:
                ->setPassword($p, \PhpZip\Constants\ZipEncryptionMethod::WINZIP_AES_256)

                // Назва файлу, в яких зберігаємо:
                ->setCompressionLevel(\PhpZip\Constants\ZipCompressionLevel::MAXIMUM)

                // Додаю незапаролений файл з інформацією:
                ->addFromString('info.txt', 
                    "Date: " . \Carbon\Carbon::now()->toDateTimeString() . PHP_EOL .
                    "Pass: " . $name . " + filesystems.secret" . PHP_EOL
                 )
                 
                ->saveAsFile($this->pathToDBZip)
                ->close();

                //$this->backup->zip_size = \File::size(public_path($this->pathToDBZip));
                //$this->backup->save();

        } catch(\PhpZip\Exception\ZipException $e) {

        }
    }

    public function createFilesZIP()
    {
        $zipFile = new \PhpZip\ZipFile();
        $path = public_path('uploaded_files');
        $name = "Hsow87dws";
        $p = $name . Config::get('filesystems.secret');

        $this->pathToDBZip = 'uploaded_files/backups/people_app_db_' . $name . '.zip';

        try {
            $zipFile
                // Дамп бази:
                ->addFile($path . '/backups/database__people-app.sql', 'database/database__people-app.sql')

                // Фотографії:
                ->addDirRecursive($path . '/photographs', 'uploaded_files/photographs')

                // Пароль:
                ->setPassword($p, \PhpZip\Constants\ZipEncryptionMethod::WINZIP_AES_256)

                // Назва файлу, в яких зберігаємо:
                ->setCompressionLevel(\PhpZip\Constants\ZipCompressionLevel::MAXIMUM)

                // Додаю незапаролений файл з інформацією:
                ->addFromString('info.txt', 
                    "Date: " . \Carbon\Carbon::now()->toDateTimeString() . PHP_EOL .
                    "Pass: " . $name . " + filesystems.secret" . PHP_EOL
                 )

                ->saveAsFile('uploaded_files/backups/people_app_' . $name . '.zip')
                ->close();

                $this->backup->zip_size = \File::size(public_path('uploaded_files/backups/people_app_' . $name . '.zip'));
                $this->backup->save();

                $this->localSteps[] = 'Архів файлів створено.';

        } catch(\PhpZip\Exception\ZipException $e) {
            // handle exception
            $this->localSteps[] = 'ПОМИЛКА. Архів файлів НЕ створено!';
            $this->isLocalSuccess = false;
        } finally {

        }



    }

    public function logLocal($execTime)
    {
        $this->backup->local_json = json_encode([
            'steps' => $this->localSteps,
            'success' => $this->isLocalSuccess,
            'executetion_time' => $execTime
        ], JSON_UNESCAPED_UNICODE);

        $this->backup->save();
    }
    
    /**
     * Get the last IDs from all tables.
     */
     public function getLastIdsFromAllTables()
     {
         $tables = DB::select('SHOW TABLES'); // This might vary depending on your database
 
         $lastIds = [];
 
         foreach ($tables as $table) {
             // The table names property differs based on the database driver
             $tableName = $table->{'Tables_in_' . Config::get('database.connections.mysql.database')};
 
             if (Schema::hasColumn($tableName, 'id')) {
                $lastId = DB::table($tableName)->latest('id')->first()?->id ?? null;
 
                $lastIds[$tableName] = $lastId;
             }
         }
 
         $this->backup->last_ids_json = json_encode($lastIds, JSON_UNESCAPED_UNICODE);
         $this->backup->save();
     }


}

