<?php

namespace App\Controller\Core;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
	/**
     * Home Page
     *
	 * @return Response
     * @Route("/", name="core_home")
     * @Security("has_role('ROLE_ADMIN')")
	 */
	public function indexAction()
	{
		return $this->render(
			'core/index.html.twig'
		);
	}
}