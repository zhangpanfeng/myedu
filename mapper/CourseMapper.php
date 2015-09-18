<?php
require_once 'utils/DB.php';
class CourseMapper {
    
    /**
     *
     * @param
     *            $school_id
     * @return
     *
     */
    public static function selectCourseBySchoolId($school_id) {
        $sql = "	select * " .
        		"	from school_course sc, semester s " .
        		"	where sc.semester_id=s.semester_id " .
        		"	and s.school_id=:id ";
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
    
    public static function selectSemesterBySchoolIdYearSem($school_id, $year, $sem) {
        $sql = "	select * " .
        		"	from school_course sc, semester s " .
        		"	where sc.semester_id=s.semester_id " .
        		"	and s.school_id=:sid " .
        		"	and s.year=:year" .
        		"	and s.semester =:sem";
        try {
        	echo $year;
            $conn = DB::getConnect ();
            $stmt = $conn->prepare ( $sql );
            $stmt->bindParam ( "sid", $school_id);
            $stmt->bindParam ( "year", $year );
            $stmt->bindParam ( "sem", $sem );
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