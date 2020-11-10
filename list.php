<?php
require_once("db.php");



if(isset($_POST['insert'])){


    $data = [
        'name'  => $_POST['fullname'],
        'fname' => $_POST['fname'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'date'  => $_POST['date'],
        'note'  => $_POST['note'],
    ];

    $insert = insert('admin',$data);

}


if(isset($_GET['deleted']) and isset($_GET['id']) ){

    $id = $_GET['id'];
    $deleted = delete('admin',$id);
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> فورم ثبت امین ها  </title>
    <link rel="stylesheet" href="bootstrap.css"  crossorigin="anonymous">

</head>
<body>


<div style="padding: 30px 80px ">

    <div class="row" style="padding-bottom: 30px;border: 3px solid black;padding: 50px 20px">
        <div class="col-md-12">

            <form action="list.php" method="post" enctype="multipart/form-data" class="h-100" dir="rtl">
                <input type="hidden" value="i" name="insert" >

                <div class="form-group row">
                    <label for="fullname" class="col-md-2 col-form-label"> نام  کامل  <span style="color:red"> * </span> </label>
                    <div class="col-md-9">
                        <input type="text" name="fullname" id="fullname" required="required" class="form-control"  placeholder="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fname" class="col-md-2 col-form-label"> نام  پدر  <span style="color:red"> * </span> </label>
                    <div class="col-md-9">
                        <input type="text" name="fname" id="fname" required="required" class="form-control"  placeholder="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label"> ایمیل    <span style="color:red"> * </span> </label>
                    <div class="col-md-9">
                        <input type="email" id="email" name="email" required="required" class="form-control"  placeholder="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-md-2 col-form-label"> شماره تماس    <span style="color:red"> * </span> </label>
                    <div class="col-md-9">
                        <input type="text" name="phone" id="phone" required="required" class="form-control"  placeholder="">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="date" class="col-md-2 col-form-label"> تاریخ  </label>
                    <div class="col-md-9">
                        <input type="date" name="date" id="date" class="form-control input-datepicker" value="">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="note" class="col-md-2 col-form-label"> توضیعات  </label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="note" id="note" rows="5"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-9 offset-md-2">
                        <button type="submit" class="btn btn-primary "><i class="fa fa-edit"></i> دخیره  </button>
                        <button type="reset" class="btn btn-danger "> <i class="fa fa-edit"></i> لغو  </button>
                    </div>
                </div>

            </form>


        </div>
    </div>


    <div class="row" style="border: 3px solid black;padding-top: 20px;margin-top: 40px" >
        <div class="col-md-12">
            <h3>  لیست دیتاه    </h3>
            <table class="table table-hover" dir="rtl">
                <thead>
                <tr>
                    <th>#</th>
                    <th>نام  </th>
                    <th>نام پدر </th>
                    <th> ایمیل  </th>
                    <th> تماس </th>
                    <th> تاریخ  </th>
                    <th> نوت   </th>
                    <th> عملیات  </th>
                </tr>
                </thead>
                <tbody>

                <?php

                $list_data = $db->query("SELECT * FROM admin ORDER BY id DESC");

                if($list_data->rowCount() > 0 ){
                    foreach ($list_data as $key => $row){
                        echo '
                            <tr>
                                <td> '.++$key.'</td>
                                <td> '.$row['name'].' </td>
                                <td> '.$row['fname'].' </td>
                                <td> '.$row['email'].' </td>
                                <td> '.$row['phone'].' </td>
                                <td> '.$row['date'].' </td>
                                <td> '.$row['note'].' </td>
                                <td> 
                                    <a href="edit.php?edit&id='.$row['id'].'" class="btn btn-primary"> Edit </a> 
                                    <a href="list.php?deleted&id='.$row['id'].'" class="btn btn-danger"> Delete </a> 
                                </td>
                            </tr>
                        ';
                    }
                }else {
                    echo '
                        <tr>
                            <td> کدام اطلاعاتی وجود ندارد   </td>
                        </tr>
                    ';
                }


                ?>


                </tbody>
            </table>
        </div>
    </div>
</div>


</body>
</html>