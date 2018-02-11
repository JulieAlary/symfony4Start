<?php

namespace App\Controller\Core;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends Controller
{
	/**
     * Exemple AdminController do nothing
     *
	 * @return Response
	 * @Route("/admin")
	 */
	public function adminAction()
	{
		return new Response('<html><body>Admin page!</body></html>');
	}
}