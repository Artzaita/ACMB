<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(): Response
    {
        return $this->render('index/index.html.twig');
    }

    /**
     * @Route("/contact", name="app_contact", methods={"GET", "POST"})
     */
    public function contact(Request $request, EntityManagerInterface $em/*, ContactRepository $contactRepo*/)
    {

    	$contact = new Contact;

		$form = $this->createForm(ContactType::class, $contact);

		$form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $contact->setAgreementDate(new \DateTime());
            $em->persist($contact);
            $em->flush();

            return $this->redirectToRoute('app_home');
        }

    	return $this->render('index/contact.html.twig', [
    		'form' => $form->createView()
    	]);
    }


}
