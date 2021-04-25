<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;


class RoleUser extends Model
{
    //
    use SoftDeletes;

    public $table = 'role_user';
    public $timestamps = false ; 
protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

  

    protected $fillable = [
        'user_id',
        'role_id',
        'created_at',
        'updated_at',
        'deleted_at',  
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function role()
    {
        return $this->belongsTo(User::class, 'role_id');
    }
}
