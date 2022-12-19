<!DOCTYPE html>
<html lang="en">
<?php include 'dbconnection.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .formCBox {
            width: 100%;
            height: 700px;

            display: flex;
            align-items: center;
            justify-content: center;


        }

        .formSubBox form input,
        .formSubBox form select {
            width: 100%;
            margin-top: 10px;
            font-size: 20px;
            height: 40px;

        }

        .formSubBox {
            background-color: #e1e1e1;
            padding: 40px;
            width: 35%;
            box-shadow: 10px 10px 5px #d4dfe2e8;
        }
    </style>
</head>

<body>
    <?php
    $qid = $_GET['qid'];

    

    if (isset($_POST['submit'])) {
        $sub = $_POST['title'];
        $qustion = $_POST['content'];
        $option_a = $_POST['option_a'];
        $option_b = $_POST['option_b'];
        $option_c = $_POST['option_c'];
        $option_d = $_POST['option_d'];
        $answer = $_POST['answer'];
        $mark = $_POST['mark'];


        $selectid = "SELECT * FROM category WHERE Title='$sub' ";
        $query = mysqli_query($con, $selectid);
        $count = 0;
        while ($res = mysqli_fetch_array($query)) {
            $cid = $res['C_id'];
        }

        $upquery = "UPDATE `question` SET`C_id`='$cid',`Content`='$qustion',`Option_A`='$option_a',`Option_B`='$option_b',`Option_C`='$option_c',`Option_D`='$option_d',`Answer`='$answer',`Marks`='$mark' WHERE Question_id='$qid' ";
        $resval = mysqli_query($con, $upquery);
        if ($resval) { ?>
            <script>
                location.replace("admin.php");
            </script>
    <?php
        }
    }
    ?>



    <?php $count = 0;
    $selectCategory = "SELECT Title FROM category ";
    $query = mysqli_query($con, $selectCategory);
    ?>
    <div class="formCBox" id="addQue">
        <div class="formSubBox">
        <div>Q-<?php echo $qid; ?></div>
            <h1>Add Question</h1>
            <form method="post">
                <select name="title">

                    <?php
                    while ($res = mysqli_fetch_array($query)) {
                        $count++;
                    ?>
                        <option>
                            <?php echo $res['Title'];  ?>
                        </option>
                    <?php }  ?>
                </select>
                <!-- `Question_id`, `C_id`, `Content`, `Option_A`, `Option_B`, `Option_C`, `Option_D`, `Answer`, `Marks`-->
                <?php
                $selectque = "SELECT * FROM question where Question_id='$qid' ";
                $seleque = mysqli_query($con, $selectque);
                while ($editQ = mysqli_fetch_array($seleque)) {

                ?>

                    <input type="text" name="content" value="<?php echo $editQ['Content']; ?>" required>
                    <input type=" text" name="option_a" value="<?php echo $editQ['Option_A']; ?>" placeholder="Option A" required>
                    <input type="text" name="option_b" value="<?php echo $editQ['Option_B']; ?>" placeholder="Option B" required>
                    <input type="text" name="option_c" value="<?php echo $editQ['Option_C']; ?>" placeholder="Option C" required>
                    <input type="text" name="option_d" value="<?php echo $editQ['Option_D']; ?>" placeholder="Option D" required>
                    <input type="text" name="answer" value="<?php echo $editQ['Answer']; ?>" placeholder="Answer" required>
                    <input type="text" name="mark" value="<?php echo $editQ['Marks']; ?>" placeholder="Mark" required>
                    <input type="submit" Style="background:#0c53d5; border-radius:10px; margin-top: 20px" value="UPDATE" name="submit">
                <?php }  ?>
            </form>
        </div>
    </div>
</body>

</html>