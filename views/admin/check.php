<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Выполнить</li>
                </ol>
            </div>


            <h4>Выполнить задачу #<?php echo $id; ?></h4>


            <p>Вы действительно хотите выполнить задачу?</p>

            <form method="post">
                <input type="submit" name="submit" value="Выполнить" />
            </form>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>

