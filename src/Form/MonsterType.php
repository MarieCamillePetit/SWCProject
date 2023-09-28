<?php

namespace App\Form;

use App\Entity\Monster;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MonsterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('monsterName')
            ->add('stat_atk')
            ->add('stat_def')
            ->add('stat_hp')
            ->add('stat_atkspd')
            ->add('stat_critrate')
            ->add('stat_critdmg')
            ->add('stat_accuracy')
            ->add('stat_res')
            ->add('stat_prec')
            ->add('stat_evasion')
            ->add('attribute')
            ->add('class')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Monster::class,
        ]);
    }
}
