<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "assegnazionesessione".
 *
 * @property string $sessione
 * @property int $paziente
 * @property int|null $nuovo
 * @property int|null $cntErrori
 * @property string|null $elencoErrori
 * @property string|null $esito
 * @property string|null $note
 * @property string|null $dataCreazione
 *
 * @property Paziente $paziente0
 * @property Sessione $sessione0
 */
class Assegnazionesessione extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assegnazionesessione';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sessione', 'paziente'], 'required'],
            [['paziente', 'nuovo', 'cntErrori'], 'integer'],
            [['dataCreazione'], 'safe'],
            [['sessione'], 'string', 'max' => 24],
            [['elencoErrori', 'esito', 'note'], 'string', 'max' => 256],
            [['sessione', 'paziente'], 'unique', 'targetAttribute' => ['sessione', 'paziente']],
            [['sessione'], 'exist', 'skipOnError' => true, 'targetClass' => Sessione::className(), 'targetAttribute' => ['sessione' => 'idSessione']],
            [['paziente'], 'exist', 'skipOnError' => true, 'targetClass' => Paziente::className(), 'targetAttribute' => ['paziente' => 'idPaziente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sessione' => 'Sessione',
            'paziente' => 'Paziente',
            'nuovo' => 'Nuovo',
            'cntErrori' => 'Cnt Errori',
            'elencoErrori' => 'Elenco Errori',
            'esito' => 'Esito',
            'note' => 'Note',
            'dataCreazione' => 'Data Creazione',
        ];
    }

    /**
     * Gets query for [[Paziente0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaziente0()
    {
        return $this->hasOne(Paziente::className(), ['idPaziente' => 'paziente']);
    }

    /**
     * Gets query for [[Sessione0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSessione0()
    {
        return $this->hasOne(Sessione::className(), ['idSessione' => 'sessione']);
    }
}
