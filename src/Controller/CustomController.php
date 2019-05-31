<?php

namespace App\Controller;

use App\Manager\CustomManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CustomController extends AbstractController
{
    private $customManager;

    public function __construct(CustomManager $customManager)
    {
        $this->customManager = $customManager;
    }

    /**
     * @Route("/api/back/custom/add", name="add_custom", methods={"POST"})
     */
    public function addCustom()
    {
        return $this->customManager->updateCustom();
    }

    /**
     * @Route("/api/back/custom/edit", name="edit_custom", methods={"POST"})
     */
    public function editCustom()
    {
        return $this->customManager->updateCustom();
    }

    /**
     * @Route("/api/back/custom/list", name="list_custom", methods={"GET"})
     */
    public function listCustom()
    {
        return $this->customManager->getAllCustom();
    }
}
