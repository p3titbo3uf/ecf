<?php

namespace App\Controller;

use App\Entity\Clients;
use App\Form\ClientsFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientFormController extends AbstractController
{
    #[Route('/client-form', name: 'app_client_form')]
    public function index(Request $request): Response
    {
        $client = new Clients;
        $form = $this->createForm(ClientsFormType::class, $client);
        return $this->renderForm('client_form/index.html.twig', [
            'form' => $form
        ]);
    }
}
