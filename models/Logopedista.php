<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "logopedista".
 *
 * @property int $idLogopedista
 * @property string|null $nome
 * @property string|null $cognome
 * @property string|null $email
 * @property string|null $password
 *
 * @property Paziente[] $pazientes
 */
class Logopedista extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'logopedista';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idLogopedista'], 'required'],
            [['idLogopedista'], 'integer'],
            [['nome', 'cognome', 'email'], 'string', 'max' => 24],
            [['password'], 'string', 'max' => 16],
            [['idLogopedista'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idLogopedista' => 'Id Logopedista',
            'nome' => 'Nome',
            'cognome' => 'Cognome',
            'email' => 'Email',
            'password' => 'Password',
        ];
    }

    /**
     * Gets query for [[Pazientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPazientes()
    {
        return $this->hasMany(Paziente::className(), ['logopedista' => 'idLogopedista']);
    }
}
