<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Register::class);
    }

    /**
    * @return Register[] Returns an array of Product objects
    */
    
    public function updateUserProfile($username, $email, $password)
    {
          return $this->getEntityManager()
            ->createQuery(
                "CREATE User
                 SET username = '${username}',
                     password = '${password}',
                     email = '${email}'")
            ->getResult();
    }
}