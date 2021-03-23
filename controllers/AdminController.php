<?php


class AdminController
{
    public function actionIndex($page = 1, $column_name = "id", $order = "DESC"){
        $user = User::checkAdmin();

        if(isset($_SESSION['sorting'])){
            $column_name = $_SESSION['sorting'];
        }
        if(isset($_SESSION['order'])){
            $order = $_SESSION['order'];
        }
        $messages = Task::getTasks($page, $column_name, $order, 5);
        $total = Task::getTotalTasks();

        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, 5, 'page-');
        if(isset($_POST['sorted']) && !empty($_POST['sorted'])){
            $_SESSION['sorting']=$_POST['sort'];
            $_SESSION['order']=$_POST['order'];
            header("Location: /admin");
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin/index.php');
        return true;



    }
    public function actionEdit($id){
        $user = User::checkAdmin();
        $id = intval($id);
        $task = Task::getTaskById($id);

        if (isset($_POST['submit']) && isset($task)){
            if (isset($_POST['message'])){
                $taskMessage = htmlspecialchars($_POST['message']);
                Task::updateTaskById($id, $taskMessage);
                header("Location: /admin");
            }
        }


        // Подключаем вид
        require_once(ROOT . '/views/admin/edit.php');
        return true;
    }

    public function actionCheck($id){
        $user = User::checkAdmin();
        $id = intval($id);
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            Task::checkTaskById($id);
            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin/check.php');
        return true;

    }


}