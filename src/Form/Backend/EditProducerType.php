<?php

namespace App\Form\Backend;

use App\Entity\Producer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditProducerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('socialReason', TextType::class, [
                'label' => 'Raison sociale',
            ])
            ->add('siretNumber', TextType::class, [
                'label' => 'Numéro de SIRET',
            ])
            ->add('address', TextType::class, [
                'label' => 'Adresse',
            ])
            ->add('postalCode', IntegerType::class, [
                'label' => 'Code postal',
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville',
            ])
            ->add('email')
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
            ])
            ->add('telephone')
            ->add('status')
            ->add('enable', CheckboxType::class, [
                'label'    => false,
                'required' => false,
            ])
            ->add('avatar', FileType::class, [
                'data_class' => null,
                'disabled'   => true,
            ])
            ->add('description')
            ->add('createdAt', DateTimeType::class, [
                'label'          => 'Créer le',
                'view_timezone'  => 'Europe/Paris',
                'date_format'    => 'dd MMM yyyy',
                'with_seconds'   => true,
            ])
            ->add('user', EntityType::class, [
                'class' => 'App\Entity\User',
                'label' => 'Utilisateur',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Producer::class,
        ]);
    }
}
