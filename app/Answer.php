<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use SoftDeletes;

    protected $dates = [
      'created_at',
      'updated_at',
      'deleted_at',
  ];

  protected $append = [
      'hash',
      'expired'
  ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'admin_id','subject_id', 'files', 'is_uploaded' , 'created_at', 'updated_at', 'deleted_at',
    ];


    public function subject() {
       return $this->belongsTo(Subject::class);
    }

    public function user() {
       return $this->belongsTo(Admin::class,'admin_id');
    }
}
