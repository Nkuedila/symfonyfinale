<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\ContactEntity;
use App\Form\DemoFormType;
use App\Form\ContactFormType;
use App\Service\MailService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, EntityManagerInterface $entityManager, MailerInterface $mailer, MailService $ms): Response
    {
        $form = $this->createForm(ContactFormType::class);
        $form->handleRequest($request);
        $titre = "Contact";
        $search = "";

        if ($form->isSubmitted() && $form->isValid()) {
            $message = new Contact();
            $data = $form->getData();
            $message = $data;

            $entityManager->persist($message);
            $entityManager->flush();

            $ms->SendEmail($mailer, 'hello@example.com', $message->getEmail(), $message->getObjet(), $message->getMessage());

            return $this->redirectToRoute('app_accueil');
        }

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'titre' => $titre,
            'search' => $search,
            'form' => $form,
        ]);
    }
}
