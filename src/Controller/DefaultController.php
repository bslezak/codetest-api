<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @IgnoreAnnotation("SWG\Info")
 * @author bslezak
 *
 */
class DefaultController extends Controller {

	/**
	 * @SWG\Info(title="My Pharmacy Locator", version="0.1")
	 * @Route("/", name="homepage")
	 * @param Request $request
	 */
	public function indexAction(Request $request)
	{
		$swagger = \Swagger\scan($this->get('kernel')->getProjectDir() . '/src/');
		return $this->json($swagger);
	}
}

