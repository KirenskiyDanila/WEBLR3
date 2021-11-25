<!doctype html>
<html lang="en">
<head>
    <link href="index.css" rel="stylesheet">
    <link href="ticket.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@1,200&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Сайт объявлений Данилы Киренского</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>


<header>
    <div class="header_logo"><img src="images/logo.png"></div>
    <div class="header_text"><a href="index.php">Сайт объявлений</a></div>
    <div class="header_sign-in"><a href="#login-window">Вход</a></div>
    <div class="header_sign-up"><a href="#registration-window">Регистрация</a></div>
</header>

<div id = "login-window">
    <div class = "registration-top">
        <a href="">
            <div class="cl-btn-2">
                <div>
                    <div class="left-to-right"></div>
                    <div class="right-to-left"></div>
                    <span class="close-btn">закрыть</span>
                </div>
            </div>
        </a>
        <div><h1>Вход</h1></div>
        <div><a href="#registration-window" class="change-window">Регистрация</a></div>
    </div>
    <form action="#" class = "top-row">
        <div class="field-wrap">
            <label for="loginEmail"></label><input type="email" placeholder="Электронная почта..." required autocomplete="email" pattern="[a-zA-Z0-9\s]+@[a-zA-Z0-9\s]+\.[a-zA-Z0-9\s]+$" id="loginEmail"/>
        </div>

        <div class="field-wrap">
            <label for="loginPassword"></label><input type="password" placeholder="Пароль..." required autocomplete="off" pattern="[@?!,.a-zA-Z0-9\s]+$" id="loginPassword" minlength="7"/>
        </div>

        <button type="submit" id="login_button" class="button button-block">Войти</button>
        <script>
            const LoginPass = document.querySelector('#loginPassword');
            const LoginEmail = document.querySelector('#loginEmail');

            function changeBackground() {
                if (LoginPass.validity.patternMismatch || LoginEmail.validity.patternMismatch
                    || LoginPass.validity.valueMissing || LoginEmail.validity.valueMissing
                    || LoginPass.value.length < 7) {
                    document.querySelector('#login_button').style.backgroundColor = 'darkgray';
                } else {
                    document.querySelector('#login_button').style.backgroundColor = 'darkred';
                }
            }

            LoginPass.addEventListener('input', changeBackground);
            LoginEmail.addEventListener('input', changeBackground);
        </script>
    </form>
</div>


