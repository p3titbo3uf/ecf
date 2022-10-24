<?php

namespace App\Controller;

use App\Entity\Clients;
use App\Form\ClientsFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ClientsRepository;

class ClientFormController extends AbstractController
{
    #[Route('/client-form', name: 'app_client_form')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $client = new Clients;
        $form = $this->createForm(ClientsFormType::class, $client);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $client = $form->getData();
            $entityManager->persist($client);
            $entityManager->flush();
            return $this->redirectToRoute('app_security_clientlist');
        }
        return $this->renderForm('client_form/index.html.twig', [
            'form' => $form
        ]);
    }
}
