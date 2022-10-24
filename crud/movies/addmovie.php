<?php


include '../includes/functions.php';
include '../theme/header.php.';
if ($_SESSION['role'] == 0) {
    header("Location: /movie/movie.php");
}
if (isset($_POST['btnInsert'])) :
    $msg = "";


    $image = $_FILES['cover']['name'];
    $title = $_POST['title'];
    $detail = $_POST['detail'];
    $duration = $_POST['duration'];
    $trailer = $_POST['trailer'];

    // image file directory
    $target = "images/" . basename($image);

    $sql = "INSERT INTO movies (title, cover,detail,duration, trailer) VALUES ('$title','$image', '$detail', '$duration', '$trailer')";
    // execute query
    mysqli_query($mysqli, $sql);

    if (move_uploaded_file($_FILES['cover']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";

        header('Location: ../movies/movies_list.php');
    } else {
        $msg = "Failed to upload image";
    }

endif;
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Add Movies</title>

    <style>
        body {
            margin-top: 0;
            margin: 0%
        }
li{
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
            margin-top:0px;
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
                <legend align="center">New Movie</legend>
                <h1>Add movies</h1>
                <hr>
                <form action="#" method="post" enctype="multipart/form-data">

                    <table align="left">
                        <tr>
                            <td>
                                <p>Title:</p>
                            </td>
                            <td>

                                <input type="text" name="title" placeholder="Enter Movie title" require> <br>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <p>Duration:</p>
                            </td>
                            <td><input type="text" name="duration" placeholder="Enter Duration of the movie" require> <br></td>
                        </tr>

                        <tr>

                            <td>
                                <p>Trailer (youtube linke is prefred):</p>
                            </td>
                            <td><input type="text" name="trailer" placeholder="Enter Movie's trailer link" require> <br> </td>
                        </tr>

                        <tr>
                            <td>
                                <p>Description about Movie:</p>
                            </td>
                            <td><textarea name="detail" id="detail" cols="30" rows="7"></textarea></td>
                        </tr>

                        <tr>

                            <td>
                                <p>Cover Image:</p>
                            </td>

                            <td>
                                <input type="file" accept="image/*" title="Cover" name="cover" class="cover" id="cover">
                            </td>
                        </tr>






                        <br><br><br>

                        <tr>


                            <td style="text-align: center;" colspan="2" class="button">
                                <hr> <br> <input type="submit" name="btnInsert" value="+ ADD MOVIE">
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