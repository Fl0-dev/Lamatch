<?php

namespace App\Form;

use App\Entity\Candidat;
use App\Entity\Competence;
use App\Entity\QualitesDISC;
use App\Entity\TypeContrat;
use App\Entity\ValeurPrincipale;
use App\Entity\Ville;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class CandidatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('emailContact',EmailType::class,[
                'label'=>'Email de contact',
            ])
            ->add('nom')
            ->add('prenom',null,[
                'label'=>'Prénom',
            ])
            ->add('photo',FileType::class,[
                'mapped'=>false,
                'required'=>false,
                'label'=>'Ma photo',
                'constraints'=>[
                    new File([
                        'maxSize'=>'5000k',
                        'mimeTypesMessage'=>'5 Mo maximum'
                    ])
                ]
            ])
            ->add('dateNaissance', DateType::class, [
                'widget'=>'single_text',
                'label'=>'Date de Naissance'
            ])
            ->add('linkedin')
            ->add('enRecherche',null,[
                'label'=>'Vous êtes à la recherche d\'un emploi ',
            ])
            ->add('typeContratSouhaite',EntityType::class,[
                'class'=>TypeContrat::class,
                'choice_label' => 'intitule',
                'label'=>'Type de contrat souhaité'
            ])
            ->add('ville',EntityType::class,[
                'class'=>Ville::class,
                'choice_label' => 'nom'])
            //->add('formations')
            //->add('experiences')
            ->add('ListQualites',EntityType::class,[
                'label'=> 'Choisissez les qualités qui vous correspondent :',
                'multiple'=>true,
                'class'=> QualitesDISC::class,
                'choice_label'=>'nom',
                //'expanded'=>true, si l'on veut des checkbox
                //par ordre alphabétique
                'query_builder'=> function(EntityRepository $entityRepository){
                    return $entityRepository->createQueryBuilder('c')
                        ->orderBy('c.nom','ASC');
                },
                //pour permettre la gestion de la relation ManyToMany
                'by_reference'=> false,
            ])
            ->add('valeurPrincipale',EntityType::class,[
                'class'=>ValeurPrincipale::class,
                'choice_label' => 'nom',
                'label'=>'La valeur que vous recherchez dans une entreprise'
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Candidat::class,
        ]);
    }
}
