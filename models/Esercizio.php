<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "esercizio".
 *
 * @property string $idEsercizio
 * @property string|null $parola
 * @property string|null $parola2
 * @property string|null $tipo
 *
 * @property Composizionesessione[] $composizionesessiones
 * @property Parola $parola0
 * @property Parola $parola20
 * @property Sessione[] $sessiones
 */
class Esercizio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'esercizio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idEsercizio'], 'required'],
            [['tipo'], 'string'],            [['tipo'], 'required'],
            [['idEsercizio'], 'string', 'max' => 52],
            [['parola', 'parola2'], 'string', 'max' => 24],
            [['idEsercizio'], 'unique'],
            [['parola'], 'exist', 'skipOnError' => true, 'targetClass' => Parola::className(), 'targetAttribute' => ['parola' => 'idParola']],
            [['parola2'], 'exist', 'skipOnError' => true, 'targetClass' => Parola::className(), 'targetAttribute' => ['parola2' => 'idParola']],
            [['parola'], 'required'],            [['parola2'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idEsercizio' => 'Id Esercizio',
            'parola' => 'Parola',
            'parola2' => 'Parola 2',
            'tipo' => 'Tipo',
        ];
    }

    /**
     * Gets query for [[Composizionesessiones]].
     *
     * @return \yii\db\ActiveQuery
     */

/*
    public function getComposizionesessiones()
    {
        return $this->hasMany(Composizionesessione::className(), ['esercizio' => 'idEsercizio']);
    }

*/

    /**
     * Gets query for [[Parola0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParola0()
    {
        return $this->hasOne(Parola::className(), ['idParola' => 'parola']);
    }

    /**
     * Gets query for [[Parola20]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParola20()
    {
        return $this->hasOne(Parola::className(), ['idParola' => 'parola2']);
    }

    /**
     * Gets query for [[Sessiones]].
     *
     * @return \yii\db\ActiveQuery
     */

     /*
    public function getSessiones()
    {
        return $this->hasMany(Sessione::className(), ['idSessione' => 'sessione'])->viaTable('composizionesessione', ['esercizio' => 'idEsercizio']);
        
    }
    */
}
