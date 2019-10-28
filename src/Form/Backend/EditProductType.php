<?php

namespace App\Form\Backend;

use App\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom',
            ])
            ->add('price', IntegerType::class, [
                'label' => 'Prix',
            ])
            ->add('weight', IntegerType::class, [
                'label' => 'Poid',
            ])
            ->add('quantity', IntegerType::class, [
                'label' => 'Quantité',
            ])
            ->add('image', FileType::class, [
                'disabled' => true,
            ])
            ->add('description')
            ->add('composition')
            ->add('additionalInfo', TextareaType::class, [
                'label'    => 'Infos Supp.',
                'required' => false,
            ])
            ->add('allergens', TextType::class, [
                'label'    => 'Allergènes',
                'required' => false,
            ])
            ->add('rate')
            ->add('producer', EntityType::class, [
                'label' => 'Producteur',
                'class' => 'App\Entity\Producer',
            ])
            ->add('subcategories', EntityType::class, [
                'label'    => 'Sous catégories',
                'class'    => 'App\Entity\Subcategory',
                'multiple' => true,
            ])
            ->add('enable', CheckboxType::class, [
                'label'    => false,
                'required' => false,
            ])
            ->add('createdAt', DateTimeType::class, [
                'label'          => 'Créer le',
                'view_timezone'  => 'Europe/Paris',
                'date_format'    => 'dd MMM yyyy',
                'with_seconds'   => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
