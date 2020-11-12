<?php 
namespace Controller;

use Model\Film;
use Model\Seance;

class TestController{

  public function __construct($entityManager){
    $this->entityManager = $entityManager;
  }

  public function get(){

    //ici notre code pour tester l'ORM
    $film = $this->entityManager->find(Film::class, 1);
    $seances = $film->getSeances();


    echo <<<EOD

        <h1>{$film->getTitle()}</h1>
        <ul>
    EOD;

    
    foreach ($seances as $seance) {
      echo "<li>
              {$seance->getShowing()->format("Y-m-d H:i:s")}
          </li>";
    }

    echo <<<EOD
        </ul>
    EOD;

  }

  public function create(){
    $film = new Film();
    $film->setTitle("Où est passée la septième compagnie ?");
    $film->setDuration(95);
    $film->setReleaseDate(new \DateTime("1973-12-13"));

    $seance = new Seance();
    $seance->setShowing(new \DateTime("2020-10-28 21:00:00"));
    //$seance->setFilm($film);
    $film->addSeance($seance);

    $seance2 = new Seance();
    $seance2->setShowing(new \DateTime("2020-10-29 21:00:00"));
    //$seance->setFilm($film);
    $film->addSeance($seance2);

    $this->entityManager->persist($seance);
    $this->entityManager->persist($seance2);
    $this->entityManager->persist($film);


    $this->entityManager->flush();

  }
  
}