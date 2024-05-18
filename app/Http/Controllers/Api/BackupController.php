<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File as PeopleFile;

use App\Http\Controllers\Api\BackupTraits\LocalTrait;
use App\Http\Controllers\Api\BackupTraits\EmailTrait;
use App\Models\Backup;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use File;
use Config;


use Illuminate\Support\Facades\Mail;
use App\Mail\BackupEmail;

class BackupController extends Controller
{
    use LocalTrait, EmailTrait;
    
    public $backup = null;

    //
    public function filesSize() 
    {        
        return response()->json([
            "status" => 200,
            "message" => "Success request",
            "data" => ['files_size' => PeopleFile::sum('size')],
        ]);
    }

    public function backup() 
    {        
       $this->backup = new Backup;
       $this->backup->save();

       $this->createLocalBackup();

       // Надішли емайл з посиланнями на завантаження
       //$this->sendNotificationToEmail();

       Backup::where('id', '<', ($this->backup->id - 10))->delete();

        return response()->json([
            "status" => 200,
            "message" => "Success request",
            "data" => [],
        ]);
    }

    public function sendNotification() 
    {
        try {
            Mail::to(Config::get('mail.from.name'))->send(
                new BackupEmail()
            ); 
        } catch(Exception $e) { 
        }
    }
}
