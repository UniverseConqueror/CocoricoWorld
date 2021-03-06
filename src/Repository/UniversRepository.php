<?php

namespace App\Repository;

use App\Entity\Univers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder;

/**
 * @method Univers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Univers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Univers[]    findAll()
 * @method Univers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UniversRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Univers::class);
    }

    /**
     * @return Univers[] Returns an array of Univers objects
     */
    public function findAllUniversWithCategoriesAndSubcategories()
    {
        return $this->createQueryBuilder('u')
            ->join('u.categories', 'c')
            ->addSelect('c')
            ->join('c.subcategories', 's')
            ->addSelect('s')
            ->getQuery()
            ->getResult()
        ;
    }


    /**
     * @param $term string
     * @return QueryBuilder
     */
    public function getAllWithSearchQueryBuilder($term): QueryBuilder
    {
        $qb = $this->createQueryBuilder('u');

        if ($term) {
            $qb->andWhere('u.name LIKE :term')
                ->setParameter('term', '%'.$term.'%')
            ;
        }

        return $qb;
    }

    /*
    public function findOneBySomeField($value): ?Univers
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
