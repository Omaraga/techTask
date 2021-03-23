<?php

/**
 * Контроллер CartController
 */
class SiteController
{

    /**
     * Action для главной страницы
     */
    public function actionIndex($page = 1, $column_name = "id", $order = "DESC")
    {

        if(isset($_SESSION['sorting'])){
            $column_name = $_SESSION['sorting'];
        }
        if(isset($_SESSION['order'])){
            $order = $_SESSION['order'];
        }
        $userId = User::checkLogged();
        if (isset($userId)){
            $user = User::getUserById($userId);
        }
        $messages = Task::getTasks($page, $column_name, $order);
        $total = Task::getTotalTasks();

        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Task::SHOW_BY_DEFAULT, 'page-');
        if(isset($_POST['sorted']) && !empty($_POST['sorted'])){
            $_SESSION['sorting']=htmlspecialchars($_POST['sort']);
            $_SESSION['order']=htmlspecialchars($_POST['order']);
            header("Location: /");
        }
        if (isset($_POST['submit']) && !empty($_POST['submit'])) {

            $user_name = htmlspecialchars($_POST['user_name']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);

            //$message = mysql_real_escape_string($message);
            $user_browser = $_SERVER['HTTP_USER_AGENT'];
            $ip = "";
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }

            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!User::checkName($user_name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }


            if ($errors == false) {
                // Если ошибок нет
                //

                $result = Task::addTask($user_name, $email, $user_browser, $ip, $message);


            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/site/index.php');
        return true;
    }




}
