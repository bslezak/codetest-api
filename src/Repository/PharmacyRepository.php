<?php
namespace App\Repository;

use App\Entity\Pharmacy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\DBAL\Driver\Statement;
use Doctrine\DBAL\Driver\ResultStatement;
use Doctrine\ORM\Query;
use Doctrine\ORM\Internal\HydrationCompleteHandler;

/**
 * PharmacyRepository
 *
 * @author Brian Slezak <brian@theslezaks.com>
 *
 */
class PharmacyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Pharmacy::class);
    }

    /**
     * Find pharmacy nearest given latitude and longitude
     *
     * @param float $latitude
     * @param float $longitude
     * @return array A Pharmacy record as an array, as we'll return additional distance information through the API
     */
    public function findNearest(float $latitude, float $longitude)
    {
        /**
         *
         * @var Statement $statement
         */
        $statement = $this->getEntityManager()
            ->getConnection()
            ->prepare('CALL sp_nearby_pharmacy(:latitude, :longitude);');
        $statement->bindValue('latitude', $latitude);
        $statement->bindValue('longitude', $longitude);
        $statement->execute();
        $results = $statement->fetchAll();

        // Only return the first result
        return $results[0];
    }
}
