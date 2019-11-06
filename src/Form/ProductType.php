<?php

namespace App\Form;

use App\Entity\Product;
use App\Service\FileUploader;
use Doctrine\Common\Annotations\Annotation\Required;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProductType extends AbstractType
{
    /** @var FileUploader $uploader */
    private $uploader;

    /**
     * @Required
     *
     * @param FileUploader $uploader
     */
    public function setFileUploader(FileUploader $uploader)
    {
        $this->uploader = $uploader;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
             'label'=>'Nom du produit'])
            ->add('price', IntegerType::class, [
             'label'=>'Prix du produit'])
            ->add('weight', IntegerType::class, [
                'label'=>'Poids du produit'])
            ->add('quantity', IntegerType::class, [
                'label'=>'Quantité du produit'])
            ->add('image', FileType::class, [
                    'label'       => 'Image',
                    'mapped'      => false,
                    'required'    => false,
                    'constraints' => [
                        new File([
                            'maxSize'   => '1024k',
                            'mimeTypes' => [
                                'image/jpeg',
                                'image/png',
                            ],
                            'mimeTypesMessage' => 'Merci de télécharger une image au format jpeg ',
                        ])
                    ],
            ])
            ->add('description', TextType::class, [
                'label'=>'Description du produit'])
            ->add('composition')
            ->add('additionalInfo', TextType::class, [
                'label'=>'Informations additionnelles']) 
            ->add('allergens', TextType::class, [
                'label'=>'Allergènes du produit'])
            ->add('Univers', EntityType::class, [
                'class'       => 'App\Entity\Univers',
                'placeholder' => 'Sélectionnez un univers',
                'mapped'      => false,
                'required'    => false
                ])
            ->add('categories', EntityType::class, [
                'class'       => 'App\Entity\Category',
                'placeholder' => 'Sélectionnez une categorie',
                'mapped'      => false,
                'required'    => false
                ])            
            ->add('subcategories', EntityType::class, [
                'class'       => 'App\Entity\Subcategory',
                'placeholder' => 'Sélectionnez une sous-categorie',
                'mapped'      => false,
                'required'    => false
                ])
            ->addEventListener(
                FormEvents::POST_SUBMIT,
                [$this, 'onPostSubmit']
            )
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
            'attr' => ['novalidate' => 'novalidate'],
        ]);
    }

    public function onPostSubmit(FormEvent $event)
    {
        /** @var Product $product */
        $product = $event->getData();

        $form = $event->getForm();
        $image = $form->get('image')->getNormData();

        if ($image) {
            $imagePath = $this->uploader->upload($image);
            $product->setImage($imagePath);
        }
    }
}
