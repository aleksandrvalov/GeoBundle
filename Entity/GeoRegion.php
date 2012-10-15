<?php

namespace Amadi\GeoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Berg\SiteBundle\Entity\GeoRegion
 *
 * @ORM\Table(name="geo_region")
 * @ORM\Entity
 */
class GeoRegion
{
    /**
     * @var integer $regionId
     *
     * @ORM\Column(name="region_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $regionId;

    /**
     * @var string $region
     *
     * @ORM\Column(name="region", type="string", length=128, nullable=false)
     */
    private $region;

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
     * Get regionId
     *
     * @return integer 
     */
    public function getRegionId()
    {
        return $this->regionId;
    }

    /**
     * Set region
     *
     * @param string $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * Get region
     *
     * @return string 
     */
    public function getRegion()
    {
        return $this->region;
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
}