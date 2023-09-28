<?php

namespace App\Repository;

use App\Entity\ClassMonster;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ClassMonster>
 *
 * @method ClassMonster|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClassMonster|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClassMonster[]    findAll()
 * @method ClassMonster[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClassMonsterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClassMonster::class);
    }

//    /**
//     * @return ClassMonster[] Returns an array of ClassMonster objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ClassMonster
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
