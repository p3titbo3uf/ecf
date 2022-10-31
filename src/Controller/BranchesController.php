<?php

namespace App\Controller;

use App\Entity\Branches;
use App\Form\BranchesType;
use App\Repository\BranchesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/branches')]
class BranchesController extends AbstractController
{
    #[Route('/', name: 'app_branches_index', methods: ['GET'])]
    public function index(BranchesRepository $branchesRepository): Response
    {
        return $this->render('branches/index.html.twig', [
            'branches' => $branchesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_branches_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BranchesRepository $branchesRepository): Response
    {
        $branch = new Branches();
        $form = $this->createForm(BranchesType::class, $branch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $branchesRepository->save($branch, true);

            return $this->redirectToRoute('app_branches_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('branches/new.html.twig', [
            'branch' => $branch,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_branches_show', methods: ['GET'])]
    public function show(Branches $branch): Response
    {
        return $this->render('branches/show.html.twig', [
            'branch' => $branch,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_branches_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Branches $branch, BranchesRepository $branchesRepository): Response
    {
        $form = $this->createForm(BranchesType::class, $branch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $branchesRepository->save($branch, true);
            return $this->redirectToRoute('app_clients_show', ['id' => $branch->getClient()->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('branches/edit.html.twig', [
            'branch' => $branch,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_branches_delete', methods: ['POST'])]
    public function delete(Request $request, Branches $branch, BranchesRepository $branchesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $branch->getId(), $request->request->get('_token'))) {
            $branchesRepository->remove($branch, true);
        }

        return $this->redirectToRoute('app_branches_index', [], Response::HTTP_SEE_OTHER);
    }
}
