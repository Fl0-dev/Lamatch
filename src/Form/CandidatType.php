<?php

namespace App\Form;

use App\Entity\Candidat;
use App\Entity\QualitesDISC;
use App\Entity\ValeurPrincipale;
use App\Entity\Ville;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('emailContact')
            ->add('nom')
            ->add('prenom')
            ->add('photo')
            ->add('dateNaissance', DateType::class, [
                    'widget'=>'single_text'
                ])
            ->add('linkedin')
            ->add('enRecherche',null,[
                'label'=>'Vous êtes à la recherche d\'un emploi ',
            ])
            ->add('ville',EntityType::class,[
                'class'=>Ville::class,
                'choice_label' => 'nom'])
            //->add('formations')
            //->add('experiences')
            ->add('ListeDeQualitesDISC',EntityType::class,[
                'label'=> 'Choisissez les qualités qui vous correspondent :',
                'class'=> QualitesDISC::class,
                'choice_label'=>'nom',
            ])
            ->add('valeurPrincipale',EntityType::class,[
                'class'=>ValeurPrincipale::class,
                "mapped"=>false,
                'choice_label' => 'nom'])
            ->add('competences',TextType::class)
            //->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Candidat::class,
        ]);
    }
}
