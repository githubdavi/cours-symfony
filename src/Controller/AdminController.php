<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin')]
    public function homePage(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();

        return $this->render('admin/index.html.twig', [
            'users' => $users,
        ]);
    }
    #[Route('/admin/user', name: 'admin_user')]
    public function userPage(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();

        return $this->render('admin/user.html.twig', [
            'users' => $users,
        ]);
    }
}