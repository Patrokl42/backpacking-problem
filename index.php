<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Перевезення</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
    <div class="wrapper">
        <div class="greeting">
            <h1>Ведіть ваші значення</h1>
        </div>
        <div class="pg-form">
            <form class="input" action="input.php" method="post">
        <div class="pg-form__wrapper">
            <div class="pg-form__label">
                <label>Ведіть кількість предметів</label>
            </div>
            <div class="pg-form__input">
                <input class="items field" type="text" name="items" placeholder="1234567890">
            </div>
        </div>
        <div class="pg-form__wrapper">
            <div class="pg-form__label">
                <label>Ведіть максимальну грузопідйомність</label>
            </div>
            <div class="pg-form__input">
                <input class="max_cargo field" type="text" name="max_cargo" placeholder="1234567890">
            </div>
        </div>
        <input class="submit" type="submit" value="Задати значення">
     </div>
        </form>
    </div>
</body>
</html>
