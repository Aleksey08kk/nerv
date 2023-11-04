<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $password
 * @property int|null $isAdmin
 * @property string|null $userPhoto
 * @property string|null $modey
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['isAdmin'], 'integer'],
            [['name', 'email', 'password', 'userPhoto'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'isAdmin' => 'Is Admin',
            'userPhoto' => 'User Photo',
        ];
    }

    public static function findIdentity($id): User
    {
        return User::findOne($id);
    }
    public function getId(): int
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public static function findByEmail(String $email): \yii\db\ActiveRecord
    {
        return User::find()->where(['email'=>$email])->one();
    }

    public function validatePassword(String $password): bool
    {
        return $this->password == $password;
    }

    public function create(): bool
    {
        return $this->save(false);
    }
}
