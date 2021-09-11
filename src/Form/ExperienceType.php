<?php

namespace App\Form;

use App\Entity\Domaine;
use App\Entity\Experience;
use App\Entity\TypeContrat;
use App\Entity\Ville;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExperienceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomEmployeur',TextType::class,[
                'label'=>'Nom de l\'employeur',
            ])
            ->add('dateDebut',DateType::class,[
                'widget'=>'single_text',
                'label'=>'Date de début',
            ])
            ->add('dateFin',DateType::class,[
                'widget'=>'single_text',
                'required'=>false,
                'label'=>'Date de fin',
            ])
            ->add('intitulePoste',null,[
                'label'=>'Intitulé du poste',
            ])
            ->add('description',null,[
                'label'=>'Description',
            ])
            ->add('typeContrat',EntityType::class,[
                'class'=>TypeContrat::class,
                'choice_label'=>'intitule',
            ])
            ->add('ville',EntityType::class,[
                'class'=>Ville::class,
                'choice_label'=>'nom',
                //par ordre alphabétique
                'query_builder'=> function(EntityRepository $entityRepository) {
                    return $entityRepository->createQueryBuilder('c')
                        ->orderBy('c.nom', 'ASC');
                },
            ])
            ->add('domaine',EntityType::class,[
                'class'=>Domaine::class,
                'choice_label'=>'nom',
                //par ordre alphabétique
                'query_builder'=> function(EntityRepository $entityRepository) {
                    return $entityRepository->createQueryBuilder('c')
                        ->orderBy('c.nom', 'ASC');
                },
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
