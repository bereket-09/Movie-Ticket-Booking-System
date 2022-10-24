<?php
include '../includes/functions.php';
include '../theme/header.php.';
if ($_SESSION['role'] == 0) {
    header("Location: /movie/movie.php");
}

$cinema = isset($_GET['id']) ? selectSingle_cinema($_GET['id']) : false;
if (isset($_POST['btnInsert'])) :
    update_cinema(
        $cinema['id'],
        $_POST['name'],
        $_POST['city'],
        $_POST['capacity']
    );
endif;

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Add Movies</title>

    <style>
        body {
            margin-top: 0;
            /* margin: 0% */
        }

        li {
            margin: 15px;
            margin-top: 0%;
        }

        input[type="text"] {
            width: 100%;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
        }

        .container {
            margin-top: 0px;
        }

        form {
            width: 100%;
        }

        h1 {
            text-align: center;
        }

        .top {
            width: 100%;
            font-size: x-large;
            margin: 0px;
            /* margin-right: 0px; */
            font-family: 'Courier New', Courier, monospace;
            background-color: gray;
        }

        hr {
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="container">
        <center>
            <fieldset style="margin-left: 400px; margin-right:400px;margin-top:50px;" class="field">
                <legend align="center">New Cinema</legend>
                <h1>Add Cinemas</h1>
                <hr>
                <form action="#" method="post">

                    <table align="left">
                        <tr>
                            <td>
                                <p>Cinema Name:</p>
                            </td>
                            <td>

                                <input type="text" name="name" placeholder="Enter Cinema name" value="<?php echo $cinema['name'] ?>" require> <br>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <p>City:</p>
                            </td>
                            <td><input type="text" name="city" placeholder="Enter address of the Cinema" value="<?php echo $cinema['city'] ?>" require> <br></td>
                        </tr>

                        <tr>

                            <td>
                                <p>Total Capacity:</p>
                            </td>
                            <td><input type="number" name="capacity" min="50" placeholder="Enter Cinema's Total Capacity" value="<?php echo $cinema['capacity'] ?>" require> <br> </td>
                        </tr>

                        <br><br><br>

                        <tr>


                            <td style="text-align: center;" colspan="2" class="button">
                                <hr> <br> <input type="submit" name="btnInsert" value="+ UPDATE  Cinema">
                                <input type="reset" name="btnCancel" value="X Cancel">
                                <br><br>
                                <hr>
                            </td>
                        </tr>

                    </table>

                </form>
            </fieldset>
        </center>
    </div>

</body>

</html>