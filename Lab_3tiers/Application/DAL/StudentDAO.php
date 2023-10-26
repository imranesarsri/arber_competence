<?php


// ===================================================================================== //
// ======================== Class for database interaction ============================= //
// ===================================================================================== //

class StudentDAO
{

    private $db;
    private $databaseConnectionObj;


    // ===================================================================================== //
    // ========== Connect to the database. Create an instance of database object. ========== //
    // ===================================================================================== //

    public function __construct()
    {
        $this->databaseConnectionObj = new DatabaseConnection();
        $this->db = $this->databaseConnectionObj->connect();
    }

    // ===================================================================================== //
    // ================================ Get All students. ================================== //
    // ===================================================================================== //


    public function GetAllStudents()
    {

        $sql = "SELECT * FROM Student";
        $raw_result = $this->db->prepare($sql);
        if (!$raw_result->execute()) {
            $raw_result = null;
            exit();
        }
        $allTraineesData = $raw_result->fetchAll(PDO::FETCH_ASSOC);
        $dataArr = [];
        foreach ($allTraineesData as $data) {
            $traineeInfo = new Student($data['Id'], $data['Name'], $data['Email'], $data['DateOfBirth']);
            array_push($dataArr, $traineeInfo);
        }

        return $dataArr;
    }


    // ===================================================================================== //
    // ================================== Get a student ==================================== //
    // ===================================================================================== //

    public function GetStudent($studentId)
    {
        if ($studentId <= 0) {
            return false;
        }
        $sql = "SELECT * FROM Student WHERE Id = :studentId";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':studentId', $studentId, PDO::PARAM_INT);
        $stmt->execute();

        $aStudent = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($aStudent !== false) {
            $studentObj = new Student($aStudent['Id'], $aStudent['Name'], $aStudent['Email'], $aStudent['DateOfBirth']);
            return $studentObj;
        }

        return false;
    }

    // ===================================================================================== //
    // =============================== Insert New Student ================================== //
    // ===================================================================================== //


    public function AddStudent($student)
    {

        $sql = "INSERT INTO Student ( `Name`, `Email`, `DateOfBirth`)
                VALUES (
                    :name,
                    :email,
                    :dateOfBirth
                )";

        $stmt = $this->db->prepare($sql);

        $name = $student->GetName();
        $email = $student->GetEmail();
        $dateOfBirth = $student->GetDateOfBirth();

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':dateOfBirth', $dateOfBirth);

        $stmt->execute();

        $lastInsertId = $this->db->lastInsertId();

        return $lastInsertId;
    }


    // ===================================================================================== //
    // ============================ Updates existing Student =============================== //
    // ===================================================================================== //

    public function UpdateStudent($student)
    {

        $sql = "UPDATE Student
                SET
                    Name='" . $student->GetName() . "',
                    Email='" . $student->GetEmail() . "',
                    DateOfBirth='" . $student->GetDateOfBirth() . "'
                WHERE Id=" . $student->GetId();

        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->rowCount();
    }

    // ===================================================================================== //
    // ======================= Deletes a student from the database ========================= //
    // ===================================================================================== //

    public function DeleteStudent($studentId)
    {

        $sql = "DELETE FROM Student WHERE Id=" . $studentId;

        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->rowCount();
    }


    // ===================================================================================== //
    // ===================== Checks whether given Id exists or not ========================= //
    // ===================================================================================== //


    public function IsIdExists($id)
    {

        $sql = "SELECT * FROM Student WHERE Id = $id";
        $raw_result = $this->db->prepare($sql);
        $raw_result->execute();
        if (!$raw_result->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
    }


    // ===================================================================================== //
    // ===================== Checks whether given Email exists or not ====================== //
    // ===================================================================================== //


    public function IsEmailExists($email, $id = 0)
    {

        $sql = "SELECT * FROM Student WHERE Email='" . $email . "' AND Id != $id";
        $raw_result = $this->db->prepare($sql);
        $raw_result->execute();
        $isEmail = $raw_result->fetch();
        if ($isEmail > 0) {
            return true;
        } else {
            return false;
        }
    }
}
