<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Answer extends Model
{
    use SoftDeletes;

    public $table = 'answers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'mark',
        'answer',
        'answer2',
        'answer3',
        'answer4',
        'student_id',
        'question_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}