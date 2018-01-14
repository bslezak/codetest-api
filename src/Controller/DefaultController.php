<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Swagger\Annotations as SWG;
use Swagger;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

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
        /**
         *
         * @var \Swagger\Annotations\Swagger $swagger
         */
        $swagger = \Swagger\scan($this->get('kernel')->getProjectDir() . '/src/');

        $json = new JsonResponse();
        $json->setContent(sprintf("%s", $swagger));
        return $json;
    }
}

