<?php
/**
 * Created by PhpStorm.
 * User: rami
 * Date: 16/02/2019
 * Time: 19:03
 */

namespace MyApp\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Class DossierSinistreAutomobile
 * @ORM\Entity()
 */
class DossierSinistreAutomobile
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */

    private $idDossierSinistreAutomobile;
    /**
     * @ORM\OneToOne(targetEntity="SinistreAutomobile")
     * @ORM\JoinColumn(referencedColumnName="idautomobile")
     */
    private $SinistreAutomobile;

    /**
     * @return mixed
     */
    public function getIdDossierSinistreAutomobile()
    {
        return $this->idDossierSinistreAutomobile;
    }

    /**
     * @param mixed $idDossierSinistreAutomobile
     */
    public function setIdDossierSinistreAutomobile($idDossierSinistreAutomobile)
    {
        $this->idDossierSinistreAutomobile = $idDossierSinistreAutomobile;
    }
    /**
     * @ORM\ManyToOne(targetEntity="ContratAutomobile")
     * @ORM\JoinColumn(referencedColumnName="idcontratautomobile")
     */
    private $ContratAutomobile;
    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $user;
    /**
     * @ORM\Column(type="string",length=3)
     */
    private $toutrsique;
    /**
     * @ORM\Column(type="string",length=3)
     */
    private $standard;
    /**
     * @ORM\Column(type="string",length=3)
     */
    private $entreeinterdit;
    /**
     * @ORM\Column(type="string",length=3)
     */
    private $depassefeuoustop;
    /**
     * @ORM\Column(type="string",length=3)
     */
    private $depassevitessemaximale;
    /**
 * @ORM\Column(type="string",length=3)
 */
    private $moteur;
    /**
     * @ORM\Column(type="string",length=3)
     */
    private $carcase;
    /**
     * @ORM\Column(type="string",length=3)
     */
    private $remarquage;
    /**
     * @ORM\Column(type="string",length=3)
     */
    private $fracture;
    /**
     * @ORM\Column(type="string",length=3)
     */
    private $accidentmortelle;
    /**
     * @ORM\Column(type="string",length=3)
     */
    private $hemoragie;

    /**
     * @return mixed
     */
    public function getIdDossierSinistre()
    {
        return $this->idDossierSinistre;
    }

    /**
     * @return mixed
     */
    public function getSinistreAutomobile()
    {
        return $this->SinistreAutomobile;
    }

    /**
     * @param mixed $SinistreAutomobile
     */
    public function setSinistreAutomobile($SinistreAutomobile)
    {
        $this->SinistreAutomobile = $SinistreAutomobile;
    }

    /**
     * @param mixed $idDossierSinistre
     */
    public function setIdDossierSinistre($idDossierSinistre)
    {
        $this->idDossierSinistre = $idDossierSinistre;
    }


    /**
     * @return mixed
     */
    public function getContratAutomobile()
    {
        return $this->ContratAutomobile;
    }

    /**
     * @param mixed $ContratAutomobile
     */
    public function setContratAutomobile($ContratAutomobile)
    {
        $this->ContratAutomobile = $ContratAutomobile;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
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
    public function getToutrsique()
    {
        return $this->toutrsique;
    }

    /**
     * @param mixed $toutrsique
     */
    public function setToutrsique($toutrsique)
    {
        $this->toutrsique = $toutrsique;
    }

    /**
     * @return mixed
     */
    public function getStandard()
    {
        return $this->standard;
    }

    /**
     * @param mixed $standard
     */
    public function setStandard($standard)
    {
        $this->standard = $standard;
    }

    /**
     * @return mixed
     */
    public function getEntreeinterdit()
    {
        return $this->entreeinterdit;
    }

    /**
     * @param mixed $entreeinterdit
     */
    public function setEntreeinterdit($entreeinterdit)
    {
        $this->entreeinterdit = $entreeinterdit;
    }

    /**
     * @return mixed
     */
    public function getDepassefeuoustop()
    {
        return $this->depassefeuoustop;
    }

    /**
     * @param mixed $depassefeuoustop
     */
    public function setDepassefeuoustop($depassefeuoustop)
    {
        $this->depassefeuoustop = $depassefeuoustop;
    }

    /**
     * @return mixed
     */
    public function getDepassevitessemaximale()
    {
        return $this->depassevitessemaximale;
    }

    /**
     * @param mixed $depassevitessemaximale
     */
    public function setDepassevitessemaximale($depassevitessemaximale)
    {
        $this->depassevitessemaximale = $depassevitessemaximale;
    }

    /**
     * @return mixed
     */
    public function getMoteur()
    {
        return $this->moteur;
    }

    /**
     * @param mixed $moteur
     */
    public function setMoteur($moteur)
    {
        $this->moteur = $moteur;
    }

    /**
     * @return mixed
     */
    public function getCarcase()
    {
        return $this->carcase;
    }

    /**
     * @param mixed $carcase
     */
    public function setCarcase($carcase)
    {
        $this->carcase = $carcase;
    }

    /**
     * @return mixed
     */
    public function getRemarquage()
    {
        return $this->remarquage;
    }

    /**
     * @param mixed $remarquage
     */
    public function setRemarquage($remarquage)
    {
        $this->remarquage = $remarquage;
    }

    /**
     * @return mixed
     */
    public function getFracture()
    {
        return $this->fracture;
    }

    /**
     * @param mixed $fracture
     */
    public function setFracture($fracture)
    {
        $this->fracture = $fracture;
    }

    /**
     * @return mixed
     */
    public function getAccidentmortelle()
    {
        return $this->accidentmortelle;
    }

    /**
     * @param mixed $accidentmortelle
     */
    public function setAccidentmortelle($accidentmortelle)
    {
        $this->accidentmortelle = $accidentmortelle;
    }

    /**
     * @return mixed
     */
    public function getHemoragie()
    {
        return $this->hemoragie;
    }

    /**
     * @param mixed $hemoragie
     */
    public function setHemoragie($hemoragie)
    {
        $this->hemoragie = $hemoragie;
    }




}