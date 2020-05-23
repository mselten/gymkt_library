<?php
require "controller/page_viewer.php";


$page_viewer = new Page_viewer();


//This script will be launched after http request from client

$page_viewer->view_page("main_page");
