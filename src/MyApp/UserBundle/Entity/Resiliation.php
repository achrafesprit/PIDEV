<?php
/**
 * Created by PhpStorm.
 * User: sarra
 * Date: 2/11/2019
 * Time: 2:28 PM
 */

namespace MyApp\UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * Class Resiliation
 * @ORM\Entity()
 */
class Resiliation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="integer")
     */
    private $NumContrat;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $Motif;
    /**
     * @ORM\Column(type="string",length=255,nullable=true)
     */
    private $nomImage;
    /**
     * @Assert\File(maxSize="5000k")
     */
    private $file;


    /**
     * @return mixed
     */

    public function getWebPath(){
        return null===$this->nomImage ? null : $this->getUploadDir.'/'.$this->nomImage;
    }
    protected  function getUploadRootDir(){
        return __DIR__.'/../../../../gaga/web/'.$this->getUploadDir();  }
    protected function  getUploadDir(){
        return 'images';
    }
    public  function  uploadProfilePicture()
    {
        $this->file->move($this->getUploadRootDir(),$this->file->getClientOriginalName());
        $this->nomImage=$this->file->getClientOriginalName();
        $this->file=null;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNumContrat()
    {
        return $this->NumContrat;
    }

    /**
     * @param mixed $NumContrat
     */
    public function setNumContrat($NumContrat)
    {
        $this->NumContrat = $NumContrat;
    }

    /**
     * @return mixed
     */
    public function getMotif()
    {
        return $this->Motif;
    }

    /**
     * @param mixed $Motif
     */
    public function setMotif($Motif)
    {
        $this->Motif = $Motif;
    }

    /**
     * Set nomImage
     *
     * @param string $nomImage
     * @return Categorie
     */
    public function setNomImage($nomImage){
        $this->nomImage==$nomImage;
        return $this;
    }

    /**
     * Get nomImage
     * @return string
     */
    public function getNomImage(){
        return $this->nomImage;
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




}