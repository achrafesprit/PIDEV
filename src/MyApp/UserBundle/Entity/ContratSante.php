<?php
/**
 * Created by PhpStorm.
 * User: Chourouk
 * Date: 2/12/2019
 * Time: 1:59 PM
 */

namespace MyApp\UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity
 * @Vich\Uploadable
 */
class ContratSante
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idContratS;

    /**
     * @ORM\Column( type="date" , nullable=true)
     */
    private $DateNaissance;

    /**
     * @return mixed
     */
    public function getDateNaissance()
    {
        return $this->DateNaissance;
    }



    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $user;

    /**
     *
     * @ORM\Column( type="date" , nullable=true)
     */
    public $dateDebut;
    /**
     *
     * @ORM\Column( type="date" , nullable=true)
     */
    public $dateFin;
    /**
     * @ORM\Column(type="boolean" ,  options={"default"=false} )
     */
    public $etat;

    /**
     * @ORM\Column(type="json_array")
     */
    private $couvertureAssurance ;

    /**
     * @return mixed
     */
    public function getIdContratS()
    {
        return $this->idContratS;
    }

    /**
     * @param mixed $idContratS
     */
    public function setIdContratS($idContratS)
    {
        $this->idContratS = $idContratS;
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
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * @param mixed $dateDebut
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    }

    /**
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * @param mixed $dateFin
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
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
    public function getTypeA()
    {
        return $this->typeA;
    }

    /**
     * @param mixed $typeA
     */
    public function setTypeA($typeA)
    {
        $this->typeA = $typeA;
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



    /**
     * @ORM\Column(type="string",length=255)
     */
    private $typeA ;


    /**
     * @ORM\Column(type="string",length=255,nullable=true)
     */
    public $nomImage;
    /**
     * @Assert\File(maxSize="5000k")
     */
    private $file;

    protected function getUploadRootDir(){
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
    protected function getUploadDir(){
        return 'images';
    }
    public function uploadProfilePicture(){


        if (null === $this->file) {
            return;
        }
        if(!$this->idContratS){
            $this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());
        }else{

            $this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());
        }
        $this->setNomimage($this->file->getClientOriginalName());
    }

    /**
     * Set nomImage
     *
     * @param string $nomImage
     *
     * @return Categorie
     */
    public function setNomImage($nomImage){
        $this->nomImage==$nomImage;
        return $this;
    }

    /**
     * Get nomImage
     *
     * @return string
     */
    public function getNomImage(){
        return $this->nomImage;
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
     * @param mixed $DateNaissance
     */
    public function setDateNaissance($DateNaissance): void
    {
        $this->DateNaissance = $DateNaissance;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }



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