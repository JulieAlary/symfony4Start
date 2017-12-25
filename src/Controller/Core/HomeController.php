<?php

namespace App\Controller\Core;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
	/**
	 * @return Response
	 * @Route("/", name="core_home")
	 */
	public function indexAction()
	{
		return $this->render(
			'core/index.html.twig'
		);
	}
}