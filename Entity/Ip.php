<?php
namespace Amadi\GeoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="geo_base")
 * @ORM\Entity(repositoryClass="Amadi\GeoBundle\Repository\IpRepository")
 */
class Ip
{
    /**
     * @ORM\Id
     * @ORM\Column(name="long_ip1", type="bigint", nullable=false)
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $longIp1;

    /**
     * @ORM\Id
     * @ORM\Column(name="long_ip2", type="bigint", nullable=false)
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $longIp2;

    /**
     * @ORM\Column(name="ip1", type="string", length="16")
     */
    private $ip1;

    /**
     * @ORM\Column(name="ip2", type="string", length="16")
     */
    private $ip2;

    /**
     * @ORM\Column(name="country", type="string", length="16")
     */
    private $country;

    /**
     * Регион
     * @ORM\ManyToOne(targetEntity="City")
     * @ORM\JoinColumn(name="city_id", referencedColumnName="city_id")
     */
    private $city;

    /**
     * @ORM\Column(name="city_id", type="integer", length="11")
     */
    private $cityId;


    /**
     * Set longIp1
     *
     * @param bigint $longIp1
     */
    public function setLongIp1($longIp1)
    {
        $this->longIp1 = $longIp1;
    }

    /**
     * Get longIp1
     *
     * @return bigint
     */
    public function getLongIp1()
    {
        return $this->longIp1;
    }

    /**
     * Set longIp2
     *
     * @param bigint $longIp2
     */
    public function setLongIp2($longIp2)
    {
        $this->longIp2 = $longIp2;
    }

    /**
     * Get longIp2
     *
     * @return bigint
     */
    public function getLongIp2()
    {
        return $this->longIp2;
    }

    /**
     * Set ip1
     *
     * @param string $ip1
     */
    public function setIp1($ip1)
    {
        $this->ip1 = $ip1;
    }

    /**
     * Get ip1
     *
     * @return string
     */
    public function getIp1()
    {
        return $this->ip1;
    }

    /**
     * Set ip2
     *
     * @param string $ip2
     */
    public function setIp2($ip2)
    {
        $this->ip2 = $ip2;
    }

    /**
     * Get ip2
     *
     * @return string
     */
    public function getIp2()
    {
        return $this->ip2;
    }

    /**
     * Set country
     *
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set cityId
     *
     * @param integer $cityId
     */
    public function setCity($cityId)
    {
        $this->city = $cityId;
    }

    /**
     * Get cityId
     *
     * @return City
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param $cityId
     */
    public function setCityId($cityId)
    {
        $this->cityId = $cityId;
    }

    /**
     * @return mixed
     */
    public function getCityId()
    {
        return $this->cityId;
    }

}