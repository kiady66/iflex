<?php

namespace App\Controller\Admin;

use App\Entity\Bar;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BarCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Bar::class;
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
