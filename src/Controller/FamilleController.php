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
     * @Route("/api/back/famille/update", name="update_famille")
     */
    public function updateFamille()
    {
        return $this->familleManager->updateFamille();
    }
}
