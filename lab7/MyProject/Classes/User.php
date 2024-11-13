<?php
namespace MyProject\Classes;

class User
{

    public $name;
    public $login;
    private $password;

    /**
     * Конструктор класса
     *
     * @param string $name - имя,
     * @param string $login - логин,
     * @param string $password - пароль пользователя
     */
    public function __construct($name, $login, $password)
    {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
    }

    /**
     * Выводит информацию о пользователе
     *
     * @return string - возвращает HTML-блок с информацией
     */
    public function showInfo(): string
    {
        return "<div>
                    <h3>User Info</h3>
                    <p><b>Name:</b> {$this->name}</p>
                    <p><b>Login:</b> {$this->login}</p>
                </div>";
    }

    /**
     * Деструктор класса
     * 
     * выводит сообщение об удалении пользователя.
     */
    public function __destruct()
    {
        echo "<p>Пользователь {$this->login} удален.</p>";
    }
}