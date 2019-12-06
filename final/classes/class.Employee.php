<?php
    class Employee {
        public $emp_id;
        public $emp_firstname;
        public $database;
        
        function __construct($emp_id, $database) {
            $sql = file_get_contents('sql/getEmployee.sql');
            $params = array(
                'emp_id' => $emp_id
            );
            $statement = $database->prepare($sql);
            $statement->execute($params);
            $employee = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            $this->emp_id = $employee[0]['emp_id'];
            $this->emp_firstname = $employee[0]['emp_firstname'];
        }
        
        function get_name() {
            return $this->emp_firstname;
        }
        
    }
?>