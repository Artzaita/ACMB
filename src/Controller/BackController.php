<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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

    /**
     * @Route("/back/utilisateurs", name="app_back_user")
     */
    public function createUser(EntityManagerInterface $em, Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $user = new User();

        #$user = true;

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('password')->getData()
                )
            );

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('app_back_user');

        }

         return $this->render('back/utilisateurs.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);

    }








}
