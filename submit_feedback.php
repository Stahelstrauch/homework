<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // $db->show($_POST); // Näita vormi andmeid
    $name = trim($_POST["name"] ?? '');
    $email = trim($_POST["email"] ?? '');
    $message = trim($_POST["message"] ?? '');

    if ($name && $email && $message) {
        $timestamp = date("Y-m-d H:i:s");
        $name = htmlspecialchars($name);
        $email = htmlspecialchars($email);
        $message = str_replace(["\r", "\n", ";"], " ", htmlspecialchars($message));

        $line = "$timestamp;$name;$email;$message\n";

        $sql = "INSERT INTO feedback (date, name, email, message) VALUES (
            '".$db->dbFix($timestamp)."', 
            '".$db->dbFix($name)."', 
            '".$db->dbFix($email)."', 
            '".$db->dbFix($message)."')"; 
        // echo $sql; //Väljasta sql lause(Test!!)
        if($db->dbQuery($sql)) {
            echo "<h3>Aitäh! Teie sõnum on salvestatud.</h3>";
            echo "<a href='index.php'>Avalehele</a>";
            file_put_contents("feedback.csv", $line, FILE_APPEND | LOCK_EX);
        } else {
            echo "<h3>Palun täida kõik väljad.</h3>";
		    echo "<a href='javascript:history.back()'>Tagasi</a>";
        }
   
    }
} else {
    header("Location: index.php?page=contact");
    exit;
}
