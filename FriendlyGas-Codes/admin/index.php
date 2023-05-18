<?php
include $_SERVER['DOCUMENT_ROOT'] . "/includes/autoloader.inc.php";

$db = new Database();
$url = new Url();
$BASE_URL = $url->BASE_URL;

if (URL::post("update") != ""){
    $update = $db->Update("faq", [
        "question_1" => $_POST["question_1"],
        "answer_1" => $_POST["answer_1"],
        "question_2" => $_POST["question_2"],
        "answer_2" => $_POST["answer_2"],
        "question_3" => $_POST["question_3"],
        "answer_3" => $_POST["answer_3"],
        "question_4" => $_POST["question_4"],
        "answer_4" => $_POST["answer_4"],
        "question_5" => $_POST["question_5"],
        "answer_5" => $_POST["answer_5"],
        "question_6" => $_POST["question_6"],
        "answer_6" => $_POST["answer_6"],
    ],[
            "id" => "1"
    ]);
    if ($update){
        header("Location: " . basename($_SERVER['PHP_SELF']));
    }else{
        echo "error";
    }
}



$adm = new Admin();
$adm->CheckIsLogged();

$res = $db->Get("faq", null, false, null, null, null, null);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

    <title>Document</title>
    <style>
        .sss{
            margin-top: 20px;
        }
        input{
            border: 2px solid rgba(0, 0, 0, .1);
            margin: 10px;
            padding: 10px;
            border-radius: 10px;
            width: 100%;
        }
        h1{
            margin: 5px;
            padding: 10px;
        }
        form{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        button{
            width: 50%;
            margin: 10px;
        }
        hr{
            width: 100%;
        }
        .col-lg-2{
            margin: 10px;
        }

    </style>
</head>
<body>
<form action="index.php" method="post">

    <div class="container sss">
        <h1>Admin Page -> F.A.Q Update</h1>
        <div class="row">


            <div class="col-lg-6">
                <h1>Question</h1>
                <input type="text" placeholder="Soru 1" name="question_1" value="<?php echo $res["question_1"]; ?>">
            </div>

            <div class="col-lg-6">
                <h1>Answer</h1>
                <input type="text" placeholder="Cevab 1" name="answer_1" value="<?php echo $res["answer_1"]; ?>">
            </div>

            <div class="col-lg-6">
                <input type="text" placeholder="navbar_3" name="question_2" value="<?php echo $res["question_2"]; ?>">
            </div>

            <div class="col-lg-6">
                <input type="text" placeholder="navbar_4" name="answer_2" value="<?php echo $res["answer_2"]; ?>">
            </div>

            <div class="col-lg-6">
                <input type="text" placeholder="navbar_5" name="question_3" value="<?php echo $res["question_3"]; ?>">
            </div>
            <div class="col-lg-6">
                <input type="text" placeholder="navbar_4" name="answer_3" value="<?php echo $res["answer_3"]; ?>">
            </div>

            <div class="col-lg-6">
                <input type="text" placeholder="Soru 1" name="question_4" value="<?php echo $res["question_4"]; ?>">
            </div>
            <div class="col-lg-6">
                <input type="text" placeholder="Cevab 1" name="answer_4" value="<?php echo $res["answer_4"]; ?>">
            </div>

            <div class="col-lg-6">
                <input type="text" placeholder="navbar_3" name="question_5" value="<?php echo $res["question_5"]; ?>">
            </div>

            <div class="col-lg-6">
                <input type="text" placeholder="navbar_4" name="answer_5" value="<?php echo $res["answer_5"]; ?>">
            </div>

            <div class="col-lg-6">
                <input type="text" placeholder="navbar_5" name="question_6" value="<?php echo $res["question_6"]; ?>">
            </div>
            <div class="col-lg-6">
                <input type="text" placeholder="navbar_4" name="answer_6" value="<?php echo $res["answer_6"]; ?>">
            </div>
        </div>
    </div>


    <button type="submit" class="btn btn-success" value="update" name="update">Update</button>
    <a class="nav-link" href="../index.html">Return Home Page</a>
</form>

</body>
</html>
