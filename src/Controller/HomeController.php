<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(PostRepository $postRepo, EntityManagerInterface $entityManager): Response
    {
        $post = new Post();
        $post
//            ->setUserId(1)
            ->setTitle('Symfony test')
            ->setBody('Symfony test lorem ipsum');

        $entityManager->persist($post);
        $entityManager->flush();


        return $this->render('home/index.html.twig', [
            'posts' => $postRepo->findBy([], ['id' => 'DESC']),
        ]);
    }
}
