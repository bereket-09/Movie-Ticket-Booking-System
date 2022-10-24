<?php
include '../includes/functions.php';

$movie = isset($_GET['id']) ? selectSingle_movie($_GET['id']) : false;
if (isset($_POST['btnInsert'])) :
    // echo $movie['id'], $_POST['title'], $_POST['cover'], $_POST['detail'], $_POST['duration'], $_POST['trailer'];    update_movie(
    //     $movie['id'],
    //     $_POST['title'],
    //     $_POST['cover'],
    //     $_POST['detail'],
    //     $_POST['duration'],
    //     $_POST['trailer']

    // );
    $msg = "";
    $id=$movie['id'];


    $image = $_FILES['cover']['name'];
    $title = $_POST['title'];
    $detail = $_POST['detail'];
    $duration = $_POST['duration'];
    $trailer = $_POST['trailer'];

    // image file directory
    $target = "images/" . basename($image);

    $sql = "UPDATE movies SET  title='$title', cover='$image',detail='$detail',duration='$duration', trailer='$trailer' where id='$id'";
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
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        input[type="text"] {
            width: 100%;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>

<body>

    <div>

        <fieldset style="margin-left: 400px; margin-right:400px;margin-top:50px;">
            <legend align="center">New Movie</legend>
            <h1>Add movies</h1>
            <hr>
            <form action="" method="post" enctype="multipart/form-data">

                <table align="left">
                    <tr>
                        <td>
                            <p>Title:</p>
                        </td>
                        <td>

                            <input type="text" name="title" placeholder="Enter Movie title" value="<?php echo $movie['title']; ?>"> <br>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <p>Duration:</p>
                        </td>
                        <td><input type="text" name="duration" placeholder="Enter Duration of the movie" value="<?php echo $movie['duration']; ?>"> <br></td>
                    </tr>

                    <tr>

                        <td>
                            <p>Trailer (youtube linke is prefred):</p>
                        </td>
                        <td><input type="text" name="trailer" placeholder="Enter Movie's trailer link" value="<?php echo $movie['trailer']; ?>"> <br> </td>
                    </tr>

                    <tr>
                        <td>
                            <p>Description about Movie:</p>
                        </td>
                        <td><textarea name="detail" id="detail" cols="30" rows="7"><?php echo $movie['detail']; ?></textarea></td>
                    </tr>

                    <tr>

                        <td>
                            <p>Cover Image:</p>
                            <?php  echo "<img src='images/" . $movie['cover'] . "' width='100px' height='100px'>"; ?>
                            <!-- <img src="images/.<?php echo $movie['cover']; ?>. " alt="cover photo"> -->
                        </td>

                        <td>
                            <input type="file" accept="image/*" title="cover" name="cover" class="cover" id="cover" value="<?php echo $movie['cover']; ?>" required>
                        </td>
                    </tr>






                    <br><br><br>

                    <tr>


                        <td style="text-align: center;" colspan="2" class="button">
                            <hr> <br> <input type="submit" name="btnInsert" value="UPDATE MOVIE INFO">
                            <input type="reset" name="btnCancel" value="X Cancel">
                            <br><br>
                            <hr>
                        </td>
                    </tr>

                </table>

            </form>
        </fieldset>
    </div>

</body>

</html>