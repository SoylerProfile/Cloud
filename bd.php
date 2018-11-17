<?php
function connectToBd() {
    return $connect = mysqli_connect("localhost","root","","cloud");
}