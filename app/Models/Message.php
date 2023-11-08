<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Message extends Model
{
    use HasFactory;
    protected $table = "messages";
    protected $primaryKey = "id";
    protected $fillable = ['name', 'email', 'subject', 'msg', 'checked', 'IP', 'country', 'city', 'region', 'code', 'answered_at'];
    protected $timestamp = true;

    public function answers()
    {
        return $this->hasMany(EmailAnswer::class, 'msg_id')->orderBy('created_at', 'Desc');
    }
    public function setSubjectAttribute($val)
    {
        $this->attributes['subject'] = Str::ucfirst($val);
    }
}