<div id = "registration-window">
    <div class = "registration-top">
        <a href="">
            <div class="cl-btn-2">
                <div>
                    <div class="left-to-right"></div>
                    <div class="right-to-left"></div>
                    <span class="close-btn">закрыть</span>
                </div>
            </div>
        </a>
        <div><h1>Регистрация</h1></div>
        <div><a href="#login-window" class="change-window">Вход</a></div>
    </div>
    <form action="#" class = "top-row" id="registration-form">
        <div class="field-wrap">
            <label for="RegistrationName"></label><input type="name" placeholder="Введите ваше имя..." required autocomplete="on" pattern="[А-ЯЁ][а-яё]+$" id="RegistrationName"/>
        </div>

        <div class="field-wrap">
            <label for="email"></label><input type="email" placeholder="Электронная почта..." required autocomplete="email" pattern="[a-zA-Z0-9\s]+@[a-zA-Z0-9\s]+\.[a-zA-Z0-9\s]+$" id="email"/>
        </div>

        <div class="field-wrap">
            <label for="tel"></label><input type="tel" placeholder="Номер телефона (в формате +71234567890)...." required autocomplete="tel" pattern="[\+]\d{11}" minlength="12" maxlength="12" id="tel"/>
        </div>

        <div class="field-wrap">
            <label for="txtNewPassword"></label><input type="password" placeholder="Пароль..." required autocomplete="off" pattern="[@?!,.a-zA-Z0-9\s]+$" id="txtNewPassword" minlength="7"/>
        </div>

        <div class="field-wrap">
            <label for="txtConfirmPassword"></label><input type="password" placeholder="Повторите пароль..." required autocomplete="off" pattern="[@?!,.a-zA-Z0-9\s]+$" id="txtConfirmPassword" minlength="7"/>
        </div>
        <div id="divCheckPassword"></div>

        <div class = "registration-block"></div>
        <label class="checkbox-google">
            <input type="checkbox" required id="info">
            <span class="checkbox-google-switch"></span>
        </label>
        Согласие на обработку персональных данных
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <script>
            function onSubmit(token) {
                document.getElementById("registration-form").submit();
            }
        </script>
        <button type="submit" id="button" data-sitekey="reCAPTCHA_site_key"
                data-callback='onSubmit'
                data-action='submit' class="button button-block">Зарегистрироваться</button>
        <script>
            const pass = document.querySelector('#txtNewPassword');
            const nameBlock = document.querySelector('#RegistrationName');
            const email = document.querySelector('#email');
            const repeatPass = document.querySelector('#txtConfirmPassword');
            const tel = document.querySelector('#tel');
            const info = document.querySelector('#info');

            repeatPass.addEventListener('input', function () {
                if (!passCheck())
                {
                    document.querySelector('#txtConfirmPassword').style.borderColor = 'red';
                }
                else
                {
                    document.querySelector('#txtConfirmPassword').style.borderColor = 'green';
                }
            });

            function passCheck(){
                return pass.value === repeatPass.value;
            }

            function changeBackground() {
                if (pass.validity.patternMismatch || tel.validity.patternMismatch || email.validity.patternMismatch
                    || nameBlock.validity.patternMismatch || repeatPass.validity.patternMismatch ||
                    pass.validity.valueMissing || tel.validity.valueMissing || email.validity.valueMissing
                    || nameBlock.validity.valueMissing || repeatPass.validity.valueMissing
                    || !info.checked || !passCheck() || pass.value.length < 7 || repeatPass.value.length < 7) {
                    document.querySelector('#button').style.backgroundColor = 'darkgray';
                } else {
                    document.querySelector('#button').style.backgroundColor = 'darkred';
                }
            }

            pass.addEventListener('input', changeBackground);
            nameBlock.addEventListener('input', changeBackground);
            email.addEventListener('input', changeBackground);
            repeatPass.addEventListener('input', changeBackground);
            tel.addEventListener('input', changeBackground);
            info.addEventListener('input', changeBackground)



        </script>
    </form>
</div>

<main>
    <?php
    $ini_array = parse_ini_file('parameters.ini');
    try {
        $pdo = new PDO('pgsql:host=' . $ini_array['host'] . ';port=' . $ini_array['port'] .
            ';dbname=' . $ini_array['name'] . ';user=' . $ini_array['login'] . ';password=' . $ini_array['password']);
    } catch (PDOException $exception) {
        echo "Ошибка подключения к БД: " . $exception->getMessage();
        die();
    }
    $id = $_GET['id'];
    $sql = "SELECT * FROM ticket WHERE id = :id";
    $result = $pdo->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->execute();
    $tickets = [];
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo '
        <div class="ticket">
            <div class="ticket-title">' . $row['name'] . '</div>
            <div class="ticket-content">
                <div class="ticket-photo">
                    <img src="images/' . $row['photo'] . '">
                </div>
                <div class="ticket-text">
                    <div class="ticket-description">' . $row['description'] . '</div>
                    <div class="ticket-bottom-text">
                        <div class="ticket-price">Цена: '. $row['price'] . ' рублей</div>
                        <div class="ticket-phone">Телефон продавца: ' . $row['user_phone'] . '</div>
                    </div>
                </div>
            </div>
        </div>';
    }

    ?>
</main>

<footer>
    <div>Выполнил студент ПИ-19 Киренский Данила</div>
    <div>Email: Kirenskiydanila@gmail.com</div>
</footer>

</body>
</html>

