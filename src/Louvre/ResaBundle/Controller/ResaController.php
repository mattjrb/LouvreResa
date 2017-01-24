<?php

namespace Louvre\ResaBundle\Controller;

use Louvre\ResaBundle\Entity\Reservation;
use Louvre\ResaBundle\Form\ReservationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ResaController extends Controller
{

    public function stepOneAction(REQUEST $request)
    {
        $resa = new Reservation();
        $form = $this->createForm(ReservationType::class, $resa);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) 
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($resa);
            $em->flush();
            
            $request->getSession()->getFlashBag()->add('notice', 'Choix des billets validé.');
            
            return $this->redirectToRoute('louvre_resa_step_one');
        }
        
        return $this->render('LouvreResaBundle:Resa:resa.html.twig', array(
        'form' => $form->createView(),
        ));

    }

    
}

