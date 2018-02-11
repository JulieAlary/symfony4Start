<?php

namespace App\Controller\Core;

use App\Entity\Core\User;
use App\Form\Core\user\UserType;
use App\Service\MailManager;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UserController
 * @package App\Controller\Core
 */
class UserController extends Controller
{

    /**
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param MailManager $mailManager
     * @param LoggerInterface $logger
     * @return RedirectResponse|Response
     *
     * @Route("/registration", name="core_registration")
     *
     */
    public function registrationAction(Request $request, UserPasswordEncoderInterface $passwordEncoder, MailManager $mailManager, LoggerInterface $logger)
    {
        // The Form
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        // Handle the submit
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Encode the pass
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            // Save User
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $logger->info('Registration email sended');

            /* Send Mail */
            $mailManager->sendUserRegistrationEmail($user);

            // TODO implements flashMessage
            return $this->redirectToRoute('core_home');
        }

        $logger->info('Be careful, registration email not sended');

        return $this->render('core/user/register.html.twig', [
            'form' => $form->createView()
        ]);
    }
}