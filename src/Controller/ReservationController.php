<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\sms\TwilioApi;

/**
 * @Route("/reservation")
 */
class ReservationController extends AbstractController
{
    /**
     * @Route("/", name="reservation_index", methods={"GET"})
     */
    public function index(ReservationRepository $reservationRepository): Response
    {
        return $this->render('Vitrine/ListeReservations.html.twig', [
            'reservations' => $reservationRepository->findAll(),
        ]);
    }
    /**
     * @Route("/calendar", name="reservation_calendar", methods={"GET"})
     */
    public function calendar(ReservationRepository $reservationRepository): Response
    {
        $events =$reservationRepository->findAll();
        $rdvs=[];
        foreach ($events as $event){
            $rdvs[]=[
                'id' => $event->getId(),
               // not working reseravation id
                'start' => $event->getDateReservation()->format('Y-m-d H:i:s'),
                'title' => $event->getNomPrenom(),
                'allDay' => false,





            ];
        }

        $data = json_encode($rdvs);
        return $this->render('reservation/calendrier.html.twig',compact('data'));


    }

    /**
     * @Route("/new", name="reservation_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reservation);
            $entityManager->flush();

            return $this->redirectToRoute('reservation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('Vitrine/AjoutReservationBack.html.twig', [
            'reservation' => $reservation,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/neww", name="reservation_neww", methods={"GET","POST"})
     */
    public function newRese(Request $request): Response
    {
        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reservation);
            $entityManager->flush();
            $twilio = new TwilioApi('AC13cd6564f68360d870692d6c884ea639','c3fc6d1c28fa7af2f0074e8d4745b3cc','+12055489531');
            $twilio->sendSMS('+21650868581','hello from twilio');

            return $this->redirectToRoute('reservation_neww', [], Response::HTTP_SEE_OTHER);


        }

        return $this->render('Vitrine/AjoutReservationFront.html.twig', [
            'reservation' => $reservation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reservation_show", methods={"GET"})
     */
    public function show(Reservation $reservation): Response
    {
        return $this->render('reservation/show.html.twig', [
            'reservation' => $reservation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="reservation_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Reservation $reservation): Response
    {
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reservation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reservation/edit.html.twig', [
            'reservation' => $reservation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reservation_delete", methods={"POST"})
     */
    public function delete(Request $request, Reservation $reservation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reservation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($reservation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('reservation_index', [], Response::HTTP_SEE_OTHER);
    }
}
