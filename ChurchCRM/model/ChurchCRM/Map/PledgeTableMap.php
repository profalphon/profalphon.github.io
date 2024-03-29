<?php

namespace ChurchCRM\model\ChurchCRM\Map;

use ChurchCRM\model\ChurchCRM\Pledge;
use ChurchCRM\model\ChurchCRM\PledgeQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'pledge_plg' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class PledgeTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ChurchCRM.model.ChurchCRM.Map.PledgeTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'pledge_plg';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\ChurchCRM\\model\\ChurchCRM\\Pledge';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'ChurchCRM.model.ChurchCRM.Pledge';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 21;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 21;

    /**
     * the column name for the plg_plgID field
     */
    const COL_PLG_PLGID = 'pledge_plg.plg_plgID';

    /**
     * the column name for the plg_FamID field
     */
    const COL_PLG_FAMID = 'pledge_plg.plg_FamID';

    /**
     * the column name for the plg_FYID field
     */
    const COL_PLG_FYID = 'pledge_plg.plg_FYID';

    /**
     * the column name for the plg_date field
     */
    const COL_PLG_DATE = 'pledge_plg.plg_date';

    /**
     * the column name for the plg_amount field
     */
    const COL_PLG_AMOUNT = 'pledge_plg.plg_amount';

    /**
     * the column name for the plg_schedule field
     */
    const COL_PLG_SCHEDULE = 'pledge_plg.plg_schedule';

    /**
     * the column name for the plg_method field
     */
    const COL_PLG_METHOD = 'pledge_plg.plg_method';

    /**
     * the column name for the plg_comment field
     */
    const COL_PLG_COMMENT = 'pledge_plg.plg_comment';

    /**
     * the column name for the plg_DateLastEdited field
     */
    const COL_PLG_DATELASTEDITED = 'pledge_plg.plg_DateLastEdited';

    /**
     * the column name for the plg_EditedBy field
     */
    const COL_PLG_EDITEDBY = 'pledge_plg.plg_EditedBy';

    /**
     * the column name for the plg_PledgeOrPayment field
     */
    const COL_PLG_PLEDGEORPAYMENT = 'pledge_plg.plg_PledgeOrPayment';

    /**
     * the column name for the plg_fundID field
     */
    const COL_PLG_FUNDID = 'pledge_plg.plg_fundID';

    /**
     * the column name for the plg_depID field
     */
    const COL_PLG_DEPID = 'pledge_plg.plg_depID';

    /**
     * the column name for the plg_CheckNo field
     */
    const COL_PLG_CHECKNO = 'pledge_plg.plg_CheckNo';

    /**
     * the column name for the plg_Problem field
     */
    const COL_PLG_PROBLEM = 'pledge_plg.plg_Problem';

    /**
     * the column name for the plg_scanString field
     */
    const COL_PLG_SCANSTRING = 'pledge_plg.plg_scanString';

    /**
     * the column name for the plg_aut_ID field
     */
    const COL_PLG_AUT_ID = 'pledge_plg.plg_aut_ID';

    /**
     * the column name for the plg_aut_Cleared field
     */
    const COL_PLG_AUT_CLEARED = 'pledge_plg.plg_aut_Cleared';

    /**
     * the column name for the plg_aut_ResultID field
     */
    const COL_PLG_AUT_RESULTID = 'pledge_plg.plg_aut_ResultID';

    /**
     * the column name for the plg_NonDeductible field
     */
    const COL_PLG_NONDEDUCTIBLE = 'pledge_plg.plg_NonDeductible';

    /**
     * the column name for the plg_GroupKey field
     */
    const COL_PLG_GROUPKEY = 'pledge_plg.plg_GroupKey';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'FamId', 'FyId', 'Date', 'Amount', 'Schedule', 'Method', 'Comment', 'DateLastEdited', 'EditedBy', 'PledgeOrPayment', 'FundId', 'DepId', 'CheckNo', 'Problem', 'ScanString', 'AutId', 'AutCleared', 'AutResultId', 'Nondeductible', 'GroupKey', ),
        self::TYPE_CAMELNAME     => array('id', 'famId', 'fyId', 'date', 'amount', 'schedule', 'method', 'comment', 'dateLastEdited', 'editedBy', 'pledgeOrPayment', 'fundId', 'depId', 'checkNo', 'problem', 'scanString', 'autId', 'autCleared', 'autResultId', 'nondeductible', 'groupKey', ),
        self::TYPE_COLNAME       => array(PledgeTableMap::COL_PLG_PLGID, PledgeTableMap::COL_PLG_FAMID, PledgeTableMap::COL_PLG_FYID, PledgeTableMap::COL_PLG_DATE, PledgeTableMap::COL_PLG_AMOUNT, PledgeTableMap::COL_PLG_SCHEDULE, PledgeTableMap::COL_PLG_METHOD, PledgeTableMap::COL_PLG_COMMENT, PledgeTableMap::COL_PLG_DATELASTEDITED, PledgeTableMap::COL_PLG_EDITEDBY, PledgeTableMap::COL_PLG_PLEDGEORPAYMENT, PledgeTableMap::COL_PLG_FUNDID, PledgeTableMap::COL_PLG_DEPID, PledgeTableMap::COL_PLG_CHECKNO, PledgeTableMap::COL_PLG_PROBLEM, PledgeTableMap::COL_PLG_SCANSTRING, PledgeTableMap::COL_PLG_AUT_ID, PledgeTableMap::COL_PLG_AUT_CLEARED, PledgeTableMap::COL_PLG_AUT_RESULTID, PledgeTableMap::COL_PLG_NONDEDUCTIBLE, PledgeTableMap::COL_PLG_GROUPKEY, ),
        self::TYPE_FIELDNAME     => array('plg_plgID', 'plg_FamID', 'plg_FYID', 'plg_date', 'plg_amount', 'plg_schedule', 'plg_method', 'plg_comment', 'plg_DateLastEdited', 'plg_EditedBy', 'plg_PledgeOrPayment', 'plg_fundID', 'plg_depID', 'plg_CheckNo', 'plg_Problem', 'plg_scanString', 'plg_aut_ID', 'plg_aut_Cleared', 'plg_aut_ResultID', 'plg_NonDeductible', 'plg_GroupKey', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'FamId' => 1, 'FyId' => 2, 'Date' => 3, 'Amount' => 4, 'Schedule' => 5, 'Method' => 6, 'Comment' => 7, 'DateLastEdited' => 8, 'EditedBy' => 9, 'PledgeOrPayment' => 10, 'FundId' => 11, 'DepId' => 12, 'CheckNo' => 13, 'Problem' => 14, 'ScanString' => 15, 'AutId' => 16, 'AutCleared' => 17, 'AutResultId' => 18, 'Nondeductible' => 19, 'GroupKey' => 20, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'famId' => 1, 'fyId' => 2, 'date' => 3, 'amount' => 4, 'schedule' => 5, 'method' => 6, 'comment' => 7, 'dateLastEdited' => 8, 'editedBy' => 9, 'pledgeOrPayment' => 10, 'fundId' => 11, 'depId' => 12, 'checkNo' => 13, 'problem' => 14, 'scanString' => 15, 'autId' => 16, 'autCleared' => 17, 'autResultId' => 18, 'nondeductible' => 19, 'groupKey' => 20, ),
        self::TYPE_COLNAME       => array(PledgeTableMap::COL_PLG_PLGID => 0, PledgeTableMap::COL_PLG_FAMID => 1, PledgeTableMap::COL_PLG_FYID => 2, PledgeTableMap::COL_PLG_DATE => 3, PledgeTableMap::COL_PLG_AMOUNT => 4, PledgeTableMap::COL_PLG_SCHEDULE => 5, PledgeTableMap::COL_PLG_METHOD => 6, PledgeTableMap::COL_PLG_COMMENT => 7, PledgeTableMap::COL_PLG_DATELASTEDITED => 8, PledgeTableMap::COL_PLG_EDITEDBY => 9, PledgeTableMap::COL_PLG_PLEDGEORPAYMENT => 10, PledgeTableMap::COL_PLG_FUNDID => 11, PledgeTableMap::COL_PLG_DEPID => 12, PledgeTableMap::COL_PLG_CHECKNO => 13, PledgeTableMap::COL_PLG_PROBLEM => 14, PledgeTableMap::COL_PLG_SCANSTRING => 15, PledgeTableMap::COL_PLG_AUT_ID => 16, PledgeTableMap::COL_PLG_AUT_CLEARED => 17, PledgeTableMap::COL_PLG_AUT_RESULTID => 18, PledgeTableMap::COL_PLG_NONDEDUCTIBLE => 19, PledgeTableMap::COL_PLG_GROUPKEY => 20, ),
        self::TYPE_FIELDNAME     => array('plg_plgID' => 0, 'plg_FamID' => 1, 'plg_FYID' => 2, 'plg_date' => 3, 'plg_amount' => 4, 'plg_schedule' => 5, 'plg_method' => 6, 'plg_comment' => 7, 'plg_DateLastEdited' => 8, 'plg_EditedBy' => 9, 'plg_PledgeOrPayment' => 10, 'plg_fundID' => 11, 'plg_depID' => 12, 'plg_CheckNo' => 13, 'plg_Problem' => 14, 'plg_scanString' => 15, 'plg_aut_ID' => 16, 'plg_aut_Cleared' => 17, 'plg_aut_ResultID' => 18, 'plg_NonDeductible' => 19, 'plg_GroupKey' => 20, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
    );

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var string[]
     */
    protected $normalizedColumnNameMap = [

        'Id' => 'PLG_PLGID',
        'Pledge.Id' => 'PLG_PLGID',
        'id' => 'PLG_PLGID',
        'pledge.id' => 'PLG_PLGID',
        'PledgeTableMap::COL_PLG_PLGID' => 'PLG_PLGID',
        'COL_PLG_PLGID' => 'PLG_PLGID',
        'plg_plgID' => 'PLG_PLGID',
        'pledge_plg.plg_plgID' => 'PLG_PLGID',
        'FamId' => 'PLG_FAMID',
        'Pledge.FamId' => 'PLG_FAMID',
        'famId' => 'PLG_FAMID',
        'pledge.famId' => 'PLG_FAMID',
        'PledgeTableMap::COL_PLG_FAMID' => 'PLG_FAMID',
        'COL_PLG_FAMID' => 'PLG_FAMID',
        'plg_FamID' => 'PLG_FAMID',
        'pledge_plg.plg_FamID' => 'PLG_FAMID',
        'FyId' => 'PLG_FYID',
        'Pledge.FyId' => 'PLG_FYID',
        'fyId' => 'PLG_FYID',
        'pledge.fyId' => 'PLG_FYID',
        'PledgeTableMap::COL_PLG_FYID' => 'PLG_FYID',
        'COL_PLG_FYID' => 'PLG_FYID',
        'plg_FYID' => 'PLG_FYID',
        'pledge_plg.plg_FYID' => 'PLG_FYID',
        'Date' => 'PLG_DATE',
        'Pledge.Date' => 'PLG_DATE',
        'date' => 'PLG_DATE',
        'pledge.date' => 'PLG_DATE',
        'PledgeTableMap::COL_PLG_DATE' => 'PLG_DATE',
        'COL_PLG_DATE' => 'PLG_DATE',
        'plg_date' => 'PLG_DATE',
        'pledge_plg.plg_date' => 'PLG_DATE',
        'Amount' => 'PLG_AMOUNT',
        'Pledge.Amount' => 'PLG_AMOUNT',
        'amount' => 'PLG_AMOUNT',
        'pledge.amount' => 'PLG_AMOUNT',
        'PledgeTableMap::COL_PLG_AMOUNT' => 'PLG_AMOUNT',
        'COL_PLG_AMOUNT' => 'PLG_AMOUNT',
        'plg_amount' => 'PLG_AMOUNT',
        'pledge_plg.plg_amount' => 'PLG_AMOUNT',
        'Schedule' => 'PLG_SCHEDULE',
        'Pledge.Schedule' => 'PLG_SCHEDULE',
        'schedule' => 'PLG_SCHEDULE',
        'pledge.schedule' => 'PLG_SCHEDULE',
        'PledgeTableMap::COL_PLG_SCHEDULE' => 'PLG_SCHEDULE',
        'COL_PLG_SCHEDULE' => 'PLG_SCHEDULE',
        'plg_schedule' => 'PLG_SCHEDULE',
        'pledge_plg.plg_schedule' => 'PLG_SCHEDULE',
        'Method' => 'PLG_METHOD',
        'Pledge.Method' => 'PLG_METHOD',
        'method' => 'PLG_METHOD',
        'pledge.method' => 'PLG_METHOD',
        'PledgeTableMap::COL_PLG_METHOD' => 'PLG_METHOD',
        'COL_PLG_METHOD' => 'PLG_METHOD',
        'plg_method' => 'PLG_METHOD',
        'pledge_plg.plg_method' => 'PLG_METHOD',
        'Comment' => 'PLG_COMMENT',
        'Pledge.Comment' => 'PLG_COMMENT',
        'comment' => 'PLG_COMMENT',
        'pledge.comment' => 'PLG_COMMENT',
        'PledgeTableMap::COL_PLG_COMMENT' => 'PLG_COMMENT',
        'COL_PLG_COMMENT' => 'PLG_COMMENT',
        'plg_comment' => 'PLG_COMMENT',
        'pledge_plg.plg_comment' => 'PLG_COMMENT',
        'DateLastEdited' => 'PLG_DATELASTEDITED',
        'Pledge.DateLastEdited' => 'PLG_DATELASTEDITED',
        'dateLastEdited' => 'PLG_DATELASTEDITED',
        'pledge.dateLastEdited' => 'PLG_DATELASTEDITED',
        'PledgeTableMap::COL_PLG_DATELASTEDITED' => 'PLG_DATELASTEDITED',
        'COL_PLG_DATELASTEDITED' => 'PLG_DATELASTEDITED',
        'plg_DateLastEdited' => 'PLG_DATELASTEDITED',
        'pledge_plg.plg_DateLastEdited' => 'PLG_DATELASTEDITED',
        'EditedBy' => 'PLG_EDITEDBY',
        'Pledge.EditedBy' => 'PLG_EDITEDBY',
        'editedBy' => 'PLG_EDITEDBY',
        'pledge.editedBy' => 'PLG_EDITEDBY',
        'PledgeTableMap::COL_PLG_EDITEDBY' => 'PLG_EDITEDBY',
        'COL_PLG_EDITEDBY' => 'PLG_EDITEDBY',
        'plg_EditedBy' => 'PLG_EDITEDBY',
        'pledge_plg.plg_EditedBy' => 'PLG_EDITEDBY',
        'PledgeOrPayment' => 'PLG_PLEDGEORPAYMENT',
        'Pledge.PledgeOrPayment' => 'PLG_PLEDGEORPAYMENT',
        'pledgeOrPayment' => 'PLG_PLEDGEORPAYMENT',
        'pledge.pledgeOrPayment' => 'PLG_PLEDGEORPAYMENT',
        'PledgeTableMap::COL_PLG_PLEDGEORPAYMENT' => 'PLG_PLEDGEORPAYMENT',
        'COL_PLG_PLEDGEORPAYMENT' => 'PLG_PLEDGEORPAYMENT',
        'plg_PledgeOrPayment' => 'PLG_PLEDGEORPAYMENT',
        'pledge_plg.plg_PledgeOrPayment' => 'PLG_PLEDGEORPAYMENT',
        'FundId' => 'PLG_FUNDID',
        'Pledge.FundId' => 'PLG_FUNDID',
        'fundId' => 'PLG_FUNDID',
        'pledge.fundId' => 'PLG_FUNDID',
        'PledgeTableMap::COL_PLG_FUNDID' => 'PLG_FUNDID',
        'COL_PLG_FUNDID' => 'PLG_FUNDID',
        'plg_fundID' => 'PLG_FUNDID',
        'pledge_plg.plg_fundID' => 'PLG_FUNDID',
        'DepId' => 'PLG_DEPID',
        'Pledge.DepId' => 'PLG_DEPID',
        'depId' => 'PLG_DEPID',
        'pledge.depId' => 'PLG_DEPID',
        'PledgeTableMap::COL_PLG_DEPID' => 'PLG_DEPID',
        'COL_PLG_DEPID' => 'PLG_DEPID',
        'plg_depID' => 'PLG_DEPID',
        'pledge_plg.plg_depID' => 'PLG_DEPID',
        'CheckNo' => 'PLG_CHECKNO',
        'Pledge.CheckNo' => 'PLG_CHECKNO',
        'checkNo' => 'PLG_CHECKNO',
        'pledge.checkNo' => 'PLG_CHECKNO',
        'PledgeTableMap::COL_PLG_CHECKNO' => 'PLG_CHECKNO',
        'COL_PLG_CHECKNO' => 'PLG_CHECKNO',
        'plg_CheckNo' => 'PLG_CHECKNO',
        'pledge_plg.plg_CheckNo' => 'PLG_CHECKNO',
        'Problem' => 'PLG_PROBLEM',
        'Pledge.Problem' => 'PLG_PROBLEM',
        'problem' => 'PLG_PROBLEM',
        'pledge.problem' => 'PLG_PROBLEM',
        'PledgeTableMap::COL_PLG_PROBLEM' => 'PLG_PROBLEM',
        'COL_PLG_PROBLEM' => 'PLG_PROBLEM',
        'plg_Problem' => 'PLG_PROBLEM',
        'pledge_plg.plg_Problem' => 'PLG_PROBLEM',
        'ScanString' => 'PLG_SCANSTRING',
        'Pledge.ScanString' => 'PLG_SCANSTRING',
        'scanString' => 'PLG_SCANSTRING',
        'pledge.scanString' => 'PLG_SCANSTRING',
        'PledgeTableMap::COL_PLG_SCANSTRING' => 'PLG_SCANSTRING',
        'COL_PLG_SCANSTRING' => 'PLG_SCANSTRING',
        'plg_scanString' => 'PLG_SCANSTRING',
        'pledge_plg.plg_scanString' => 'PLG_SCANSTRING',
        'AutId' => 'PLG_AUT_ID',
        'Pledge.AutId' => 'PLG_AUT_ID',
        'autId' => 'PLG_AUT_ID',
        'pledge.autId' => 'PLG_AUT_ID',
        'PledgeTableMap::COL_PLG_AUT_ID' => 'PLG_AUT_ID',
        'COL_PLG_AUT_ID' => 'PLG_AUT_ID',
        'plg_aut_ID' => 'PLG_AUT_ID',
        'pledge_plg.plg_aut_ID' => 'PLG_AUT_ID',
        'AutCleared' => 'PLG_AUT_CLEARED',
        'Pledge.AutCleared' => 'PLG_AUT_CLEARED',
        'autCleared' => 'PLG_AUT_CLEARED',
        'pledge.autCleared' => 'PLG_AUT_CLEARED',
        'PledgeTableMap::COL_PLG_AUT_CLEARED' => 'PLG_AUT_CLEARED',
        'COL_PLG_AUT_CLEARED' => 'PLG_AUT_CLEARED',
        'plg_aut_Cleared' => 'PLG_AUT_CLEARED',
        'pledge_plg.plg_aut_Cleared' => 'PLG_AUT_CLEARED',
        'AutResultId' => 'PLG_AUT_RESULTID',
        'Pledge.AutResultId' => 'PLG_AUT_RESULTID',
        'autResultId' => 'PLG_AUT_RESULTID',
        'pledge.autResultId' => 'PLG_AUT_RESULTID',
        'PledgeTableMap::COL_PLG_AUT_RESULTID' => 'PLG_AUT_RESULTID',
        'COL_PLG_AUT_RESULTID' => 'PLG_AUT_RESULTID',
        'plg_aut_ResultID' => 'PLG_AUT_RESULTID',
        'pledge_plg.plg_aut_ResultID' => 'PLG_AUT_RESULTID',
        'Nondeductible' => 'PLG_NONDEDUCTIBLE',
        'Pledge.Nondeductible' => 'PLG_NONDEDUCTIBLE',
        'nondeductible' => 'PLG_NONDEDUCTIBLE',
        'pledge.nondeductible' => 'PLG_NONDEDUCTIBLE',
        'PledgeTableMap::COL_PLG_NONDEDUCTIBLE' => 'PLG_NONDEDUCTIBLE',
        'COL_PLG_NONDEDUCTIBLE' => 'PLG_NONDEDUCTIBLE',
        'plg_NonDeductible' => 'PLG_NONDEDUCTIBLE',
        'pledge_plg.plg_NonDeductible' => 'PLG_NONDEDUCTIBLE',
        'GroupKey' => 'PLG_GROUPKEY',
        'Pledge.GroupKey' => 'PLG_GROUPKEY',
        'groupKey' => 'PLG_GROUPKEY',
        'pledge.groupKey' => 'PLG_GROUPKEY',
        'PledgeTableMap::COL_PLG_GROUPKEY' => 'PLG_GROUPKEY',
        'COL_PLG_GROUPKEY' => 'PLG_GROUPKEY',
        'plg_GroupKey' => 'PLG_GROUPKEY',
        'pledge_plg.plg_GroupKey' => 'PLG_GROUPKEY',
    ];

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('pledge_plg');
        $this->setPhpName('Pledge');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\ChurchCRM\\model\\ChurchCRM\\Pledge');
        $this->setPackage('ChurchCRM.model.ChurchCRM');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('plg_plgID', 'Id', 'SMALLINT', true, 9, null);
        $this->addForeignKey('plg_FamID', 'FamId', 'SMALLINT', 'family_fam', 'fam_ID', false, 9, null);
        $this->addColumn('plg_FYID', 'FyId', 'SMALLINT', false, 9, null);
        $this->addColumn('plg_date', 'Date', 'DATE', false, null, null);
        $this->addColumn('plg_amount', 'Amount', 'DECIMAL', false, 8, null);
        $this->addColumn('plg_schedule', 'Schedule', 'CHAR', false, null, null);
        $this->addColumn('plg_method', 'Method', 'CHAR', false, null, null);
        $this->addColumn('plg_comment', 'Comment', 'LONGVARCHAR', false, null, null);
        $this->addColumn('plg_DateLastEdited', 'DateLastEdited', 'DATE', true, null, '2016-01-01');
        $this->addForeignKey('plg_EditedBy', 'EditedBy', 'SMALLINT', 'person_per', 'per_ID', true, 9, 0);
        $this->addColumn('plg_PledgeOrPayment', 'PledgeOrPayment', 'CHAR', true, null, 'Pledge');
        $this->addForeignKey('plg_fundID', 'FundId', 'TINYINT', 'donationfund_fun', 'fun_ID', false, 3, null);
        $this->addForeignKey('plg_depID', 'DepId', 'SMALLINT', 'deposit_dep', 'dep_ID', false, 9, null);
        $this->addColumn('plg_CheckNo', 'CheckNo', 'BIGINT', false, 16, null);
        $this->addColumn('plg_Problem', 'Problem', 'BOOLEAN', false, 1, null);
        $this->addColumn('plg_scanString', 'ScanString', 'LONGVARCHAR', false, null, null);
        $this->addColumn('plg_aut_ID', 'AutId', 'SMALLINT', true, 9, 0);
        $this->addColumn('plg_aut_Cleared', 'AutCleared', 'BOOLEAN', true, 1, false);
        $this->addColumn('plg_aut_ResultID', 'AutResultId', 'SMALLINT', true, 9, 0);
        $this->addColumn('plg_NonDeductible', 'Nondeductible', 'DECIMAL', true, 8, null);
        $this->addColumn('plg_GroupKey', 'GroupKey', 'VARCHAR', true, 64, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Deposit', '\\ChurchCRM\\model\\ChurchCRM\\Deposit', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':plg_depID',
    1 => ':dep_ID',
  ),
), null, null, null, false);
        $this->addRelation('DonationFund', '\\ChurchCRM\\model\\ChurchCRM\\DonationFund', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':plg_fundID',
    1 => ':fun_ID',
  ),
), null, null, null, false);
        $this->addRelation('Family', '\\ChurchCRM\\model\\ChurchCRM\\Family', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':plg_FamID',
    1 => ':fam_ID',
  ),
), null, null, null, false);
        $this->addRelation('Person', '\\ChurchCRM\\model\\ChurchCRM\\Person', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':plg_EditedBy',
    1 => ':per_ID',
  ),
), null, null, null, false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? PledgeTableMap::CLASS_DEFAULT : PledgeTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Pledge object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = PledgeTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = PledgeTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + PledgeTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PledgeTableMap::OM_CLASS;
            /** @var Pledge $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            PledgeTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = PledgeTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = PledgeTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Pledge $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PledgeTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(PledgeTableMap::COL_PLG_PLGID);
            $criteria->addSelectColumn(PledgeTableMap::COL_PLG_FAMID);
            $criteria->addSelectColumn(PledgeTableMap::COL_PLG_FYID);
            $criteria->addSelectColumn(PledgeTableMap::COL_PLG_DATE);
            $criteria->addSelectColumn(PledgeTableMap::COL_PLG_AMOUNT);
            $criteria->addSelectColumn(PledgeTableMap::COL_PLG_SCHEDULE);
            $criteria->addSelectColumn(PledgeTableMap::COL_PLG_METHOD);
            $criteria->addSelectColumn(PledgeTableMap::COL_PLG_COMMENT);
            $criteria->addSelectColumn(PledgeTableMap::COL_PLG_DATELASTEDITED);
            $criteria->addSelectColumn(PledgeTableMap::COL_PLG_EDITEDBY);
            $criteria->addSelectColumn(PledgeTableMap::COL_PLG_PLEDGEORPAYMENT);
            $criteria->addSelectColumn(PledgeTableMap::COL_PLG_FUNDID);
            $criteria->addSelectColumn(PledgeTableMap::COL_PLG_DEPID);
            $criteria->addSelectColumn(PledgeTableMap::COL_PLG_CHECKNO);
            $criteria->addSelectColumn(PledgeTableMap::COL_PLG_PROBLEM);
            $criteria->addSelectColumn(PledgeTableMap::COL_PLG_SCANSTRING);
            $criteria->addSelectColumn(PledgeTableMap::COL_PLG_AUT_ID);
            $criteria->addSelectColumn(PledgeTableMap::COL_PLG_AUT_CLEARED);
            $criteria->addSelectColumn(PledgeTableMap::COL_PLG_AUT_RESULTID);
            $criteria->addSelectColumn(PledgeTableMap::COL_PLG_NONDEDUCTIBLE);
            $criteria->addSelectColumn(PledgeTableMap::COL_PLG_GROUPKEY);
        } else {
            $criteria->addSelectColumn($alias . '.plg_plgID');
            $criteria->addSelectColumn($alias . '.plg_FamID');
            $criteria->addSelectColumn($alias . '.plg_FYID');
            $criteria->addSelectColumn($alias . '.plg_date');
            $criteria->addSelectColumn($alias . '.plg_amount');
            $criteria->addSelectColumn($alias . '.plg_schedule');
            $criteria->addSelectColumn($alias . '.plg_method');
            $criteria->addSelectColumn($alias . '.plg_comment');
            $criteria->addSelectColumn($alias . '.plg_DateLastEdited');
            $criteria->addSelectColumn($alias . '.plg_EditedBy');
            $criteria->addSelectColumn($alias . '.plg_PledgeOrPayment');
            $criteria->addSelectColumn($alias . '.plg_fundID');
            $criteria->addSelectColumn($alias . '.plg_depID');
            $criteria->addSelectColumn($alias . '.plg_CheckNo');
            $criteria->addSelectColumn($alias . '.plg_Problem');
            $criteria->addSelectColumn($alias . '.plg_scanString');
            $criteria->addSelectColumn($alias . '.plg_aut_ID');
            $criteria->addSelectColumn($alias . '.plg_aut_Cleared');
            $criteria->addSelectColumn($alias . '.plg_aut_ResultID');
            $criteria->addSelectColumn($alias . '.plg_NonDeductible');
            $criteria->addSelectColumn($alias . '.plg_GroupKey');
        }
    }

    /**
     * Remove all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be removed as they are only loaded on demand.
     *
     * @param Criteria $criteria object containing the columns to remove.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function removeSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->removeSelectColumn(PledgeTableMap::COL_PLG_PLGID);
            $criteria->removeSelectColumn(PledgeTableMap::COL_PLG_FAMID);
            $criteria->removeSelectColumn(PledgeTableMap::COL_PLG_FYID);
            $criteria->removeSelectColumn(PledgeTableMap::COL_PLG_DATE);
            $criteria->removeSelectColumn(PledgeTableMap::COL_PLG_AMOUNT);
            $criteria->removeSelectColumn(PledgeTableMap::COL_PLG_SCHEDULE);
            $criteria->removeSelectColumn(PledgeTableMap::COL_PLG_METHOD);
            $criteria->removeSelectColumn(PledgeTableMap::COL_PLG_COMMENT);
            $criteria->removeSelectColumn(PledgeTableMap::COL_PLG_DATELASTEDITED);
            $criteria->removeSelectColumn(PledgeTableMap::COL_PLG_EDITEDBY);
            $criteria->removeSelectColumn(PledgeTableMap::COL_PLG_PLEDGEORPAYMENT);
            $criteria->removeSelectColumn(PledgeTableMap::COL_PLG_FUNDID);
            $criteria->removeSelectColumn(PledgeTableMap::COL_PLG_DEPID);
            $criteria->removeSelectColumn(PledgeTableMap::COL_PLG_CHECKNO);
            $criteria->removeSelectColumn(PledgeTableMap::COL_PLG_PROBLEM);
            $criteria->removeSelectColumn(PledgeTableMap::COL_PLG_SCANSTRING);
            $criteria->removeSelectColumn(PledgeTableMap::COL_PLG_AUT_ID);
            $criteria->removeSelectColumn(PledgeTableMap::COL_PLG_AUT_CLEARED);
            $criteria->removeSelectColumn(PledgeTableMap::COL_PLG_AUT_RESULTID);
            $criteria->removeSelectColumn(PledgeTableMap::COL_PLG_NONDEDUCTIBLE);
            $criteria->removeSelectColumn(PledgeTableMap::COL_PLG_GROUPKEY);
        } else {
            $criteria->removeSelectColumn($alias . '.plg_plgID');
            $criteria->removeSelectColumn($alias . '.plg_FamID');
            $criteria->removeSelectColumn($alias . '.plg_FYID');
            $criteria->removeSelectColumn($alias . '.plg_date');
            $criteria->removeSelectColumn($alias . '.plg_amount');
            $criteria->removeSelectColumn($alias . '.plg_schedule');
            $criteria->removeSelectColumn($alias . '.plg_method');
            $criteria->removeSelectColumn($alias . '.plg_comment');
            $criteria->removeSelectColumn($alias . '.plg_DateLastEdited');
            $criteria->removeSelectColumn($alias . '.plg_EditedBy');
            $criteria->removeSelectColumn($alias . '.plg_PledgeOrPayment');
            $criteria->removeSelectColumn($alias . '.plg_fundID');
            $criteria->removeSelectColumn($alias . '.plg_depID');
            $criteria->removeSelectColumn($alias . '.plg_CheckNo');
            $criteria->removeSelectColumn($alias . '.plg_Problem');
            $criteria->removeSelectColumn($alias . '.plg_scanString');
            $criteria->removeSelectColumn($alias . '.plg_aut_ID');
            $criteria->removeSelectColumn($alias . '.plg_aut_Cleared');
            $criteria->removeSelectColumn($alias . '.plg_aut_ResultID');
            $criteria->removeSelectColumn($alias . '.plg_NonDeductible');
            $criteria->removeSelectColumn($alias . '.plg_GroupKey');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(PledgeTableMap::DATABASE_NAME)->getTable(PledgeTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(PledgeTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(PledgeTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new PledgeTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Pledge or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Pledge object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PledgeTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \ChurchCRM\model\ChurchCRM\Pledge) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PledgeTableMap::DATABASE_NAME);
            $criteria->add(PledgeTableMap::COL_PLG_PLGID, (array) $values, Criteria::IN);
        }

        $query = PledgeQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            PledgeTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                PledgeTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the pledge_plg table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return PledgeQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Pledge or Criteria object.
     *
     * @param mixed               $criteria Criteria or Pledge object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PledgeTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Pledge object
        }

        if ($criteria->containsKey(PledgeTableMap::COL_PLG_PLGID) && $criteria->keyContainsValue(PledgeTableMap::COL_PLG_PLGID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.PledgeTableMap::COL_PLG_PLGID.')');
        }


        // Set the correct dbName
        $query = PledgeQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // PledgeTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
PledgeTableMap::buildTableMap();
