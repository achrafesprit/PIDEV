<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 13/02/2019
 * Time: 03:21
 */

namespace MyApp\UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Class RemboursementAutomobile
 * @ORM\Entity()
 */class RemboursementAutomobile
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idremboursment;
    /**
     * @ORM\OneToOne(targetEntity="SinistreAutomobile")
     * @ORM\JoinColumn(referencedColumnName="idautomobile")
     */
    private $Sinistreautomobile;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $user;


    /**
     * @ORM\Column(type="float")
     */
    private $estimation;
    /**
     * @ORM\Column(type="date")
     */
    private $dateremboursement;
    /**
     * @ORM\Column(type="float")
     */
    private $remboursementfinal;
    /**
     * @ORM\Column(type="string")
     */
    private $etat;


    /**
     * @return mixed
     */
    public function getIdremboursment()
    {
        return $this->idremboursment;
    }

    /**
     * @param mixed $idremboursment
     */
    public function setIdremboursment($idremboursment)
    {
        $this->idremboursment = $idremboursment;
    }

    /**
     * @return mixed
     */
    public function getSinistreautomobile()
    {
        return $this->Sinistreautomobile;
    }

    /**
     * @param mixed $Sinistreautomobile
     */
    public function setSinistreautomobile($Sinistreautomobile)
    {
        $this->Sinistreautomobile = $Sinistreautomobile;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
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
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getEstimation()
    {
        return $this->estimation;
    }

    /**
     * @param mixed $estimation
     */
    public function setEstimation($estimation)
    {
        $this->estimation = $estimation;
    }

    /**
     * @return mixed
     */
    public function getDateremboursement()
    {
        return $this->dateremboursement;
    }

    /**
     * @param mixed $dateremboursement
     */
    public function setDateremboursement($dateremboursement)
    {
        $this->dateremboursement = $dateremboursement;
    }

    /**
     * @return mixed
     */
    public function getRemboursementfinal()
    {
        return $this->remboursementfinal;
    }

    /**
     * @param mixed $remboursementfinal
     */
    public function setRemboursementfinal($remboursementfinal)
    {
        $this->remboursementfinal = $remboursementfinal;
    }








}