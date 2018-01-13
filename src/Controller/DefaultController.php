<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Swagger\Annotations as SWG;

/**
 * DefaultController provides swagger json interface
 *
 * @author Brian Slezak <brian@theslezaks.com>
 *
 *         @Route(path="/api/{version}")
 */
class DefaultController extends Controller
{

    /**
     * @SWG\Info(title="My Pharmacy Locator", version="1.0")
     * @Route(path="/", name="swagger_index")
     *
     * @param Request $request
     */
    public function index($version, Request $request)
    {
        $swagger = \Swagger\scan($this->get('kernel')->getProjectDir() . '/src/');
        return $this->json($swagger);
    }
}

