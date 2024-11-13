<?php
declare(strict_types=1);


namespace MyProject\Classes;

require_once 'User.php';

class SuperUser extends User
{
    public $role;

    /**
     * Конструктор класса
     * 
     * @param string $name - имя,
     * @param string $login - логин,
     * @param string $password - пароль,
     * @param string $role - роль суперпользователя.
     */
    public function __construct($name, $login, $password, $role)
    {
        parent::__construct($name, $login, $password);
        $this->role = $role;
    }

    /**
     * Выводит информацию о суперпользователе
     *
     * @return string - возвращает HTML-блок с информацией
     */
    public function showInfo(): string  
    {
        return "<div>
                    <h3>SuperUser Info</h3>
                    <p><b>Name:</b> {$this->name}</p>
                    <p><b>Login:</b> {$this->login}</p>
                    <p><b>Role:</b> {$this->role}</p>
                </div>";
    }
}