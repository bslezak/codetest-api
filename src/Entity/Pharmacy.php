<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Swagger\Annotations as SWG;

/**
 * Pharmacy Entity
 *
 * @author Brian Slezak <brian@theslezaks.com>
 *
 *         @ORM\Entity(repositoryClass="App\Repository\PharmacyRepository")
 *         @SWG\Definition(required={"name"}, type="object", @SWG\Xml(name="Pharmacy"))
 */
class Pharmacy implements \JsonSerializable
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    private $pharmacy_id;

    // add your own fields

    /**
     * @ORM\Column(type="string")
     * @SWG\Property(example="The Pharmacy Store",)
     *
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     * @SWG\Property(example="404 Null St")
     *
     * @var string
     */
    private $address;

    /**
     * @ORM\Column(type="string")
     * @SWG\Property(example="Mankato")
     *
     * @var string
     */
    private $city;

    /**
     * @ORM\Column(type="string")
     * @SWG\Property(example="MS")
     *
     * @var string
     */
    private $state;

    /**
     * @ORM\Column(type="integer")
     * @SWG\Property(example="96522")
     *
     * @var int
     */
    private $zip;

    /**
     * @ORM\Column(type="float")
     * @SWG\Property(example="39.828387")
     *
     * @var float
     */
    private $latitude;

    /**
     * @ORM\Column(type="float")
     * @SWG\Property(example="-98.579469")
     *
     * @var float
     */
    private $longitude;

    /**
     *
     * @return number
     */
    public function getPharmacy_id()

    {
        return $this->pharmacy_id;
    }

    /**
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     *
     * @return number
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     *
     * @return number
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     *
     * @return number
     */
    public function getLong()
    {
        return $this->long;
    }

    /**
     *
     * @param number $pharmacy_id
     */
    public function setPharmacy_id($pharmacy_id)
    {
        $this->pharmacy_id = $pharmacy_id;
    }

    /**
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     *
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     *
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     *
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     *
     * @param number $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     *
     * @param number $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     *
     * @param number $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * Gets a serializable form of a pharmacy object
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return array(
            'name' => $this->name,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude
        );
    }
}
