<?php

namespace ChurchCRM\model\ChurchCRM\Map;

use ChurchCRM\model\ChurchCRM\Group;
use ChurchCRM\model\ChurchCRM\GroupQuery;
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
 * This class defines the structure of the 'group_grp' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class GroupTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ChurchCRM.model.ChurchCRM.Map.GroupTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'group_grp';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\ChurchCRM\\model\\ChurchCRM\\Group';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'ChurchCRM.model.ChurchCRM.Group';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the grp_ID field
     */
    const COL_GRP_ID = 'group_grp.grp_ID';

    /**
     * the column name for the grp_Type field
     */
    const COL_GRP_TYPE = 'group_grp.grp_Type';

    /**
     * the column name for the grp_RoleListID field
     */
    const COL_GRP_ROLELISTID = 'group_grp.grp_RoleListID';

    /**
     * the column name for the grp_DefaultRole field
     */
    const COL_GRP_DEFAULTROLE = 'group_grp.grp_DefaultRole';

    /**
     * the column name for the grp_Name field
     */
    const COL_GRP_NAME = 'group_grp.grp_Name';

    /**
     * the column name for the grp_Description field
     */
    const COL_GRP_DESCRIPTION = 'group_grp.grp_Description';

    /**
     * the column name for the grp_hasSpecialProps field
     */
    const COL_GRP_HASSPECIALPROPS = 'group_grp.grp_hasSpecialProps';

    /**
     * the column name for the grp_active field
     */
    const COL_GRP_ACTIVE = 'group_grp.grp_active';

    /**
     * the column name for the grp_include_email_export field
     */
    const COL_GRP_INCLUDE_EMAIL_EXPORT = 'group_grp.grp_include_email_export';

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
        self::TYPE_PHPNAME       => array('Id', 'Type', 'RoleListId', 'DefaultRole', 'Name', 'Description', 'HasSpecialProps', 'Active', 'IncludeInEmailExport', ),
        self::TYPE_CAMELNAME     => array('id', 'type', 'roleListId', 'defaultRole', 'name', 'description', 'hasSpecialProps', 'active', 'includeInEmailExport', ),
        self::TYPE_COLNAME       => array(GroupTableMap::COL_GRP_ID, GroupTableMap::COL_GRP_TYPE, GroupTableMap::COL_GRP_ROLELISTID, GroupTableMap::COL_GRP_DEFAULTROLE, GroupTableMap::COL_GRP_NAME, GroupTableMap::COL_GRP_DESCRIPTION, GroupTableMap::COL_GRP_HASSPECIALPROPS, GroupTableMap::COL_GRP_ACTIVE, GroupTableMap::COL_GRP_INCLUDE_EMAIL_EXPORT, ),
        self::TYPE_FIELDNAME     => array('grp_ID', 'grp_Type', 'grp_RoleListID', 'grp_DefaultRole', 'grp_Name', 'grp_Description', 'grp_hasSpecialProps', 'grp_active', 'grp_include_email_export', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Type' => 1, 'RoleListId' => 2, 'DefaultRole' => 3, 'Name' => 4, 'Description' => 5, 'HasSpecialProps' => 6, 'Active' => 7, 'IncludeInEmailExport' => 8, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'type' => 1, 'roleListId' => 2, 'defaultRole' => 3, 'name' => 4, 'description' => 5, 'hasSpecialProps' => 6, 'active' => 7, 'includeInEmailExport' => 8, ),
        self::TYPE_COLNAME       => array(GroupTableMap::COL_GRP_ID => 0, GroupTableMap::COL_GRP_TYPE => 1, GroupTableMap::COL_GRP_ROLELISTID => 2, GroupTableMap::COL_GRP_DEFAULTROLE => 3, GroupTableMap::COL_GRP_NAME => 4, GroupTableMap::COL_GRP_DESCRIPTION => 5, GroupTableMap::COL_GRP_HASSPECIALPROPS => 6, GroupTableMap::COL_GRP_ACTIVE => 7, GroupTableMap::COL_GRP_INCLUDE_EMAIL_EXPORT => 8, ),
        self::TYPE_FIELDNAME     => array('grp_ID' => 0, 'grp_Type' => 1, 'grp_RoleListID' => 2, 'grp_DefaultRole' => 3, 'grp_Name' => 4, 'grp_Description' => 5, 'grp_hasSpecialProps' => 6, 'grp_active' => 7, 'grp_include_email_export' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var string[]
     */
    protected $normalizedColumnNameMap = [

        'Id' => 'GRP_ID',
        'Group.Id' => 'GRP_ID',
        'id' => 'GRP_ID',
        'group.id' => 'GRP_ID',
        'GroupTableMap::COL_GRP_ID' => 'GRP_ID',
        'COL_GRP_ID' => 'GRP_ID',
        'grp_ID' => 'GRP_ID',
        'group_grp.grp_ID' => 'GRP_ID',
        'Type' => 'GRP_TYPE',
        'Group.Type' => 'GRP_TYPE',
        'type' => 'GRP_TYPE',
        'group.type' => 'GRP_TYPE',
        'GroupTableMap::COL_GRP_TYPE' => 'GRP_TYPE',
        'COL_GRP_TYPE' => 'GRP_TYPE',
        'grp_Type' => 'GRP_TYPE',
        'group_grp.grp_Type' => 'GRP_TYPE',
        'RoleListId' => 'GRP_ROLELISTID',
        'Group.RoleListId' => 'GRP_ROLELISTID',
        'roleListId' => 'GRP_ROLELISTID',
        'group.roleListId' => 'GRP_ROLELISTID',
        'GroupTableMap::COL_GRP_ROLELISTID' => 'GRP_ROLELISTID',
        'COL_GRP_ROLELISTID' => 'GRP_ROLELISTID',
        'grp_RoleListID' => 'GRP_ROLELISTID',
        'group_grp.grp_RoleListID' => 'GRP_ROLELISTID',
        'DefaultRole' => 'GRP_DEFAULTROLE',
        'Group.DefaultRole' => 'GRP_DEFAULTROLE',
        'defaultRole' => 'GRP_DEFAULTROLE',
        'group.defaultRole' => 'GRP_DEFAULTROLE',
        'GroupTableMap::COL_GRP_DEFAULTROLE' => 'GRP_DEFAULTROLE',
        'COL_GRP_DEFAULTROLE' => 'GRP_DEFAULTROLE',
        'grp_DefaultRole' => 'GRP_DEFAULTROLE',
        'group_grp.grp_DefaultRole' => 'GRP_DEFAULTROLE',
        'Name' => 'GRP_NAME',
        'Group.Name' => 'GRP_NAME',
        'name' => 'GRP_NAME',
        'group.name' => 'GRP_NAME',
        'GroupTableMap::COL_GRP_NAME' => 'GRP_NAME',
        'COL_GRP_NAME' => 'GRP_NAME',
        'grp_Name' => 'GRP_NAME',
        'group_grp.grp_Name' => 'GRP_NAME',
        'Description' => 'GRP_DESCRIPTION',
        'Group.Description' => 'GRP_DESCRIPTION',
        'description' => 'GRP_DESCRIPTION',
        'group.description' => 'GRP_DESCRIPTION',
        'GroupTableMap::COL_GRP_DESCRIPTION' => 'GRP_DESCRIPTION',
        'COL_GRP_DESCRIPTION' => 'GRP_DESCRIPTION',
        'grp_Description' => 'GRP_DESCRIPTION',
        'group_grp.grp_Description' => 'GRP_DESCRIPTION',
        'HasSpecialProps' => 'GRP_HASSPECIALPROPS',
        'Group.HasSpecialProps' => 'GRP_HASSPECIALPROPS',
        'hasSpecialProps' => 'GRP_HASSPECIALPROPS',
        'group.hasSpecialProps' => 'GRP_HASSPECIALPROPS',
        'GroupTableMap::COL_GRP_HASSPECIALPROPS' => 'GRP_HASSPECIALPROPS',
        'COL_GRP_HASSPECIALPROPS' => 'GRP_HASSPECIALPROPS',
        'grp_hasSpecialProps' => 'GRP_HASSPECIALPROPS',
        'group_grp.grp_hasSpecialProps' => 'GRP_HASSPECIALPROPS',
        'Active' => 'GRP_ACTIVE',
        'Group.Active' => 'GRP_ACTIVE',
        'active' => 'GRP_ACTIVE',
        'group.active' => 'GRP_ACTIVE',
        'GroupTableMap::COL_GRP_ACTIVE' => 'GRP_ACTIVE',
        'COL_GRP_ACTIVE' => 'GRP_ACTIVE',
        'grp_active' => 'GRP_ACTIVE',
        'group_grp.grp_active' => 'GRP_ACTIVE',
        'IncludeInEmailExport' => 'GRP_INCLUDE_EMAIL_EXPORT',
        'Group.IncludeInEmailExport' => 'GRP_INCLUDE_EMAIL_EXPORT',
        'includeInEmailExport' => 'GRP_INCLUDE_EMAIL_EXPORT',
        'group.includeInEmailExport' => 'GRP_INCLUDE_EMAIL_EXPORT',
        'GroupTableMap::COL_GRP_INCLUDE_EMAIL_EXPORT' => 'GRP_INCLUDE_EMAIL_EXPORT',
        'COL_GRP_INCLUDE_EMAIL_EXPORT' => 'GRP_INCLUDE_EMAIL_EXPORT',
        'grp_include_email_export' => 'GRP_INCLUDE_EMAIL_EXPORT',
        'group_grp.grp_include_email_export' => 'GRP_INCLUDE_EMAIL_EXPORT',
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
        $this->setName('group_grp');
        $this->setPhpName('Group');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\ChurchCRM\\model\\ChurchCRM\\Group');
        $this->setPackage('ChurchCRM.model.ChurchCRM');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('grp_ID', 'Id', 'SMALLINT', true, 8, null);
        $this->addForeignKey('grp_Type', 'Type', 'TINYINT', 'list_lst', 'lst_OptionID', true, null, 0);
        $this->addForeignKey('grp_RoleListID', 'RoleListId', 'SMALLINT', 'list_lst', 'lst_ID', true, 8, 0);
        $this->addColumn('grp_DefaultRole', 'DefaultRole', 'SMALLINT', true, 9, 0);
        $this->addColumn('grp_Name', 'Name', 'VARCHAR', true, 50, '');
        $this->addColumn('grp_Description', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('grp_hasSpecialProps', 'HasSpecialProps', 'BOOLEAN', false, 1, false);
        $this->addColumn('grp_active', 'Active', 'BOOLEAN', true, 1, null);
        $this->addColumn('grp_include_email_export', 'IncludeInEmailExport', 'BOOLEAN', true, 1, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ListOption', '\\ChurchCRM\\model\\ChurchCRM\\ListOption', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':grp_RoleListID',
    1 => ':lst_ID',
  ),
  1 =>
  array (
    0 => ':grp_Type',
    1 => ':lst_OptionID',
  ),
), null, null, null, false);
        $this->addRelation('Person2group2roleP2g2r', '\\ChurchCRM\\model\\ChurchCRM\\Person2group2roleP2g2r', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':p2g2r_grp_ID',
    1 => ':grp_ID',
  ),
), null, null, 'Person2group2roleP2g2rs', false);
        $this->addRelation('EventType', '\\ChurchCRM\\model\\ChurchCRM\\EventType', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':type_grpid',
    1 => ':grp_ID',
  ),
), null, null, 'EventTypes', false);
        $this->addRelation('EventAudience', '\\ChurchCRM\\model\\ChurchCRM\\EventAudience', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':group_id',
    1 => ':grp_ID',
  ),
), null, null, 'EventAudiences', false);
        $this->addRelation('Event', '\\ChurchCRM\\model\\ChurchCRM\\Event', RelationMap::MANY_TO_MANY, array(), null, null, 'Events');
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
        return $withPrefix ? GroupTableMap::CLASS_DEFAULT : GroupTableMap::OM_CLASS;
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
     * @return array           (Group object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = GroupTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = GroupTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + GroupTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = GroupTableMap::OM_CLASS;
            /** @var Group $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            GroupTableMap::addInstanceToPool($obj, $key);
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
            $key = GroupTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = GroupTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Group $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                GroupTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(GroupTableMap::COL_GRP_ID);
            $criteria->addSelectColumn(GroupTableMap::COL_GRP_TYPE);
            $criteria->addSelectColumn(GroupTableMap::COL_GRP_ROLELISTID);
            $criteria->addSelectColumn(GroupTableMap::COL_GRP_DEFAULTROLE);
            $criteria->addSelectColumn(GroupTableMap::COL_GRP_NAME);
            $criteria->addSelectColumn(GroupTableMap::COL_GRP_DESCRIPTION);
            $criteria->addSelectColumn(GroupTableMap::COL_GRP_HASSPECIALPROPS);
            $criteria->addSelectColumn(GroupTableMap::COL_GRP_ACTIVE);
            $criteria->addSelectColumn(GroupTableMap::COL_GRP_INCLUDE_EMAIL_EXPORT);
        } else {
            $criteria->addSelectColumn($alias . '.grp_ID');
            $criteria->addSelectColumn($alias . '.grp_Type');
            $criteria->addSelectColumn($alias . '.grp_RoleListID');
            $criteria->addSelectColumn($alias . '.grp_DefaultRole');
            $criteria->addSelectColumn($alias . '.grp_Name');
            $criteria->addSelectColumn($alias . '.grp_Description');
            $criteria->addSelectColumn($alias . '.grp_hasSpecialProps');
            $criteria->addSelectColumn($alias . '.grp_active');
            $criteria->addSelectColumn($alias . '.grp_include_email_export');
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
            $criteria->removeSelectColumn(GroupTableMap::COL_GRP_ID);
            $criteria->removeSelectColumn(GroupTableMap::COL_GRP_TYPE);
            $criteria->removeSelectColumn(GroupTableMap::COL_GRP_ROLELISTID);
            $criteria->removeSelectColumn(GroupTableMap::COL_GRP_DEFAULTROLE);
            $criteria->removeSelectColumn(GroupTableMap::COL_GRP_NAME);
            $criteria->removeSelectColumn(GroupTableMap::COL_GRP_DESCRIPTION);
            $criteria->removeSelectColumn(GroupTableMap::COL_GRP_HASSPECIALPROPS);
            $criteria->removeSelectColumn(GroupTableMap::COL_GRP_ACTIVE);
            $criteria->removeSelectColumn(GroupTableMap::COL_GRP_INCLUDE_EMAIL_EXPORT);
        } else {
            $criteria->removeSelectColumn($alias . '.grp_ID');
            $criteria->removeSelectColumn($alias . '.grp_Type');
            $criteria->removeSelectColumn($alias . '.grp_RoleListID');
            $criteria->removeSelectColumn($alias . '.grp_DefaultRole');
            $criteria->removeSelectColumn($alias . '.grp_Name');
            $criteria->removeSelectColumn($alias . '.grp_Description');
            $criteria->removeSelectColumn($alias . '.grp_hasSpecialProps');
            $criteria->removeSelectColumn($alias . '.grp_active');
            $criteria->removeSelectColumn($alias . '.grp_include_email_export');
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
        return Propel::getServiceContainer()->getDatabaseMap(GroupTableMap::DATABASE_NAME)->getTable(GroupTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(GroupTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(GroupTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new GroupTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Group or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Group object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(GroupTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \ChurchCRM\model\ChurchCRM\Group) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(GroupTableMap::DATABASE_NAME);
            $criteria->add(GroupTableMap::COL_GRP_ID, (array) $values, Criteria::IN);
        }

        $query = GroupQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            GroupTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                GroupTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the group_grp table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return GroupQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Group or Criteria object.
     *
     * @param mixed               $criteria Criteria or Group object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(GroupTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Group object
        }

        if ($criteria->containsKey(GroupTableMap::COL_GRP_ID) && $criteria->keyContainsValue(GroupTableMap::COL_GRP_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.GroupTableMap::COL_GRP_ID.')');
        }


        // Set the correct dbName
        $query = GroupQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // GroupTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
GroupTableMap::buildTableMap();
