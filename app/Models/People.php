<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class People extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = ["name", "surname", "middlename", "gender", "birth_date", "date_we_met", "adresses", "contacts", "other_info", "resume", "weaknesses", "avatar_id", "decision", "circle", 'wing', 'weight', 'religion', 'radicalism', 'trust_in_person', 'trust_in_me', 'dangerous', 'respect_in_me', 'benefits_for_me', "potential_contributions", "personal_resources", "vibe", "content_preferences"];


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
