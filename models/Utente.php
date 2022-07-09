<?php

namespace app\models;

use Yii;
use app\models\Caregiver;
use app\models\Logopedista;

/**
 * This is the model class for table "Utente".
 *
 * @property int $id
 * @property string|null $email
 * @property string|null $password
 * @property string|null $authkey
 * @property string $tipo
 */
class Utente extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Utente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['email'], 'string', 'max' => 24],
            [['password'], 'string', 'max' => 16],
            [['authkey'], 'string', 'max' => 12],
            [['tipo'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Password',
            'authkey' => 'Authkey',
            'tipo' => 'Tipo',
        ];
    }


    public static function findByUsername($username)
    {
        foreach (self::find()->all() as $user) {
            if (strcasecmp($user->email, $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        //  return static::findOne(['accessToken' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string|null current user auth key
     */
    public function getAuthKey()
    {
        return $this->authkey;
    }

    /**
     * @param string $authKey
     * @return bool|null if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function getNomeECognome()
    {
        if (Yii::$app->user->identity->tipo = 'caregiver') {
            return Caregiver::findOne(['idCaregiver' => $this->id])->nome . ' ' . Caregiver::findOne(['idCaregiver' => $this->id])->cognome;
        } else if (Yii::$app->user->identity->tipo = 'logopedista') {
            return Logopedista::findOne(['idLogopedista' => $this->id])->nome . ' ' . Logopedista::findOne(['idLogopedista' => $this->id])->cognome;
        }
    }
}
