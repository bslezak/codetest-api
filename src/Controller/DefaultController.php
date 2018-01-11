<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(path="/api/{version}")
 * @author bslezak
 *
 */
class DefaultController extends Controller {

	/**
	 * @SWG\Info(title="My Pharmacy Locator", version="0.1")
	 * @Route(path="/", name="swagger_index")
	 * @param Request $request
	 */
	public function index(Request $request)
	{
		$swagger = \Swagger\scan($this->get('kernel')->getProjectDir() . '/src/');
		return $this->json($swagger);
	}
}

