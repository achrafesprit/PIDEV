<?php
/**
 * Created by PhpStorm.
 * User: rami
 * Date: 13/02/2019
 * Time: 06:35
 */

namespace MyApp\UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Class Tresorerie
 * @ORM\Entity()
 */
class Tresorerie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id_tresorie;

    /**
     * @return mixed
     */
    public function getIdTresorie()
    {
        return $this->id_tresorie;
    }

    /**
     * @param mixed $id_tresorie
     */
    public function setIdTresorie($id_tresorie)
    {
        $this->id_tresorie = $id_tresorie;
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



}