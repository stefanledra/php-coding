<?php
include 'EmployeeRoles.php';

class Employee
{
    private static $instance = null;
    private int $jmbg;
    private string $name;
    private string $surname;
    private string $dob;
    private EmployeeRoles $role;
    private array $template = array('name', 'surname', 'jmbg', 'dob', 'role');
    private array $randomEmployees = array(
        array(
            'name'    => 'Vojin',
            'surname' => 'Djukanovic',
            'dob'     => '12.08.1999.',
            'role'    => 'leadDev',
            'jmbg'    => 12333,
        ),
        array(
            'name'    => 'Jovan',
            'surname' => 'Jovanovic',
            'dob'     => '15.04.1997.',
            'role'    => 'seniorDev',
            'jmbg'    => 23456,
        ),
        array(
            'name'    => 'Dejan',
            'surname' => 'Dejanovic',
            'dob'     => '21.07.1986.',
            'role'    => 'juniorDev',
            'jmbg'    => 34567,
        ),
        array('name' => 'Ranko', 'surname' => 'Rankovic', 'dob' => '19.11.2001.', 'role' => 'intern', 'jmbg' => 45678),
        array('name' => 'Aco', 'surname' => 'Stankovic', 'dob' => '01.02.1999.', 'role' => 'hr', 'jmbg' => 56789),
        array('name' => 'Sandra', 'surname' => 'Sandic', 'dob' => '29.08.1979.', 'role' => 'intern', 'jmbg' => 67890),
        array('name' => 'Dijana', 'surname' => 'Senic', 'dob' => '18.03.1989.', 'role' => 'intern', 'jmbg' => 99876),
        array(
            'name'    => 'Marija',
            'surname' => 'Joksimovic',
            'dob'     => '04.10.1991.',
            'role'    => 'juniorDev',
            'jmbg'    => 65432,
        ),
        array('name' => 'Milica', 'surname' => 'Milic', 'dob' => '24.09.1995.', 'role' => 'seniorDev', 'jmbg' => 87654),
        array('name' => 'Ivana', 'surname' => 'Ivanovic', 'dob' => '19.06.1999.', 'role' => 'intern', 'jmbg' => 36342),
    );

    private function __construct($data = null)
    {
        if (is_null($data)) {
            $data = $this->randomEmployees[rand(0, (sizeof($this->randomEmployees) - 1))];
        }
        $this->jmbg    = $data['jmbg'] ?? 'Nije uneseno';
        $this->name    = $data['name'] ?? '(Ime nije uneseno)';
        $this->surname = $data['surname'] ?? '(Prezime nije uneseno)';
        $this->dob     = $data['dob'] ?? 'Nije uneseno';
        $this->role    = $data['role'] ?? 'Nije uneseno';
    }

    public static function getInstance($data = null)
    {

        if (self::$instance === null) {
            self::$instance = new Employee($data);
        }

        return self::$instance;
    }

    public function printNicely()
    {
        echo 'Ime i prezime radnika: '.$this->name.' '.$this->surname.' <br />';
        echo 'Maticni broj: '.$this->jmbg.' <br />';
        echo 'Datum rodjenja: '.$this->dob.' <br />';
        echo 'Pozicija u firmi: '.$this->role->value.' <br />';
    }
}

$acoPrint    = array(
    'name'    => 'Aco',
    'surname' => 'Scepanovic',
    'dob'     => '11.05.1992.',
    'role'    => EmployeeRoles::leadDev,
    'jmbg'    => 54321,
);
$stefanPrint = array(
    'name'    => 'Stefan',
    'surname' => 'Stojanovic',
    'dob'     => '12.08.1999.',
    'role'    => EmployeeRoles::intern,
    'jmbg'    => 12333,
);


$aco    = Employee::getInstance($acoPrint);
$stefan = Employee::getInstance($stefanPrint);
$aco->printNicely();
$stefan->printNicely();





