<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMedia extends Model
{
    use HasFactory;
    protected $table = "project_media";
    protected $primaryKey = "id";
    protected $fillable = [
        'project_id',
        'link',
        'in_main_page',
        'mime',
        'asset_id',
        'public_id',
    ];
    protected $timestamp = true;

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
