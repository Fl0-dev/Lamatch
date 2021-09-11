<?php

namespace App\Services;


use App\Repository\ExperienceRepository;


class CalculExperience
{
    private $experienceRepository;

    public function __construct(ExperienceRepository $experienceRepository){

        $this->experienceRepository =$experienceRepository;
    }

    public function experienceCandidat($candidat){

        //création d'une variable pour l'expérience totale d'un candidat
        $expTotale = 0;
        //récupérations des experiences du candidat
        $experiences = $this->experienceRepository->findBy(['candidat'=>$candidat]);
        //calcul des années de travail pour chaque expérience
        foreach ($experiences as $experience){
            //récupération de date de début
            $debut=$experience->getDateDebut();
            //récupération de la date de fin (si null on prend la date d'aujourd'hui
            $fin=$experience->getDateFin();
            if ($fin==null){
                $fin = new \DateTime();
            }
            //on récupère la différence en année
            $exp = $debut->diff($fin);
            $expTotale = $expTotale+$exp->y;
        }
        //retourne l'expérience totale d'un candidat
        return $expTotale;
    }
}