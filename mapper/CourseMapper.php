<?php
require 'utils/DB.php';
class CourseMapper {
    
    /**
     *
     * @param
     *            $school_id
     * @return
     *
     */
    public static function selectCourseBySchoolId($school_id) {
        $sql = "select * from school_course where school_id=:id";
        try {
            $conn = DB::getConnect ();
            $stmt = $conn->prepare ( $sql );
            $stmt->bindParam ( "id", $school_id );
            $stmt->execute ();
            $row = $stmt->fetchAll ( PDO::FETCH_ASSOC );
            $conn = null;
            return $row;
        } catch ( PDOException $e ) {
            return array (
                    "status" => $e->getMessage () 
            );
        }
    }
}