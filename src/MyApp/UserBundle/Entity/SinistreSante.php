<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 13/02/2019
 * Time: 02:58
 */

namespace MyApp\UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class SinistreSante
 * @ORM\Entity()
 */
class SinistreSante
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */

    private $id_Sante;
    /**
     * @var string
     *
     * @ORM\Column(name="TypeSinistre", type="string", length=250, nullable=false)
     */
    private $TypeSinistre;
        /**
         * @ORM\Column(type="integer")
         */
        private  $id_user;
    /**
     * @ORM\Column(type="date")
     */
    private $date;


    /**
     * @ORM\Column(type="string",length=255)
     */
    private $description;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $degat_humaine;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $rapport_medicale;
    /**
     * @ORM\Column(type="float",length=255)
     */
    private $facture;

    /**
     * @ORM\Column(type="string")
     */
    private $fichier;

    /**
     * @return mixed
     */
    public function getIdSante()
    {
        return $this->id_Sante;
    }

    /**
     * @param mixed $id_Sante
     */
    public function setIdSante($id_Sante)
    {
        $this->id_Sante = $id_Sante;
    }

    /**
     * @return string
     */
    public function getTypeSinistre()
    {
        return $this->TypeSinistre;
    }

    /**
     * @param string $TypeSinistre
     */
    public function setTypeSinistre($TypeSinistre)
    {
        $this->TypeSinistre = $TypeSinistre;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDegatHumaine()
    {
        return $this->degat_humaine;
    }

    /**
     * @param mixed $degat_humaine
     */
    public function setDegatHumaine($degat_humaine)
    {
        $this->degat_humaine = $degat_humaine;
    }

    /**
     * @return mixed
     */
    public function getRapportMedicale()
    {
        return $this->rapport_medicale;
    }

    /**
     * @param mixed $rapport_medicale
     */
    public function setRapportMedicale($rapport_medicale)
    {
        $this->rapport_medicale = $rapport_medicale;
    }

    /**
     * @return mixed
     */
    public function getFacture()
    {
        return $this->facture;
    }

    /**
     * @param mixed $facture
     */
    public function setFacture($facture)
    {
        $this->facture = $facture;
    }

    /**
     * @return mixed
     */
    public function getFichier()
    {
        return $this->fichier;
    }

    /**
     * @param mixed $fichier
     */
    public function setFichier($fichier)
    {
        $this->fichier = $fichier;
    }










}