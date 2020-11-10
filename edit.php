<?php
require_once("db.php");

if(isset($_GET['edit']) and isset($_GET['id']) ){
    $id = $_GET['id'];
    $row = $db->query("SELECT * FROM admin WHERE id = '$id' ")->fetch();
}

if(isset($_POST['id']) and isset($_POST['edit']) ){

    $id = $_POST['id'];

    $data = [
        'name'  => $_POST['fullname'],
        'fname' => $_POST['fname'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'date'  => $_POST['date'],
        'note'  => $_POST['note'],
    ];

    $edit = edit('admin' , $data , $_POST['id']);

    header("location: edit.php?edit&id=$id");
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

            <form action="edit.php" method="post" enctype="multipart/form-data" class="h-100" dir="rtl">

                <input type="hidden" value="i" name="edit" >
                <input type="hidden" value="<?php if(isset($row['id'])) echo $row['id']?>" name="id" >

                <div class="form-group row">
                    <label for="fullname" class="col-md-2 col-form-label"> نام  کامل  <span style="color:red"> * </span> </label>
                    <div class="col-md-9">
                        <input type="text" name="fullname" value="<?php if(isset($row['name'])) echo $row['name']?>" id="fullname" required="required" class="form-control"  placeholder="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fname" class="col-md-2 col-form-label"> نام  پدر  <span style="color:red"> * </span> </label>
                    <div class="col-md-9">
                        <input type="text" name="fname" value="<?php if(isset($row['fname'])) echo $row['fname']?>" id="fname" required="required" class="form-control"  placeholder="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label"> ایمیل    <span style="color:red"> * </span> </label>
                    <div class="col-md-9">
                        <input type="email" id="email" value="<?php if(isset($row['email'])) echo $row['email']?>" name="email" required="required" class="form-control"  placeholder="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-md-2 col-form-label"> شماره تماس    <span style="color:red"> * </span> </label>
                    <div class="col-md-9">
                        <input type="text" name="phone" value="<?php if(isset($row['phone'])) echo $row['phone']?>" id="phone" required="required" class="form-control"  placeholder="">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="date" class="col-md-2 col-form-label"> تاریخ  </label>
                    <div class="col-md-9">
                        <input type="date" name="date" id="date" class="form-control input-datepicker" value="<?php if(isset($row['date'])) echo $row['date']?>">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="note" class="col-md-2 col-form-label"> توضیعات  </label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="note" id="note" rows="5"><?php if(isset($row['note'])) echo $row['note']?></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-9 offset-md-2">
                        <button type="submit" class="btn btn-primary "><i class="fa fa-edit"></i> ویرایش  </button>
                        <a href="list.php" class="btn btn-danger "> <i class="fa fa-edit"></i> برگشت  </a>
                    </div>
                </div>

            </form>


        </div>
    </div>

</div>


</body>
</html>