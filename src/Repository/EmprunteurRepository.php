<?php

namespace App\Repository;

use App\Entity\Emprunteur;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Emprunteur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Emprunteur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Emprunteur[]    findAll()
 * @method Emprunteur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmprunteurRepository extends ServiceEntityRepository
{
    use ProfileRepositoryTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Emprunteur::class);
    }

    /**
     * @return Emprunteur[] Returns an array of Emprunteur objects
     */
    
    // public function findOneByUser(User $user)
    // {
    //     return $this->createQueryBuilder('e')
    //         ->innerJoin('e.user','u')    
    //         ->andWhere('e.user = :user')
    //         ->setParameter('user', $user)
    //         ->orderBy('e.id', 'ASC')
    //         // ->setMaxResults(10)
    //         ->getQuery()
    //         ->getResult()
    //     ;
    // }
    

    /*
    public function findOneBySomeField($value): ?Emprunteur
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
