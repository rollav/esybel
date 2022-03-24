<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use DateTimeInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contact::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
       
           TextField::new('nom')->onlyOnIndex(),
           TextField::new('prenom')->onlyOnIndex(),
           TextField::new('email')->onlyOnIndex(),
           NumberField::new('telephone')->onlyOnIndex(),
           TextareaField::new('message')->onlyOnIndex(),
           DateTimeField::new('createdat')->onlyOnIndex(),
        ];
    }
    
}
