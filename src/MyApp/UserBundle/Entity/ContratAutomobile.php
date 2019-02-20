<?php
/**
 * Created by PhpStorm.
 * User: rami
 * Date: 13/02/2019
 * Time: 05:36
 */

namespace MyApp\UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Class ContratAutomobile
 * @ORM\Entity()
 */
class ContratAutomobile
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idcontratautomobile;
    /**
     * @ORM\Column(type="date")
     */
    public $datedebut;
    /**
     * @ORM\Column(type="date")
     */
    public $datefin;

    /**
     * @return mixed
     */
    public function getIdcontratautomobile()
    {
        return $this->idcontratautomobile;
    }

    /**
     * @param mixed $idcontratautomobile
     */
    public function setIdcontratautomobile($idcontratautomobile)
    {
        $this->idcontratautomobile = $idcontratautomobile;
    }

    /**
     * @return mixed
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * @param mixed $datedebut
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;
    }

    /**
     * @return mixed
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * @param mixed $datefin
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;
    }

    /**
     * @return mixed
     */
    public function getTypecontratAuto()
    {
        return $this->typecontratAuto;
    }

    /**
     * @param mixed $typecontratAuto
     */
    public function setTypecontratAuto($typecontratAuto)
    {
        $this->typecontratAuto = $typecontratAuto;
    }
    /**
     * @ORM\Column(type="string")
     */
    public $typecontratAuto;





}