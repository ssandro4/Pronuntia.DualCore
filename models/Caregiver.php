<?php

namespace app\models;


use Yii;

/**
 * This is the model class for table "Caregiver".
 *
 * @property int $idCaregiver
 * @property string $nome
 * @property string $cognome
 * @property string $email
 * @property string $password
 */
class Caregiver extends \yii\db\ActiveRecord  implements \yii\web\IdentityInterface
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Caregiver';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //    [['idCaregiver'], 'required'],
            //     [['idCaregiver'], 'integer'],
            [['nome', 'cognome', 'email', 'password'], 'required'],
            [['nome', 'cognome', 'email'], 'string', 'max' => 24],
            [['password'], 'string', 'max' => 16],
            ['email', 'email'],
            [['email'], 'unique'],
            //    [['idCaregiver'], 'unique'],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCaregiver' => 'Id Caregiver',
            'nome' => 'Nome',
            // 'cognome' => 'Cognome',
            'email' => 'Email',
            'password' => 'Password',
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
        return static::findOne(['accessToken' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->idCaregiver;
    }

    /**
     * @return string|null current user auth key
     */
    public function getAuthKey()
    {
        return $this->authKey;
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
        return $this->nome . ' ' . $this->cognome;
    }

    /**
     * Gets query for [[Pazientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPazientes()
    {
        return $this->hasMany(Paziente::className(), ['caregiver' => 'idCaregiver']);
    }
}
