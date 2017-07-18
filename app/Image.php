<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'user_id','title', 'content', 'picture','public','size'
  ];

  public function user(){
    return $this->belongsTo('App\User');
  }
}
