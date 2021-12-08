<?php

namespace App\Controller;

use App\Entity\Circuit;
use App\Form\CircuitType;
use App\Repository\CircuitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Dompdf\Dompdf;
use Dompdf\Options;

/**
 * @Route("/circuit")
 */
class CircuitController extends AbstractController
{
    /**
     * @Route("/", name="circuit_index", methods={"GET"})
     */
    public function index(): Response
    {
        $circuits = $this->getDoctrine()
            ->getRepository(Circuit::class)
            ->findAll();
        return $this->render('Vitrine/ListeCircuitsBack.html.twig', [
            'circuits' => $circuits,
        ]);
    }
    /**
     * @Route("/TriLongueur", name="circuit_Trilongueur", methods={"GET"})
     */
    public function TriParLongueur(CircuitRepository $circuitRepository): Response
    {
        return $this->render('Vitrine/ListeCircuitsBack.html.twig', [
            'circuits' => $circuitRepository->triCircuit(),
        ]);
    }
    //Tri par Id
    /**
     * @Route("/TriParId", name="circuit_Id", methods={"GET"})
     */
    public function TriParId(CircuitRepository $circuitRepository): Response
    {
        return $this->render('Vitrine/ListeCircuitsBack.html.twig', [
            'circuits' => $circuitRepository->triCircuitParId(),
        ]);
    }
    //Api PDF
    /**
     * @Route("/List", name="Circuit_Pdf", methods={"GET"})
     * @param Request $request
     * @return Response
     */
    public function ApiPdf(Request $request): Response
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        $circuits = $this->getDoctrine()
            ->getRepository(Circuit::class)
            ->findAll();

        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('circuit/ListCircuits.html.twig', [
            'circuits' => $circuits,
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
        return $this->render('Vitrine/ListeCircuitsBack.html.twig', [
            'circuits' => $circuits,
        ]);
    }

    //affichage vitrine
    /**
     * @Route("/CircuitUser", name="ListeCirc", methods={"GET"})
     */
    public function indexx(): Response
    {
        $circuits = $this->getDoctrine()
            ->getRepository(Circuit::class)
            ->findAll();

        return $this->render('Vitrine/Circuits.html.twig', [
            'circuits' => $circuits,
        ]);
    }

    /**
     * @Route("/new", name="circuit_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $circuit = new Circuit();
        $form = $this->createForm(CircuitType::class, $circuit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($circuit);
            $entityManager->flush();

            return $this->redirectToRoute('circuit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('Vitrine/AjoutCircBack.html.twig', [
            'circuit' => $circuit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="circuit_show", methods={"GET"})
     */
    public function show(Circuit $circuit): Response
    {
        $repository=$this->getDoctrine()->getRepository(Circuit::class);
            $circuit=$repository->findAll();
        $circuit=json_decode(json_encode($circuit));
        echo "<pre>";print_r($circuit);die;
        return $this->render('circuit/show.html.twig', [
            'circuit' => $circuit,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="circuit_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Circuit $circuit): Response
    {
        $form = $this->createForm(CircuitType::class, $circuit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('circuit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('Vitrine/ModifCircBack.html.twig', [
            'circuit' => $circuit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="circuit_delete", methods={"POST"})
     */
    public function delete(Request $request, Circuit $circuit): Response
    {
        if ($this->isCsrfTokenValid('delete'.$circuit->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($circuit);
            $entityManager->flush();
        }

        return $this->redirectToRoute('circuit_index', [], Response::HTTP_SEE_OTHER);
    }

}
