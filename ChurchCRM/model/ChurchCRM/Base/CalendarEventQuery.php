<?php

namespace ChurchCRM\model\ChurchCRM\Base;

use \Exception;
use \PDO;
use ChurchCRM\model\ChurchCRM\CalendarEvent as ChildCalendarEvent;
use ChurchCRM\model\ChurchCRM\CalendarEventQuery as ChildCalendarEventQuery;
use ChurchCRM\model\ChurchCRM\Map\CalendarEventTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'calendar_events' table.
 *
 * This is a join-table to link an event with a calendar
 *
 * @method     ChildCalendarEventQuery orderByCalendarId($order = Criteria::ASC) Order by the calendar_id column
 * @method     ChildCalendarEventQuery orderByEventId($order = Criteria::ASC) Order by the event_id column
 *
 * @method     ChildCalendarEventQuery groupByCalendarId() Group by the calendar_id column
 * @method     ChildCalendarEventQuery groupByEventId() Group by the event_id column
 *
 * @method     ChildCalendarEventQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCalendarEventQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCalendarEventQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCalendarEventQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCalendarEventQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCalendarEventQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCalendarEventQuery leftJoinCalendar($relationAlias = null) Adds a LEFT JOIN clause to the query using the Calendar relation
 * @method     ChildCalendarEventQuery rightJoinCalendar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Calendar relation
 * @method     ChildCalendarEventQuery innerJoinCalendar($relationAlias = null) Adds a INNER JOIN clause to the query using the Calendar relation
 *
 * @method     ChildCalendarEventQuery joinWithCalendar($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Calendar relation
 *
 * @method     ChildCalendarEventQuery leftJoinWithCalendar() Adds a LEFT JOIN clause and with to the query using the Calendar relation
 * @method     ChildCalendarEventQuery rightJoinWithCalendar() Adds a RIGHT JOIN clause and with to the query using the Calendar relation
 * @method     ChildCalendarEventQuery innerJoinWithCalendar() Adds a INNER JOIN clause and with to the query using the Calendar relation
 *
 * @method     ChildCalendarEventQuery leftJoinEvent($relationAlias = null) Adds a LEFT JOIN clause to the query using the Event relation
 * @method     ChildCalendarEventQuery rightJoinEvent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Event relation
 * @method     ChildCalendarEventQuery innerJoinEvent($relationAlias = null) Adds a INNER JOIN clause to the query using the Event relation
 *
 * @method     ChildCalendarEventQuery joinWithEvent($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Event relation
 *
 * @method     ChildCalendarEventQuery leftJoinWithEvent() Adds a LEFT JOIN clause and with to the query using the Event relation
 * @method     ChildCalendarEventQuery rightJoinWithEvent() Adds a RIGHT JOIN clause and with to the query using the Event relation
 * @method     ChildCalendarEventQuery innerJoinWithEvent() Adds a INNER JOIN clause and with to the query using the Event relation
 *
 * @method     \ChurchCRM\model\ChurchCRM\CalendarQuery|\ChurchCRM\model\ChurchCRM\EventQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCalendarEvent|null findOne(ConnectionInterface $con = null) Return the first ChildCalendarEvent matching the query
 * @method     ChildCalendarEvent findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCalendarEvent matching the query, or a new ChildCalendarEvent object populated from the query conditions when no match is found
 *
 * @method     ChildCalendarEvent|null findOneByCalendarId(int $calendar_id) Return the first ChildCalendarEvent filtered by the calendar_id column
 * @method     ChildCalendarEvent|null findOneByEventId(int $event_id) Return the first ChildCalendarEvent filtered by the event_id column *

 * @method     ChildCalendarEvent requirePk($key, ConnectionInterface $con = null) Return the ChildCalendarEvent by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCalendarEvent requireOne(ConnectionInterface $con = null) Return the first ChildCalendarEvent matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCalendarEvent requireOneByCalendarId(int $calendar_id) Return the first ChildCalendarEvent filtered by the calendar_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCalendarEvent requireOneByEventId(int $event_id) Return the first ChildCalendarEvent filtered by the event_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCalendarEvent[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCalendarEvent objects based on current ModelCriteria
 * @method     ChildCalendarEvent[]|ObjectCollection findByCalendarId(int $calendar_id) Return ChildCalendarEvent objects filtered by the calendar_id column
 * @method     ChildCalendarEvent[]|ObjectCollection findByEventId(int $event_id) Return ChildCalendarEvent objects filtered by the event_id column
 * @method     ChildCalendarEvent[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CalendarEventQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \ChurchCRM\model\ChurchCRM\Base\CalendarEventQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\ChurchCRM\\model\\ChurchCRM\\CalendarEvent', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCalendarEventQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCalendarEventQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCalendarEventQuery) {
            return $criteria;
        }
        $query = new ChildCalendarEventQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$calendar_id, $event_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildCalendarEvent|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CalendarEventTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CalendarEventTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildCalendarEvent A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT calendar_id, event_id FROM calendar_events WHERE calendar_id = :p0 AND event_id = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildCalendarEvent $obj */
            $obj = new ChildCalendarEvent();
            $obj->hydrate($row);
            CalendarEventTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildCalendarEvent|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
     * @return $this|ChildCalendarEventQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(CalendarEventTableMap::COL_CALENDAR_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(CalendarEventTableMap::COL_EVENT_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCalendarEventQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(CalendarEventTableMap::COL_CALENDAR_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(CalendarEventTableMap::COL_EVENT_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the calendar_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCalendarId(1234); // WHERE calendar_id = 1234
     * $query->filterByCalendarId(array(12, 34)); // WHERE calendar_id IN (12, 34)
     * $query->filterByCalendarId(array('min' => 12)); // WHERE calendar_id > 12
     * </code>
     *
     * @see       filterByCalendar()
     *
     * @param     mixed $calendarId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCalendarEventQuery The current query, for fluid interface
     */
    public function filterByCalendarId($calendarId = null, $comparison = null)
    {
        if (is_array($calendarId)) {
            $useMinMax = false;
            if (isset($calendarId['min'])) {
                $this->addUsingAlias(CalendarEventTableMap::COL_CALENDAR_ID, $calendarId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($calendarId['max'])) {
                $this->addUsingAlias(CalendarEventTableMap::COL_CALENDAR_ID, $calendarId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CalendarEventTableMap::COL_CALENDAR_ID, $calendarId, $comparison);
    }

    /**
     * Filter the query on the event_id column
     *
     * Example usage:
     * <code>
     * $query->filterByEventId(1234); // WHERE event_id = 1234
     * $query->filterByEventId(array(12, 34)); // WHERE event_id IN (12, 34)
     * $query->filterByEventId(array('min' => 12)); // WHERE event_id > 12
     * </code>
     *
     * @see       filterByEvent()
     *
     * @param     mixed $eventId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCalendarEventQuery The current query, for fluid interface
     */
    public function filterByEventId($eventId = null, $comparison = null)
    {
        if (is_array($eventId)) {
            $useMinMax = false;
            if (isset($eventId['min'])) {
                $this->addUsingAlias(CalendarEventTableMap::COL_EVENT_ID, $eventId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventId['max'])) {
                $this->addUsingAlias(CalendarEventTableMap::COL_EVENT_ID, $eventId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CalendarEventTableMap::COL_EVENT_ID, $eventId, $comparison);
    }

    /**
     * Filter the query by a related \ChurchCRM\model\ChurchCRM\Calendar object
     *
     * @param \ChurchCRM\model\ChurchCRM\Calendar|ObjectCollection $calendar The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCalendarEventQuery The current query, for fluid interface
     */
    public function filterByCalendar($calendar, $comparison = null)
    {
        if ($calendar instanceof \ChurchCRM\model\ChurchCRM\Calendar) {
            return $this
                ->addUsingAlias(CalendarEventTableMap::COL_CALENDAR_ID, $calendar->getId(), $comparison);
        } elseif ($calendar instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CalendarEventTableMap::COL_CALENDAR_ID, $calendar->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCalendar() only accepts arguments of type \ChurchCRM\model\ChurchCRM\Calendar or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Calendar relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCalendarEventQuery The current query, for fluid interface
     */
    public function joinCalendar($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Calendar');

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
            $this->addJoinObject($join, 'Calendar');
        }

        return $this;
    }

    /**
     * Use the Calendar relation Calendar object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ChurchCRM\model\ChurchCRM\CalendarQuery A secondary query class using the current class as primary query
     */
    public function useCalendarQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCalendar($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Calendar', '\ChurchCRM\model\ChurchCRM\CalendarQuery');
    }

    /**
     * Filter the query by a related \ChurchCRM\model\ChurchCRM\Event object
     *
     * @param \ChurchCRM\model\ChurchCRM\Event|ObjectCollection $event The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCalendarEventQuery The current query, for fluid interface
     */
    public function filterByEvent($event, $comparison = null)
    {
        if ($event instanceof \ChurchCRM\model\ChurchCRM\Event) {
            return $this
                ->addUsingAlias(CalendarEventTableMap::COL_EVENT_ID, $event->getId(), $comparison);
        } elseif ($event instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CalendarEventTableMap::COL_EVENT_ID, $event->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByEvent() only accepts arguments of type \ChurchCRM\model\ChurchCRM\Event or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Event relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCalendarEventQuery The current query, for fluid interface
     */
    public function joinEvent($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Event');

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
            $this->addJoinObject($join, 'Event');
        }

        return $this;
    }

    /**
     * Use the Event relation Event object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ChurchCRM\model\ChurchCRM\EventQuery A secondary query class using the current class as primary query
     */
    public function useEventQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEvent($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Event', '\ChurchCRM\model\ChurchCRM\EventQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCalendarEvent $calendarEvent Object to remove from the list of results
     *
     * @return $this|ChildCalendarEventQuery The current query, for fluid interface
     */
    public function prune($calendarEvent = null)
    {
        if ($calendarEvent) {
            $this->addCond('pruneCond0', $this->getAliasedColName(CalendarEventTableMap::COL_CALENDAR_ID), $calendarEvent->getCalendarId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(CalendarEventTableMap::COL_EVENT_ID), $calendarEvent->getEventId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the calendar_events table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CalendarEventTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CalendarEventTableMap::clearInstancePool();
            CalendarEventTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CalendarEventTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CalendarEventTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CalendarEventTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CalendarEventTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CalendarEventQuery
