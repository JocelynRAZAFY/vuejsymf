<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProviderCustomerController extends AbstractController
{
    /**
     * @Route("/provider/customer", name="provider_customer")
     */
    public function index()
    {
        return $this->render('provider_customer/index.html.twig', [
            'controller_name' => 'ProviderCustomerController',
        ]);
    }
}
