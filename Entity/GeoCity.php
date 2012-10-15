<?php

namespace Amadi\GeoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Berg\SiteBundle\Entity\GeoCity
 *
 * @ORM\Table(name="geo_city")
 * @ORM\Entity(repositoryClass="Amadi\GeoBundle\Repository\GeoCityRepository")
 */
class GeoCity
{
    /**
     * @var integer $cityId
     *
     * @ORM\Column(name="city_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cityId;

    /**
     * @var string $city
     *
     * @ORM\Column(name="city", type="string", length=128, nullable=false)
     */
    private $city;

    /**
     * @var float $lat
     *
     * @ORM\Column(name="lat", type="float", nullable=false)
     */
    private $lat;

    /**
     * @var float $lng
     *
     * @ORM\Column(name="lng", type="float", nullable=false)
     */
    private $lng;

    /**
     * @var GeoDistrict
     *
     * @ORM\ManyToOne(targetEntity="GeoDistrict")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="district", referencedColumnName="id")
     * })
     */
    private $district;

    /**
     * @var GeoRegion
     *
     * @ORM\ManyToOne(targetEntity="GeoRegion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="region", referencedColumnName="region_id")
     * })
     */
    private $region;



    /**
     * Get cityId
     *
     * @return integer 
     */
    public function getCityId()
    {
        return $this->cityId;
    }

    /**
     * Set city
     *
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set lat
     *
     * @param float $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    /**
     * Get lat
     *
     * @return float 
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set lng
     *
     * @param float $lng
     */
    public function setLng($lng)
    {
        $this->lng = $lng;
    }

    /**
     * Get lng
     *
     * @return float 
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * Set district
     *
     * @param GeoDistrict $district
     */
    public function setDistrict(GeoDistrict $district)
    {
        $this->district = $district;
    }

    /**
     * Get district
     *
     * @return GeoDistrict
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Set region
     *
     * @param GeoRegion $region
     */
    public function setRegion(GeoRegion $region)
    {
        $this->region = $region;
    }

    /**
     * Get region
     *
     * @return GeoRegion
     */
    public function getRegion()
    {
        return $this->region;
    }
}