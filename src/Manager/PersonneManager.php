<?php
/**
 * Created by PhpStorm.
 * User: jocelyn
 * Date: 6/1/19
 * Time: 10:06 AM
 */

namespace App\Manager;


use App\Entity\Personne;
use App\Repository\PersonneRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Serializer\SerializerInterface;

class PersonneManager extends BaseManager
{
    private $personneRepository;

    public function __construct(
        EntityManagerInterface $em,
        ContainerInterface $container,
        RequestStack $requestStack,
        SessionInterface $session,
        LoggerInterface $logger,
        SerializerInterface $serializer,
        PersonneRepository $personneRepository)
    {
        $this->personneRepository = $personneRepository;
        parent::__construct($em, $container, $requestStack, $session, $logger, $serializer);
    }

    public function updatePersone()
    {
        $personne = $this->personneRepository->find($this->data->id);
        if(!$personne){
            $personne = new Personne();
            $personne->setCreated(new \DateTime('now'));
        }

        $personne->setUpdated(new \DateTime('now'));
        if(isset($this->data->lastName)){
            $personne->setLastName($this->data->lastName);
        }
        if(isset($this->data->firstName)){
            $personne->setFirstName($this->data->firstName);
        }
        if(isset($this->data->birthday)){
            $personne->setBirthday(new \DateTime($this->data->birthday));
        }
        if(isset($this->data->registrationNumber)){
            $personne->setRegistrationNumber($this->data->registrationNumber);
        }
        if(isset($this->data->adress)){
            $personne->setAdress($this->data->adress);
        }
        if(isset($this->data->tel)){
            $personne->setTel($this->data->tel);
        }

        $this->save($personne);


        return $this->success($this->personneRepository->transform($personne));
    }

    public function getAllPersonne()
    {
        $personnes = $this->personneRepository->findAll();
        $personnes = $this->personneRepository->transformAll($personnes);
        $personnes = $this->getDataFormat($personnes);

        return $this->success($personnes);
    }

    public function deletePersonne()
    {
        $personne = $this->personneRepository->find($this->data->id);
        if($personne){
            $personne->setDel(true);
            $personne->setDeleted(new \DateTime('now'));
           return $this->success('Personne deleted');
        }

        return $this->success('Personne deleted');
    }

    private function getDataFormat($personnes){

        return [
            'links' => [
                'pagination' => [
                    'total' => 50,
                    'per_page' => 3,
                    'current_page' => 1,
                    'last_page' => 2,
                    'next_page_url' => '...',
                    'prev_page_url' => '...',
                    'from' => 1,
                    'to' => 3,
                ]
            ],
            'data' => $personnes
        ];
    }
}