<?php
/**
 * Created by PhpStorm.
 * User: letellie
 * Date: 27/05/19
 * Time: 13:25
 */

namespace AppBundle\Form;


use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class favoriteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
{
        $builder
            ->add('idHero')
            ->add('name', TextType::class)
            ->add('description', TextType::class);
//            ->add('co')


}

    public function configureOptions(OptionsResolver $resolver)
    {
       $resolver->setDefaults(array(
           'data_class' => 'AppBundle\Entity\Favorites'
       ));
    }

}