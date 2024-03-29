<?php

namespace ChurchCRM\model\ChurchCRM\Base;

use \Exception;
use \PDO;
use ChurchCRM\model\ChurchCRM\Group as ChildGroup;
use ChurchCRM\model\ChurchCRM\GroupQuery as ChildGroupQuery;
use ChurchCRM\model\ChurchCRM\Map\GroupTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'group_grp' table.
 *
 * This contains the name and description for each group, as well as foreign keys to the list of group roles
 *
 * @method     ChildGroupQuery orderById($order = Criteria::ASC) Order by the grp_ID column
 * @method     ChildGroupQuery orderByType($order = Criteria::ASC) Order by the grp_Type column
 * @method     ChildGroupQuery orderByRoleListId($order = Criteria::ASC) Order by the grp_RoleListID column
 * @method     ChildGroupQuery orderByDefaultRole($order = Criteria::ASC) Order by the grp_DefaultRole column
 * @method     ChildGroupQuery orderByName($order = Criteria::ASC) Order by the grp_Name column
 * @method     ChildGroupQuery orderByDescription($order = Criteria::ASC) Order by the grp_Description column
 * @method     ChildGroupQuery orderByHasSpecialProps($order = Criteria::ASC) Order by the grp_hasSpecialProps column
 * @method     ChildGroupQuery orderByActive($order = Criteria::ASC) Order by the grp_active column
 * @method     ChildGroupQuery orderByIncludeInEmailExport($order = Criteria::ASC) Order by the grp_include_email_export column
 *
 * @method     ChildGroupQuery groupById() Group by the grp_ID column
 * @method     ChildGroupQuery groupByType() Group by the grp_Type column
 * @method     ChildGroupQuery groupByRoleListId() Group by the grp_RoleListID column
 * @method     ChildGroupQuery groupByDefaultRole() Group by the grp_DefaultRole column
 * @method     ChildGroupQuery groupByName() Group by the grp_Name column
 * @method     ChildGroupQuery groupByDescription() Group by the grp_Description column
 * @method     ChildGroupQuery groupByHasSpecialProps() Group by the grp_hasSpecialProps column
 * @method     ChildGroupQuery groupByActive() Group by the grp_active column
 * @method     ChildGroupQuery groupByIncludeInEmailExport() Group by the grp_include_email_export column
 *
 * @method     ChildGroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildGroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildGroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildGroupQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildGroupQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildGroupQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildGroupQuery leftJoinListOption($relationAlias = null) Adds a LEFT JOIN clause to the query using the ListOption relation
 * @method     ChildGroupQuery rightJoinListOption($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ListOption relation
 * @method     ChildGroupQuery innerJoinListOption($relationAlias = null) Adds a INNER JOIN clause to the query using the ListOption relation
 *
 * @method     ChildGroupQuery joinWithListOption($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ListOption relation
 *
 * @method     ChildGroupQuery leftJoinWithListOption() Adds a LEFT JOIN clause and with to the query using the ListOption relation
 * @method     ChildGroupQuery rightJoinWithListOption() Adds a RIGHT JOIN clause and with to the query using the ListOption relation
 * @method     ChildGroupQuery innerJoinWithListOption() Adds a INNER JOIN clause and with to the query using the ListOption relation
 *
 * @method     ChildGroupQuery leftJoinPerson2group2roleP2g2r($relationAlias = null) Adds a LEFT JOIN clause to the query using the Person2group2roleP2g2r relation
 * @method     ChildGroupQuery rightJoinPerson2group2roleP2g2r($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Person2group2roleP2g2r relation
 * @method     ChildGroupQuery innerJoinPerson2group2roleP2g2r($relationAlias = null) Adds a INNER JOIN clause to the query using the Person2group2roleP2g2r relation
 *
 * @method     ChildGroupQuery joinWithPerson2group2roleP2g2r($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Person2group2roleP2g2r relation
 *
 * @method     ChildGroupQuery leftJoinWithPerson2group2roleP2g2r() Adds a LEFT JOIN clause and with to the query using the Person2group2roleP2g2r relation
 * @method     ChildGroupQuery rightJoinWithPerson2group2roleP2g2r() Adds a RIGHT JOIN clause and with to the query using the Person2group2roleP2g2r relation
 * @method     ChildGroupQuery innerJoinWithPerson2group2roleP2g2r() Adds a INNER JOIN clause and with to the query using the Person2group2roleP2g2r relation
 *
 * @method     ChildGroupQuery leftJoinEventType($relationAlias = null) Adds a LEFT JOIN clause to the query using the EventType relation
 * @method     ChildGroupQuery rightJoinEventType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EventType relation
 * @method     ChildGroupQuery innerJoinEventType($relationAlias = null) Adds a INNER JOIN clause to the query using the EventType relation
 *
 * @method     ChildGroupQuery joinWithEventType($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EventType relation
 *
 * @method     ChildGroupQuery leftJoinWithEventType() Adds a LEFT JOIN clause and with to the query using the EventType relation
 * @method     ChildGroupQuery rightJoinWithEventType() Adds a RIGHT JOIN clause and with to the query using the EventType relation
 * @method     ChildGroupQuery innerJoinWithEventType() Adds a INNER JOIN clause and with to the query using the EventType relation
 *
 * @method     ChildGroupQuery leftJoinEventAudience($relationAlias = null) Adds a LEFT JOIN clause to the query using the EventAudience relation
 * @method     ChildGroupQuery rightJoinEventAudience($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EventAudience relation
 * @method     ChildGroupQuery innerJoinEventAudience($relationAlias = null) Adds a INNER JOIN clause to the query using the EventAudience relation
 *
 * @method     ChildGroupQuery joinWithEventAudience($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EventAudience relation
 *
 * @method     ChildGroupQuery leftJoinWithEventAudience() Adds a LEFT JOIN clause and with to the query using the EventAudience relation
 * @method     ChildGroupQuery rightJoinWithEventAudience() Adds a RIGHT JOIN clause and with to the query using the EventAudience relation
 * @method     ChildGroupQuery innerJoinWithEventAudience() Adds a INNER JOIN clause and with to the query using the EventAudience relation
 *
 * @method     \ChurchCRM\model\ChurchCRM\ListOptionQuery|\ChurchCRM\model\ChurchCRM\Person2group2roleP2g2rQuery|\ChurchCRM\model\ChurchCRM\EventTypeQuery|\ChurchCRM\model\ChurchCRM\EventAudienceQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildGroup|null findOne(ConnectionInterface $con = null) Return the first ChildGroup matching the query
 * @method     ChildGroup findOneOrCreate(ConnectionInterface $con = null) Return the first ChildGroup matching the query, or a new ChildGroup object populated from the query conditions when no match is found
 *
 * @method     ChildGroup|null findOneById(int $grp_ID) Return the first ChildGroup filtered by the grp_ID column
 * @method     ChildGroup|null findOneByType(int $grp_Type) Return the first ChildGroup filtered by the grp_Type column
 * @method     ChildGroup|null findOneByRoleListId(int $grp_RoleListID) Return the first ChildGroup filtered by the grp_RoleListID column
 * @method     ChildGroup|null findOneByDefaultRole(int $grp_DefaultRole) Return the first ChildGroup filtered by the grp_DefaultRole column
 * @method     ChildGroup|null findOneByName(string $grp_Name) Return the first ChildGroup filtered by the grp_Name column
 * @method     ChildGroup|null findOneByDescription(string $grp_Description) Return the first ChildGroup filtered by the grp_Description column
 * @method     ChildGroup|null findOneByHasSpecialProps(boolean $grp_hasSpecialProps) Return the first ChildGroup filtered by the grp_hasSpecialProps column
 * @method     ChildGroup|null findOneByActive(boolean $grp_active) Return the first ChildGroup filtered by the grp_active column
 * @method     ChildGroup|null findOneByIncludeInEmailExport(boolean $grp_include_email_export) Return the first ChildGroup filtered by the grp_include_email_export column *

 * @method     ChildGroup requirePk($key, ConnectionInterface $con = null) Return the ChildGroup by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGroup requireOne(ConnectionInterface $con = null) Return the first ChildGroup matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGroup requireOneById(int $grp_ID) Return the first ChildGroup filtered by the grp_ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGroup requireOneByType(int $grp_Type) Return the first ChildGroup filtered by the grp_Type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGroup requireOneByRoleListId(int $grp_RoleListID) Return the first ChildGroup filtered by the grp_RoleListID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGroup requireOneByDefaultRole(int $grp_DefaultRole) Return the first ChildGroup filtered by the grp_DefaultRole column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGroup requireOneByName(string $grp_Name) Return the first ChildGroup filtered by the grp_Name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGroup requireOneByDescription(string $grp_Description) Return the first ChildGroup filtered by the grp_Description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGroup requireOneByHasSpecialProps(boolean $grp_hasSpecialProps) Return the first ChildGroup filtered by the grp_hasSpecialProps column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGroup requireOneByActive(boolean $grp_active) Return the first ChildGroup filtered by the grp_active column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGroup requireOneByIncludeInEmailExport(boolean $grp_include_email_export) Return the first ChildGroup filtered by the grp_include_email_export column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGroup[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildGroup objects based on current ModelCriteria
 * @method     ChildGroup[]|ObjectCollection findById(int $grp_ID) Return ChildGroup objects filtered by the grp_ID column
 * @method     ChildGroup[]|ObjectCollection findByType(int $grp_Type) Return ChildGroup objects filtered by the grp_Type column
 * @method     ChildGroup[]|ObjectCollection findByRoleListId(int $grp_RoleListID) Return ChildGroup objects filtered by the grp_RoleListID column
 * @method     ChildGroup[]|ObjectCollection findByDefaultRole(int $grp_DefaultRole) Return ChildGroup objects filtered by the grp_DefaultRole column
 * @method     ChildGroup[]|ObjectCollection findByName(string $grp_Name) Return ChildGroup objects filtered by the grp_Name column
 * @method     ChildGroup[]|ObjectCollection findByDescription(string $grp_Description) Return ChildGroup objects filtered by the grp_Description column
 * @method     ChildGroup[]|ObjectCollection findByHasSpecialProps(boolean $grp_hasSpecialProps) Return ChildGroup objects filtered by the grp_hasSpecialProps column
 * @method     ChildGroup[]|ObjectCollection findByActive(boolean $grp_active) Return ChildGroup objects filtered by the grp_active column
 * @method     ChildGroup[]|ObjectCollection findByIncludeInEmailExport(boolean $grp_include_email_export) Return ChildGroup objects filtered by the grp_include_email_export column
 * @method     ChildGroup[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class GroupQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \ChurchCRM\model\ChurchCRM\Base\GroupQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\ChurchCRM\\model\\ChurchCRM\\Group', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildGroupQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildGroupQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildGroupQuery) {
            return $criteria;
        }
        $query = new ChildGroupQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildGroup|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(GroupTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = GroupTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildGroup A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT grp_ID, grp_Type, grp_RoleListID, grp_DefaultRole, grp_Name, grp_Description, grp_hasSpecialProps, grp_active, grp_include_email_export FROM group_grp WHERE grp_ID = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildGroup $obj */
            $obj = new ChildGroup();
            $obj->hydrate($row);
            GroupTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildGroup|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(GroupTableMap::COL_GRP_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(GroupTableMap::COL_GRP_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the grp_ID column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE grp_ID = 1234
     * $query->filterById(array(12, 34)); // WHERE grp_ID IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE grp_ID > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGroupQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(GroupTableMap::COL_GRP_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(GroupTableMap::COL_GRP_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GroupTableMap::COL_GRP_ID, $id, $comparison);
    }

    /**
     * Filter the query on the grp_Type column
     *
     * Example usage:
     * <code>
     * $query->filterByType(1234); // WHERE grp_Type = 1234
     * $query->filterByType(array(12, 34)); // WHERE grp_Type IN (12, 34)
     * $query->filterByType(array('min' => 12)); // WHERE grp_Type > 12
     * </code>
     *
     * @see       filterByListOption()
     *
     * @param     mixed $type The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGroupQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (is_array($type)) {
            $useMinMax = false;
            if (isset($type['min'])) {
                $this->addUsingAlias(GroupTableMap::COL_GRP_TYPE, $type['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($type['max'])) {
                $this->addUsingAlias(GroupTableMap::COL_GRP_TYPE, $type['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GroupTableMap::COL_GRP_TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the grp_RoleListID column
     *
     * Example usage:
     * <code>
     * $query->filterByRoleListId(1234); // WHERE grp_RoleListID = 1234
     * $query->filterByRoleListId(array(12, 34)); // WHERE grp_RoleListID IN (12, 34)
     * $query->filterByRoleListId(array('min' => 12)); // WHERE grp_RoleListID > 12
     * </code>
     *
     * @see       filterByListOption()
     *
     * @param     mixed $roleListId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGroupQuery The current query, for fluid interface
     */
    public function filterByRoleListId($roleListId = null, $comparison = null)
    {
        if (is_array($roleListId)) {
            $useMinMax = false;
            if (isset($roleListId['min'])) {
                $this->addUsingAlias(GroupTableMap::COL_GRP_ROLELISTID, $roleListId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($roleListId['max'])) {
                $this->addUsingAlias(GroupTableMap::COL_GRP_ROLELISTID, $roleListId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GroupTableMap::COL_GRP_ROLELISTID, $roleListId, $comparison);
    }

    /**
     * Filter the query on the grp_DefaultRole column
     *
     * Example usage:
     * <code>
     * $query->filterByDefaultRole(1234); // WHERE grp_DefaultRole = 1234
     * $query->filterByDefaultRole(array(12, 34)); // WHERE grp_DefaultRole IN (12, 34)
     * $query->filterByDefaultRole(array('min' => 12)); // WHERE grp_DefaultRole > 12
     * </code>
     *
     * @param     mixed $defaultRole The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGroupQuery The current query, for fluid interface
     */
    public function filterByDefaultRole($defaultRole = null, $comparison = null)
    {
        if (is_array($defaultRole)) {
            $useMinMax = false;
            if (isset($defaultRole['min'])) {
                $this->addUsingAlias(GroupTableMap::COL_GRP_DEFAULTROLE, $defaultRole['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($defaultRole['max'])) {
                $this->addUsingAlias(GroupTableMap::COL_GRP_DEFAULTROLE, $defaultRole['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GroupTableMap::COL_GRP_DEFAULTROLE, $defaultRole, $comparison);
    }

    /**
     * Filter the query on the grp_Name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE grp_Name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE grp_Name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGroupQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GroupTableMap::COL_GRP_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the grp_Description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE grp_Description = 'fooValue'
     * $query->filterByDescription('%fooValue%', Criteria::LIKE); // WHERE grp_Description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGroupQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GroupTableMap::COL_GRP_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the grp_hasSpecialProps column
     *
     * Example usage:
     * <code>
     * $query->filterByHasSpecialProps(true); // WHERE grp_hasSpecialProps = true
     * $query->filterByHasSpecialProps('yes'); // WHERE grp_hasSpecialProps = true
     * </code>
     *
     * @param     boolean|string $hasSpecialProps The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGroupQuery The current query, for fluid interface
     */
    public function filterByHasSpecialProps($hasSpecialProps = null, $comparison = null)
    {
        if (is_string($hasSpecialProps)) {
            $hasSpecialProps = in_array(strtolower($hasSpecialProps), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(GroupTableMap::COL_GRP_HASSPECIALPROPS, $hasSpecialProps, $comparison);
    }

    /**
     * Filter the query on the grp_active column
     *
     * Example usage:
     * <code>
     * $query->filterByActive(true); // WHERE grp_active = true
     * $query->filterByActive('yes'); // WHERE grp_active = true
     * </code>
     *
     * @param     boolean|string $active The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGroupQuery The current query, for fluid interface
     */
    public function filterByActive($active = null, $comparison = null)
    {
        if (is_string($active)) {
            $active = in_array(strtolower($active), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(GroupTableMap::COL_GRP_ACTIVE, $active, $comparison);
    }

    /**
     * Filter the query on the grp_include_email_export column
     *
     * Example usage:
     * <code>
     * $query->filterByIncludeInEmailExport(true); // WHERE grp_include_email_export = true
     * $query->filterByIncludeInEmailExport('yes'); // WHERE grp_include_email_export = true
     * </code>
     *
     * @param     boolean|string $includeInEmailExport The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGroupQuery The current query, for fluid interface
     */
    public function filterByIncludeInEmailExport($includeInEmailExport = null, $comparison = null)
    {
        if (is_string($includeInEmailExport)) {
            $includeInEmailExport = in_array(strtolower($includeInEmailExport), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(GroupTableMap::COL_GRP_INCLUDE_EMAIL_EXPORT, $includeInEmailExport, $comparison);
    }

    /**
     * Filter the query by a related \ChurchCRM\model\ChurchCRM\ListOption object
     *
     * @param \ChurchCRM\model\ChurchCRM\ListOption $listOption The related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildGroupQuery The current query, for fluid interface
     */
    public function filterByListOption($listOption, $comparison = null)
    {
        if ($listOption instanceof \ChurchCRM\model\ChurchCRM\ListOption) {
            return $this
                ->addUsingAlias(GroupTableMap::COL_GRP_ROLELISTID, $listOption->getId(), $comparison)
                ->addUsingAlias(GroupTableMap::COL_GRP_TYPE, $listOption->getOptionId(), $comparison);
        } else {
            throw new PropelException('filterByListOption() only accepts arguments of type \ChurchCRM\model\ChurchCRM\ListOption');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ListOption relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildGroupQuery The current query, for fluid interface
     */
    public function joinListOption($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ListOption');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'ListOption');
        }

        return $this;
    }

    /**
     * Use the ListOption relation ListOption object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ChurchCRM\model\ChurchCRM\ListOptionQuery A secondary query class using the current class as primary query
     */
    public function useListOptionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinListOption($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ListOption', '\ChurchCRM\model\ChurchCRM\ListOptionQuery');
    }

    /**
     * Filter the query by a related \ChurchCRM\model\ChurchCRM\Person2group2roleP2g2r object
     *
     * @param \ChurchCRM\model\ChurchCRM\Person2group2roleP2g2r|ObjectCollection $person2group2roleP2g2r the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildGroupQuery The current query, for fluid interface
     */
    public function filterByPerson2group2roleP2g2r($person2group2roleP2g2r, $comparison = null)
    {
        if ($person2group2roleP2g2r instanceof \ChurchCRM\model\ChurchCRM\Person2group2roleP2g2r) {
            return $this
                ->addUsingAlias(GroupTableMap::COL_GRP_ID, $person2group2roleP2g2r->getGroupId(), $comparison);
        } elseif ($person2group2roleP2g2r instanceof ObjectCollection) {
            return $this
                ->usePerson2group2roleP2g2rQuery()
                ->filterByPrimaryKeys($person2group2roleP2g2r->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPerson2group2roleP2g2r() only accepts arguments of type \ChurchCRM\model\ChurchCRM\Person2group2roleP2g2r or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Person2group2roleP2g2r relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildGroupQuery The current query, for fluid interface
     */
    public function joinPerson2group2roleP2g2r($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Person2group2roleP2g2r');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Person2group2roleP2g2r');
        }

        return $this;
    }

    /**
     * Use the Person2group2roleP2g2r relation Person2group2roleP2g2r object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ChurchCRM\model\ChurchCRM\Person2group2roleP2g2rQuery A secondary query class using the current class as primary query
     */
    public function usePerson2group2roleP2g2rQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPerson2group2roleP2g2r($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Person2group2roleP2g2r', '\ChurchCRM\model\ChurchCRM\Person2group2roleP2g2rQuery');
    }

    /**
     * Filter the query by a related \ChurchCRM\model\ChurchCRM\EventType object
     *
     * @param \ChurchCRM\model\ChurchCRM\EventType|ObjectCollection $eventType the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildGroupQuery The current query, for fluid interface
     */
    public function filterByEventType($eventType, $comparison = null)
    {
        if ($eventType instanceof \ChurchCRM\model\ChurchCRM\EventType) {
            return $this
                ->addUsingAlias(GroupTableMap::COL_GRP_ID, $eventType->getGroupId(), $comparison);
        } elseif ($eventType instanceof ObjectCollection) {
            return $this
                ->useEventTypeQuery()
                ->filterByPrimaryKeys($eventType->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEventType() only accepts arguments of type \ChurchCRM\model\ChurchCRM\EventType or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EventType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildGroupQuery The current query, for fluid interface
     */
    public function joinEventType($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EventType');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'EventType');
        }

        return $this;
    }

    /**
     * Use the EventType relation EventType object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ChurchCRM\model\ChurchCRM\EventTypeQuery A secondary query class using the current class as primary query
     */
    public function useEventTypeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEventType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EventType', '\ChurchCRM\model\ChurchCRM\EventTypeQuery');
    }

    /**
     * Filter the query by a related \ChurchCRM\model\ChurchCRM\EventAudience object
     *
     * @param \ChurchCRM\model\ChurchCRM\EventAudience|ObjectCollection $eventAudience the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildGroupQuery The current query, for fluid interface
     */
    public function filterByEventAudience($eventAudience, $comparison = null)
    {
        if ($eventAudience instanceof \ChurchCRM\model\ChurchCRM\EventAudience) {
            return $this
                ->addUsingAlias(GroupTableMap::COL_GRP_ID, $eventAudience->getGroupId(), $comparison);
        } elseif ($eventAudience instanceof ObjectCollection) {
            return $this
                ->useEventAudienceQuery()
                ->filterByPrimaryKeys($eventAudience->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEventAudience() only accepts arguments of type \ChurchCRM\model\ChurchCRM\EventAudience or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EventAudience relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildGroupQuery The current query, for fluid interface
     */
    public function joinEventAudience($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EventAudience');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'EventAudience');
        }

        return $this;
    }

    /**
     * Use the EventAudience relation EventAudience object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ChurchCRM\model\ChurchCRM\EventAudienceQuery A secondary query class using the current class as primary query
     */
    public function useEventAudienceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEventAudience($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EventAudience', '\ChurchCRM\model\ChurchCRM\EventAudienceQuery');
    }

    /**
     * Filter the query by a related Event object
     * using the event_audience table as cross reference
     *
     * @param Event $event the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildGroupQuery The current query, for fluid interface
     */
    public function filterByEvent($event, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useEventAudienceQuery()
            ->filterByEvent($event, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   ChildGroup $group Object to remove from the list of results
     *
     * @return $this|ChildGroupQuery The current query, for fluid interface
     */
    public function prune($group = null)
    {
        if ($group) {
            $this->addUsingAlias(GroupTableMap::COL_GRP_ID, $group->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the group_grp table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(GroupTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            GroupTableMap::clearInstancePool();
            GroupTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(GroupTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(GroupTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            GroupTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            GroupTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // GroupQuery
