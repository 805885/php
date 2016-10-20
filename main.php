<form action="" class="form" method="post">
    <h1>Введите дату</h1>
    <input type="date" id="date" placeholder="Дата" name="date">
    <input type="submit" id="button" class="button" value="Отправить">
</form>

<?php

class App
{

    //фунуция получат дату и возвращает возраст
    public function __construct($birthday)
    {
        // выделяем день, месяц, год из даты рождения
        $bDay = substr($birthday, 8, 2);
        $bMonth = substr($birthday, 5, 2);
        $bYear = substr($birthday, 0, 4);
        // текущие день, месяц, год
        $cDay = date('j');
        $cMonth = date('n');
        $cYear = date('Y');

        if(($cMonth > $bMonth) || ($cMonth == $bMonth && $cDay >= $bDay))
        {
            $year1 = (($cYear - $bYear)== date('Y') ? '' :($cYear - $bYear));
            echo "<hr>$year1<hr>";

        } else
        {
            $year2 = (($cYear - $bYear - 1)== date('Y') ? '' :($cYear - $bYear - 1));
            echo "<hr>$year2<hr>";
        }
    }

    //функция определяет год/года/лет по возрасту
    public function YearTextArg($years)
    {
        $years = abs($years);
        $t1 = $years % 10;
        $t2 = $years % 100;
        return ($t1 == 1 && $t2 != 11 ? " год" : ($t1 >= 2 && $t1 <= 4 && ($t2 < 10 || $t2 >= 20) ? " года" : " лет"));
    }
}

?>

<?php

$app = new App($_POST["date"]);

// $w = $app->YearTextArg();

// echo "$w<br>";

?>

