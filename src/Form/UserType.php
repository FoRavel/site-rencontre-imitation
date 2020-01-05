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
            ->add('birthday') //birthdaytype marche pas (error 500)
            ->add('inRelationship', ChoiceType::class, [
                'label'    => 'Quelle est votre situation relationnelle',
                'expanded' => true,
                'choices'  => [
                    'Je suis en couple' => true,
                    'Je suis célibitaire' => false,
                ]
            ])
            ->add('relationType', ChoiceType::class, [
                'label'    => 'Quelle est votre situation relationnelle',
                'expanded' => true,
                'choices'  => [
                    'Une relation amoureuse' => 'love',
                    'Me faire des amis' => 'friend',
                    'Relation d\'un soir' => 'sex',
                    'Rien de précis, je souhaite simplement faire des rencontres' => 'indecis'
                ]
            ])
            ->add('hasChildren', ChoiceType::class, [
                'label'    => 'Avez-vous des enfants?',
                'expanded' => true,
                'choices'  => [
                    'Oui' => true,
                    'Non' => false,
                ]
            ])
            ->add('city', null, ['attr' => ['data-field' => 'city']])
            // ->add('isSerious')
            // ->add('isMarried')
            //->add('country')
            ->add('isSmoker')
            ->add('Gender', EntityType::class, [     
                'class' => Gender::class,
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
