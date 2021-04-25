<?php
 
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Quiz extends Model
{
    use SoftDeletes;

    public $table = 'quizzes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'module',
        'nb_qst',
        'time',
        'teacher_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

     public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }
}