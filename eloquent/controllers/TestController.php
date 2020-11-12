<?php 
namespace Controller;

use Model\Film;
use Model\Seance;

class TestController{


  private function e($message){
    echo $message."\n";
  }

  public function get(){
    global $argv;
    $this->e("GET ".$argv[3]."!");

    $film = Film::find($argv[3]);
    $this->e($film->title);

    foreach ($film->seances as $seance) {
      $this->e("\t- ".$seance->showing);
    }

  }

  public function create(){
    $this->e("CREATE !");

    $film = new Film();
    $film->title = "Shrek 2";
    $film->release_date = "2004-06-23";
    $film->duration = 105;

    $film->save();
  }

  public function addSeance(){
    global $argv;
    $film_id = $argv[3];
    $showing = $argv[4];

    $this->e("Ajoute une seance pour film {$film_id} à {$showing}");


    $film = Film::find($film_id);

    $seance = new Seance();
    $seance->showing = $showing;

    $film->seances()->save($seance);
    
  }


  public function test(){
    $this->e(Film::class);
    $this->e(Seance::class);
  }
}