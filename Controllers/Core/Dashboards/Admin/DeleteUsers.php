<?php

declare(strict_types=1);

namespace App\Controllers\Core\Dashboards\Admin;

use App\Controllers\Controller;

use App\Core\Database\Connection;
use App\Core\Interfaces\FlashBagInterface;
use App\Core\Request;

use App\Model\Service\Helpers\Dashboards\Admin\DeleteUsers;
use App\Model\Service\Helpers\Dashboards\Admin\AdminDashboardData;


class DeleteUsersController extends Controller
{

    private $connection;
    private $request;
    private $flashMessages;
    private $data;


    /**
     * DeleteUsersController constructor.
     * @param Connection $connection
     * @param Request $request
     * @param FlashBagInterface $flashMessages
     * @param DeleteUsers $data
     */
    public function __construct(Connection $connection, Request $request, FlashBagInterface $flashMessages, DeleteUsers $data)
    {
        $this->connection = $connection;
        $this->request = $request;
        $this->flashMessages = $flashMessages;
        $this->data = $data;
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
    public function deleteUser() : void
    {

        $dashboardData = new AdminDashboardData();

        // Check if user get is isset
        if ( $this->request->getRequest('user') ) {

            // Check if user get is numeric and get array
            if (is_numeric($this->request->getRequest('user')) && $dashboardData->getDataUserById($this->request->getRequest('user')) != false) {

                // Check if delete confirm get right
                if ( $this->request->getRequest('delete') === 'yes' )
                {
                    // Add message to flashbag
                    $this->flashMessages->add('delete', 'Pomyślnie usunąłeś użytkownika o id: ' . $this->request->getRequest('user'));

                    // Delete user
                    $this->data->deleteUser($this->request->getRequest('user'));

                    // Redirect to admin panel
                    $this->request::redirectTo('admin/dashboard');
                }

            } else {

                // Add message to flashbag
                $this->flashMessages->add('delete', 'Usunięcie użytkownika nie udało się..');

                // Redirect to admin panel
                $this->request::redirectTo('admin/dashboard');
            }
        } else { $this->request::redirectTo('admin/dashboard'); }

    }

}