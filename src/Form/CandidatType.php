<?php

namespace App\Form;

use App\Entity\Candidat;
use App\Entity\QualitesDISC;
use App\Entity\ValeurPrincipale;
use App\Entity\Ville;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
            ->add('enRecherche')
            ->add('ville',EntityType::class,[
                'class'=>Ville::class,
                'choice_label' => 'nom'])
            //->add('formations')
            //->add('experiences')
            /*->add('ListeDeQualitesDISC',EntityType::class,[
                'class'=> QualitesDISC::class,
                'choice_label'=>'id',
            ])*/
            ->add('valeurPrincipale',EntityType::class,[
                'class'=>ValeurPrincipale::class,
                "mapped"=>false,
                'choice_label' => 'nom'])
            ->add('competences')
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
