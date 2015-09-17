<?php
require 'vendor/autoload.php';
$app = new \Slim\Slim ();

require 'mapper/CourseMapper.php';

// GET route
$app->get ( '/school/:id', function ($id) {
    $result = CourseMapper::selectCourseBySchoolId($id);
    echo json_encode($result);
} );

$app->run ();
