<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subproyectos".
 *
 * @property integer $id
 * @property integer $id_proyecto
 * @property string $nombre
 * @property string $descripcion
 * @property string $evidencias_subproyectos
 * @property string $fecha_inicio
 * @property string $fecha_fin
 *
 * @property Actividades[] $actividades
 * @property Proyectos $idProyecto
 */
class Subproyectos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;


    public static function tableName()
    {
        return 'subproyectos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_proyecto', 'nombre', 'descripcion', 'evidencias_subproyectos', 'fecha_inicio', 'fecha_fin'], 'required'],
            [['id_proyecto'], 'integer'],
            [['fecha_inicio', 'fecha_fin'], 'safe'],
            [['nombre'], 'string', 'max' => 200],
            [['descripcion'], 'string', 'max' => 500],
            [['file'],'file'],
            [['evidencias_subproyectos'], 'string', 'max' => 300],
            [['id_proyecto'], 'exist', 'skipOnError' => true, 'targetClass' => Proyectos::className(), 'targetAttribute' => ['id_proyecto' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_proyecto' => 'Proyectos',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            //'evidencias_subproyectos' => 'Evidencias Subproyectos',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
            'file'=>'Evidencias',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActividades()
    {
        return $this->hasMany(Actividades::className(), ['id_subproyecto' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProyecto()
    {
        return $this->hasOne(Proyectos::className(), ['id' => 'id_proyecto']);
    }
}
