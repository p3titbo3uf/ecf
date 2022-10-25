<?php

namespace App\Controller;

use App\Entity\Branches;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Entity\Clients;
use App\Repository\BranchesRepository;

class SecurityController extends AbstractController
{
    #[Route(path: '/', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/deconnexion', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route('/liste-des-clients')]
    public function clientList(ManagerRegistry $doctrine): Response
    {
        $clients = $doctrine->getRepository(Clients::class)->findAll();
        if (!$clients) {
            throw $this->createNotFoundException(
                'Il n\'y a pas de clients'
            );
        }
        return $this->render('clientList/index.html.twig', ['clients' => $clients]);
    }

    #[Route('/client')]
    public function client(ManagerRegistry $doctrine): Response
    {
        $owns = $this->getUser()->getOwns();
        if (!$owns)
            return $this->render('client/index.html.twig', ['noClient' => 'Cet utilisateur ne possède aucun client.']);
        $client = $doctrine->getRepository(Clients::class)->find($owns);
        return $this->render('client/index.html.twig', ['client' => $client]);
    }

    #[Route('/branche')]
    public function branche(ManagerRegistry $doctrine): Response
    {
        $owns = $this->getUser()->getOwns();
        $manages = $this->getUser()->getManages();
        $branche = $doctrine->getRepository(Branches::class)->findOneBy(['client' => $owns]);
        if (!$manages)
            return $this->render('branche/index.html.twig', ['noBranche' => 'Cet utilisateur ne gère aucunne salle de sport.']);
        return $this->render('branche/index.html.twig', ['branche' => $branche]);
    }
}
