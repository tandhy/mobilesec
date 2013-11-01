<?php

/**
 * This is the model class for table "tpaper".
 *
 * The followings are the available columns in table 'tpaper':
 * @property string $id
 * @property string $fileName
 * @property string $title
 * @property string $author
 * @property string $year
 * @property string $confPub
 * @property string $abstract
 * @property integer $idCat
 * @property string $bibTex
 * @property string $fileUrl
 * @property string $createdBy
 * @property string $createDate
 *
 * The followings are the available model relations:
 * @property ReviewPaper[] $reviewPapers
 * @property Login $createdBy0
 * @property Category $idCat0
 */
class Paper extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tpaper';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, fileName, title, author, year, confPub, abstract, idCat, bibTex, fileUrl, createdBy, createDate', 'required'),
			array('idCat', 'numerical', 'integerOnly'=>true),
			array('id', 'length', 'max'=>14),
			array('fileName, author, fileUrl', 'length', 'max'=>255),
			array('year', 'length', 'max'=>4),
			array('confPub, createdBy', 'length', 'max'=>100),
			array(), // defining fileurl is a file upload and then store the path to the folder
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fileName, title, author, year, confPub, abstract, idCat, bibTex, fileUrl, createdBy, createDate', 'safe', 'on'=>'search'),
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
			'reviewPapers' => array(self::HAS_MANY, 'ReviewPaper', 'idPaper'),
			'createdBy0' => array(self::BELONGS_TO, 'Login', 'createdBy'),
			'idCat0' => array(self::BELONGS_TO, 'Category', 'idCat'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fileName' => 'File Name',
			'title' => 'Title',
			'author' => 'Author',
			'year' => 'Year',
			'confPub' => 'Conference Publisher',
			'abstract' => 'Abstract',
			'idCat' => 'Choose Category',
			'bibTex' => 'BibTex',
			'fileUrl' => 'File Url',
			'createdBy' => 'Created By',
			'createDate' => 'Create Date',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('fileName',$this->fileName,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('year',$this->year,true);
		$criteria->compare('confPub',$this->confPub,true);
		$criteria->compare('abstract',$this->abstract,true);
		$criteria->compare('idCat',$this->idCat);
		$criteria->compare('bibTex',$this->bibTex,true);
		$criteria->compare('fileUrl',$this->fileUrl,true);
		$criteria->compare('createdBy',$this->createdBy,true);
		$criteria->compare('createDate',$this->createDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Paper the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getCategoryList()
	{
		return Category::model()->getCategoryList();
	}

}
