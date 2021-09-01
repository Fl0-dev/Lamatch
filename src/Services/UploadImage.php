<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\String\Slugger\SluggerInterface;

class UploadImage

{
    private $slugger;

    public function __construct(SluggerInterface $slugger){
        $this->slugger = $slugger;
    }

    public function uploadImage($dossierPhotos)
    {
        $nomOriginalDeFichier = pathinfo($dossierPhotos->getClientOriginalName(), PATHINFO_FILENAME);
        //on change le nom du fichier
        $nomDeFichierSecur = $this->slugger->slug($nomOriginalDeFichier);
        $nomDeFichier = $nomDeFichierSecur . '-' . uniqid() . '.' . $dossierPhotos->guessExtension();
        return $nomDeFichier;
    }
}