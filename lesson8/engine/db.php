<?php
function getDb()
{
    static $db = null;
    if (is_null($db)) {
        $db = mysqli_connect(HOST, USER, PASS, DB) or die("Could not connect. " . mysqli_connect_error());
    }
    return $db;
}

function getAssocResult($sql)
{
    $result = mysqli_query(getDb(), $sql) or die(mysqli_connect_error());
    $array_result = [];
    while ($row = $result->fetch_assoc())
        $array_result[] = $row;
    return $array_result;
}

function getDataFromDb($sql)
{
    $result = mysqli_query(getDb(), $sql) or die(mysqli_connect_error());
    return $result->fetch_assoc();
}

function executeQuery($sql)
{
    mysqli_query(getDb(), $sql) or die(mysqli_error(getDb()));
}
