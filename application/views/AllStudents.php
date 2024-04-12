<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
            text-align: center;
        }

        h1 {
            color: #3498db;
            margin-bottom: 20px;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 400px;
            text-align: left;
            margin: 10px;
        }

        .card h2 {
            color: black;
        }

        .card p {
            margin: 10px 0;
        }

        .card a {
            text-decoration: none;
            color: #3498db;
            cursor: pointer;
        }

        .card a:hover {
            text-decoration: underline;
        }

        /* @media only screen and (min-width: 601px) and (max-width: 1024px) {
            .card {
                width: 45%;
            }
        } */

        /* @media only screen and (min-width: 1025px) {
            .card {
                width: 30%;
            }
        } */
    </style>
</head>

<body>

<?php
// Load the resolutions helper
$ci = get_instance();
$ci->load->helper('Resolution_helper');

// Get the device resolution
$resolution = getResolution();

// Add additional code based on the resolution if needed
// if ($resolution == 'mobile') {
    // Code for mobile devices
    echo "Resolution: " . $resolution;

// } else {
//     echo "Desktop Resolution: " . $resolution;

    // Code for desktop devices

?>


    <h1>Student Details</h1>

    <div class="container">
        <?php foreach ($details as $list) { ?>
            <div class="card">
                <h2>Name: <?php echo $list->name; ?></h2>
                <p>Email: <?php echo $list->email; ?></p>
                <p>Grade: <?php echo $list->grade; ?></p>
                <a href="<?php echo base_url() ?>StudentController/getstudentById/<?= $list->stno ?>">View </a> |
                <a href="<?php echo base_url() ?>StudentController/delete/<?= $list->stno ?>"> Delete </a>
            </div>
        <?php } ?>
    </div>

</body>

</html>