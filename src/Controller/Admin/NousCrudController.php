<?php

namespace App\Controller\Admin;

use App\Entity\Nous;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class NousCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Nous::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('titre'),
            TextareaField::new('description'),
            TextField::new('imageFile1')->setFormType(VichImageType::class)->onlyOnForms(),
            ImageField::new('image1')->setBasePath('images/nous')->onlyOnIndex(),
            TextField::new('imageFile2')->setFormType(VichImageType::class)->onlyOnForms(),
            ImageField::new('image2')->setBasePath('images/nous')->onlyOnIndex(),
            TextField::new('imageFile3')->setFormType(VichImageType::class)->onlyOnForms(),
            ImageField::new('image3')->setBasePath('images/nous')->onlyOnIndex(),
            TextField::new('video'),
        ];
    }
    
}
