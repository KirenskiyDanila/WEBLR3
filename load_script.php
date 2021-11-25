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
    if ($id == -1) {
        $sql = "SELECT id FROM ticket WHERE is_closed = false ORDER BY id LIMIT 1";
        $result = $pdo->prepare($sql);
        $result->execute();
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $id = $row['id'];
    }
    $sql = "SELECT id, photo, name, price FROM ticket WHERE is_closed = false AND id >= :id limit 10";
    $result = $pdo->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->execute();
    $tickets = [];
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $tickets[] = '<div class="item">
                <img src="images/' . $row['photo'] . '" class="item_photo">
                <div class="item_text">
                    <a href="ticket.php?id=' . $row['id'] . '" style="color: #f58142"><div>' . $row['name'] . '</div></a>
                    <div>' . $row['price'] . ' рублей</div>
                </div>
            </div>';
        $id = $row['id'];
    }
    // последний элемент в массиве - id последнего выведенного элемента
    $tickets[] = $id;
    echo json_encode($tickets);
