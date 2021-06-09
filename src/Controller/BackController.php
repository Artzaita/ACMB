<?php

namespace App\Controller;

use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BackController extends AbstractController
{
    /**
     * @Route("/back", name="app_back")
     */
    public function index(): Response
    {
        $user = true;
        return $this->render('back/index.html.twig', [
            'controller_name' => 'BackController',
            'user' => $user,
        ]);
    }

    /**
     * @Route("/back/contact", name="app_back_contact")
     */
    public function contact(EntityManagerInterface $em): Response
    {
        $user = true;

        $repo = $em->getRepository(Contact::class);

        $contacts = $repo->findBy([], ['AgreementDate'=>'DESC']);

        return $this->render('back/contact.html.twig', [
            'user' => $user,
            'contacts' => $contacts,
        ]);
    }










}
