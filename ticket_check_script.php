<?php
$ini_array = parse_ini_file('parameters.ini');
$id = $_GET['id'];
try {
    $pdo = new PDO('pgsql:host=' . $ini_array['host'] . ';port=' . $ini_array['port'] .
';dbname=' . $ini_array['name'] . ';user=' . $ini_array['login'] . ';password=' . $ini_array['password']);
}
catch (PDOException $exception) {
echo "Ошибка подключения к БД: " . $exception->getMessage();
die();
}
$sql = "SELECT * FROM ticket WHERE is_closed = false AND id >= :id limit 1";
$result = $pdo->prepare($sql);
$result->bindParam(':id', $id, PDO::PARAM_INT);
$result->execute();
echo $result->rowCount();
