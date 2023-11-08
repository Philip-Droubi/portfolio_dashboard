<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTech extends Model
{
    use HasFactory;
    protected $table = "project_techs";
    protected $primaryKey = "id";
    protected $fillable = [
        'project_id',
        'tech',
    ];
    protected $timestamp = true;

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
