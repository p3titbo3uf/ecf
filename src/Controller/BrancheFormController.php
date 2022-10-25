<?php

namespace App\Controller;

use App\Entity\Branches;
use App\Form\BranchesFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BrancheFormController extends AbstractController
{
    #[Route('/branche-form', name: 'app_branche_form')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $branche = new Branches;
        $form = $this->createForm(BranchesFormType::class, $branche);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $branche = $form->getData();
            $entityManager->persist($branche);
            $entityManager->flush();
            return $this->redirectToRoute('app_security_clientlist');
        }
        return $this->renderForm('branche_form/index.html.twig', [
            'form' => $form,
        ]);
    }
}
