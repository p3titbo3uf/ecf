<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Entity\Clients;

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
    public function client(): Response
    {
        return $this->render('client/index.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }

    #[Route('/branche')]
    public function branche(): Response
    {
        return $this->render('branche/index.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }
}
