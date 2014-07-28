<?php

/**
 * This is the model class for table "goods".
 *
 * The followings are the available columns in table 'goods':
 * @property integer $id
 * @property string $name
 * @property integer $cost
 * @property integer $id_category
 *
 * The followings are the available model relations:
 * @property GoodsLink[] $goodsLinks
 */
class Goods extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'goods';
	}

    public $categories;
    public $mobile;
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, cost, categories', 'required'),
			array('cost', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
            array('mobile', 'phoneNumber'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, cost, categories', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'Categories' => array(self::MANY_MANY, 'Categories', 'Categories(id, id)'),
		);
	}







    public function phoneNumber($attribute, $params='')
    {

        if(preg_match("/^\(?\d{3}\)?[\s-]?\d{3}[\s-]?\d{4}$/",$params) === 0)
        {

            $this->addError($attribute,
                'Contact phone number is required and  may contain only these characters: "0123456789()- " in a form like (858) 555-1212 or 8585551212 or (213)555 1212' );
        }
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'cost' => 'Cost',
            'categories' => 'Categories',
            'mobile' => 'Mobile',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('cost',$this->cost);
		//$criteria->compare('id_category',$this->id_category);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


    public function addLink($good, $cat){
        $command = Yii::app()->db->createCommand("INSERT INTO `goods_link` (`id_cat`, `id_good`) VALUES ($cat, $good)");

        $command->execute();


    }

    public function findCat($cat){
        $command = Yii::app()->db->createCommand("SELECT * FROM `goods` WHERE `id` IN (SELECT `id_good` FROM `goods_link` WHERE `id_cat` = $cat)");
        return $command->queryAll();
    }

    public function findByPk($good){
        $command = Yii::app()->db->createCommand("SELECT * FROM `goods` WHERE `id` = $good");
        return $command->queryRow();
    }



    public function add($good){

        $gd = $this->findByPk($good);




        if(!isset(Yii::app()->session['goods']))
            Yii::app()->session['goods'] = [];

        $tmp = Yii::app()->session['goods'];
        array_push($tmp, $gd);
        Yii::app()->session['goods'] = $tmp;

        /*
        $goodsArray = array();

        foreach(Yii::app()->session['goods'] as $s){
            $t = new Goods;
            array_push(new Goods()$s, $goodsArray);
        }
        */

        //return  Yii::app()->session['goods'];
    }


    public function getBucket(){

        $goodsList = array();
        foreach(Yii::app()->session['goods'] as $g){
            $goodsList[] = $g;
        }
        return $goodsList;
    }
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Goods the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
