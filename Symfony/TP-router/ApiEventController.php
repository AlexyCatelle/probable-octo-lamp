<?php

namespace App\Controller;

use App\Entity\Events;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/events')]
final class ApiEventController extends AbstractController
{
    private array $events = [
        1 => ['id' => 1, 'title' => 'Anniversaire', 'location' => 'Lille', 'date' => '20/04/2025', 'isPublic' => true],
        2 => ['id' => 2, 'title' => 'Conférence Tech', 'location' => 'Paris', 'date' => '15/06/2025', 'isPublic' => true],
        3 => ['id' => 3, 'title' => 'Mariage', 'location' => 'Bordeaux', 'date' => '10/08/2025', 'isPublic' => false],
        4 => ['id' => 4, 'title' => 'Concert de Jazz', 'location' => 'Lyon', 'date' => '05/07/2025', 'isPublic' => true],
        5 => ['id' => 5, 'title' => 'Fête de quartier', 'location' => 'Marseille', 'date' => '01/05/2025', 'isPublic' => true],
        6 => ['id' => 6, 'title' => 'Séminaire d\'entreprise', 'location' => 'Nantes', 'date' => '12/09/2025', 'isPublic' => false],
        7 => ['id' => 7, 'title' => 'Soirée cinéma', 'location' => 'Toulouse', 'date' => '18/07/2025', 'isPublic' => true],
        8 => ['id' => 8, 'title' => 'Atelier peinture', 'location' => 'Strasbourg', 'date' => '23/06/2025', 'isPublic' => false],
        9 => ['id' => 9, 'title' => 'Forum étudiant', 'location' => 'Grenoble', 'date' => '29/10/2025', 'isPublic' => true],
        10 => ['id' => 10, 'title' => 'Hackathon', 'location' => 'Rennes', 'date' => '03/12/2025', 'isPublic' => true],
    ];

    // ROUTES GET START

    #[Route('', name: 'get_events', methods: ['GET'])]
    // Liste des événements, possibilité de filtre par lieu
    public function list(): JsonResponse{
        return new JsonResponse(array_values($this->events), Response::HTTP_OK);
    }

    #[Route('/public', name: 'get_events_public', methods: ['GET'])]
    // Liste des événements publics uniquement

    public function listPublic(): JsonResponse
    {
        $publicEvents = array_filter($this->events, fn($event) => $event['isPublic'] === true);
        return new JsonResponse(array_values($publicEvents), Response::HTTP_OK);
    }

    #[Route('/{id}', name: 'get_event_detail', methods: ['GET'])]
    // Détail d’un événement
    #[Route('/{id}', name: 'get_event_detail', methods: ['GET'])]
    public function getEvent(int $id): JsonResponse
    {
        if (!isset($this->events[$id])) {
            return new JsonResponse(['message' => 'Événement non trouvé'], Response::HTTP_NOT_FOUND);
        }
    }


// ROUTES GET END

// ROUTES POST START

    #[Route('', name: 'add_event', methods: ['POST'])]
    // Création d’un événement
    public function add(Request $request): JsonResponse{

        $data = json_decode($request -> getContent(), true);
        $data['id'] = rand(100,900);

        return new JsonResponse([
            'message'=>'evenement ajouté',
            'evenement' => $data],
            status:Response::HTTP_CREATED);

    }

// ROUTES POST END

// ROUTES PUT START

    #[Route('/{id}', name: 'update_event', methods: ['PUT'])]
    // Mise à jour d’un événement
    public function update(Request $request, int $id): JsonResponse{

        $data = json_decode ($request -> getContent(), true);
        $data['id'] = $id;

        return new JsonResponse([
            'message' => "evenement $id mis à jour",
            'evenement' => $data
        ], Response::HTTP_OK);
    }

// ROUTES PUT END

// ROUTES DELETE START

    #[Route('/{id}', name: 'delete_event', methods: ['DELETE'])]
    // Suppression d’un événement
    public function delete(int $id): JsonResponse{
        return new JsonResponse([
            'message' =>"Evenement $id supprimé"
        ], status: Response::HTTP_NO_CONTENT);
    }

// ROUTE DELETE END

}
