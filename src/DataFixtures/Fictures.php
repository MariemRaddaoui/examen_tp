<?php

namespace App\DataFixtures;

use App\Entity\Entreprise;
use App\Entity\PFE;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class Fictures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker=Factory::create('fr_FR');

        for($i=0;$i<30;$i++){
            $entreprise=new Entreprise();
            $entreprise->setDesignation($faker->domainName);
            $pfe=new PFE();
            $pfe->setNomEtudiant($faker->name);
            $pfe->setTitrePFE("Pfe".$i+1);
            $pfe->setEntreprise($entreprise);
            $manager->persist($entreprise);
            $manager->persist($pfe);
        }
        $manager->flush();
    }
}
