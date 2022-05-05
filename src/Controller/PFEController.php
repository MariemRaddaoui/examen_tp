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
    #[Route('/add', name: 'app_add')]
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
            return $this->redirectToRoute('app_detail',['id'=>$pfe->getId()]);

        }else{
            return $this->render('pfe/add_form.html.twig', [

                'form'=>$form->createView()
            ]);
        }}

        #[Route('/{id}', name: 'app_detail')]
    public function index(PFE $pfe=null): Response
    {
if(!$pfe){
    return new Response("<html> Aucun pfe n'est trouvé</html>");
}
        return $this->render('pfe/index.html.twig', [
            'pfe' => $pfe,
        ]);
    }

}
