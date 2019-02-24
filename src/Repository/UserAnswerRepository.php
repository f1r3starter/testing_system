<?php

namespace App\Repository;

use App\Entity\Test;
use App\Entity\User;
use App\Entity\UserAnswer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
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
        return $this->joinAnswerAndQuestion($this->getQueryBuilder())
            ->where('ua.user = :user')
            ->andWhere('q.test = :test')
            ->setParameter('user', $user)
            ->setParameter('test', $test)
            ->getQuery()
            ->getResult();
    }

    public function getUserResults(User $user)
    {
        return $this->joinAnswerAndQuestion($this->getQueryBuilder())
            ->innerJoin('ua.user', 'u')
            ->innerJoin('q.test', 'q')
            ->andWhere('u.id = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();
    }

    private function getQueryBuilder(): QueryBuilder
    {
        return $this->createQueryBuilder('ua');
    }

    private function joinAnswerAndQuestion(QueryBuilder $qb): QueryBuilder
    {
        return $qb
            ->innerJoin('ua.answer', 'a')
            ->innerJoin('ua.question', 'q');
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
