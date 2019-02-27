<?php
/**
 * Created by PhpStorm.
 * User: sarra
 * Date: 2/22/2019
 * Time: 12:37 PM
 */

namespace Sarah\BackBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * promotion
 *
 * @ORM\Table(name="promotion")
 * @ORM\Entity(repositoryClass="Sarah\BackBundle\Repository\promotionRepository")
 */
class promotion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ORM\OneToOne(targetEntity="Sarah\BackBundle\Entity\produit")
     */
    private $produit;
    /**
     * @ORM\Column(type="string",length=255,nullable=true)
     */
    private $nomImage;
    /**
     * @Assert\File(maxSize="5000k")
     */
    private $file;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateDebutPromotion", type="datetime")
     *
     * @Assert\Type("DateTime")
     *
     * @Assert\GreaterThan("today")
     */
    private $dateDebutPromotion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateFinPromotion", type="datetime")
     *
     * @Assert\Type("DateTime")
     *
     * @Assert\Expression("value >= this.getDateDebutPromotion()")
     */
    private $DateFinPromotion;



    /**
     * @var int
     *
     * @ORM\Column(name="PourcentageRemise", type="integer")
     */
    private $pourcentageRemise;
    /**
     * @var int
     *
     * @ORM\Column(name="nombre", type="integer",nullable=true)
     */
    private $Nombre=0;
    /**
     * @var string
     *
     * @ORM\Column(name="Etat", type="string")
     */
    private $etat;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateDebutPromotion
     *
     * @param \DateTime $dateDebutPromotion
     *
     * @return promotion
     */
    public function setDateDebutPromotion($dateDebutPromotion)
    {
        $this->dateDebutPromotion = $dateDebutPromotion;

        return $this;
    }

    /**
     * Get dateDebutPromotion
     *
     * @return \DateTime
     */
    public function getDateDebutPromotion()
    {
        return $this->dateDebutPromotion;
    }

    /**
     * Set DateFinPromotion
     *
     * @param \DateTime $DateFinPromotion
     *
     * @return promotion
     */
    public function setDateFinPromotion($DateFinPromotion)
    {
        $this->DateFinPromotion = $DateFinPromotion;

        return $this;
    }

    /**
     * Get DateFinPromotion
     *
     * @return \DateTime
     */
    public function getDateFinPromotion()
    {
        return $this->DateFinPromotion;
    }

    /**
     * Set pourcentageRemise
     *
     * @param integer $pourcentageRemise
     *
     * @return promotion
     */
    public function setPourcentageRemise($pourcentageRemise)
    {
        $this->pourcentageRemise = $pourcentageRemise;

        return $this;
    }

    /**
     * Get pourcentageRemise
     *
     * @return int
     */
    public function getPourcentageRemise()
    {
        return $this->pourcentageRemise;
    }

    /**
     * @return int
     */
    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * @param int $Nombre
     */
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }


    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return promotion
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set produit
     *
     * @param \SarahBackBundle\Entity\produit $produit
     *
     * @return promotion
     */
    public function setProduit(\Sarah\BackBundle\Entity\produit $produit = null)
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     * @return \Sarah\BackBundle\Entity\produit
     */
    public function getProduit()
    {
        return $this->produit;
    }
    /**
     * @return mixed
     */
    public function getWebPath(){
        return null===$this->nomImage ? null : $this->getUploadRootDir().'/'.$this->nomImage;
    }
    protected  function getUploadRootDir(){
        return __DIR__.'/../../../../web/'.$this->getUploadDir();  }
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
    public function _toString()
    {
        return $this->getDateFinPromotion();
    }



}