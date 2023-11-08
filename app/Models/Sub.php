<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub extends Model
{
    use HasFactory;
    protected $table = "subs";
    protected $primaryKey = "id";
    protected $fillable = ['email', 'IP', 'country', 'city', 'region', 'code', 'key', 'Deactive_at'];
    protected $timestamp = true;

    public function setEmailAttribute($val)
    {
        $this->attributes['email'] = strtolower($val);
    }
}
