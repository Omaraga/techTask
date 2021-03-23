<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Редактировать задачу</li>
                </ol>
            </div>


            <h4>Редактировать задачу #<?php echo $id; ?></h4>

            <br/>
            <p><?=$task['user_name'];?></p>
            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <p>Задача</p>
                        <textarea name="message" id="" cols="30" rows="10"><?=$task['message'];?></textarea>
                        <br>
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>

