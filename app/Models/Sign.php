<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sign extends Model
{
    use HasFactory, SoftDeletes;

    public function people(): HasManyThrough
    {
        return $this->hasManyThrough(People::class, PeopleSign::class,
            'sign_id', // Foreign key on the environments table...
            'id', // Foreign key on the deployments table...
            'id', // Local key on the projects table...
            'people_id' // Local key on the environments table...
        );
    }
}
