<?php
namespace Model;

/**
 * @Entity @Table(name="seance")
 **/
class Seance {
  /**
   * @var integer
   * @Id @Column(type="integer") @GeneratedValue
   */
  protected $id;

  /**
   * @var DateTime
   * @Column(type="datetime")
   */
  private $showing;


  /**
   * @var Film
   * @ManyToOne(targetEntity="Film", inversedBy="seances")
   */
  private $film;

  public function getShowing(){
    return $this->showing;
  }
  public function setShowing($showing){
    $this->showing = $showing;
  }
  public function getFilm(){
   return $this->film;
  }
  public function setFilm($film){
    $this->film = $film;
  }

  
}