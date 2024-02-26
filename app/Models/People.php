<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class People extends Model
{
    use HasFactory, SoftDeletes;

    public function signs(): HasManyThrough
    {
        return $this->hasManyThrough(Sign::class, PeopleSign::class,
            'people_id', // Foreign key on the environments table...
            'id', // Foreign key on the deployments table...
            'id', // Local key on the projects table...
            'sign_id' // Local key on the environments table...
        );
    }

}
