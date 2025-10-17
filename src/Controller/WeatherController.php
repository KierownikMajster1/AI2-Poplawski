<?php

namespace App\Controller;

use App\Repository\LocationRepository;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Location;
use App\Repository\MeasurementRepository;

final class WeatherController extends AbstractController
{
//    #[Route('/weather/{id}', name: 'app_weather', requirements: ['id' => '\d+'])]
//    public function city(Location $location, MeasurementRepository $repository): Response
//    {
//        $measurements = $repository->findByLocation($location);
//
//        return $this->render('weather/city.html.twig', [
//            'location' => $location,
//            'measurements' => $measurements,
//        ]);
//    }
    #[Route('/weather/{country}/{city}', name: 'app_weather')]
    public function city(MeasurementRepository $repository, #[MapEntity(expr: 'repository.findByCityAndCountry(city, country)')]
    Location $location, string $country, string $city): Response
    {
        $measurements = $repository->findByLocation($location);

        return $this->render('weather/city.html.twig', [
            'location' => $location,
            'measurements' => $measurements,
        ]);
    }
}
