<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class EmailAnswer extends Model
{
    use HasFactory;
    protected $table = "email_answers";
    protected $primaryKey = "id";
    protected $fillable = ['msg_id', 'subject', 'body',];
    protected $timestamp = true;

    public function message()
    {
        return $this->belongsTo(Message::class, 'msg_id');
    }
    public function setSubjectAttribute($val)
    {
        $this->attributes['subject'] = Str::ucfirst($val);
    }
}
