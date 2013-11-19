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
	public $tempFileUpload; // holds tempFileUpload for add Paper

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
			array('title, author, year, confPub, abstract, idCat, tempFileUpload', 'required'),
			array('idCat', 'numerical', 'integerOnly'=>true),
			array('id', 'length', 'max'=>14),
			array('fileName, confPub', 'length', 'max'=>255),
			array('year', 'length', 'max'=>4),
			array('createdBy', 'length', 'max'=>100),
			array('idCat','compare','operator'=>'!=','compareValue'=>'0','message'=>'Please select a Category.'),
			array('tempFileUpload','file','maxFiles'=>1,'allowEmpty'=>false,'types'=>'pdf','message'=>'Check your filetype. Only PDF file is allowed','on'=>'update', 'on'=>'insert'),
			array('tempFileUpload','validateFileUrl'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fileName, title, author, year, confPub, abstract, idCat, bibTex, fileUrl, createdBy, createdDate', 'safe', 'on'=>'search'),
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
			'idCat' => 'Category',
			'bibTex' => 'Bib Tex',
			'fileUrl' => 'File Url',
			'tempFileUpload' => 'Paper File',
			'createdBy' => 'Created By',
			'createdDate' => 'Created Date',
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
		$criteria->compare('createdDate',$this->createdDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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
	public function searchAllPaper()
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
		$criteria->compare('createdDate',$this->createdDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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
	public function searchUserPaper($userId)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('createdBy',$userId,true);
		
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
	
	/**
	 * Returns id for Paper data.
	 * @param string $id active record class name.
	 * @return Paper the static model class
	 */
	public function createIdPaper()
	{
		//return new CDbExpression('date("YmdHis")');
		return new CDbExpression(date("YmdHis"));
	}

	/**
	 * Returns array of category data.
	 * @param string[] $idcat active record class name.
	 * @return Paper the static model class
	 */
	public function getCategoryList()
	{
		return Category::model()->getCategoryList();
	}
	
	public function getPaperYearFromDB()
	{
		$criteria = new CDbCriteria;
		
		$criteria->select = 'year';
		$criteria->order = 'year asc';
		$criteria->distinct = true;
		$arrResult = Paper::model()->findAll($criteria);
		foreach($arrResult as $dataYear)
		{
			$result[$dataYear->year] = $dataYear->year;
		}
		
		return $result;
	}
	
	/**
	 * execute before save .
	 */
	public function beforeSave()
	{
		if($this->isNewRecord)
		{
			$this->id = Paper::model()->createIdPaper();
			$this->createdBy = Yii::app()->user->id;
			$this->createdDate = date("Y-m-d");
		}
		return true;
	}
	
	/**
	 * Get Category Name from Category Id
	 * Author : Tandhy
	 * Date : 11.08.2013
	 */
	public function getCategoryNameFromId($id)
	{
		if(isset($id))
			return Category::model()->getCategoryNameFromId($id);
		else
			return "Not Set";
	}
	
	/**
	 * validate fileUrl and check whether the file exists in path
	 * Author : Tandhy
	 * Date : 11.08.2013
	 */
	public function validateFileUrl()
	{
		// if User type a filename to replace the fileUrl name
		if(!empty($this->fileName))
		{
			$errorField = 'fileName';
			$paperUploadPath = Yii::app()->params['paperUploadPath'].'/'.$this->fileName.'.pdf';
		}
		else
		{
			// if User leave filename empty and let the filename be the fileUrl name
			$errorField = 'tempFileUpload';
			$paperUploadPath = Yii::app()->params['paperUploadPath'].'/'.$this->tempFileUpload->Name;
		}
		//Yii::log('paperuploadpath : '.$paperUploadPath,'vardump','PaperModel');
		if(file_exists($paperUploadPath))
		{
			$this->addError($errorField,'Filename exists. Please choose another name');
			return false;
		}
		else
		{
			return true;
		}
	}
	
	/** 
	 * get first name and last name user from email id
	 * author : tandhy
	 * date : 11.09.13
	 */
	public function getFNameLNameByEmail($emailId)
	{
		if(isset($emailId))
			return Login::model()->getFNameLNameByEmail($emailId);
		else
			return "Not Recognized";
			
	}
	
	/**
	 * get paper title by id Paper
	 * author : tandhy
	 * date : 11.10.13
	 */
	public function getPaperTitleByIdPaper($idPaper)
	{
		if(isset($idPaper)) {
			$criteria = new CDbCriteria;
			$criteria->select = 'title';
			$criteria->condition = 'id = :idPaper';
			$criteria->params = array(':idPaper'=>$idPaper);
			$arrResult = Paper::model()->find($criteria);
			return $arrResult['title'];
		}
		else
			return "";
	}
	
	/**
	 * return button template for user when search all paper
	 * if user has been reviewed the paper, then user can not create another review
	 * author : tandhy
	 * date : 11.11.13
	 */
	public function buttonTemplateUserForSearchAllPaper($email,$idPaper)
	{
		if(!ReviewPaper::model()->checkUserReviewOnPaper($email,$idPaper))
		{
			// if user has not reviewed the paper
			return '{view} {review}';
		}
		else
		{
			// if user has reviewed the paper
			return '{view}';
		}		
	}
	
}
