<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18/02/2019
 * Time: 23:32
 */

namespace MyApp\UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class ArchiveTresorerie
 * @ORM\Entity()
 */
class ArchiveTresorerie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idtresorie;

    /**
     * @return mixed
     */
    public function getIdtresorie()
    {
        return $this->idtresorie;
    }

    /**
     * @param mixed $idtresorie
     */
    public function setIdtresorie($idtresorie)
    {
        $this->idtresorie = $idtresorie;
    }

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $user;

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
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * @param mixed $montant
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;
    }

    /**
     * @ORM\Column(type="float")
     */
    private $montant;

    /**
     * @ORM\Column(type="string",length=255)
     */
    private $type;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }







}