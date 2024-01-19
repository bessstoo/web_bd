<?php

namespace App\Form;

use App\Entity\Products;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class ,['label' => "Наименование товара:"] )
            ->add('count',IntegerType::class, ['label' => "Количество:"])
            ->add('units',TextType::class, ['label' => "Единица измерения:"])
            ->add('price',IntegerType::class, ['label' => "Цена за единицу:"])
            ->add('save', SubmitType::class, ['label' => "Сохранить"])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Products::class,
        ]);
    }
}
