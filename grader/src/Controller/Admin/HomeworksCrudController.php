<?php

namespace App\Controller\Admin;

use App\Entity\Homeworks;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class HomeworksCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Homeworks::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextEditorField::new('description'),
            TextField::new('task_files_path'),
            AssociationField::new('course')
        ];
    }
}
