<?php

namespace App\Form;

use App\Entity\Customer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Company;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CustomerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', null, ['label' => 'Prénom'])
            ->add('lastname', null, ['label' => 'Nom de famille'])
            ->add('email', null, ['label' => 'Adresse mail'])
            ->add('phone', null, ['label' => 'Téléphone'])
            ->add('company', EntityType::class, [
                'class' => Company::class,
                'choice_label' => 'name',

                'label' => 'Entreprise'
                ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Customer::class,
        ]);
    }
}
