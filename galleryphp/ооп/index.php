<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
//     // class Employee{
//     //     private $first_name;
//     //     private $last_name;
//     //     private $age;

//     //     public function __construct( $first_name, $last_name, $age ){
//     //         $this->first_name = $first_name;
//     //         $this->last_name = $last_name;
//     //         $this->age=$age;
//     //     }
//     //     public function getFirstName(){
//     //         return $this->first_name;
//     //     }
//     //     public function getLastName(){
//     //         return $this->last_name;
//     //     }
//     //     public function getAge(){
//     //         return $this->age;
//     //     }
//     // }
//     // $objEmployes = new Employee('Bob', 'Smith', 30);

//     // echo  $objEmployes->getFirstName() . " " . $objEmployes->getLastName().' ';
//     // echo $objEmployes->getAge();

//     // class Person{
//     //     public $name;
//     //     public function getName(){
//     //         return $this->name;
//     //     }
//     // }
//     // $person = new Person();
//     // $person->name='Bob Smith';
//     // echo $person->getName().' ';
    

//     // class Person{
//     //     private $name;

//     //     public function getName(){
//     //         return $this->name;
//     //     }
        
//     //     public function setName($name){
//     //         $this->name = $name;
//     //     }
//     // }
    
    
//     // $person = new Person();
//     // // $person->name='';
//     // $person->setName('Bob Smith');
//     // echo $person->getName().' '

//     class Person {
//         protected $name;
//         protected $age;

//         public function getName(){
//             return $this->name;
//         }
//         public function setName($name){
//             $this->name= $name;
//         }
//         private function callToPrivateNameAndAge(){
//             return "{$this->name}is{$this->age} years old.";
//         }
//         protected function callToProtectNameAndAge(){
//             return "{$this->name}is{$this->age} years old.";
//         }
//     }

//     class Employee extends Person{
//         private $designation;
//         private $salary;

//         public function getAge(){
//             return $this->age;
//         }
//         public function setAge($age){
//             return $this->age;
//         }
//         public function getDesignation(){
//             return $this->designation;
//         }
//         public function setDesignation($designation){
//             return $this->designation = $designation;
//         }
//         public function getSalary(){
//             return $this->salary;
//         }
//         public function setSalary($salary){
//             return $this->salary = $salary;
//         }
//         public function getNameAndAge(){
//             return $this->callToProtectNameAndAge();
//         }

//     }
//     $empployee = new Employee();
//     $empployee->setName('Bob');
//     $empployee->setAge(30);
//     $empployee->setDesignation('Soft');
//     $empployee->setSalary('30k');

//     echo $empployee->getName();
//     echo $empployee->getAge();
//     echo $empployee->getDesignation();
//     echo $empployee->getSalary();
//     echo $empployee->getNameAndAge();
//     // echo $empployee->callToPrivateNameAndAge();


// //полиморфизм

// class Message {
//     public function formatMessage($message){
//         return printf('<i>%s</i>', $message);
//     }
// }
// class BoldMessage extends Message {
//     public function formatMessage($message){
//         return printf('<b>%s</b>', $message);
//     }
// }
// $message = new Message();
// $message->formatMessage('Hello');

// $message = new BoldMessage();
// $message->formatMessage('Hello');

    





    ?>
</body>
</html>