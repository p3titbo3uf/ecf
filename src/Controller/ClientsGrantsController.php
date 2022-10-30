<?php

namespace App\Controller;

use App\Entity\ClientsGrants;
use App\Form\ClientsGrantsType;
use App\Repository\ClientsGrantsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/clients/grants')]
class ClientsGrantsController extends AbstractController
{
    #[Route('/', name: 'app_clients_grants_index', methods: ['GET'])]
    public function index(ClientsGrantsRepository $clientsGrantsRepository): Response
    {
        return $this->render('clients_grants/index.html.twig', [
            'clients_grants' => $clientsGrantsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_clients_grants_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ClientsGrantsRepository $clientsGrantsRepository): Response
    {
        $clientsGrant = new ClientsGrants();
        $form = $this->createForm(ClientsGrantsType::class, $clientsGrant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $clientsGrantsRepository->save($clientsGrant, true);

            return $this->redirectToRoute('app_clients_grants_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('clients_grants/new.html.twig', [
            'clients_grant' => $clientsGrant,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_clients_grants_show', methods: ['GET'])]
    public function show(ClientsGrants $clientsGrant): Response
    {
        return $this->render('clients_grants/show.html.twig', [
            'clients_grant' => $clientsGrant,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_clients_grants_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ClientsGrants $clientsGrant, ClientsGrantsRepository $clientsGrantsRepository): Response
    {
        $form = $this->createForm(ClientsGrantsType::class, $clientsGrant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $clientsGrantsRepository->save($clientsGrant, true);

            return $this->redirectToRoute('app_clients_grants_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('clients_grants/edit.html.twig', [
            'clients_grant' => $clientsGrant,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_clients_grants_delete', methods: ['POST'])]
    public function delete(Request $request, ClientsGrants $clientsGrant, ClientsGrantsRepository $clientsGrantsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $clientsGrant->getId(), $request->request->get('_token'))) {
            $clientsGrantsRepository->remove($clientsGrant, true);
        }

        return $this->redirectToRoute('app_clients_grants_index', [], Response::HTTP_SEE_OTHER);
    }
}
