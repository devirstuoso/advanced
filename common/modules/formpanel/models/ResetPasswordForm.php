<?php
namespace common\modules\formpanel\models;

use yii\base\InvalidArgumentException;
use yii\base\Model;
use Yii;
use common\modules\formpanel\models\User;

/**
 * Password reset form
 */
class ResetPasswordForm extends Model
{
    public $password;
    public $c_password;

    /**
     * @var \common\models\User
     */
    private $_user;


    /**
     * Creates a form model given a token.
     *
     * @param string $token
     * @param array $config name-value pairs that will be used to initialize the object properties
     * @throws InvalidArgumentException if token is empty or not valid
     */
    public function __construct($token, $config = [])
    {
        if (empty($token) || !is_string($token)) {
            throw new InvalidArgumentException('Password reset token cannot be blank.');
        }
        $this->_user = User::findByPasswordResetToken($token);
        if (!$this->_user) {
            throw new InvalidArgumentException('Wrong password reset token.');
        }
        parent::__construct($config);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['password','c_password'], 'required'],
            [['password','c_password'], 'string', 'min' => 6],
            ['c_password', 'confirmPassword'],
        ];
    }

    /**
     * Resets password.
     *
     * @return bool if password was reset.
     */
    public function resetPassword()
    {
        $user = $this->_user;
        $user->setPassword($this->password);
        $user->removePasswordResetToken();
        $user->generateAuthKey();

        return $user->save(false);
    }

    // custom rules
    public function confirmPassword($attribute, $params, $validator){
        if (strcmp($this->password, $this->c_password)) { 
                $validator->addError($this,$attribute,'Entered password is not same');
        }
    }
}
