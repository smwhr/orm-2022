<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;
class Seance extends Model{

  protected $table = 'seance';
  public    $timestamps = false;

  public $fillable = ['showing'];


  public function film(){
    return $this->belongsTo(Film::class);
  }

}