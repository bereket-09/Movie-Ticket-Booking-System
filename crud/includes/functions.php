<?php
require_once 'db.php';

/* format arrays */
function formatcode($arr)
{
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

// Select statement

function selectAll()
{
    global $mysqli;
    $data = [];
    $stmt = $mysqli->prepare('select * from users');
    $stmt->execute();
    $restult = $stmt->get_result();

    if ($restult->num_rows === 0) {
        echo 'NO ROWS!';
    }
    while ($row = $restult->fetch_assoc()) {
        $data[] = $row;
    }
    $stmt->close();
    return $data;
}

// SELLECT ALL FOR CINEMAS


function selectAll_cinema()
{
    global $mysqli;
    $data = [];
    $stmt = $mysqli->prepare('select * from cinema');
    $stmt->execute();
    $restult = $stmt->get_result();

    if ($restult->num_rows === 0) {
        echo 'NO ROWS!';
    }
    while ($row = $restult->fetch_assoc()) {
        $data[] = $row;
    }
    $stmt->close();
    return $data;
}

// Select single statement

function selectSingle($id = null)
{
    global $mysqli;
    $stmt = $mysqli->prepare('select * from users where id= ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $restult = $stmt->get_result();

    if ($restult->num_rows === 0) {
        echo 'NO ROWS!';
    }
    $row = $restult->fetch_assoc();

    $stmt->close();
    return $row;
}

// Select single statement MOVIE

function selectSingle_movie($id = null)
{
    global $mysqli;
    $stmt = $mysqli->prepare('select * from movies where id= ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $restult = $stmt->get_result();

    if ($restult->num_rows === 0) {
        echo 'NO ROWS!';
    }
    $row = $restult->fetch_assoc();

    $stmt->close();
    return $row;
}


// SELECT SINGLE CINEMA
function selectSingle_cinema($id = null)
{
    global $mysqli;
    $stmt = $mysqli->prepare('select * from cinema where id= ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $restult = $stmt->get_result();

    if ($restult->num_rows === 0) {
        echo 'NO ROWS!';
    }
    $row = $restult->fetch_assoc();

    $stmt->close();
    return $row;
}


// INSERT NEW MOVIE

function addmovie($title= null, $cover= null, $detail =null, $duration =null, $trailer = null)
{
    global $mysqli;
    $stmt = $mysqli->prepare(
        'INSERT INTO movies (title, cover,detail,duration, trailer) VALUES (?, ?, ?, ?, ?)'
    );
    $stmt->bind_param('sssss', $title, $cover, $detail,$duration,$trailer);
    $stmt->execute();
    $stmt->close();
    header('Location: ../movies/movies_list.php');
    
}


// INSERT NEW MOVIE

function addbooking($uid = null, $cid = null, $mid =null, $Qty =null, $dates =null, $time = null)
{
    global $mysqli;
    $stmt = $mysqli->prepare(
        'INSERT INTO booking (uid,cid,mid,Qty,dates,time,status) VALUES (?, ?, ?, ?, ?, ?, ?)'
    );
    $stmt->bind_param('sssissi', $uid, $cid, $mid,$Qty,$dates,$time,$status);
    $stmt->execute();
    $stmt->close();

   
}


// UPDATE STATEMENT
function update_movie($id , $title = null, $cover = null, $detail=null, $duration =null, $trailer = null)
{
    global $mysqli;
    $stmt = $mysqli->prepare(
        'update movies SET title=?, cover=?, detail=?, duration=?, trailer=? where id=?'
    );
    $stmt->bind_param('sssssi', $title, $cover,$detail,$duration, $trailer, $id);
    $stmt->execute();
    if ($stmt->affected_rows === 0) {
        echo 'no rows updated';
    }
    else{
        echo 'done';
        $stmt->close();

        header('Location: /movie/crud/movies/movies_list.php');
     
    }

    

}


// UPDATE STATEMENT

function update_cinema($id, $name = null, $city = null, $capacity = null)
{
    global $mysqli;
    $cinema = selectSingle_cinema($id);
 
    $current =$cinema['current'];
    $free=$capacity-$current;
   
     $stmt = $mysqli->prepare(
        'update cinema SET name=?, city=?, capacity=?, current=?, free=? where id=?'
    );
    $stmt->bind_param('sssssi', $name, $city, $capacity, $current, $free, $id);
    $stmt->execute();
    if ($stmt->affected_rows === 0) {
        echo 'no rows updated';
    } else {
        echo 'done';
    }
        $stmt->close();

        header('Location: ./cinema_list.php');
   

}



// UPDATE STATEMENT MOVIES
function update($username = null, $email = null, $pass = null, $id)
{
    global $mysqli;
    $stmt = $mysqli->prepare(
        'update users SET username=?, email=?, passwords=? where id=?'
    );
    $stmt->bind_param('sssi', $username, $email, $pass, $id);
    $stmt->execute();
    if ($stmt->affected_rows === 0) {
        echo 'no rows updated';
    }

    $stmt->close();

    header('Location: ./');
}



// UPDATE STATEMENT MOVIES
function update_with_role($username = null, $email = null, $pass = null, $id,$role=null)
{
    global $mysqli;
    $stmt = $mysqli->prepare(
        'update users SET username=?, email=?, passwords=? ,role=? where id=?'
    );
    $stmt->bind_param('sssii', $username, $email, $pass,$role, $id);
    $stmt->execute();
    if ($stmt->affected_rows === 0) {
        echo 'no rows updated';
    }

    $stmt->close();

    header('Location: ./');
}




// Delete STATEMENT
function delete($id)
{
    global $mysqli;
    $stmt = $mysqli->prepare('delete from users where id=?');
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $stmt->close();

    header('Location: ./');
}

function delete_movie($id)
{
    global $mysqli;
    $stmt = $mysqli->prepare('delete from movies where id=?');
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $stmt->close();

    header('Location: ./movies_list.php');
}


// DELETE CINEMA

function delete_cinema($id)
{
    global $mysqli;
    $stmt = $mysqli->prepare('delete from cinema where id=?');
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $stmt->close();

    header('Location: ./cinema_list.php');
}


// Delete BOOKING
function delete_booking($id)
{
    global $mysqli;
    $stmt = $mysqli->prepare('delete from booking where id=?');
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $stmt->close();

    header('Location: /movie/crud/book/booking_list.php');
}

function update_booking($id=null,$stat){
    include 'db.php';

    if($stat==1){
      $query = "update booking SET status=0, where id=$id";
                        $update = mysqli_query($mysqli, $query);
    }

    if($stat == 0)
    {
        $query = "update booking SET status=1, where id=$id";
        $update = mysqli_query($mysqli, $query);
    }
}

