<?php

session_start();

if (!isset($_SESSION["admin_auth"]) || $_SESSION["admin_auth"] !== true) {
    header("Location: login.php");
    exit;
}

if(isset($_GET['sid']) && !empty($_GET['sid']) && is_numeric($_GET['sid']) && isset($_GET['delete'])) {
    $id = (int)$_GET['sid'];
    $update = $_GET['delete'];
    $sql = "DELETE FROM feedback WHERE id = $id"; //Kirje kustutamine
    if($db->dbQuery($sql)) {
        echo "Tagasiside on edukalt kustutatud!";
    }else {
        echo "Midagi läks kustutamisega valesti.";
    }
    header("Location: index.php?page=admin");
    exit;
}

$sql = "SELECT *, DATE_FORMAT(date, '%d.%m.%Y %H:%i:%s') as date_time from feedback order by date desc";
$data = $db->dbGetArray($sql);
// $db->show($data);
// CSV lugemine
// $rows = [];
// if (file_exists("feedback.csv")) {
    // $lines = file("feedback.csv", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    // foreach ($lines as $line) {
        // $fields = explode(";", $line);
        // if (count($fields) >= 4) {
            //$rows[] = $fields;


        
?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Tagasiside haldus</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2>Laekunud tagasiside</h2>
        <div class="d-flex justify-content-end align-items-center mb-3">
            

            <a href="index.php" class="btn btn-outline-success me-1">Avaleht</a>
            <a href="logout.php" class="btn btn-outline-danger">Logi välja</a>
        </div>
        <?php
        if($data !== false) {
            ?>
        
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">Aeg</th>
                        <th class="text-center">Nimi</th>
                        <th class="text-center">E-post</th>
                        <th class="text-center">Sõnum</th>
                        <th class="text-center">Kustuta</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                for($x = 0; $x < count($data); $x++) { 
            ?>
                        <tr>
                            <td><?= $data[$x]['date_time'];?></td>
                            <td><?= $data[$x]['name']; ?></td>
                            <td><?= $data[$x]['email'];  ?></td>
                            <td><?= $data[$x]['message'];  ?></td>
                            <td class= text-center><a href="?page=admin&sid=<?= $data[$x]['id'] ?>&delete=true" onclick="return confirm('Kas oled kindel, et soovid kustutada?');">
                            <i class="fa-solid fa-trash text-danger"></i></a></td>
                        </tr>
            <?php
        }
        ?>
        </tbody>
        </table>
        <?php 
    } else  {
             echo "<p>Tagasisidet ei ole veel saabunud.</p>";
             }
            ?>
    </div>

