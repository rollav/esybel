<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\SignUpType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class SignUpController extends AbstractController
{
    #[Route('/signup', name: 'signup')]
    public function index(Request $request, EntityManagerInterface $entityManagerInterface , UserPasswordHasherInterface $userPasswordHasherInterface): Response
    {  
        
        $form = $this->createForm(SignUpType::class );
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $user = $form->getData();
            $user->setPassword($userPasswordHasherInterface->hashPassword($user , $user->getPassword()));
            $entityManagerInterface->persist($user);
            $entityManagerInterface->flush();
            return $this->redirectToRoute('login');

        }



        return $this->render('sign_up/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
