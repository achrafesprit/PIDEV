<?php
/**
 * Created by PhpStorm.
 * User: rami
 * Date: 13/02/2019
 * Time: 05:36
 */

namespace MyApp\UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="MyApp\UserBundle\Entity\ContratAutombileRepository")
 * @Vich\Uploadable
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
     * @ORM\Column(type="date" ,  nullable=true)
     */
    public $datedebut;
    /**
     * @ORM\Column(type="date" , nullable=true)
     */
    public $datefin;
    /**
     * @ORM\Column(type="string")
     */
    public $typecontratAuto;
    /**
     * @ORM\Column(type="json_array")
     */
    private $couvertureAssurance ;
    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $user;
    /**
     * @ORM\Column(type="boolean" ,  options={"default"=false} )
     */
    public $etat;

    /**
     * @ORM\Column(type="date")
     */
    public $dateMiseCirculation;
    /**
     * @ORM\Column(type="string")
     */
    public $marque;
    /**
     * @ORM\Column(type="string",length=255,nullable=true)
     */
    public $carteGrise;
    /**
     * @Assert\File(maxSize="5000k")
     */
    private $file1;


    protected function getUploadRootDir(){
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
    protected function getUploadDir(){
        return 'images';
    }
    public function uploadProfilePicture(){
        $this->file1->move($this->getUploadRootDir(), $this->file1->getClientOriginalName());
        $this->carteGrise=$this->file1->getClientOriginalName();
        $this->file=null;
    }

    /**
     * Set carteGrise
     *
     * @param string $nomImage
     *
     * @return Categorie
     */
    public function setCarteGrise($carteGrise){
        $this->carteGrise==$carteGrise;
        return $this;
    }

    /**
     * Get nomImage
     *
     * @return string
     */
    public function getCarteGrise(){
        return $this->carteGrise;

    }













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
     * @return mixed
     */
    public function getCouvertureAssurance()
    {
        return $this->couvertureAssurance;
    }

    /**
     * @param mixed $couvertureAssurance
     */
    public function setCouvertureAssurance($couvertureAssurance)
    {
        $this->couvertureAssurance = $couvertureAssurance;
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
     * @return mixed
     */
    public function getDateMiseCirculation()
    {
        return $this->dateMiseCirculation;
    }

    /**
     * @param mixed $dateMiseCirculation
     */
    public function setDateMiseCirculation($dateMiseCirculation)
    {
        $this->dateMiseCirculation = $dateMiseCirculation;
    }

    /**
     * @return mixed
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * @param mixed $marque
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;
    }

    /**
     * @return mixed
     */
    public function getFile1()
    {
        return $this->file1;
    }

    /**
     * @param mixed $file1
     */
    public function setFile1($file1)
    {
        $this->file1 = $file1;
    }

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="imageName")
     *
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $imageName;



    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }





}