<?php
/**
 * Created by PhpStorm.
 * User: QAZAQ
 * Date: 16.06.2018
 * Time: 0:28
 */

class Task
{

    const SHOW_BY_DEFAULT = 3;

    /**
     * @param $user_name
     * @param $email
     * @param string $url
     * @param $user_browser
     * @param $ip_adress
     * @param $message
     */
    public static function addTask($user_name, $email, $user_browser, $ip_adress, $message){
        $db = Db::getConnection();
        $defaultStatus = 1;
        $sql = "INSERT INTO task (user_name,ip_adress,user_browser,email,message,status) VALUES (:user_name, :ip_adress, :user_browser, :email, :message, :status)";
        $result = $db->prepare($sql);
        $result->bindParam(":user_name",$user_name,PDO::PARAM_STR);
        $result->bindParam(":email",$email,PDO::PARAM_STR);
        $result->bindParam(":ip_adress",$ip_adress,PDO::PARAM_STR);
        $result->bindParam(":user_browser",$user_browser,PDO::PARAM_STR);
        $result->bindParam(":message",$message,PDO::PARAM_STR);
        $result->bindParam(":status",$defaultStatus,PDO::PARAM_INT);
        return $result->execute();


    }

    public static function getTasks($page=1,$column_name,$order, $limitSpacial = null){
        $limit = self::SHOW_BY_DEFAULT;
        if (isset($limitSpacial)){
            $limit = $limitSpacial;
        }

        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT id,user_name, email, adding_time, message,status FROM task '
            . 'ORDER BY '.$column_name.' '.$order.' LIMIT :limit OFFSET :offset';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $messages = array();
        while ($row = $result->fetch()) {
            $messages[$i]['id'] = $row['id'];
            $messages[$i]['user_name'] = $row['user_name'];
            $messages[$i]['email'] = $row['email'];
            $messages[$i]['adding_time'] = $row['adding_time'];
            $messages[$i]['message'] = $row['message'];
            $messages[$i]['status'] = $row['status'];
            $i++;
        }
        return $messages;

    }

    public static function getTotalTasks()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT count(id) AS count FROM task';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);


        // Выполнение коменды
        $result->execute();

        // Возвращаем значение count - количество
        $row = $result->fetch();
        return $row['count'];
    }
    public static function getTaskById($id){
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM task WHERE id = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение команды
        $result->execute();

        // Получение и возврат результатов
        return $result->fetch();
    }

    public static function updateTaskById($id, $message){
        // Соединение с БД
        $db = Db::getConnection();
        //ставим статус 3 отредактировано
        $status = 3;
        $sql = "UPDATE task
            SET 
                message = :message,
                status = :status
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->bindParam(':message', $message, PDO::PARAM_STR);

        return $result->execute();

    }
    public static function checkTaskById($id){
        // Соединение с БД
        $db = Db::getConnection();
        //ставим статус 2 выполнено
        $status = 2;
        $sql = "UPDATE task
            SET 
                status = :status
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);

        return $result->execute();

    }


}