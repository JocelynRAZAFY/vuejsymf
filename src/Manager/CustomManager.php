<?php
/**
 * Created by PhpStorm.
 * User: dave
 * Date: 28/05/19
 * Time: 13:00
 */

namespace App\Manager;


use App\Entity\Custom;
use App\Repository\CustomRepository;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\This;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CustomManager extends BaseManager
{
    private $customRepository;

    public function __construct(
        EntityManagerInterface $em,
        ContainerInterface $container,
        RequestStack $requestStack,
        SessionInterface $session,
        LoggerInterface $logger,
        CustomRepository $customRepository)
    {
        $this->customRepository = $customRepository;

        parent::__construct($em, $container, $requestStack, $session, $logger);
    }

    /**
     * update Custom
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @throws \Exception
     */
    public function updateCustom()
    {
        $custom = $this->customRepository->find($this->data->id);
        if(!$custom){
            $custom = new Custom();
            $custom->setCreated(new \DateTime('now'));
            $custom->setUser($this->getUser());
        }

        if(isset($this->data->title)){
            $custom->setTitle($this->data->title);
        }

        $custom->setContent($this->data->content);
        $this->save($custom);

        return $this->success($this->customRepository->transform($custom));
    }


    public function getAllCustom()
    {
        $customs = $this->customRepository->findAll();
        $customs = $this->customRepository->transformAll($customs);

        return $this->success($customs);

    }
}