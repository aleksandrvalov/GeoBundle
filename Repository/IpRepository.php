<?php

namespace Amadi\GeoBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

class IpRepository extends EntityRepository
{
    /**
     * @param $longIp
     *
     * @throws \Doctrine\ORM\NoResultException
     *
     * @return \Amadi\GeoBundle\Entity\City
     */
//    public function rangeIp($longIp)
//    {
//        $q = $this
//            ->createQueryBuilder('i')
//            ->select('i')
//            ->where('i.longIp1 <= :longIp AND i.longIp2 >= :longIp')
//            ->setParameter('longIp', $longIp)
//            ->getQuery();
//
//        try {
//            $city = $q->getSingleResult();
//        } catch (NoResultException $q) {
//            throw new NoResultException(sprintf('Unable to find an ip in database'), null, 0, $q);
//        }
//
//        return $city;
//    }

    public function rangeIp($longIp)
    {
        $dbal = $this->getEntityManager()->getConnection();
        $result = $dbal->query(sprintf("
            SELECT
                gb.country,
                gc.city,
                gc.region,
                gc.district
            FROM
                geo_base AS gb
            LEFT JOIN geo_city AS gc ON (gb.city_id = gc.city_id)
            WHERE
                    gb.long_ip1 <= %s
                AND
                    gb.long_ip2 >= %s
        ", $longIp, $longIp))->fetchAll(\PDO::FETCH_ASSOC);
        if (isset($result) && is_array($result)) {
            return $result[0];
        }

        return null;
    }
}