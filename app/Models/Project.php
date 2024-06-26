<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'skill_id',
        'name',
        'project_description',
        'image',
        'project_url',
        'completion_date',
        'status',
    ];

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }
}
