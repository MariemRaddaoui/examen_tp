<?php

namespace App\Controller;

use App\Entity\PFE;
use App\Form\PFEType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PFEController extends AbstractController
{
    #[Route('/add', name: 'add_pfe')]
    public function addPFE(ManagerRegistry $doctrine,Request $request): Response
    {
        $pfe=new PFE();
        $form=$this->createForm(PFEType::class,$pfe);

        $form->handleRequest($request);
        if ($form->isSubmitted() ){
            $manager = $doctrine->getManager();
            $manager->persist($pfe);
            $manager->flush();
            $this->addFlash('success','Le pfe a été ajouté');
            return $this->redirectToRoute('pfe_detail',['id'=>$pfe->getId()]);

        }else{
            return $this->render('pfe/add_form.html.twig', [

                'form'=>$form->createView()
            ]);
        }}

        #[Route('/pfe/{id<\d+>}', name: 'pfe_detail')]
    public function index($id, ManagerRegistry $doctrine): Response
    {
        $manager = $doctrine->getRepository(Pfe::class);
        $pfe = $manager->find($id);
    if(!$pfe){
      $this->addFlash('error', "Cette Pfe n'existe pas");
        return $this->redirectToRoute('add_pfe');
    }
        return $this->render('pfe/infos.html.twig', [
            'pfe' => $pfe,
        ]);
    }

    #[Route('/pfes', name: 'pfe_all')]
    public function allPfes(ManagerRegistry $doctrine){

        $pfe = $doctrine->getRepository(Pfe::class);
        $pfes= $pfe->findAll();


        return $this->render('pfe/pfes.html.twig', [
            'pfes'=> $pfes
        ]);
    }

}
