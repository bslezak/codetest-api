<?php
namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\PharmacyRepository;
use Doctrine\ORM\Mapping as ORM;
use Swagger\Annotations as SWG;

/**
 * PharmacyController provides access to pharmacy records
 *
 * @author Brian Slezak <brian@theslezaks.com>
 *         @Route(path="/api/{version}/pharmacy")
 *         @ORM\Entity(repositoryClass="App\Repository\PharmacyRepository")
 *
 */
class PharmacyController extends Controller
{

    /**
     *
     * @var PharmacyRepository
     */
    private $pharmacyRepository;

    public function __construct(PharmacyRepository $pr)
    {
        $this->pharmacyRepository = $pr;
    }

    /**
     * @SWG\Get(path="/api/v1/pharmacy/",
     * tags={"pharmacy"},
     * description="Retrieve pharmacy list or nearest location if filtered by latitude and longitude",
     * produces={"application/json"},
     * @SWG\Response(response="200", description="Successful operation",@SWG\Schema( type="array",@SWG\Items(ref="#/definitions/Pharmacy"))),
     * @SWG\Parameter(name="latitude", in="query", description="A latitude coordinate to filter results by", type="number"),
     * @SWG\Parameter(name="longitude", in="query", description="A longitude coordinate to filter results by", type="number"),
     * )
     *
     * @Route(path="/", name="pharmacies_index")
     *
     * @param Request $request
     */
    public function index($version, Request $request)
    {
        $results = null;
        // Check if lat and long were provided for search, otherwise return all records
        if ($request->query->has('latitude') && $request->query->has('longitude')) {

            // Get lat and long and convert to float
            $latitude = floatval($request->query->get('latitude'));
            $longitude = floatval($request->query->get('longitude'));

            $results = $this->pharmacyRepository->findNearest($latitude, $longitude);
        } else {
            $results = $this->pharmacyRepository->findAll();
        }

        // Return JSON response
        $jsonResponse = $this->json($results);

        return $jsonResponse;
    }
}

