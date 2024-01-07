<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
   
    //try=if code without errors
    try{

    //local host, user, password
    $db = new PDO("mysql:host=localhost;dbname=pdo","root","");
        //pdo запрашивает обработку исключений 
    }catch(PDOException $e){ //catch=else what to do if our zapros didnt work
        echo "Error!". $e->getMessage();
    }

    // $stmt = $db -> query("SELECT * FROM `categories`");
    // while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    //     echo $row['name'].'</br>';
    // }



    // echo '</br><hr></br></br>';
    // $id = 2;
    // //запускаем выборку
    // $stmt = $db -> prepare("SELECT `name` FROM `categories` WHERE `id` = ?");
    // $stmt -> execute([$id]);
    // while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    //     echo $row['name'].'</br>';
    // }


    // echo '</br><hr></br></br>';
    // $name = 'Аудиотехника';
    // //запускаем выборку
    // $stmt = $db -> prepare("SELECT `name` FROM `categories` WHERE `name` = :name");
    // $stmt -> execute(['name'=>$name]);
    // while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    //     echo $row['name'].'</br>';
    // }


    // echo '</br><hr></br></br>';
    // $name = 'Аудиотехника';
    // //запускаем выборку
    // $stmt = $db -> prepare("SELECT `name` FROM `categories` WHERE `name` = :name");
    // $stmt -> execute(['name'=>$name]);
    // while($row = $stmt->fetch(PDO::FETCH_LAZY)){
    //     echo $row->name.'</br>';
    // }
    // echo '</br><hr></br></br>';
    // $id = 4;
    // //запускаем выборку
    // $stmt = $db -> prepare("SELECT `name` FROM `categories` WHERE `id` = ?");
    // $stmt -> execute([$id]);
    // $name = $stmt -> fetchColumn();
    // echo $name.'</br>';

    // $data = $db -> query("SELECT * FROM `categories`")->fetchAll(PDO::FETCH_ASSOC);
    // foreach($data as $k => $v){
    //     echo  $v['id'].'-'.$v['name'].'<br>';
    // }

    //как добавить запись через пдо

    // //создадим переменную  c новой категорией
    // $name = 'Зоотовары';
    // //предопределенный запрос через переменную нэйм
    // $query = "INSERT INTO `categories` (`name`) VALUES (:name)";
    // $params = [':name'=>$name];
    // $stmt = $db -> prepare($query);
    // $stmt->execute($params);

    // $id = 1;
    // $name = 'Планшеты и ноутбуки';
    // $query = "UPDATE `categories` SET `name` = :name WHERE `id`=:id";
    // $params = [
    //     ':id'=>$id,
    //     ':name'=>$name
    // ];
    // $stmt = $db ->prepare($query);
    // $stmt -> execute($params);

    //удаление записи
    // $id = 17;
    // //по определенному идентификатору
    // $query = "DELETE FROM `categories` WHERE `id`=?"
    // $params = [$id];
    // $stmt = $db ->prepare($query);
    // $stmt -> execute($params);

    // $limit = 3;
    // $stm = $db ->prepare('SELECT * FROM categories LIMIT ? ');
    // $stm->bindValue(1, $limit, PDO::PARAM_INT);
    // $stm->execute();
    // $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    // echo '<pre>';
    // print_r($data);
    // foreach($data as $k => $v){
    //     echo  $v['id'].'-'.$v['name'].'<br>';
    // }



    ?>
</body>
</html>