<?php require './View/Template/Header.php'; ?>

<head>
<title>Usuwanie użytkownika</title>
</head>

<?php

    use App\Model\Service\Helpers\Dashboards\Admin\AdminDashboardData;

    $dashboardData = new AdminDashboardData();

    $data = $dashboardData->getDataUserById($_GET['user']);

    use App\Model\Service\Helpers\UserData;

    $userData = new UserData();

?>

<body>

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

    <div class="uk-container uk-container-small">

        <div class="uk-card uk-border-rounded uk-alert-danger uk-card-body uk-width-1-1@m">
            <h3 class="uk-card-title">Uwaga!</h3>
            <p>Czy na pewno chcesz usunąć konto użytkownika <?php echo $data['nickname']; ?>?
            Pamiętaj, ten proces jest nie odwracalny.</p>

            <div class="uk-placeholder">
                <header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
                    <div class="uk-width-auto">
                        <img data-src="<?php echo $data['avatar']; ?>" width="50" height="50" alt="User avatar" uk-img>
                    </div>
                    <div class="uk-width-expand">
                        <h4 class="uk-comment-title uk-margin-remove">
                            <a class="uk-link-reset" href="#">
                                <?php echo $data['nickname']; ?>
                            </a>
                        </h4>
                        <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                            <li>
                                <a><?php echo $data['email']; ?></a>
                            </li>
                            <li>
                                <a><?php echo 'ID: ' . $data['id']; ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="uk-width-expand">
                        <a href="admin/dashboard" class="uk-button uk-button-primary uk-button-small">Jednak rezygnuję</a>
                        <a href="admin/users/delete?user=<?php echo $data['id']; ?>&&delete=yes" class="uk-button uk-button-danger uk-margin-small-right uk-button-small">Usuwam</a>
                    </div>
                </header>
            </div>
        </div>

    </div>


<?php require './View/Template/Footer.php'; ?>