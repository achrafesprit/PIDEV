<?php
/**
 * Created by PhpStorm.
 * User: Chourouk
 * Date: 2/12/2019
 * Time: 2:06 PM
 */

namespace MyApp\UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 *
 * @ORM\Entity()
 */
class ContratVoyage
{
    /**
     * @return mixed
     */
    public function getIdContratV()
    {
        return $this->id_contratV;
    }

    /**
     * @param mixed $id_contratV
     */
    public function setIdContratV($id_contratV)
    {
        $this->id_contratV = $id_contratV;
    }

    /**
     * @return mixed
     */
    public function getDateDepart()
    {
        return $this->date_depart;
    }

    /**
     * @param mixed $date_depart
     */
    public function setDateDepart($date_depart)
    {
        $this->date_depart = $date_depart;
    }

    /**
     * @return mixed
     */
    public function getDateArrive()
    {
        return $this->date_arrive;
    }

    /**
     * @param mixed $date_arrive
     */
    public function setDateArrive($date_arrive)
    {
        $this->date_arrive = $date_arrive;
    }

    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->Pays;
    }

    /**
     * @param mixed $Pays
     */
    public function setPays($Pays)
    {
        $this->Pays = $Pays;
    }

    /**
     * @return mixed
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * @param mixed $duree
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;
    }

    /**
     * @return mixed
     */
    public function getNumeroPass()
    {
        return $this->numero_pass;
    }

    /**
     * @param mixed $numero_pass
     */
    public function setNumeroPass($numero_pass)
    {
        $this->numero_pass = $numero_pass;
    }

    /**
     * @return mixed
     */
    public function getDateIssue()
    {
        return $this->date_issue;
    }

    /**
     * @param mixed $date_issue
     */
    public function setDateIssue($date_issue)
    {
        $this->date_issue = $date_issue;
    }

    /**
     * @return mixed
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * @param mixed $montant
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;
    }
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id_contratV;
    /**
     * @ORM\Column(type="date")
     */
    public $date_depart;
    /**
     * @ORM\Column(type="date")
     */
    public $date_arrive;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $Pays;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $duree ;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $numero_pass ;
    /**
     * @ORM\Column(type="date")
     */
    public $date_issue;

    /**
     * @ORM\Column(type="float")
     */
    private $montant;
}