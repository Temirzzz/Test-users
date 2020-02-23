<?php

function connect(){
    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
    mysqli_set_charset($conn, "utf8");
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}


// USER
function inputDataUser ($conn){
    $username = file_get_contents('php://input');
    $username = json_decode($username, true);
    $role_id = $username['sel'];
    $username = $username['firstInp'];


    $sql = "INSERT INTO user (username, role_id) VALUES ('".$username."', '".$role_id."')";

    if ($conn->query($sql) === TRUE) {
        echo 1;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}



// USER ROLE
function inputDataRole ($conn){
    $rolename = file_get_contents('php://input');

    $sql = 'INSERT INTO user_role (rolename) VALUES ("'.$rolename.'")';

    if ($conn->query($sql) === TRUE) {
        echo 1;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


function select($conn){
    $sql = "SELECT * FROM user_role";
    $result = mysqli_query($conn, $sql);
    
    $a = array();
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $a[] = $row;
        }
    } 
    return $a;
}


function selectUserRolname($conn){ 

$sql = "SELECT * FROM user LEFT JOIN user_role ON user.role_id = user_role.id";

    $result = mysqli_query($conn, $sql);

    $a = array();
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $a[] = $row;
        }
    } 
    return $a;
}



function close ($conn) {
    mysqli_close($conn);
}

?>