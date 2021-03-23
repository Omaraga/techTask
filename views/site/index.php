<?php include ROOT . '/views/layouts/header.php'; ?>

    <section>
        <div class="container">
            <div class="row">


                <div class="col-sm-12 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Главная</h2>


                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6 col-offset-2 signup-form">
                                    <?php if (isset($errors) && is_array($errors)): ?>
                                        <ul>
                                            <?php foreach ($errors as $error): ?>
                                                <li> - <?php echo $error; ?></li>
                                            <?php endforeach; ?>
                                        </ul>

                                    <?php endif; ?>
                                    <form action="#" method="post" class="signup-form">
                                        Имя пользователя * <input type="text" placeholder="Имя пользователя" name="user_name">
                                        Email * <input type="email" placeholder="email" name="email">
                                        <textarea name="message" id="" cols="20" rows="5"></textarea> <br>
                                        <input type="submit" name="submit" class="btn btn-default"><br>
                                    </form>
                                </div>
                            </div>
                            <form action="" method="post" class="signup-form">
                                <select name="sort" id="" class="col-sm-2 col-sm-offset-6">
                                    <option value="user_name" <?php if(isset($_SESSION['sorting']) && $_SESSION['sorting']=='user_name')echo "selected";?> >Имя пользователя</option>
                                    <option value="email" <?php if(isset($_SESSION['sorting']) && $_SESSION['sorting']=='email')echo "selected";?>>Email</option>
                                    <option value="adding_time" <?php if(isset($_SESSION['sorting']) && $_SESSION['sorting']=='adding_time')echo "selected";?>>Время</option>
                                </select>
                                <select name="order" id="" class="col-sm-2">
                                    <option value="DESC" <?php if(isset($_SESSION['order']) && $_SESSION['order']=='DESC')echo "selected";?>>Убыванию</option>
                                    <option value="ASC" <?php if(isset($_SESSION['order']) && $_SESSION['order']=='ASC')echo "selected";?>>Возрастанию</option>
                                </select>
                                <input type="submit" name="sorted" value="Сортировать" class="col-sm-2 btn btn-default">
                            </form>
                            <br><br>
                            <div class="container">


                                <div class="row">
                                    <table class="table-bordered table-striped table">
                                        <tr>

                                            <th width="10%">email</th>
                                            <th width="10%">Имя пользователя</th>
                                            <th width="15%">Время</th>
                                            <th width="50%">Задача</th>
                                            <th width="15%">Статус</th>
                                        </tr>
                                        <?php foreach ($messages as $item): ?>
                                            <tr>
                                                <td><?php echo $item['email']; ?></td>
                                                <td><?php echo $item['user_name']; ?></td>
                                                <td><?php echo $item['adding_time']; ?></td>
                                                <td><?php echo $item['message']; ?></td>
                                                <td><?php echo Status::getStatusNameById($item['status']); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>


                                </div>
                            </div>
                            <!-- Постраничная навигация -->
                            <?php echo $pagination->get(); ?>
                        </div>




                    </div><!--features_items-->

                </div>
            </div>

    </section>


<?php include ROOT . '/views/layouts/footer.php'; ?>