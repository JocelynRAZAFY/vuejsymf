<?php

namespace App\Controller;

use App\Manager\FamilleManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FamilleController extends AbstractController
{
    /**
     * @var FamilleManager
     */
    private $familleManager;

    /**
     * FamilleController constructor.
     * @param FamilleManager $familleManager
     */
    public function __construct(FamilleManager $familleManager)
    {
        $this->familleManager = $familleManager;
    }

    /**
     * @Route("/api/back/famille/update", name="update_famille", methods={"POST"})
     */
    public function updateFamille()
    {
        return $this->familleManager->updateFamille();
    }

    /**
     * @Route("/api/back/famille/all", name="all_famille", methods={"POST"})
     */
    public function allFamille()
    {
        return $this->familleManager->allFamillePagination();
    }

    /**
     * @Route("/api/back/famille/search", name="search_famille", methods={"POST"})
     */
    public function searchFamille()
    {
        return $this->familleManager->allFamillePagination();
    }

    /**
     * @Route("/api/back/famille/remove", name="remove_famille", methods={"POST"})
     */
    public function removeFamille()
    {
        return $this->familleManager->removeFamille();
    }
}
