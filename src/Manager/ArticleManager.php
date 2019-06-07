<?php
/**
 * Created by PhpStorm.
 * User: dave
 * Date: 07/06/19
 * Time: 18:22
 */

namespace App\Manager;


use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Serializer\SerializerInterface;

class ArticleManager extends BaseManager
{
    public function __construct(
        EntityManagerInterface $em,
        ContainerInterface $container,
        RequestStack $requestStack,
        SessionInterface $session,
        LoggerInterface $logger,
        SerializerInterface $serializer)
    {
        parent::__construct($em, $container, $requestStack, $session, $logger, $serializer);
    }
}