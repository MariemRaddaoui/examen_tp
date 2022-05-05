<?php

namespace App\DataFixtures;

use App\Entity\Entreprise;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EntrepriseFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $entreprises=['entreprise1','entreprise2','entreprise3','entreprise4','entreprise5','entreprise6'];
        for($i=0;$i<count($entreprises);$i++){
            $entreprise=new Entreprise();
            $entreprise->setDesignation($entreprises[$i]);
            $manager->persist($entreprise);
        }
        $manager->flush();
    }
}
