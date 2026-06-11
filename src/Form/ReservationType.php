<?php

namespace App\Form;

use App\Entity\Invoice;
use App\Entity\Property;
use App\Entity\Reservation;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('checkinDate', null, [
                'widget' => 'single_text',
            ])
            ->add('checkoutDate', null, [
                'widget' => 'single_text',
            ])
            ->add('guestsCount')
            ->add('status')
            ->add('totalPrice')
            ->add('cleaningFee')
            ->add('serviceFee')
            ->add('securityDeposit')
            ->add('currency')
            ->add('cancellationReason')
            ->add('createdAt', null, [
                'widget' => 'single_text',
            ])
            ->add('property', EntityType::class, [
                'class' => Property::class,
                'choice_label' => 'id',
            ])
            ->add('guest', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
            ])
            ->add('invoice', EntityType::class, [
                'class' => Invoice::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
