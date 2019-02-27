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
 * paquet
 *
 * @ORM\Table(name="paquet")
 * @ORM\Entity(repositoryClass="Sarah\BackBundle\Repository\paquetRepository")
 */
class paquet
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
     * @ORM\ManyToOne(targetEntity="Sarah\BackBundle\Entity\produit")
     */
    private $ProduitTypeSante;

    /**
     * @ORM\ManyToOne(targetEntity="Sarah\BackBundle\Entity\produit")
     */
    private $ProduitTypeVoiture;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateDebutOffre", type="datetime")
     *
     * @Assert\Type("DateTime")
     *
     * @Assert\GreaterThan("today")
     */
    private $dateDebutOffre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateFinOffre", type="datetime")
     *
     * @Assert\Type("DateTime")
     *
     * @Assert\Expression("value >= this.getDateDebutPromotion()")
     */
    private $dateFinOffre;

    /**
     * @var float
     *
     * @ORM\Column(name="PrixOffre", type="float")
     */
    private $prixOffre;
    /**
     * @var int
     *
     * @ORM\Column(name="nombre", type="integer",nullable=true)
     */
    private $Nombre=0;


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
     * Set dateDebutOffre
     *
     * @param \DateTime $dateDebutOffre
     *
     * @return paquet
     */
    public function setDateDebutOffre($dateDebutOffre)
    {
        $this->dateDebutOffre = $dateDebutOffre;

        return $this;
    }

    /**
     * Get dateDebutOffre
     *
     * @return \DateTime
     */
    public function getDateDebutOffre()
    {
        return $this->dateDebutOffre;
    }

    /**
     * Set dateFinOffre
     *
     * @param \DateTime $dateFinOffre
     *
     * @return paquet
     */
    public function setDateFinOffre($dateFinOffre)
    {
        $this->dateFinOffre = $dateFinOffre;

        return $this;
    }

    /**
     * Get dateFinOffre
     *
     * @return \DateTime
     */
    public function getDateFinOffre()
    {
        return $this->dateFinOffre;
    }

    /**
     * Set prixOffre
     *
     * @param float $prixOffre
     *
     * @return paquet
     */
    public function setPrixOffre($prixOffre)
    {
        $this->prixOffre = $prixOffre;

        return $this;
    }

    /**
     * Get prixOffre
     *
     * @return float
     */
    public function getPrixOffre()
    {
        return $this->prixOffre;
    }

    /**
     * Set produitTypeSante
     *
     * @param \Sarah\BackBundle\Entity\produit $produitTypeSante
     *
     * @return paquet
     */
    public function setProduitTypeSante(\Sarah\BackBundle\Entity\produit $produitTypeSante = null)
    {
        $this->ProduitTypeSante = $produitTypeSante;

        return $this;
    }

    /**
     * Get produitTypeSante
     *
     * @return \Sarah\BackBundle\Entity\produit
     */
    public function getProduitTypeSante()
    {
        return $this->ProduitTypeSante;
    }

    /**
     * Set produitTypeVoiture
     *
     * @param \Sarah\BackBundle\Entity\produit $produitTypeVoiture
     *
     * @return paquet
     */
    public function setProduitTypeVoiture(\Sarah\BackBundle\Entity\produit $produitTypeVoiture = null)
    {
        $this->ProduitTypeVoiture = $produitTypeVoiture;

        return $this;
    }

    /**
     * Get produitTypeVoiture
     *
     * @return \Sarah\BackBundle\Entity\produit
     */
    public function getProduitTypeVoiture()
    {
        return $this->ProduitTypeVoiture;
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

}
