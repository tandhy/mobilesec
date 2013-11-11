<?php

/**
 * This is the model class for table "tCategory".
 *
 * The followings are the available columns in table 'tCategory':
 * @property integer $idCategory
 * @property string $Category
 * @property string $Description
<<<<<<< HEAD
 *
 * The followings are the available model relations:
 * @property Paper[] $papers
=======
>>>>>>> iter1
 */
class Category extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tCategory';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idCategory, Category, Description', 'required'),
			array('idCategory', 'numerical', 'integerOnly'=>true),
<<<<<<< HEAD
			array('Category, Description', 'length', 'max'=>255),
=======
			array('Category', 'length', 'max'=>50),
			array('Description', 'length', 'max'=>255),
>>>>>>> iter1
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idCategory, Category, Description', 'safe', 'on'=>'search'),
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
<<<<<<< HEAD
			'papers' => array(self::HAS_MANY, 'Paper', 'idCat'),
=======
>>>>>>> iter1
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCategory' => 'Id Category',
			'Category' => 'Category',
			'Description' => 'Description',
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

		$criteria->compare('idCategory',$this->idCategory);
		$criteria->compare('Category',$this->Category,true);
		$criteria->compare('Description',$this->Description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
<<<<<<< HEAD

	/*
	*	get all category from DB, and passed it to combobox
	*
	*/
	public function getCategoryList()
	{
		$criteria=new CDbCriteria;
		$criteria->select='idCategory,Category';  // only select the 'idCategory' and 'Category' columns      
		$arrResult = Category::model()->findAll($criteria);       
		foreach($arrResult as $dataCategory)
		{
			$result[$dataCategory->idCategory] = $dataCategory->Category;
		}
		return $result;
	}
=======
>>>>>>> iter1
}
