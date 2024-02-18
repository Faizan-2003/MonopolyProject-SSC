<?php
require_once __DIR__ . '/../repositories/UserRepository.php';

class UserService {
    private $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function addUser(string $userName, string $gameName) {
        $this->userRepository->addUser($userName, $gameName);
    }

    public function findPoppetByUsername($username) {
        return $this->userRepository->findPoppetByUsername($username);
    }
    public function findUserByUsername($username) {
        return $this->userRepository->findUserByUsername($username);
    }
    public function getUserProperties($userID) {
        return $this->userRepository->getUserProperties($userID);
    }
    public function getUserInfo($userID) {
        return $this->userRepository->getUserInfo($userID);
    }
    public function getActivePlayerIDs() {
        return $this->userRepository->getActivePlayerIDs();
    }
    public function getNextPlayerID($currentPlayerID, $connection) {
        return $this->userRepository->getNextPlayerID($currentPlayerID, $connection);
    }


}
?>
