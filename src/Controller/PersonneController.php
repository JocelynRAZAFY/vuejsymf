<?php

namespace App\Controller;

use App\Manager\PersonneManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PersonneController extends AbstractController
{
    private $personneManager;

    public function __construct(PersonneManager $personneManager)
    {
        $this->personneManager = $personneManager;
    }

    /**
     * @Route("/api/back/personne/add", name="add_personne", methods={"POST"})
     */
    public function addPersonne()
    {
        return $this->personneManager->updatePersone();
    }

    /**
     * @Route("/api/back/personne/edit", name="edit_personne", methods={"POST"})
     */
    public function editPersonne()
    {
        return $this->personneManager->updatePersone();
    }

    /**
     * @Route("/api/back/personne/all", name="all_personne", methods={"GET"})
     */
    public function allPersonne()
    {
        return $this->personneManager->getAllPersonne();
    }
}
