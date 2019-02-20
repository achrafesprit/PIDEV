<?php
/**
 * Created by PhpStorm.
 * User: Chourouk
 * Date: 2/12/2019
 * Time: 1:59 PM
 */

namespace MyApp\UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 *
 * @ORM\Entity()
 */
class ContratSante
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id_contratS;
    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the product brochure as a PDF file.")
     * @Assert\File(mimeTypes={ "application/pdf" })
     */
    private $certificat_naissance;
    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the product rapport as a PDF file.")
     * @Assert\File(mimeTypes={ "application/pdf" })
     */

    private  $rapport_med;

    /**
     * @return mixed
     */
    public function getIdContratS()
    {
        return $this->id_contratS;
    }

    /**
     * @param mixed $id_contratS
     */
    public function setIdContratS($id_contratS)
    {
        $this->id_contratS = $id_contratS;
    }

    /**
     * @return mixed
     */
    public function getCertificatNaissance()
    {
        return $this->certificat_naissance;
    }

    /**
     * @param mixed $certificat_naissance
     */
    public function setCertificatNaissance($certificat_naissance)
    {
        $this->certificat_naissance = $certificat_naissance;
    }

    /**
     * @return mixed
     */
    public function getRapportMed()
    {
        return $this->rapport_med;
    }

    /**
     * @param mixed $rapport_med
     */
    public function setRapportMed($rapport_med)
    {
        $this->rapport_med = $rapport_med;
    }

    /**
     * @return mixed
     */
    public function getCouvertureAssurance()
    {
        return $this->couverture_assurance;
    }

    /**
     * @param mixed $couverture_assurance
     */
    public function setCouvertureAssurance($couverture_assurance)
    {
        $this->couverture_assurance = $couverture_assurance;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @ORM\Column(type="string",length=255)
     */
    private $couverture_assurance ;
    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;


}