<?php

namespace Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="film")
 **/
class Film{

  /**
   * @var integer
   * @Id @Column(type="integer") @GeneratedValue
  */
  protected $id;

  /**
   * @var string
   * @Column(type="string")
   */
  private $title;
  /**
   * @var int
   * @Column(type="integer")
   */
  private $duration;

  /**
   * @var DateTime
   * @Column(type="date")
   */
  private $release_date;

  /**
   * @var Seance[]
   * @OneToMany(targetEntity="seance", mappedBy="film", cascade={"persist"})
   */
  private $seances;

  public function __construct(){
    $this->seances = new ArrayCollection();
  }

  public function getId(){
    return $this->id;
  }

  public function getTitle(){
    return $this->title;
  }
  public function setTitle($title){
    $this->title = $title;
  }

  public function getDuration(){
    return $this->duration;
  }
  public function setDuration($duration){
    $this->duration = $duration;
  }

  public function getReleaseDate(){
    return $this->release_date;
  }
  public function setReleaseDate($release_date){
    $this->release_date = $release_date;
  }

  public function getSeances(){
    return $this->seances;
  }

  public function addSeance($seance){
    $this->seances->add($seance);
  }

}