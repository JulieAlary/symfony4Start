<?php

namespace App\Repository\Core;

use App\Entity\Core\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class UserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }

	/*public function loadUserByUsername($username)
	{
		return $this->createQueryBuilder('u')
		            ->where('u.username = :username OR u.email = :email')
		            ->setParameter('username', $username)
		            ->setParameter('email', $username)
		            ->getQuery()
		            ->getOneOrNullResult();
	}*/

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('u')
            ->where('u.something = :value')->setParameter('value', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
