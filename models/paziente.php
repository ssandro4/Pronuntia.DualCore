<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paziente".
 *
 * @property int $idPaziente
 * @property string $nome
 * @property string $cognome
 * @property string|null $diagnosi
 * @property int|null $caregiver
 * @property int|null $logopedista
 *
 * @property Assegnazionesessione[] $assegnazionesessiones
 * @property Caregiver $caregiver0
 * @property Logopedista $logopedista0
 * @property Sessione[] $sessiones
 */
class Paziente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paziente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'cognome'], 'required'],
            [['caregiver', 'logopedista'], 'integer'],
            [['nome', 'cognome'], 'string', 'max' => 24],
            [['diagnosi'], 'string', 'max' => 128],
            [['caregiver'], 'exist', 'skipOnError' => true, 'targetClass' => Caregiver::className(), 'targetAttribute' => ['caregiver' => 'idCaregiver']],
            [['logopedista'], 'exist', 'skipOnError' => true, 'targetClass' => Logopedista::className(), 'targetAttribute' => ['logopedista' => 'idLogopedista']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPaziente' => 'Id Paziente',
            'nome' => 'Nome',
            'cognome' => 'Cognome',
            'diagnosi' => 'Diagnosi',
            'caregiver' => 'Caregiver',
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
        return $this->hasMany(Assegnazionesessione::className(), ['paziente' => 'idPaziente']);
    }

    /**
     * Gets query for [[Caregiver0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCaregiver0()
    {
        return $this->hasOne(Caregiver::className(), ['idCaregiver' => 'caregiver']);
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
     * Gets query for [[Sessiones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSessiones()
    {
        return $this->hasMany(Sessione::className(), ['idSessione' => 'sessione'])->viaTable('assegnazionesessione', ['paziente' => 'idPaziente']);
    }

    public function getNomeECognome(){
        return $this->nome.' '.$this->cognome;
    }
}
