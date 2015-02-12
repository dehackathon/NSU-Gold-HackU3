<?php

namespace Application\Entity;

class AdminUserEntity
{
    private $name;
    private $email;
    private $username;
    private $admin_password;
    private $password;

    /**
     * @return mixed
     */
    public function getAdminPassword()
    {
        return $this->admin_password;
    }

    /**
     * @param mixed $admin_password
     */
    public function setAdminPassword($admin_password)
    {
        $this->admin_password = $admin_password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

}