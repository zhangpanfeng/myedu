<?php
require 'vendor/autoload.php';
$app = new \Slim\Slim ();

require 'mapper/SchoolMapper.php';
require 'mapper/CourseMapper.php';

$app->get ( '/schools', function () {
    $result = SchoolMapper::selectAllSchools();
    echo json_encode($result);
} );

$app->get ( '/school/:school_id/depts', function ($school_id) {
    $result = SchoolMapper::selectAllDeptsBySchoolId($school_id);
    echo json_encode($result);
} );

$app->get ( '/school/:id', function ($id) {
    $result = CourseMapper::selectCourseBySchoolId($id);
    echo json_encode($result);
} );

$app->get ( '/school/:school_id/year/:year/semester/:sem', function ($school_id, $year, $sem) {
    $result = CourseMapper::selectSemesterBySchoolIdYearSem($school_id, $year, $sem);
    echo json_encode($result);
} );


$app->run ();
