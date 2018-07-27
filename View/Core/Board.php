<?php require './View/Template/Header.php'; ?>

<body class="body-grey">

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
                        <div class="uk-width-auto uk-margin-right">
                            <img class="uk-border-circle uk-card-default" width="50" height="50" src="./Public/images/avatars/avatar.jpg">
                        </div>
                    </li>
                    <li>
                        <a class="uk-button-text" href="#">
                                <?php

                                    use App\Model\Service\Helpers\UserData;

                                    $userData = new UserData();
                                    echo $userData->getName();

                                ?>
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

    <div class="uk-container">
        <div class="uk-alert-primary" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p>Cześć <?php echo $userData->getName(); ?>, znajdujesz się aktualnie w panelu admina.</p>
        </div>
    </div>

    <div class="uk-section uk-padding-remove-vertical uk-margin">
        <div class="uk-container">
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

<?php require './View/Template/Footer.php'; ?>