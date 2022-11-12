<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input[type=submit] {
            background-color: #9DB1CC;
            border: none;
            padding: 5px 20px;
            margin: 10px 10px;
            color: #252850;
            cursor: pointer;
            border-radius: 12px;
        }
    </style>
</head>

<body>
   
<br><br><font size="4" color="#13678A">Дати з БД в форматі мм.дд.рррр:"</font><br>
<?php
if (isset($_POST['ok'])) 
{
  $date = $_POST['email'];
  preg_match_all('/((\d{4})-(\d{2})-(\d{2}))|((\d{2})-(\d{2})-(\d{4}))/', $date, $date_parts);
  foreach ($date_parts[0] as $Value)
  echo DateEdit($Value) . '<br/>';
}
echo 
'<form action="" method="post">
        <textarea name="email" style="width:200px;height:140px;">10-10-2002 2010-01-01 2002-12-12</textarea><br />
        <input type="submit" name="ok" value="Відправити" />
</form>';
function DateEdit($Date)
{
  $date_explode = explode("-", $Date);
  if ($date_explode[0] > 31) {
    $day = $date_explode[2];
    $year = $date_explode[0];
  } else {
    $day = $date_explode[0];
    $year = $date_explode[2];
  }
  $result_date = $day . '.' . $date_explode[1] . '.' . $year;
  return $result_date;
}
?>
</body>

</html>