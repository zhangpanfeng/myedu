<?php
require_once 'utils/DB.php';
class SchoolMapper {
    
    /**
     *
     * @return all schools
     *
     */
    public static function selectAllSchools() {
        $sql = "	select * " .
        		"	from school " .
        		"	order by name ASC";
        try {
            $conn = DB::getConnect ();
            $stmt = $conn->prepare ( $sql );
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
    
    public static function selectAllDeptsBySchoolId($school_id) {
       	$sql = "	select dept_name " .
        		"	from dept " .
        		"	where school_id=:sid ";
        try {
            $conn = DB::getConnect ();
            $stmt = $conn->prepare ( $sql );
            $stmt->bindParam ( "sid", $school_id);
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
