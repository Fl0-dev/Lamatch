<?php

namespace App\Form;

use App\Entity\Domaine;
use App\Entity\Experience;
use App\Entity\TypeContrat;
use App\Entity\Ville;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExperienceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomEmployeur')
            ->add('dateDebut',DateType::class,[
                'widget'=>'single_text'
            ])
            ->add('dateFin',DateType::class,[
                'widget'=>'single_text',
                'required'=>false,
            ])
            ->add('intitulePoste')
            ->add('description')
            ->add('typeContrat',EntityType::class,[
                'class'=>TypeContrat::class,
                'choice_label'=>'intitule',
            ])
            ->add('ville',EntityType::class,[
                'class'=>Ville::class,
                'choice_label'=>'nom',
            ])
            ->add('domaine',EntityType::class,[
                'class'=>Domaine::class,
                'choice_label'=>'nom',
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Experience::class,
        ]);
    }
}
