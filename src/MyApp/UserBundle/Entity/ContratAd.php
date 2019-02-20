<?php
/**
 * Created by PhpStorm.
 * User: rami
 * Date: 10/02/2019
 * Time: 17:34
 */
namespace MyApp\UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 *
 * @ORM\Entity()
 */

class ContratAd
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id_contrat;
    /**
     * @ORM\Column(type="date")
     */
    public $date_debut;

    /**
     * @return mixed
     */
    public function getIdContrat()
    {
        return $this->id_contrat;
    }

    /**
     * @param mixed $id_contrat
     */
    public function setIdContrat($id_contrat)
    {
        $this->id_contrat = $id_contrat;
    }

    /**
     * @return mixed
     */
    public function getDateDebut()
    {
        return $this->date_debut;
    }

    /**
     * @param mixed $date_debut
     */
    public function setDateDebut($date_debut)
    {
        $this->date_debut = $date_debut;
    }

    /**
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->date_fin;
    }

    /**
     * @param mixed $date_fin
     */
    public function setDateFin($date_fin)
    {
        $this->date_fin = $date_fin;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }
    /**
     * @ORM\Column(type="date")
     */
    public $date_fin;
    /**
     * @ORM\Column(type="boolean" ,  options={"default"=false})
     */
    public $etat;
}