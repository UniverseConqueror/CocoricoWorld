<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class UserUpdateProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('password')
            ->add('firstname')
            ->add('lastname')
            ->add('telephone')
            ->add('address')
            ->add('postalCode')
            ->add('city')
            ->addEventListener(FormEvents::PRE_SET_DATA, [$this, 'onPreSetData'])
            
        ;
    }

    public function onPreSetData(FormEvent $event)
    {
        // On récupère notre entite User depuis l'event
        $user = $event->getData();
     
        // On récupère le form depuis l'event
        $form = $event->getForm();

        // Le user n'existe pas ?
        if ($user->getId() === null) {
          
            $form->add('password', null, [
               
                'empty_data' => '',
            ]);
        } else {
            // On vide le champ du form pour masquer le password
            $user->setPassword('');
            // Si non => placeholder à ajouter
            $form->add('password', null, [
                'attr' => [
                    'placeholder' => 'Laissez vide si inchangé',
                ],
                'empty_data' => '',
            ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'attr' => ['novalidate' => 'novalidate']
        ]);
    }


}
