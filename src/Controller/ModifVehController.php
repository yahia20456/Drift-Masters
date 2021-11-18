<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
Use Symfony\Component\Routing\Annotation\Route;
class ModifVehController extends AbstractController
{
    /**
     * @Route("/ModificationVehicule", name="ModifVeh")
     */
    public function Modif()
    {
        return $this->render('Vitrine/ModifVeh.html.twig');
    }
}