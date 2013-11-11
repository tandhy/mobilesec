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
			array('id, idPaper, idTargetProblemCat, targetProblemDetail, idPropSolutionCat, propSolutionDetail, relatedWork, pros, cons, performance, other, createdBy, createdDate', 'required'),
			array('idTargetProblemCat, idPropSolutionCat', 'numerical', 'integerOnly'=>true),
			array('id, idPaper', 'length', 'max'=>14),
			array('createdBy', 'length', 'max'=>100),
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
			'idTargetProblemCat' => 'Id Target Problem Cat',
			'targetProblemDetail' => 'Target Problem Detail',
			'idPropSolutionCat' => 'Id Prop Solution Cat',
			'propSolutionDetail' => 'Prop Solution Detail',
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
}
