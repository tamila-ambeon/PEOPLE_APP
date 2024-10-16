<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\People;

class History extends Model
{
    use HasFactory, SoftDeletes;

    public function person()
    {
        return $this->hasOne(People::class, 'id', 'people_id');
    }
}
