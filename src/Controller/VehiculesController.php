<?php

namespace App\Controller;

use App\Entity\Vehicule;
use App\Form\VehiculeType;
use App\Repository\VehiculeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Dompdf\Dompdf;
use Dompdf\Options;

/**
 * @Route("/vehicules")
 */
class VehiculesController extends AbstractController
{
    //Affichage Véhicules pour L'utilisateur
    /**
     * @Route("/VehiculeUser", name="ListeVeh", methods={"GET"})
     */
    public function indexFront(): Response
    {
        $vehicules = $this->getDoctrine()
            ->getRepository(Vehicule::class)
            ->findAll();

        return $this->render('Vitrine/ListeVeh.html.twig', [
            'vehicules' => $vehicules,
        ]);
    }
    //TriParpuissance
    /**
     * @Route("/", name="vehicules_puissance", methods={"GET"})
     */
    public function index(VehiculeRepository $vehiculeRepository): Response
    {
        return $this->render('Vitrine/ListeVehiculesBack.html.twig', [
            'vehicules' => $vehiculeRepository->triVehicule(),
        ]);
    }
    //Tri par ID
    /**
     * @Route("/TriId", name="vehicules_Id", methods={"GET"})
     */
    public function TriParId(VehiculeRepository $vehiculeRepository): Response
    {
        return $this->render('Vitrine/ListeVehiculesBack.html.twig', [
            'vehicules' => $vehiculeRepository->triVehiculeid(),
        ]);
    }
    //  Api pdf
    /**
     * @Route("/List", name="vehicules_List", methods={"GET"})
     */
    public function indexlist(Request $request): Response
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        $vehicules = $this->getDoctrine()
            ->getRepository(Vehicule::class)
            ->findAll();

        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('vehicules/ListVehicules.html.twig', [
            'vehicules' => $vehicules,
        ]);


        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => true
        ]);
        return $this->render('Vitrine/ListeVeh.html.twig', [
            'vehicules' => $vehicules,
        ]);
    }




    //affichage Back
    /**
     * @Route("/AdminVehicules", name="vehicules_indexBack", methods={"GET"})
     */
    public function indexBack(): Response
    {
        $vehicules = $this->getDoctrine()
            ->getRepository(Vehicule::class)
            ->findAll();

        return $this->render('Vitrine/ListeVehiculesBack.html.twig', [
            'vehicules' => $vehicules,
        ]);
    }

    /**
     * @Route("/new", name="vehicules_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $vehicule = new Vehicule();
        $form = $this->createForm(VehiculeType::class, $vehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($vehicule);
            $entityManager->flush();

            return $this->redirectToRoute('vehicules_indexBack', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('Vitrine/AjoutVehBack.html.twig', [
            'vehicule' => $vehicule,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/newveh", name="vehicules_ne", methods={"GET","POST"})
     */
    public function newveh(Request $request): Response
    {
        $vehicule = new Vehicule();
        $form = $this->createForm(VehiculeType::class, $vehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($vehicule);
            $entityManager->flush();

            return $this->redirectToRoute('ListeVeh', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('Vitrine/AjoutVehicule.html.twig', [
            'vehicule' => $vehicule,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/{idvehicule}", name="vehicules_show", methods={"GET"})
     */
    public function show(Vehicule $vehicule): Response
    {
        return $this->render('vehicules/show.html.twig', [
            'vehicule' => $vehicule,
        ]);
    }

    /**
     * @Route("/{idvehicule}/edit", name="vehicules_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Vehicule $vehicule): Response
    {
        $form = $this->createForm(VehiculeType::class, $vehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vehicules_indexBack', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('Vitrine/ModifVehBack.html.twig', [
            'vehicule' => $vehicule,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idvehicule}", name="vehicules_delete", methods={"POST"})
     */
    public function delete(Request $request, Vehicule $vehicule): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vehicule->getIdvehicule(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($vehicule);
            $entityManager->flush();
        }

        return $this->redirectToRoute('vehicules_indexBack', [], Response::HTTP_SEE_OTHER);
    }
}
