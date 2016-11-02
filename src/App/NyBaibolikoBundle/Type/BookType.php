<?php
namespace App\NyBaibolikoBundle\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/2/16
 * Time: 8:45 AM
 */
class BookType extends AbstractType
{

    private $books;

    /**
     * BookType constructor.
     * @param $books
     */
    public function __construct($books)
    {
        $this->books = $books;
    }


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',ChoiceType::class,[
                'label'=>'Boky',
                'choices_as_values'=>true,
                'choices'=> $this->books
            ])
            ->add('chap', IntegerType::class,[
                'label'=>'Toko',
                'attr'=>['min'=>1]
            ])
            ->add('versetFirst',IntegerType::class,[
                'label'=>'Andininy',
                'attr'=>['min'=>1]
            ])
            ->add('versetLast', IntegerType::class, [
                'label'=>'hatramin\'ny',
                'attr'=>$this->books
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'App\NyBaibolikoBundle\Model\Book'
        ]);
    }

}