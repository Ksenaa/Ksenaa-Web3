<?php
   echo "<br><br>Дані з БД:";
   echo "<table style='border: solid 1px black;'>";
   echo "<tr><th>Id</th><th>E-mail</th><th>Телефон</th><th>Дата</th></tr>";

   class TableRows extends RecursiveIteratorIterator
   {
      function __construct($it)
      {
         parent::__construct($it, self::LEAVES_ONLY);
      }

      function cur_rent()
      {
         return "<td style='width:150px;border:1px solid black;'>" . parent::current() . "</td>";
      }
      function begin_Children()
      {
         echo "<tr>";
      }

      function end_Children()
      {
         echo "</tr>" . "\n";
      }
   }


   try {
      $conn = new PDO("mysql:host=$dbhost; dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT id, email, tel, data FROM information");
      $stmt->execute();

      // set the resulting array to associative
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
         echo $v;
      }
   } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
   }
?>