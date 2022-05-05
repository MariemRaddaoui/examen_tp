<?php

namespace App\DataFixtures;

use App\Entity\Entreprise;
use App\Entity\PFE;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PFEFictures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker=Factory::create('fr_FR');
        $pfes=['pfe1','pfe2','pfe3','pfe4','pfe5','pfe6','pfe7','pfe8','pfe9','pfe10'];
        for($i=0;$i<100;$i++){
            $pfe=new PFE();
            $pfe->setNomEtudiant($faker->name);
            $pfe->setTitrePFE($pfes[rand(0,9)]);
            $manager->persist($pfe);
        }
        $manager->flush();
    }
}
