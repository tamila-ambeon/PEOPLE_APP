<?php

namespace App\Http\Controllers\Api\BackupTraits;

use Illuminate\Support\Facades\Mail;
use App\Mail\BackupEmail;

trait EmailTrait
{
    public $emailSteps = [];
    public $isEmailSuccess = true;

    public function sendNotificationToEmail()
    {
        $time_start = microtime(true); 
        $files = [];
        
        if($this->pathToDBZip != null) {
            $files[] = public_path($this->pathToDBZip);
        }

        try {
            Mail::to('salabunv@ukr.net')->send(
                new BackupEmail(["files" => $files])
            );

            $this->emailSteps[] = 'email надіслано.';
        } catch(Exception $e) {
            $this->isEmailSuccess = false;
            $this->emailSteps[] = 'Помилка! email НЕ надіслано!';
        }
        
        $time_end = microtime(true);

        $this->logEmail(($time_end - $time_start));

    }

    public function logEmail($execTime)
    {
        $this->backup->email_json = json_encode([
            'steps' => $this->emailSteps,
            'success' => $this->isEmailSuccess,
            'executetion_time' => $execTime
        ], JSON_UNESCAPED_UNICODE);

        $this->backup->save();
    }

}