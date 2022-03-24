<?php

namespace App\Controller\Front;

use App\Entity\Newsletter;
use App\Form\NewsletterType;
use App\Repository\NewsletterRepository;
use App\Repository\NousRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NousController extends AbstractController
{
    #[Route('nous', name: 'nous')]
    public function index(NousRepository $nousRepository , NewsletterRepository $newsletterRepository, Request $request, EntityManagerInterface $entityManagerInterface): Response
    { $newsletter = new Newsletter();
        $formNewsletter = $this->createForm(NewsletterType::class);
        $formNewsletter->handleRequest($request);
        if ($formNewsletter->isSubmitted() && $formNewsletter->isValid()){
            $newsletter = $formNewsletter->getData();
            $entityManagerInterface->persist($newsletter);
            $entityManagerInterface->flush();
            $this->addFlash('success', 'vous est bien inscrite pour newsletter');
            return $this->redirectToRoute('accueil');
        }
        return $this->render('front/nous/index.html.twig', [
            'nouss'=>$nousRepository->findAll(),
            'formNewsletter'=>$formNewsletter->createView(),
        ]);
    }
}
