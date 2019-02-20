<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 13/02/2019
 * Time: 02:58
 */

namespace MyApp\UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class SinistreAutomobile
 * @ORM\Entity()
 */
class SinistreAutomobile
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */

    private $idautomobile;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\Column(type="date")
     */

    private $datesinistre;
    /**
     * @ORM\Column(type="date")
     */
    private $dateajout;
    /**
     *
     *
     * @ORM\Column( type="string", length=250)
     */
    private $localisation;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $description;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $degathumaine;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $bienendommage;
    /**
     * @ORM\Column(type="string",length=255,nullable=true)
     */
    private $constat;
    /**
     * @Assert\File(maxSize="5000k")
     */
    private $file;
    /**
     * @ORM\Column(type="float")
     */
    private $cout;

    /**
     * @return mixed
     */
    public function getIdautomobile()
    {
        return $this->idautomobile;
    }

    /**
     * @param mixed $idautomobile
     */
    public function setIdautomobile($idautomobile)
    {
        $this->idautomobile = $idautomobile;
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
    public function getDatesinistre()
    {
        return $this->datesinistre;
    }

    /**
     * @param mixed $datesinistre
     */
    public function setDatesinistre($datesinistre)
    {
        $this->datesinistre = $datesinistre;
    }

    /**
     * @return mixed
     */
    public function getDateajout()
    {
        return $this->dateajout;
    }

    /**
     * @param mixed $dateajout
     */
    public function setDateajout($dateajout)
    {
        $this->dateajout = $dateajout;
    }

    /**
     * @return mixed
     */
    public function getLocalisation()
    {
        return $this->localisation;
    }

    /**
     * @param mixed $localisation
     */
    public function setLocalisation($localisation)
    {
        $this->localisation = $localisation;
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
    public function getDegathumaine()
    {
        return $this->degathumaine;
    }

    /**
     * @param mixed $degathumaine
     */
    public function setDegathumaine($degathumaine)
    {
        $this->degathumaine = $degathumaine;
    }

    /**
     * @return mixed
     */
    public function getBienendommage()
    {
        return $this->bienendommage;
    }

    /**
     * @param mixed $bienendommage
     */
    public function setBienendommage($bienendommage)
    {
        $this->bienendommage = $bienendommage;
    }


    /**
     * @return mixed
     */
    public function getCout()
    {
        return $this->cout;
    }

    /**
     * @param mixed $cout
     */
    public function setCout($cout)
    {
        $this->cout = $cout;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }


    public function getWebPath(){
        return null===$this->constat ? null : $this->getUploadDir.'/'.$this->constat;
    }
    protected  function getUploadRootDir(){
        return __DIR__.'/../../../../web/'.$this->getUploadDir();  }
    protected function  getUploadDir(){
        return 'images';
    }
    public  function  uploadProfilePicture()
    {
        $this->file->move($this->getUploadRootDir(),$this->file->getClientOriginalName());
        $this->constat=$this->file->getClientOriginalName();
        $this->file=null;
    }

    /**
     * Set constat
     *
     * @param string $constat
     * @return Categorie
     */
    public function setConstat($constat){
        $this->constat==$constat;
        return $this;
    }

    /**
     * Get constat
     * @return string
     */
    public function getConstat(){
        return $this->constat;
    }








}