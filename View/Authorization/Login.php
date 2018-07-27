
<?php require './View/Template/Header.php'; ?>

<div class="uk-container uk-container-small uk-margin-medium-top">

<?php

    use App\Core\Messages\FlashBag;
    use App\Core\SessionManagement;

    $flash = new FlashBag();
    $session = new SessionManagement();

    if ( $session->get('flash_messages') )
    {
        $data = explode(',', $flash->display('error'));

        foreach ($data as $value)
        {
            echo '<div class="uk-alert-danger" uk-alert><a class="uk-alert-close" uk-close></a><p>' . $value . '</p></div>';
        }
    }


?>

    <div class="uk-card uk-card-secondary uk-card-body">

            <form action="login" method="POST">

                <h2 class="uk-heading-line"><span>Zaloguj się do serwisu</span></h2>

                <div class="uk-margin">
                    <label class="uk-form-label" for="email">Podaj email</label>
                    <div class="uk-form-controls">
                        <input type="text" id="email" class="email uk-input" name="email" placeholder="Podaj email">
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="password">Podaj hasło</label>
                    <div class="uk-form-controls">
                        <input type="password" id="password" class="password uk-input" name="password" placeholder="Podaj hasło">
                    </div>
                </div>
                <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                    <label><input class="uk-checkbox" type="checkbox"> Zapamiętaj mnie</label>
                </div>
                <div class="uk-margin">
                    <input type="submit" class="uk-button uk-button-primary" name="submit" value="Zaloguj się">
                </div>

            </form>

            <hr>

            <div class="uk-margin">
                <div class="uk-text-center">
                    <p>Nie posiadasz jeszcze konta?</p>
                    <button class="uk-button uk-button-default"><span uk-icon="icon: users"></span> Stwórz nowe konto</button>
                </div>
            </div>



    </div>

    <h5 class="uk-heading-line uk-text-center"><span>Photoline 2018 <span class="uk-label uk-label-success">Bezpieczne logowanie</span></span></h5>

</div>

<?php require './View/Template/Footer.php'; ?>