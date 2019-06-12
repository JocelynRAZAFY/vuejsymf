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
use Symfony\Component\Serializer\SerializerInterface;

class CustomManager extends BaseManager
{
    private $customRepository;

   public function __construct(
       EntityManagerInterface $em,
       ContainerInterface $container,
       RequestStack $requestStack,
       SessionInterface $session,
       LoggerInterface $logger,
       SerializerInterface $serializer,
        CustomRepository $customRepository)
   {
       $this->customRepository = $customRepository;
       parent::__construct($em, $container, $requestStack, $session, $logger, $serializer);
   }

    /**
     * update Custom
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @throws \Exception
     */
    public function updateCustom()
    {
        $custom = $this->customRepository->find($this->data->id);
        $add = false;
        if(!$custom){
            $add = true;
            $custom = new Custom();
            $custom->setCreated(new \DateTime('now'));
            $custom->setUser($this->getUser());
        }
        if(isset($this->data->title)){
            $custom->setTitle($this->data->title);
        }

        $custom->setContent($this->data->content);
        $this->save($custom);

        if($add){
            $customs = $this->customsPagination(0);
            $res = [
                'rows' => $customs,
                'totalRows' => count($this->customRepository->findAll())
            ];
            return $this->success($res);
        }else{
            return $this->success($this->customRepository->transform($custom));
        }


    }

    /**
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getAllCustom()
    {
        $customs = $this->customRepository->findAll();
        $customs = $this->customRepository->transformAll($customs);
        return $this->success($customs);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getAllPagination()
    {
        if($this->data->firstResult - 1 == 0){
            $firstResult = 0;
        }else{
            $firstResult = ($this->data->firstResult - 1) * $this->data->perPage;
        }
        $customs = $this->customsPagination($firstResult);
        $res = [
            'rows' => $customs,
            'totalRows' => count($this->customRepository->findAll())
        ];
        return $this->success($res);
    }

    /**
     * @param $firstResult
     * @return array
     */
    private function customsPagination($firstResult)
    {
        $customs = $this->customRepository->getCustomsPagination($firstResult);
        return $this->customRepository->transformAll($customs);
    }
}