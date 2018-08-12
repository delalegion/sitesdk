<?php

declare(strict_types=1);

namespace App\Controllers\Core\Dashboards\Admin;

use App\Controllers\Controller;

use App\Core\Database\Connection;
use App\Core\Interfaces\FlashBagInterface;
use App\Core\Request;

use App\Model\Service\Helpers\Dashboards\Admin\DeleteUsers;
use App\Model\Query\View\SQLAdminDashboardView;

class DeleteUsersController extends Controller
{

    private $connection;
    private $request;
    private $flashMessages;

    /**
     * DeleteUsersController constructor.
     * @param Connection $connection
     * @param Request $request
     * @param FlashBagInterface $flashMessages
     */
    public function __construct(Connection $connection, Request $request, FlashBagInterface $flashMessages)
    {
        $this->connection = $connection;
        $this->request = $request;
        $this->flashMessages = $flashMessages;
    }

    /**
     *
     */
    public function index()
    {

        Controller::renderView('Core/Dashboards/Admin/DeleteUsers');

    }

    /**
     *
     */
    public function deleteUser()
    {

        if ( $this->request->getRequest('user') && $this->request->getRequest('delete') === 'yes' )
        {
            $delete = new DeleteUsers( new SQLAdminDashboardView( $this->connection->make() ) );
            $delete->deleteUser($_GET['user']);

            $this->flashMessages->add('delete', 'Pomyślnie usunąłeś użytkownika o ID: ' . $_GET['user']);

            $this->request::redirectTo('admin/dashboard');
        }

        if ( !$this->request->getRequest('user') )
        {
            $this->request::redirectTo('admin/dashboard');
        }

    }

}