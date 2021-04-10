<?php

$dbname = "blog";
$password = "";
$dbhost = "localhost";
$dbuser = "root";

// Create connection
$conn = new mysqli($dbhost, $dbuser, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

function createBlog($blogDetails) {
    GLOBAL $conn;
    $query = 'INSERT INTO blogs(blog_title, blog_description, tags, images) VALUES ("'.$blogDetails['blog_title'].'","'.$blogDetails['blog_description'].'","'.$blogDetails['tags'].'","'.$blogDetails['bimage'].'")';
    if ($conn->query($query) === TRUE) {
        return true;
    } else {
        return false;
        echo "Error: " . $query . "<br>" . $conn->error;
    }
    //$conn->close();
}

function getBlog($blog = null) {
    GLOBAL $conn;
    $query = 'SELECT * from blogs';
    if($blog != null) {
        $query .= ' WHERE bid = '.$blog;
    }
   
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        //output data of each row
        while($row = $result->fetch_assoc()) {
            $res[$row['bid']]['blog_title'] = $row['blog_title'];
            $res[$row['bid']]['blog_description'] = $row['blog_description'];
            $res[$row['bid']]['tags'] = $row['tags'];
            $res[$row['bid']]['images'] = $row['images'];
        }

        return $res;
    } else {
        return false;
    }
    //$conn->close();
}


function updateBlog($updateDetails) {
    GLOBAL $conn;
    $sql = "UPDATE blogs SET blog_title = ".$updateDetails['blog_title'].",blog_description = ".$updateDetails['blog_description'].",image = ".$updateDetails['image']." , tags = ".$updateDetails['tags'].",  WHERE bid = ".$updateDetails['bid'];

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
   
}

function deleteBlog($deleteDetails) {
    GLOBAL $conn;
    // sql to delete a record
    $sql = "DELETE FROM blogs WHERE bid = ".$deleteDetails['bid'];

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
   
}