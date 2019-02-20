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
 * Class Reclamation
 * @ORM\Entity()
 */
class Reclamation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
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
     * @ORM\Column(type="date")
     */
    private $Date;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $Champs;

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
    public function getDate()
    {
        return $this->Date;
    }

    /**
     * @param mixed $Date
     */
    public function setDate($Date)
    {
        $this->Date = $Date;
    }

    /**
     * @return mixed
     */
    public function getChamps()
    {
        return $this->Champs;
    }

    /**
     * @param mixed $Champs
     */
    public function setChamps($Champs)
    {
        $this->Champs = $Champs;
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