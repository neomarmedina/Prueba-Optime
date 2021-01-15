<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;	

use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class RegisterType  extends AbstractType{


	public function buildForm(FormBuilderInterface $builder, array $options)
	{
			
		$builder->add('code', TextType::class, array(
			'label'=> 'Codigo','required' =>true

		))

		->add('name', TextType::class, array(
			'label'=> 'Nombre','required' =>true

		))

		->add('description', TextType::class, array(
			'label'=> 'Descripción','required' =>true

		))		

		->add('submit', SubmitType::class, array(
			'label'=> 'Registrar'

		));

	}

}