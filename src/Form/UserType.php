<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Gender;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('meet', ChoiceType::class, [
                'label'    => 'Je souhaite rencontrer',
                'expanded' => true,
                'choices'  => [
                    'Un homme' => 'male',
                    'Une femme' => 'female',
                    'Peu importe' => 'dontmind',
                ]
            ])
            ->add('firstname', null, ['attr' => ['data-field' => 'firstname']])
            ->add('email')
            ->add('password')
            ->add('birthday', BirthdayType::class, [
                'placeholder' => [
                    'year' => 'Year', 'month' => 'Month', 'day' => 'Day',
                ]
            ])
            ->add('isSerious')
            ->add('isMarried')
            ->add('hasChildren')
            ->add('city', null, ['attr' => ['data-field' => 'city']])
            //->add('country')
            ->add('isSmoker')
            ->add('Gender', EntityType::class, [
                // looks for choices from this entity
                'class' => Gender::class,
                // uses the User.username property as the visible option string
                'choice_label' => 'label',
                'expanded' => true])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
