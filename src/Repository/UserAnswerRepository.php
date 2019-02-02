<?php

namespace App\Repository;

use App\Entity\Test;
use App\Entity\User;
use App\Entity\UserAnswer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UserAnswer|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserAnswer|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserAnswer[]    findAll()
 * @method UserAnswer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserAnswerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserAnswer::class);
    }

    /**
     * @param User $user
     * @param Test $test
     *
     * @return self[]
     */
    public function getAnswerList(User $user, Test $test): array
    {
        return $this->createQueryBuilder('ua')
            ->join('ua.answer', 'a')
            ->join('ua.question', 'q')
            ->where('ua.user = :user')
            ->andWhere('q.test = :test')
            ->setParameter('user', $user)
            ->setParameter('test', $test)
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return UserAnswer[] Returns an array of UserAnswer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserAnswer
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
