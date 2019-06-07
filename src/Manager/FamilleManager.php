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
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
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
     * FamilleManager constructor.
     * @param EntityManagerInterface $em
     * @param ContainerInterface $container
     * @param RequestStack $requestStack
     * @param SessionInterface $session
     * @param LoggerInterface $logger
     * @param SerializerInterface $serializer
     * @param FamilleRepository $familleRepository
     * @param FileUploader $fileUploader
     */
    public function __construct(
        EntityManagerInterface $em,
        ContainerInterface $container,
        RequestStack $requestStack,
        SessionInterface $session,
        LoggerInterface $logger,
        SerializerInterface $serializer,
        FamilleRepository $familleRepository,
        FileUploader $fileUploader)
    {
        $this->familleRepository = $familleRepository;
        $this->fileUploader = $fileUploader;
        parent::__construct($em, $container, $requestStack, $session, $logger, $serializer);
    }

    public function updateFamille()
    {
        $famille = $this->familleRepository->find($this->data->id);
        if(!$famille){
            $famille = new Famille();
        }else{
            $oldPhoto = $famille->getPhoto();
        }

        $famille->setLabel($this->formData['label']);
        $photo = $this->files['photo'];
        if($photo){
            $fileName = $this->fileUploader->upload($photo, $oldPhoto);
            $famille->setPhoto($fileName);
        }

        $this->save($famille);

        return $this->success();
    }
}