<?php

namespace App\Form;

use App\Entity\Domaine;
use App\Entity\Formation;
use App\Entity\Niveau;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('intitule')
            ->add('dateDebut',DateType::class,[
                'widget'=>'single_text'
            ])
            ->add('dateFin',DateType::class,[
                'widget'=>'single_text'
            ])
            ->add('etablissement')
            ->add('niveau',EntityType::class,[
                'class'=>Niveau::class,
                'choice_label'=>'libelle',
                ])
            //->add('candidats')
            ->add('domaine',EntityType::class,[
                'class'=>Domaine::class,
                'choice_label'=>'nom',
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Formation::class,
        ]);
    }
}
