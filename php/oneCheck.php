<?php
session_start();

$result = $_POST["result"];
$trueResult = $_SESSION["trueResult"];

if ($result == $trueResult) {
     $_SESSION["score"]++;
}

if (!isset($_SESSION["question"])) {
  $_SESSION["question"] = 1;
} else {
  $_SESSION["question"]++;
}

if ($_SESSION["question"] == 100) {
    header("refresh:1; url=OneResult.php");
    exit();
} else {
    header("refresh:1; url=levelOne.php");
    exit();
}

?>