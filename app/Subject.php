<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use SoftDeletes;

    protected $dates = [
      'created_at',
      'updated_at',
      'deleted_at',
  ];
  protected $append = [
      'timeRemaining',
      'status',
  ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'subject_code', 'description', 'grade_id', 'deadline', 'created_at', 'updated_at', 'deleted_at',
    ];

    public function getRouteKeyName() {
         return 'slug';
     }

    public function questions() {
       return $this->hasMany(Question::class);
    }

    public function answers() {
        return $this->hasMany(Answer::class);
     }

     public function grade() {
         return $this->belongsTo(Grade::class);
     }

     public function forms() {

        return $this->hasMany(Form::class);
            
    }
}
