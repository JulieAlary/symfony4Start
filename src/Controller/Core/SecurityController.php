<?php

namespace App\Controller\Core;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Response;

class SecurityController extends Controller
{
    /**
     * @param Request $request
     * @param AuthenticationUtils $authUtils
     * @return Response
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request, AuthenticationUtils $authUtils)
    {
        // Get error if one
        $error = $authUtils->getLastAuthenticationError();

        // last username entered by user
        $lastUsername = $authUtils->getLastUsername();

        return $this->render('core/security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }
}