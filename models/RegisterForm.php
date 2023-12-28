<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class RegisterForm extends Model
{
    public $username;
    public $password;
    public $name;
    public $surname;
    public $patronymic;
    public $phone;
    public $email;
    public $password_repeat;




    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password', 'name', 'surname','phone',], 'required'],
            [['name', 'surname','patronymic'], 'match', 'pattern' => '/^[а-яёА-ЯЁ]++$/u','message' => 'Данное поле заполните латинскими буквами'],
            ['username', 'unique', 'targetClass' => 'app\models\User', 'message' => 'Данный пользователь существует'],
            ['email', 'unique', 'targetClass' => 'app\models\User', 'message' => 'Данный email существует'],
            ['patronymic', 'string'],
            // rememberMe must be a boolean value
            ['email', 'email'],
            [['password'], 'string', 'min' => 6],
//            [['password_repeat'], 'string'],
            // password is validated by validatePassword()
//            ['password', 'compare', 'compareAttribute' => 'password_repeat','message' => 'Пароли не совподают'],
        ];
    }


    public function register()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->name = $this->name;
        $user->surname = $this->surname;
        $user->patronymic = $this->patronymic;
        $user->phone = $this->phone;
        $user->email = $this->email;
//        $user->HashPassword($this->password);

        return $user->save() ? $user : null;
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'username' => 'Логин',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
//            'password_repeat' => 'Повторите пароль',
            'phone' => 'Номер телефона',
            'email' => 'Email',
            'password' => 'Пароль',
            'password_repeat' => 'Повторите пароль',
        ];
    }
    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
}
