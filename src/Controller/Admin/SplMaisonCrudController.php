<?php

namespace App\Controller\Admin;

use App\Entity\SplMaison;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class SplMaisonCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SplMaison::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
           
            TextField::new('titre'),
            TextareaField::new('description'),
            TextField::new('imageFile')->setFormType(VichImageType::class)->onlyOnForms(),
            ImageField::new('image')->setBasePath('images/splmaison')->onlyOnIndex(),
        ];
    }
    
}
