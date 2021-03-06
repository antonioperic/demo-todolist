<?php

namespace Ezsc\ModelBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ProductRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProductRepository extends EntityRepository
{
    public function getOneBySlug($slug) 
    {
        $qb = $this->createQueryBuilder('p');
        
        $query = $qb
                ->where('p.slug LIKE :slug')
                ->setParameter('slug', '%' . $slug . '%');
        
        return $query->getQuery()->getOneOrNullResult();
    }
}
