<?php

namespace Amadi\GeoBundle\Service;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Session;

use Doctrine\ORM\EntityManager;

/**
 * GeocodeBundle.
 * Created by amadi.
 */
class Geo
{
    /**
     * @var EntityManager
     */
    protected $em;
    /**
     * @var \Symfony\Component\Security\Core\SecurityContext
     */
    protected $securityContext;
    /**
     * @var \Symfony\Component\HttpFoundation\Request $request
     */
    protected $request;
    /**
     * @var string IP-address
     */
    protected $ip;

    public function __construct(EntityManager $entityManager, SecurityContext $securityContext)
    {
        $this->em = $entityManager;
        $this->securityContext = $securityContext;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return Geo
     */
    public function init(Request $request)
    {
        $this->request = $request;
        $this->ip = $this->request->getClientIp();
        return $this;
    }

    /**
     * @return array ("region" -> Строка, "location" -> Число)
     */
    public function locate()
    {
        return $this->findInRange();
    }

    /**
     * Ищет диапазон IP, в который входит текущий адресс пользователя.
     *
     * @return \Amadi\GeoBundle\Entity\Ip GeoBundle:Ip Object
     */
    private function findInRange()
    {
        $city = $this->getGeoCityRepository()->rangeIp(ip2long($this->ip));
        return $city;
    }

    /**
     * Записывает в куки код региона. Код по базе а не по нумерации РФ
     * @param $location Объёкт GeoBundle:Region
     */
    public function puts($location)
    {
//        //Создание новых кук.
//        $code = new Cookie('location', $location->getId(), (time() + 3600 * 24 * 7), '/', $this->request->getHost(), false, false);
//        $region = new Cookie('region', $location->getRegion(), (time() + 3600 * 24 * 7), '/', $this->request->getHost(), false, false);
//
//
//        $this->putsToSession($location->getId(), $location->getRegion());
//        //Установка заголовка и его отправка
//        $response = new Response();
//        $response->setCharset('utf-8');
//        $response->headers->setCookie($code);
//        $response->headers->setCookie($region);
//        $response->send();
    }

    /**
     * @param $location
     * @param $region
     */
    private function putsToSession($location, $region)
    {
        ///получение текущих сессий
        $session = $this->request->getSession();
        $session->start();

        //установка новых сессий
        $session->set('location', $location);
        $session->set('region', $region);
        return;
    }

    /**
     * @return \Amadi\GeoBundle\Repository\GeoCityRepository
     */
    private function getGeoCityRepository()
    {
        return $this->em->getRepository('AmadiGeoBundle:GeoCity');
    }
}
