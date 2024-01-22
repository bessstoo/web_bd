<?php

namespace App\Form;

use App\Entity\Invoice;
use App\Entity\ItemsInInvoice;
use App\Entity\Products;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddItemInInvoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('count', IntegerType::class, ['label' => "Количество"])
            ->add('Product_Id', EntityType::class, [
                'class' => Products::class,
                'choice_label' => 'name',
                'label' => 'Id продукта'
            ])
            ->add('Invoice_id', EntityType::class, [
                'class'=> Invoice::class,
                'choice_label' => 'number',
                'label' => 'Номер накладной'
            ])
            ->add('save', SubmitType::class, ['label' => "Добавить"])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ItemsInInvoice::class,
        ]);
    }
}
