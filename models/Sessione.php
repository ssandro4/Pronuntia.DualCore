<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sessione".
 *
 * @property string $idSessione
 * @property int $logopedista
 *
 * @property Assegnazionesessione[] $assegnazionesessiones
 * @property Composizionesessione[] $composizionesessiones
 * @property Esercizio[] $esercizios
 * @property Logopedista $logopedista0
 * @property Paziente[] $pazientes
 */
class Sessione extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sessione';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idSessione', 'logopedista'], 'required'],
            [['logopedista'], 'integer'],
            [['idSessione'], 'string', 'max' => 24],
            [['idSessione'], 'unique'],
            [['logopedista'], 'exist', 'skipOnError' => true, 'targetClass' => Logopedista::className(), 'targetAttribute' => ['logopedista' => 'idLogopedista']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idSessione' => 'Id Sessione',
            'logopedista' => 'Logopedista',
        ];
    }

    /**
     * Gets query for [[Assegnazionesessiones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAssegnazionesessiones()
    {
        return $this->hasMany(Assegnazionesessione::className(), ['sessione' => 'idSessione']);
    }

    /**
     * Gets query for [[Composizionesessiones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComposizionesessiones()
    {
        return $this->hasMany(Composizionesessione::className(), ['sessione' => 'idSessione']);
    }

    /**
     * Gets query for [[Esercizios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEsercizios()
    {
        return $this->hasMany(Esercizio::className(), ['idEsercizio' => 'esercizio'])->viaTable('composizionesessione', ['sessione' => 'idSessione']);
    }

    /**
     * Gets query for [[Logopedista0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLogopedista0()
    {
        return $this->hasOne(Logopedista::className(), ['idLogopedista' => 'logopedista']);
    }

    /**
     * Gets query for [[Pazientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPazientes()
    {
        return $this->hasMany(Paziente::className(), ['idPaziente' => 'paziente'])->viaTable('assegnazionesessione', ['sessione' => 'idSessione']);
    }
}
