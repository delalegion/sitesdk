<?php require './View/Template/Header.php'; ?>

<head>
    <title>Panel kontrolny admina</title>
</head>

<?php

    use App\Model\Service\Helpers\UserData;
    $userData = new UserData();

    use App\Model\Service\Helpers\Dashboards\Admin\AdminDashboardData;
    $dashboardData = new AdminDashboardData();

    use App\Core\Request;
    $request = new Request();

    use App\Config;
    $config = new Config();

    use App\Core\Messages\FlashBag;
    use App\Core\SessionManagement;

    $flash = new FlashBag();
    $session = new SessionManagement();

?>

<body onload="
<?php
    if ( $session->get('flash_messages') )
    {
        $data = explode(',', $flash->display('delete'));

        foreach ($data as $value)
        {
            echo "UIkit.notification({message: '" . $value . "', status: 'success', timeout: '125215125', pos: 'bottom-left'})";
        }
    }
?>">

    <nav class="uk-margin uk-background-dark" uk-navbar>
        <div class="uk-navbar-left">
            <div class="uk-margin-medium-left">
                <a class="uk-navbar-item uk-logo" href="#">PhotoMagic</a>
            </div>
        </div>
        <div class="uk-navbar-right">
            <div class="uk-margin-medium-right">
                <ul class="uk-navbar-nav">
                    <li class="uk-flex uk-flex-middle">
                        <div class="uk-width-auto">
                            <img class="uk-border-circle uk-card-default" width="50" height="50" src="<?php echo $userData->getAvatar(); ?>">
                        </div>
                    </li>
                    <li>
                        <a class="uk-button-text" href="#">
                            <?php echo $userData->getName(); ?>
                            <span class="uk-margin-small-left uk-label uk-label-success">ONLINE</span>
                        </a>
                        <div uk-dropdown="pos: bottom-right; mode: click" class="uk-navbar-dropdown">

                            <ul class="uk-nav uk-dropdown-nav">
                                <li>
                                    <a href="#">Profil</a>
                                </li>
                                <li>
                                    <a href="#">Wiadomości</a>
                                </li>
                                <li class="uk-nav-header">Ustawienia</li>
                                <li>
                                    <a href="#">Dane profilu</a>
                                </li>
                                <li>
                                    <a href="#">Bezpieczeństwo</a>
                                </li>
                                <li class="uk-nav-header">Ustawienia admina</li>
                                <li>
                                    <a href="#">Główne ustawienia</a>
                                </li>
                                <li>
                                    <a href="#">Użytkownicy</a>
                                </li>
                                <li>
                                    <a href="#">Strony</a>
                                </li>
                                <li>
                                    <a href="#">Zabezpieczenia</a>
                                </li>
                                <li class="uk-nav-divider"></li>
                                <li>
                                    <a href="#">Pomoc</a>
                                </li>
                                <li>
                                    <a href="logout" class="uk-button uk-button-danger uk-margin-small-top">Wyloguj</a>
                                </li>
                            </ul>

                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <div class="uk-container-large uk-align-center">
        <div class="uk-alert-primary" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p>Cześć <?php echo $userData->getName(); ?>, znajdujesz się aktualnie w panelu admina.</p>
        </div>
    </div>

    <div class="uk-section uk-padding-remove-vertical uk-margin">
        <div class="uk-container-large uk-align-center">
            <div class="uk-child-width-1-3@m uk-grid-match" uk-grid>
                <div>
                    <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                        <h3 class="uk-card-title">Ilość wrzuconych zdjęć</h3>
                        <h1 class="uk-h1 uk-margin-remove-top uk-text-bold">19 201</h1>
                        <span class="uk-label uk-label-success">Ostatnie zdjęcie wrzucił Hubert Kruk</span>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                        <h3 class="uk-card-title">Ilość użytkowników</h3>
                        <h1 class="uk-h1 uk-margin-remove-top uk-text-bold">2019</h1>
                        <span class="uk-label uk-label-warning">Najnowszy użytkownik: Hubert Kruk</span>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                        <h3 class="uk-card-title">Suma danych</h3>
                        <h1 class="uk-h1 uk-margin-remove-top uk-text-bold">304 019 GB</h1>
                        <span class="uk-label uk-label-default">Ostatni plik waży: 1,5mb</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="uk-section uk-padding-remove-vertical uk-margin">
        <div class="uk-container-large uk-align-center">
            <table class="uk-table uk-table-striped">
                <thead>
                <tr>
                    <th>Nickname</th>
                    <th>Email</th>
                    <th>Flaga</th>
                    <th class="uk-width-medium">Opcje</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($dashboardData->getAllDataFromUsersTable() as $data) : ?>

                        <tr>
                            <td>
                                <img class="uk-border-rounded uk-margin-small-right" data-src="<?php echo $data['avatar'] ?>" width="50" height="50" alt="User avatar" uk-img>
                                <?php echo $data['nickname']; ?>
                            </td>
                            <td class="uk-text-middle">
                                <?php echo $data['email']; ?>
                            </td>
                            <td class="uk-text-middle">
                                <?php if ($data['is_admin'] == true): ?>
                                    <span class="uk-label uk-label-danger">Admin</span>
                                <?php else: ?>
                                    <span class="uk-label uk-label-success">Użytkownik</span>
                                <?php endif; ?>
                            </td>
                            <td class="uk-text-middle">
                                <a href="admin/users/delete?user=<?php echo $data['id']; ?>" id="delete-user" class="uk-button uk-button-danger uk-margin-small-right">Dezaktywuj</a>
                                <a href="#" class="uk-button uk-button-primary">Edytuj</a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

<?php require './View/Template/Footer.php'; ?>