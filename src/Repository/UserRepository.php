<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class User {}

/**
 * @extends ServiceEntityRepository<User>
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * Bad code
     */
    public function save(User $user): int
    {
        /** @psalm-trace $user */
        $this->_em->persist($user);
        $this->_em->flush();

        return 'return wrong type';
    }
}