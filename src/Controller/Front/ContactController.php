<?php

namespace App\Controller\Front;

use App\Entity\Contact;
use App\Entity\Newsletter;
use App\Form\ContactType;
use App\Form\NewsletterType;
use App\Repository\ContactRepository;
use App\Repository\NousRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index( NousRepository $nousRepository,ContactRepository $contactRepository, EntityManagerInterface $entityManagerInterface, Request $request ,MailerInterface $mailer  ): Response
    { $newsletter = new Newsletter();
      $formNewsletter = $this->createForm(NewsletterType::class, $newsletter);
        $formNewsletter->handleRequest($request);
        if ($formNewsletter->isSubmitted() && $formNewsletter->isValid()){
          $newsletter = $formNewsletter->getData($formNewsletter);
          $message = (new Email())
          ->from($newsletter->getEmail())
          ->to('vijayrolla21@gmail.com')
          ->subject($newsletter->getnom() , 'est inscrier a newsletter')
          ->text(' nom : '.$newsletter->getnom().\PHP_EOL. 
          ' prenom : '.$newsletter->getprenom().\PHP_EOL. 
          'message : '.$newsletter->getemail().
          '  inscrier au newsletter')
          ;
          $mailer->send($message);
          $entityManagerInterface->persist($newsletter);
          $entityManagerInterface->flush();
          $this->addFlash('success', 'vous est bien inscrite pour newsletter');
          
      }
        $contact = new Contact();
        $formContact = $this->createForm(ContactType::class, $contact );
        $formContact->handleRequest($request);
        if($formContact->isSubmitted() && $formContact->isValid()){
            $contact = $formContact->getData($formContact);
             $email = (new Email())
            ->from($contact->getemail())
            ->to('vijayrolla21@gmail.com')
          // ->replyTo($contact->getemail())
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject("il y a un nouveau nouveau message " )
            ->text('contacte nom : '.$contact->getnom().\PHP_EOL. 
            'contacte par prenom : '.$contact->getprenom().\PHP_EOL. 
            'message : '.$contact->getmessage())
            ;
        $mailer->send($email);
            $entityManagerInterface->persist(($contact));
            $entityManagerInterface->flush();
            $this->addFlash('success', 'message bien envoyer');
            return $this->redirectToRoute('contact');
           
        }
        return $this->render('front/contact/index.html.twig', [
          'formContact'=>$formContact->createView(),
          'formNewsletter'=>$formNewsletter->createView(),
        ]);
    }
}
