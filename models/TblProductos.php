<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_productos".
 *
 * @property int $id_producto
 * @property string $nombre
 * @property int $min_stock
 * @property string $fecha_ing
 * @property int $user_ing
 * @property string $fecha_mod
 * @property int $user_mod
 * @property int $estado
 *
 * @property TblDetCompras[] $tblDetCompras
 * @property TblInventario[] $tblInventarios
 * @property TblUsuarios $userIng
 * @property TblUsuarios $userMod
 */
class TblProductos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_categoria', 'nombre', 'precio', 'descripcion', 'min_stock', 'fecha_ing', 'user_ing', 'fecha_mod', 'user_mod', 'estado'], 'required'],
            [['id_categoria', 'min_stock', 'user_ing', 'user_mod', 'estado'], 'integer'],
            [['precio'], 'safe'],
            [['fecha_ing', 'fecha_mod'], 'safe'],
            [['nombre', 'descripcion'], 'string', 'max' => 255],
            [['id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => TblCategorias::class, 'targetAttribute' => ['id_categoria' => 'id_categoria']],
            [['user_ing'], 'exist', 'skipOnError' => true, 'skipOnError' => true, 'targetClass' => TblUsuarios::class, 'targetAttribute' => ['user_ing' => 'id_usuario']],
            [['user_mod'], 'exist', 'skipOnError' => true, 'skipOnError' => true, 'targetClass' => TblUsuarios::class, 'targetAttribute' => ['user_mod' => 'id_usuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_producto' => 'Id',
            'id_categoria' => 'Categoria',
            'nombre' => 'Nombre',
            'min_stock' => 'Stock',
            'fecha_ing' => 'Fecha Ing',
            'user_ing' => 'User Ing',
            'fecha_mod' => 'Fecha Mod',
            'user_mod' => 'User Mod',
            'estado' => 'Estado',
        ];
    }

    /**
     * Gets query for [[TblDetCompras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(TblCategorias::class, ['id_categoria' => 'id_categoria']);
    }

    /**
     * Gets query for [[TblInventarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductoImagen()
    {
        return $this->hasMany(TblProductoImagenes::class, ['id_producto' => 'id_producto']);
    }

    /**
     * Gets query for [[UserIng]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserIng()
    {
        return $this->hasOne(TblUsuarios::class, ['id_usuario' => 'user_ing']);
    }

    /**
     * Gets query for [[UserMod]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserMod()
    {
        return $this->hasOne(TblUsuarios::class, ['id_usuario' => 'user_mod']);
    }
}
