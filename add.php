<?php

$eMail = $_POST['eMail'];
$Phone = $_POST['Phone'];
$Date = $_POST['Date'];


$dbhost = "localhost";
$dbname = "ks";
$username = "root";
$password = "1234432";
?>

<?php echo "eMail:$eMail<br><br>"; ?>
<?php echo "Phone:$Phone<br><br>"; ?>
<?php echo "Date:$Date<br><br><br><br>"; ?>

<?php
if (!preg_match("/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/ui", $eMail)) {
  echo '<script language="JavaScript">alert("Вибачте, але Ваш Email невірний!");</script>';
} else if (!preg_match("/^\+380([0-9]{9})$/ui", $Phone)) {
  echo '<script language="JavaScript">alert("Вибачте, але Ваш телефон невірний!");</script>';
} else if (!preg_match("/^([0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1]))|((0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-([0-9]{4}))$/ui", $Date)){
  echo '<script language="JavaScript">alert("Вибачте, але Ви ввели неправильний формат дати!                      рррр-мм-дд або дд-мм-рррр");</script>';
} else {
  echo "<div style='color: #467373; font-style:italic;'>" . 'Дякую. Ви ввели всі дані вірно! Ваша інформація записана.' . "</div>";
  echo '<a href="one_1.php" class="button beer-button-blue"  margin-bottom ="7px" >Відкрити базу даних</a>';

  try {
    $db = new PDO("mysql:host=$dbhost; dbname=$dbname", $username, $password);
    $sql = "INSERT INTO person(Date, Phone, E-Mail) VALUES ('$id','$email','$tel','$data')";
    $db->exec($sql);
    $query->execute(['Date' => $Date]);
    $query->execute(['Phone' => $Phone]);
    $query->execute(['eMail' => $eMail]);
  } catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  $db = null;
}
