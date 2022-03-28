<?php

namespace App\Repository;

use App\Entity\ElementsForfaitises;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ElementsForfaitises|null find($id, $lockMode = null, $lockVersion = null)
 * @method ElementsForfaitises|null findOneBy(array $criteria, array $orderBy = null)
 * @method ElementsForfaitises[]    findAll()
 * @method ElementsForfaitises[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ElementsForfaitisesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ElementsForfaitises::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ElementsForfaitises $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(ElementsForfaitises $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ElementsForfaitises[] Returns an array of ElementsForfaitises objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ElementsForfaitises
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
