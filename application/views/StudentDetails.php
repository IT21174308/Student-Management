<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .detail {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #3498db;
            margin-bottom: 20px;
        }

        h4 {
            margin-bottom: 15px;
            color: #333;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #2574a9;
        }

        @media only screen and (max-width: 600px) {
            h1 {
                font-size: 28px;
            }

            h4 {
                font-size: 16px;
            }

            a {
                margin-top: 10px;
                padding: 8px 16px;
            }
        }

        @media only screen and (min-width: 601px) and (max-width: 1024px) {
            h1 {
                font-size: 36px;
            }

            h4 {
                font-size: 18px;
            }

            a {
                margin-top: 15px;
                padding: 10px 20px;
            }
        }

        @media only screen and (min-width: 1025px) {
            h1 {
                font-size: 42px;
            }

            h4 {
                font-size: 22px;
            }

            a {
                margin-top: 20px;
                padding: 12px 24px;
            }
        }
    </style>
</head>

<body>
    <div class="detail">
        <?php foreach ($student as $list) { ?>
            <h1><?php echo $list->name; ?>'s Details</h1>
            <h4>Name: <?php echo $list->name; ?></h4>
            <h4>Address: <?php echo $list->address; ?></h4>
            <h4>Phone: <?php echo $list->phone; ?></h4>
            <h4>Email: <?php echo $list->email; ?></h4>
            <h4>Grade: <?php echo $list->grade; ?></h4>
            <a href="<?php echo base_url() ?>StudentController/updatestudent/<?= $list->stno ?>">Update </a>
        <?php } ?>
    </div>
</body>

</html>