<?php
/**
 * Created by PhpStorm.
 * User: dave
 * Date: 07/06/19
 * Time: 18:24
 */

namespace App\Manager;


use App\Entity\Famille;
use App\Repository\FamilleRepository;
use App\Services\FileUploader;
use App\Services\ToolsService;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Serializer\Normalizer\DataUriNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class FamilleManager extends BaseManager
{
    /**
     * @var FamilleRepository
     */
    private $familleRepository;

    /**
     * @var FileUploader
     */
    private $fileUploader;

    /**
     * @var ToolsService
     */
    private $toolsService;

    public function __construct(
        EntityManagerInterface $em,
        ContainerInterface $container,
        RequestStack $requestStack,
        SessionInterface $session,
        LoggerInterface $logger,
        SerializerInterface $serializer,
        FamilleRepository $familleRepository,
        FileUploader $fileUploader,
        ToolsService $toolsService)
    {
        $this->familleRepository = $familleRepository;
        $this->fileUploader = $fileUploader;
        $this->toolsService = $toolsService;

        parent::__construct($em, $container, $requestStack, $session, $logger, $serializer);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function updateFamille()
    {

        $oldPhoto = '';
        $famille = $this->familleRepository->find($this->data->id);
        if(!$famille){
            $famille = new Famille();
            $action = 'add';
        }else{
            $oldPhoto = $famille->getPhoto();
            $action = 'edit';
        }

        // image venant du crop
        if($this->data->photo){
            if($oldPhoto){
                $this->toolsService->removeImage($oldPhoto);
            }
            $photo = $this->toolsService->uploadBase64($this->data->photo);
            $famille->setPhoto($photo);
        }
        $famille->setLabel($this->data->label);
        $this->save($famille);

        $res = [
            'action' => $action,
            'famille' => $this->familleRepository->transform($famille)
        ];
        return $this->success($res);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function allFamille()
    {
        $familles = $this->familleRepository->findBy([],['label' => 'ASC']);
        return $this->success($this->familleRepository->transformAll($familles));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function allFamillePagination()
    {
        if($this->data->firstResult - 1 == 0){
            $firstResult = 0;
        }else{
            $firstResult = ($this->data->firstResult - 1) * $this->data->perPage;
        }

        if(isset($this->data->search) && $this->data->search != ''){
            $search = $this->data->search;
            $totalRows = $this->familleRepository->countFamilleBySearch($search);
        }else{
            $search = null;
            $totalRows = count($this->familleRepository->findAll());
        }

        $familles = $this->famillePagination($firstResult,$this->data->perPage,$search);

        $res = [
            'rows' => $familles,
            'totalRows' => $totalRows,
        ];
        return $this->success($res);
    }

    /**
     * @param $firstResult
     * @param $perPage
     * @param $search
     * @return array
     */
    private function famillePagination($firstResult,$perPage,$search)
    {
        $customs = $this->familleRepository->getFamillePagination($firstResult,$perPage,$search);
        return $this->familleRepository->transformAll($customs);
    }

    public function removeFamille()
    {
        $famille = $this->familleRepository->find($this->data->id);
        if($famille){
            $this->remove($famille);
        }

        return $this->success('Ligne supprimer');
    }
}