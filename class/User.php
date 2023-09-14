<?php

// class User {
//     private $id;
//     private $login;
//     private $firstname;
//     private $lastname;

//     /**
//      * User constructor.
//      * 
//      * @param int $id
//      * @param string $login
//      * @param string $firstname
//      * @param string $lastname
//      */
//     public function __construct($id, $login, $firstname, $lastname) {
//         $this->id = $id;
//         $this->login = $login;
//         $this->firstname = $firstname;
//         $this->lastname = $lastname;
//     }

//     /**
//      * Updates the user's details in the database.
//      * 
//      * @param PDO $pdo
//      * @return bool true on success, false on failure.
//      */
//     public function update(PDO $pdo) {
//         try {
//             $stmt = $pdo->prepare("UPDATE user SET login = ?, firstname = ?, lastname = ? WHERE id = ?");
//             $stmt->execute([$this->login, $this->firstname, $this->lastname, $this->id]);
//             return true;
//         } catch (PDOException $e) {
//             return false;
//         }
//     }

//     /**
//      * Fetches a user from the database by their ID.
//      * 
//      * @param int $userId
//      * @param PDO $pdo
//      * @return self
//      */
//     public static function findById($userId, PDO $pdo) {
//         $stmt = $pdo->prepare("SELECT * FROM user WHERE id = ?");
//         $stmt->execute([$userId]);
//         $user = $stmt->fetch();
        
//         if (!$user) {
//             throw new Exception("User not found");
//         }

//         return new self($user['id'], $user['login'], $user['firstname'], $user['lastname']);
//     }

//     // Getters for private properties
//     public function getId() {
//         return $this->id;
//     }

//     public function getLogin() {
//         return $this->login;
//     }

//     public function getFirstname() {
//         return $this->firstname;
//     }

//     public function getLastname() {
//         return $this->lastname;
//     }

//     // Setters for private properties, useful for changing user's details.
//     public function setLogin($login) {
//         $this->login = $login;
//     }

//     public function setFirstname($firstname) {
//         $this->firstname = $firstname;
//     }

//     public function setLastname($lastname) {
//         $this->lastname = $lastname;
//     }
// }

?>
