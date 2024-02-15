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

}
?>
