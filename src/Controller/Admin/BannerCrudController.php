<?php

namespace App\Controller\Admin;

use App\Entity\Banner;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class BannerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Banner::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
       
            TextField::new('titre'),
            TextField::new('quote'),
            TextField::new('imageFile1')->setFormType(VichImageType::class)->onlyOnForms(),
            ImageField::new('image1')->setBasePath('images/banner')->onlyOnIndex(),
            TextField::new('imageFile2')->setFormType(VichImageType::class)->onlyOnForms(),
            ImageField::new('image2')->setBasePath('images/banner')->onlyOnIndex(),
            TextField::new('imageFile3')->setFormType(VichImageType::class)->onlyOnForms(),
            ImageField::new('image3')->setBasePath('images/banner')->onlyOnIndex(),
        ];
    }
    
}
