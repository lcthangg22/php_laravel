<?php
class User {
    private int $id;
    private string $name;
    private int $age;
    private string $email;

    /**
     * @param int $id
     * @param string $name
     * @param int $age
     * @param string $email
     */
    public function __construct(int $id, string $name, int $age, string $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->email = $email;
    }

}