<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26/02/2019
 * Time: 17:15
 */

namespace MyApp\UserBundle\Entity;
use Doctrine\ORM\EntityRepository;

class ContratAutombileRepository extends EntityRepository
{
    public function findContratPrevus(){

        $query=$this->getEntityManager()
            ->createQuery(" Select m from MyAppUserBundle:ContratAutomobile m where m.datefin<CURRENT_DATE() ");
        return $query->getResult();

    }
}