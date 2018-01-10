<?php
namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author bslezak
 *
 */
class PharmacyController extends Controller
{

	/**
	 * @SWG\Get(
	 * path="/api/pharmacies",
	 * @SWG\Response(response="200", description="A list of pharmacies"))
	 * @Route("/api/pharmacies/", name="pharmacies")
	 *
	 * @param Request $request
	 */
	public function indexAction(Request $request)
	{
		$response = null;
		if ($request->query->has('lat') && $request->query->has('long')) {
			$response = $this->searchByLatLong($request->query->get('lat'), $request->query->get('long'));
		} else {
			$response = $this->json(array(
				'result' => 'whole_list'
			));
		}
		return $response;
	}

	protected function searchByLatLong($lat, $long)
	{
		return $this->json(array(
			'lat' => $lat,
			'long' => $long
		));
	}
}

