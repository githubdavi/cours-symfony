<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function homePage(PropertyRepository $propertyRepository): Response
    {
        $properties = $propertyRepository->findBy([
            'instantBooking' => true,
        ], [
            'createdAt' => 'DESC'
        ], 4);

        return $this->render('home/index.html.twig', [
            'properties' => $properties,
        ]);
    }

    #[Route('/logement/{id}', name: 'property_show')]
    public function propertyShow($id, PropertyRepository $propertyRepository): Response
    {
        $property = $propertyRepository->find($id);

        return $this->render('logement/logement.html.twig', [
            'property' => $property,
        ]);
    }

    #[Route('/historique', name: 'history')]
    public function history(ReservationRepository $reservationRepository): Response
    {
        $reservations = $reservationRepository->findAll();

        return $this->render('logement/history.html.twig', [
            'reservations' => $reservations,
        ]);
    }

    #[Route('/confirmReservation/{id}', name: 'confirmReservation')]
    public function confirmReservation( PropertyRepository $propertyRepository,$id): Response
    {
        $property = $propertyRepository->find($id);

        return $this->render('logement/confirm.html.twig', [
            'property' => $property,
        ]);
    }
}