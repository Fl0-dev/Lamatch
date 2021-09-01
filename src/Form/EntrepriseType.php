<?php

namespace App\Form;

use App\Entity\Domaine;
use App\Entity\Entreprise;
use App\Entity\TypeEntreprise;
use App\Entity\ValeurPrincipale;
use App\Entity\Ville;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class EntrepriseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('logo',FileType::class,[
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
            ->add('dateDeCreation', DateType::class, [
                'widget'=>'single_text'
            ])
            ->add('adresseWeb')
            ->add('adresseRH')
            ->add('infos')
            ->add('effectif')
            ->add('enrecherche')
            ->add('typeEntreprise',EntityType::class,[
                'class'=>TypeEntreprise::class,
                'choice_label' => 'intitule',
            ])
            ->add('ville',EntityType::class,[
                'class'=>Ville::class,
                'choice_label' => 'nom'])
            ->add('valeurPrincipale',EntityType::class,[
                'class'=>ValeurPrincipale::class,
                'choice_label' => 'nom'])
            ->add('domaines',EntityType::class,[
                'class'=>Domaine::class,
                'multiple'=>true,
                'choice_label' => 'nom'])
            //->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Entreprise::class,
        ]);
    }
}
