<?php

namespace App\Form\Type;

use App\Entity\Announces;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class CreateAnnounceType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('titre', TextType::class, [
            'attr' => [
                'label' => 'Titre :',
                'placeholder' => 'Titre de votre produit',
                'class' => 'form-control mt-3',
                'name' => 'titre',
                'type' => 'text',
                'id' => 'titre',
                'required'
            ]
        ])
      
        ->add('espece', EntityType::class,[
            'label' => 'Choisir type  ',
            'attr' => [
                'class' => 'checker text-center font-weight-semibold',
                'required'
            ],
            'class' => 'App\Entity\Espece',
            'choice_label' => 'espece',
            'expanded' => 'true',
        ])       
        ->add('couleur', EntityType::class,[
            'label' => 'Choisir la couleur  ',
            'attr' => [
                'class' => 'checker text-center font-weight-semibold',
                'required'
            ],
            'class' => 'App\Entity\Couleur',
            'choice_label' => 'couleur',
            'expanded' => 'true',
        ])
        
        ->add('statut', EntityType::class, [
            'label' => 'Choisir la marque  ',
            'attr' => [
                'class' => 'text-center font-weight-semibold',
                'placeholder' => 'Votre statut',
                'name' => 'statut',
                'type' => 'text',
                'id' => 'statut',
                'required'

            ],
            'class' => 'App\Entity\Statut',
            'choice_label' => 'statut',
       ]) 
        ->add('image', FileType::class, [
            'attr' => [
                'label' => 'Image :',
                'placeholder' => 'Votre image',
                'class' => 'form-control mt-3',
                'name' => 'image',
                'type' => 'image',
                'id' => 'InputImage',
                'required'
            ],
            'label' => 'Image d\'illustration de votre annonce',
            'data_class' => null,
            'constraints' => [
                new File([
                    'maxSize' => '5M',
                    'mimeTypes' => [
                        'image/jpeg',
                        'image/png',
                        'image/gif',
                        'image/jpg',
                        'image/webp',
                    ]
                ]),
            ]
        ])

        ->add('description', TextareaType::class, [
            'attr' => [
                'label' => 'Description :',
                'placeholder' => 'Description de votre annonce',
                'class' => 'form-control mt-3',
                'name' => 'description',
                'type' => 'textarea',
                'id' => 'description',
                'required'
            ]
        ])

        ->add('submit', SubmitType::class, [
            'attr' => [
                'label' => 'Publier votre annonce',
                'class' => 'btn btn-lg mt-3 text-center btnsignup',
            ]
        ])
    ;
}

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Announces::class,
        ]);
    }
}
