<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = "projects";
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'type',
        'desc',
        'code_site',
        'live_site',
        'more_code',
        'fem_link',
        'created_by',
    ];
    protected $timestamp = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function media()
    {
        return $this->hasMany(ProjectMedia::class, 'project_id');
    }

    public function techs()
    {
        return $this->hasMany(ProjectTech::class, 'project_id');
    }
}
