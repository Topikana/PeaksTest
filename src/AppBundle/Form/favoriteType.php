<?php
/**
 * Created by PhpStorm.
 * User: letellie
 * Date: 27/05/19
 * Time: 13:25
 */

namespace AppBundle\Form;






use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class favoriteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
{
        $builder
//            ->add('idHero', CollectionType::class,[
//                'entry_type' => TextType::class,
//            ])
//            ->add('name', CollectionType::class,[
//                'entry_type' => TextType::class,
//            ])
//            ->add('description', CollectionType::class,[
//                'entry_type' => TextType::class,
//            ])
//            ->add('path', CollectionType::class,[
//                'entry_type' => TextType::class,
//            ])
//            ->add('offset', CollectionType::class,[
//                'entry_type' => TextType::class,
//            ]);
            ->add('idHero', TextType::class, array(
                'required' => false,
                'attr' => array('style'=>'display:none;')
            ))
            ->add('name', TextType::class, array(
                'required' => false,
                 'attr' => array('style'=>'display:none;')
            ))
            ->add('description', TextType::class, array(
                "required" => false,
                 'attr' => array('style'=>'display:none;')
            ))
            ->add('path', TextType::class, array(
                "required" => false,
                 'attr' => array('style'=>'display:none;')
            ))
            ->add('offset', IntegerType::class,  array(
            "required" => false,
            'attr' => array('style'=>'display:none;')
            ));

}

    public function configureOptions(OptionsResolver $resolver)
    {
       $resolver->setDefaults(array(
           'data_class' => 'AppBundle\Entity\Favorites'
       ));
    }

//    /**
//     * {@inheritdoc}
//     */
//    public function getBlockPrefix()
//    {
//        return 'appbundle_favorite';
//    }

}