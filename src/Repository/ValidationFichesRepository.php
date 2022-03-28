<?php

namespace App\Repository;

use App\Entity\ValidationFiches;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ValidationFiches|null find($id, $lockMode = null, $lockVersion = null)
 * @method ValidationFiches|null findOneBy(array $criteria, array $orderBy = null)
 * @method ValidationFiches[]    findAll()
 * @method ValidationFiches[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ValidationFichesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ValidationFiches::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ValidationFiches $entity, bool $flush = true): void
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
    public function remove(ValidationFiches $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ValidationFiches[] Returns an array of ValidationFiches objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ValidationFiches
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
