<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Bar;
use App\Entity\UserInvoice;
use App\Entity\Game;
use App\Entity\Group;


class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Iflex');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-newspaper', User::class);
        yield MenuItem::linkToCrud('Groupes', 'fas fa-newspaper', Group::class);
        yield MenuItem::linkToCrud('Bars', 'fas fa-newspaper', Bar::class);
        yield MenuItem::linkToCrud('Jeux', 'fas fa-newspaper', Game::class);
        yield MenuItem::linkToCrud('Factures utilisateurs', 'fas fa-newspaper', UserInvoice::class);





        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
