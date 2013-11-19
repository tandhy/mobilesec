<?php

/**
 * This is the model class for table "tReviewPaper".
 *
 * The followings are the available columns in table 'tReviewPaper':
 * @property string $id
 * @property string $idPaper
 * @property integer $idTargetProblemCat
 * @property string $targetProblemDetail
 * @property integer $idPropSolutionCat
 * @property string $propSolutionDetail
 * @property string $relatedWork
 * @property string $pros
 * @property string $cons
 * @property string $performance
 * @property string $other
 * @property string $createdBy
 * @property string $createdDate
 *
 * The followings are the available model relations:
 * @property Login $createdBy0
 * @property Paper $idPaper0
 */
class ReviewPaper extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tReviewPaper';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idTargetProblemCat, targetProblemDetail, idPropSolutionCat, propSolutionDetail, relatedWork, pros, cons, performance', 'required'),
			array('idTargetProblemCat, idPropSolutionCat', 'numerical', 'integerOnly'=>true),
			array('id, idPaper', 'length', 'max'=>14),
			array('createdBy', 'length', 'max'=>100),
			array('idTargetProblemCat,idPropSolutionCat','compare','operator'=>'!=','compareValue'=>'0','message'=>'Please select a Category.'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, idPaper, idTargetProblemCat, targetProblemDetail, idPropSolutionCat, propSolutionDetail, relatedWork, pros, cons, performance, other, createdBy, createdDate', 'safe', 'on'=>'search'),
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
			'createdBy0' => array(self::BELONGS_TO, 'Login', 'createdBy'),
			'idPaper0' => array(self::BELONGS_TO, 'Paper', 'idPaper'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'idPaper' => 'Id Paper',
			'idTargetProblemCat' => 'Target Problem Category',
			'targetProblemDetail' => 'Target Problem Detail',
			'idPropSolutionCat' => 'Propose Solution Category',
			'propSolutionDetail' => 'Propose Solution Detail',
			'relatedWork' => 'Related Work',
			'pros' => 'Pros',
			'cons' => 'Cons',
			'performance' => 'Performance',
			'other' => 'Other',
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
		$criteria->compare('idPaper',$this->idPaper,true);
		$criteria->compare('idTargetProblemCat',$this->idTargetProblemCat);
		$criteria->compare('targetProblemDetail',$this->targetProblemDetail,true);
		$criteria->compare('idPropSolutionCat',$this->idPropSolutionCat);
		$criteria->compare('propSolutionDetail',$this->propSolutionDetail,true);
		$criteria->compare('relatedWork',$this->relatedWork,true);
		$criteria->compare('pros',$this->pros,true);
		$criteria->compare('cons',$this->cons,true);
		$criteria->compare('performance',$this->performance,true);
		$criteria->compare('other',$this->other,true);
		$criteria->compare('createdBy',$this->createdBy,true);
		$criteria->compare('createdDate',$this->createdDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ReviewPaper the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/*
	 * Retrieve list of reviewPaper associated with idPaper
	 * @author tandhy
	 */
	public function getReviewPaperByIdPaper($idPaper)
	{
		$criteria=new CDbCriteria;

		$criteria->compare('idPaper',$idPaper, true);
		$criteria->order = 'createdDate DESC, id DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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
	
		/**
	 * Returns id for Paper data.
	 * @param string $id active record class name.
	 * @return Paper the static model class
	 */
	public function createIdReviewPaper()
	{
		//return new CDbExpression('date("YmdHis")');
		return new CDbExpression(date("YmdHis"));
	}

	/**
	 * Get Category Name from Category Id
	 * Author : Tandhy
	 * Date : 11.09.2013
	 */
	public function getCategoryNameFromId($id)
	{
		if(isset($id))
			return Category::model()->getCategoryNameFromId($id);
		else
			return "Not Set";
	}
	
	/** get first name and last name user from email id
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
	 * Check whether user has been reviewed specific paper and make sure
	 * each user only able to review paper once
	 * author : tandhy
	 * date : 11.09.13
	 */
	public function checkUserReviewOnPaper($email,$idPaper)
	{
		$criteria = new CDbCriteria;
		$criteria->select = 'id';
		$criteria->condition = 'createdBy=:email and idPaper=:idPaper';
		$criteria->params=array(':email'=>$email,':idPaper'=>$idPaper);
		$arrResult = ReviewPaper::model()->find($criteria);
		if($arrResult['id'])
			return false;
		else
			return true;
		
	}
	
	/**
	 * get Paper title by paper Id from Paper model
	 * author : tandhy
	 * date : 11.11.13
	 */
	public function getPaperTitleByIdPaper($idPaper)
	{
		return Paper::model()->getPaperTitleByIdPaper($idPaper);
	}

}
