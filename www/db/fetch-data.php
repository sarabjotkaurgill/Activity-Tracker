<?php
require_once('conn.php');
function fetch_data()
{

    global $conn;
     $userid = $_SESSION['userid'];
    $query_select = "SELECT * FROM `activities` where userId = $userid ";
    $res = $conn->query($query_select);
    $result = array();
    if ($res && $res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            $result[] = $row;
        }
        return $result;
    }
}

function fetch_category_data()
{

    global $conn;
    // echo "sessioon---".$_SESSION['userid'];
     $userid = $_SESSION['userid'];
    $query_select = "SELECT * FROM `categories` where userId = $userid ";
    $res = $conn->query($query_select);
    $result = array();
    if ($res && $res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            $result[] = $row;
        }
        return $result;
    }
}

function fetch_category_name($catid)
{
    global $conn;
    $categoryid = $catid;
    $query_select = "SELECT * FROM `categories` where id = $categoryid ";
    $res = $conn->query($query_select);
    $result = array();
    if ($res && $res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            $result[] = $row;
        }
        return $result;
    }
}

function fetch_all_categories()
{
    global $conn;
     $userid = $_SESSION['userid'];
    $query_select = "SELECT * FROM `categories` where userId = $userid ";
    $res = $conn->query($query_select);
    $result = array();
    if ($res && $res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            $result[] = $row;
        }
        return $result;
    }
}

// show category with varoius activities
function fetch_category($catid)
{
    global $conn;
     $userid = $_SESSION['userid'];
    $query_select = "SELECT * FROM `activities` where categoryId = $catid AND userId = $userid ";
    $res = $conn->query($query_select);
    $result = array();
    if ($res && $res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            $result[] = $row;
        }
        return $result;
    } else {
        return $result;
    }
}


