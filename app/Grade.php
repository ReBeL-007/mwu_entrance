<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grade extends Model
{
    use SoftDeletes;

    protected $dates = [
      'created_at',
      'updated_at',
      'deleted_at',
  ];
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'program_id', 'created_at', 'updated_at', 'deleted_at', 
    ];

    // public function getRouteKeyName() {
    //      return 'slug';
    //  }

    public function subjects() {
       return $this->hasMany(Subject::class);
    }

    public function program() {
        return $this->belongsTo(Program::class);
    }
}
