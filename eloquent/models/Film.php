<?php
namespace Model;

use Illuminate\Database\Eloquent\Model;


class Film extends Model{
  protected $table = 'film';
  public    $timestamps = false;
  protected $fillable = ["title", "duration", "release_date"];

  public function seances(){
    return $this->hasMany(Seance::class);
  }
}