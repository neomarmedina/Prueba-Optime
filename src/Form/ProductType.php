<?php

namespace App\Form;
			  
use Symfony\Component\Form\AbstractType;	

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Doctrine\ORM\EntityRepository;

class ProductType  extends AbstractType{


	public function buildForm(FormBuilderInterface $builder, array $options)
	{

		// Aqui me traigo los datos de la tabla category
		//Aca tambien hago las validaciones de los campos

		$builder->add('code', TextType::class, array(
				'label'=> 'Codigo','required' =>true

			))

			->add('name', TextType::class, array(
				'label'=> 'Nombre','required' =>true
			))

			->add('description', TextareaType::class, array(
				'label'=> 'Descripción','required' =>true

			))

			->add('brand', TextType::class, array(
				'label'=> 'Marca','required' =>true,

			))	

			->add('precio', TextType::class, array(
				'label'=> 'precio','required' =>true

			))	

			->add('category', EntityType::class, array(
				'class' => 'App:Category',
				'query_builder' => function (EntityRepository $er) {
					return $er->createQueryBuilder('u')
					    ->where('u.activo = :activo')
						->orderBy('u.name', 'ASC')
					    ->setParameter('activo', 1);
				},
				'choice_label' => 'name'					

			))		
			

			->add('submit', SubmitType::class, array(
				'label'=> '...Crear...'

			));


		}

}

