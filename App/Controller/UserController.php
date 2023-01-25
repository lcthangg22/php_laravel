<?php

class UserController {

    public function run() {
        require_once ('../Service/UserService.php');
        $userService = new UserService();

        $userService->getUsers();
//        $userService->creatUser();
//        $userService->deleteUser();

    }
}
$userController = new UserController();
$userController->run();

