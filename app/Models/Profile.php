<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'profiles';

    protected $fillable = ['user_id', 'user_name', 'user_email', 'role_id'];

    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function role() 
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
