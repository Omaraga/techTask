<?php


class Status
{
    public static function getStatusNameById($id){
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM status WHERE id = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение команды
        $result->execute();

        // Получение и возврат результатов
        $status = $result->fetch();
        if (isset($status)){
            return $status['name'];
        }else{
            return "";
        }

    }
}