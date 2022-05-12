<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Entity\PFE;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EntrepriseController extends AbstractController
{
    #[Route('/entreprises', name: 'pfe_entreprise')]
    public function pfeParEntreprise(ManagerRegistry $doctrine){

        $pfe = $doctrine->getRepository(Pfe::class);
        $entreprise = $doctrine->getRepository(Entreprise::class);
        $result = $pfe->findNbPfe();

        $tab = [];
        for($i = 0 ; $i<sizeof($result) ;$i++ ){
            $tab[$i] = $entreprise->find($result[$i]["entreprise"])->getDesignation();
        }

        return $this->render('entreprise/entreprise.html.twig', [
            'pfes'=> $result,
            'name' => $tab
        ]);
    }
}
