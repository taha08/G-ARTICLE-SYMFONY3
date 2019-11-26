<?php

namespace AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class PostType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title')
                ->add('description')
                ->add('body')
                ->add('slug')
                ->add('datepublish', DateType::class, [
                    'widget' => 'single_text',  
                    'format'  => 'dd/MM/yyyy',
                    'data'   => new \DateTime()
                    ])
                ->add('categorie', EntityType::class, array(
                    'class' => 'AdminBundle:Category',
                    'choice_label' => 'libele',
                    'expanded' => false,
                    'multiple' => true,
                ))
                ->add('image', FileType::class, array(
                    'label' => 'image png /jpeg',
                    'data_class' => null, // pour anneler le prob du formulaire edition 
                     )
                    );
                  
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AdminBundle\Entity\Post'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'adminbundle_post';
    }


}
