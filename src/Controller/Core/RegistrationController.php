<?php

namespace App\Controller\Core;

use App\Entity\Core\User;
use App\Form\Core\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends Controller
{
	public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
	{
		// The Form
		$user = new User();
		$form = $this->createForm(UserType::class, $user);

		// Handle the submit
		$form->handleRequest($request);
		if($form->isSubmitted() && $form->isValid()) {
			// Encode the pass
			$password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
			$user->setPassword($password);

			// Save User
			$em = $this->getDoctrine()->getManager();
			$em->persist($user);
			$em->flush();

			// TODO implements flashMessage & sendMail
			return $this->redirectToRoute('core_home');
		}

		return $this->render('core/register.html.twig',[
			'form' => $form->createView()
		]);
	}
}