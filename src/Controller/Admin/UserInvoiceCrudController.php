<?php

namespace App\Controller\Admin;

use App\Entity\UserInvoice;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserInvoiceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return UserInvoice::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
