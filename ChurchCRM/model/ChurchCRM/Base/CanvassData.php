<?php

namespace ChurchCRM\model\ChurchCRM\Base;

use \DateTime;
use \Exception;
use \PDO;
use ChurchCRM\model\ChurchCRM\CanvassDataQuery as ChildCanvassDataQuery;
use ChurchCRM\model\ChurchCRM\Map\CanvassDataTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'canvassdata_can' table.
 *
 * this contains information about the results of canvassing families
 *
 * @package    propel.generator.ChurchCRM.model.ChurchCRM.Base
 */
abstract class CanvassData implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\ChurchCRM\\model\\ChurchCRM\\Map\\CanvassDataTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the can_id field.
     *
     * @var        int
     */
    protected $can_id;

    /**
     * The value for the can_famid field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $can_famid;

    /**
     * The value for the can_canvasser field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $can_canvasser;

    /**
     * The value for the can_fyid field.
     *
     * @var        int|null
     */
    protected $can_fyid;

    /**
     * The value for the can_date field.
     *
     * @var        DateTime|null
     */
    protected $can_date;

    /**
     * The value for the can_positive field.
     *
     * @var        string|null
     */
    protected $can_positive;

    /**
     * The value for the can_critical field.
     *
     * @var        string|null
     */
    protected $can_critical;

    /**
     * The value for the can_insightful field.
     *
     * @var        string|null
     */
    protected $can_insightful;

    /**
     * The value for the can_financial field.
     *
     * @var        string|null
     */
    protected $can_financial;

    /**
     * The value for the can_suggestion field.
     *
     * @var        string|null
     */
    protected $can_suggestion;

    /**
     * The value for the can_notinterested field.
     *
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $can_notinterested;

    /**
     * The value for the can_whynotinterested field.
     *
     * @var        string|null
     */
    protected $can_whynotinterested;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->can_famid = 0;
        $this->can_canvasser = 0;
        $this->can_notinterested = false;
    }

    /**
     * Initializes internal state of ChurchCRM\model\ChurchCRM\Base\CanvassData object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>CanvassData</code> instance.  If
     * <code>obj</code> is an instance of <code>CanvassData</code>, delegates to
     * <code>equals(CanvassData)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return void
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [can_id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->can_id;
    }

    /**
     * Get the [can_famid] column value.
     *
     * @return int
     */
    public function getFamilyId()
    {
        return $this->can_famid;
    }

    /**
     * Get the [can_canvasser] column value.
     *
     * @return int
     */
    public function getCanvasser()
    {
        return $this->can_canvasser;
    }

    /**
     * Get the [can_fyid] column value.
     *
     * @return int|null
     */
    public function getFyid()
    {
        return $this->can_fyid;
    }

    /**
     * Get the [optionally formatted] temporal [can_date] column value.
     *
     *
     * @param string|null $format The date/time format string (either date()-style or strftime()-style).
     *   If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime|null Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDate($format = null)
    {
        if ($format === null) {
            return $this->can_date;
        } else {
            return $this->can_date instanceof \DateTimeInterface ? $this->can_date->format($format) : null;
        }
    }

    /**
     * Get the [can_positive] column value.
     *
     * @return string|null
     */
    public function getPositive()
    {
        return $this->can_positive;
    }

    /**
     * Get the [can_critical] column value.
     *
     * @return string|null
     */
    public function getCritical()
    {
        return $this->can_critical;
    }

    /**
     * Get the [can_insightful] column value.
     *
     * @return string|null
     */
    public function getInsightful()
    {
        return $this->can_insightful;
    }

    /**
     * Get the [can_financial] column value.
     *
     * @return string|null
     */
    public function getFinancial()
    {
        return $this->can_financial;
    }

    /**
     * Get the [can_suggestion] column value.
     *
     * @return string|null
     */
    public function getSuggestion()
    {
        return $this->can_suggestion;
    }

    /**
     * Get the [can_notinterested] column value.
     *
     * @return boolean
     */
    public function getNotInterested()
    {
        return $this->can_notinterested;
    }

    /**
     * Get the [can_notinterested] column value.
     *
     * @return boolean
     */
    public function isNotInterested()
    {
        return $this->getNotInterested();
    }

    /**
     * Get the [can_whynotinterested] column value.
     *
     * @return string|null
     */
    public function getWhyNotInterested()
    {
        return $this->can_whynotinterested;
    }

    /**
     * Set the value of [can_id] column.
     *
     * @param int $v New value
     * @return $this|\ChurchCRM\model\ChurchCRM\CanvassData The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->can_id !== $v) {
            $this->can_id = $v;
            $this->modifiedColumns[CanvassDataTableMap::COL_CAN_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [can_famid] column.
     *
     * @param int $v New value
     * @return $this|\ChurchCRM\model\ChurchCRM\CanvassData The current object (for fluent API support)
     */
    public function setFamilyId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->can_famid !== $v) {
            $this->can_famid = $v;
            $this->modifiedColumns[CanvassDataTableMap::COL_CAN_FAMID] = true;
        }

        return $this;
    } // setFamilyId()

    /**
     * Set the value of [can_canvasser] column.
     *
     * @param int $v New value
     * @return $this|\ChurchCRM\model\ChurchCRM\CanvassData The current object (for fluent API support)
     */
    public function setCanvasser($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->can_canvasser !== $v) {
            $this->can_canvasser = $v;
            $this->modifiedColumns[CanvassDataTableMap::COL_CAN_CANVASSER] = true;
        }

        return $this;
    } // setCanvasser()

    /**
     * Set the value of [can_fyid] column.
     *
     * @param int|null $v New value
     * @return $this|\ChurchCRM\model\ChurchCRM\CanvassData The current object (for fluent API support)
     */
    public function setFyid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->can_fyid !== $v) {
            $this->can_fyid = $v;
            $this->modifiedColumns[CanvassDataTableMap::COL_CAN_FYID] = true;
        }

        return $this;
    } // setFyid()

    /**
     * Sets the value of [can_date] column to a normalized version of the date/time value specified.
     *
     * @param  string|integer|\DateTimeInterface|null $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\ChurchCRM\model\ChurchCRM\CanvassData The current object (for fluent API support)
     */
    public function setDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->can_date !== null || $dt !== null) {
            if ($this->can_date === null || $dt === null || $dt->format("Y-m-d") !== $this->can_date->format("Y-m-d")) {
                $this->can_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[CanvassDataTableMap::COL_CAN_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setDate()

    /**
     * Set the value of [can_positive] column.
     *
     * @param string|null $v New value
     * @return $this|\ChurchCRM\model\ChurchCRM\CanvassData The current object (for fluent API support)
     */
    public function setPositive($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->can_positive !== $v) {
            $this->can_positive = $v;
            $this->modifiedColumns[CanvassDataTableMap::COL_CAN_POSITIVE] = true;
        }

        return $this;
    } // setPositive()

    /**
     * Set the value of [can_critical] column.
     *
     * @param string|null $v New value
     * @return $this|\ChurchCRM\model\ChurchCRM\CanvassData The current object (for fluent API support)
     */
    public function setCritical($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->can_critical !== $v) {
            $this->can_critical = $v;
            $this->modifiedColumns[CanvassDataTableMap::COL_CAN_CRITICAL] = true;
        }

        return $this;
    } // setCritical()

    /**
     * Set the value of [can_insightful] column.
     *
     * @param string|null $v New value
     * @return $this|\ChurchCRM\model\ChurchCRM\CanvassData The current object (for fluent API support)
     */
    public function setInsightful($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->can_insightful !== $v) {
            $this->can_insightful = $v;
            $this->modifiedColumns[CanvassDataTableMap::COL_CAN_INSIGHTFUL] = true;
        }

        return $this;
    } // setInsightful()

    /**
     * Set the value of [can_financial] column.
     *
     * @param string|null $v New value
     * @return $this|\ChurchCRM\model\ChurchCRM\CanvassData The current object (for fluent API support)
     */
    public function setFinancial($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->can_financial !== $v) {
            $this->can_financial = $v;
            $this->modifiedColumns[CanvassDataTableMap::COL_CAN_FINANCIAL] = true;
        }

        return $this;
    } // setFinancial()

    /**
     * Set the value of [can_suggestion] column.
     *
     * @param string|null $v New value
     * @return $this|\ChurchCRM\model\ChurchCRM\CanvassData The current object (for fluent API support)
     */
    public function setSuggestion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->can_suggestion !== $v) {
            $this->can_suggestion = $v;
            $this->modifiedColumns[CanvassDataTableMap::COL_CAN_SUGGESTION] = true;
        }

        return $this;
    } // setSuggestion()

    /**
     * Sets the value of the [can_notinterested] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\ChurchCRM\model\ChurchCRM\CanvassData The current object (for fluent API support)
     */
    public function setNotInterested($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->can_notinterested !== $v) {
            $this->can_notinterested = $v;
            $this->modifiedColumns[CanvassDataTableMap::COL_CAN_NOTINTERESTED] = true;
        }

        return $this;
    } // setNotInterested()

    /**
     * Set the value of [can_whynotinterested] column.
     *
     * @param string|null $v New value
     * @return $this|\ChurchCRM\model\ChurchCRM\CanvassData The current object (for fluent API support)
     */
    public function setWhyNotInterested($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->can_whynotinterested !== $v) {
            $this->can_whynotinterested = $v;
            $this->modifiedColumns[CanvassDataTableMap::COL_CAN_WHYNOTINTERESTED] = true;
        }

        return $this;
    } // setWhyNotInterested()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->can_famid !== 0) {
                return false;
            }

            if ($this->can_canvasser !== 0) {
                return false;
            }

            if ($this->can_notinterested !== false) {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : CanvassDataTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->can_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : CanvassDataTableMap::translateFieldName('FamilyId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->can_famid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : CanvassDataTableMap::translateFieldName('Canvasser', TableMap::TYPE_PHPNAME, $indexType)];
            $this->can_canvasser = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : CanvassDataTableMap::translateFieldName('Fyid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->can_fyid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : CanvassDataTableMap::translateFieldName('Date', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->can_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : CanvassDataTableMap::translateFieldName('Positive', TableMap::TYPE_PHPNAME, $indexType)];
            $this->can_positive = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : CanvassDataTableMap::translateFieldName('Critical', TableMap::TYPE_PHPNAME, $indexType)];
            $this->can_critical = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : CanvassDataTableMap::translateFieldName('Insightful', TableMap::TYPE_PHPNAME, $indexType)];
            $this->can_insightful = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : CanvassDataTableMap::translateFieldName('Financial', TableMap::TYPE_PHPNAME, $indexType)];
            $this->can_financial = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : CanvassDataTableMap::translateFieldName('Suggestion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->can_suggestion = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : CanvassDataTableMap::translateFieldName('NotInterested', TableMap::TYPE_PHPNAME, $indexType)];
            $this->can_notinterested = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : CanvassDataTableMap::translateFieldName('WhyNotInterested', TableMap::TYPE_PHPNAME, $indexType)];
            $this->can_whynotinterested = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 12; // 12 = CanvassDataTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\ChurchCRM\\model\\ChurchCRM\\CanvassData'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CanvassDataTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildCanvassDataQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see CanvassData::setDeleted()
     * @see CanvassData::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CanvassDataTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildCanvassDataQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CanvassDataTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                CanvassDataTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[CanvassDataTableMap::COL_CAN_ID] = true;
        if (null !== $this->can_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . CanvassDataTableMap::COL_CAN_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(CanvassDataTableMap::COL_CAN_ID)) {
            $modifiedColumns[':p' . $index++]  = 'can_ID';
        }
        if ($this->isColumnModified(CanvassDataTableMap::COL_CAN_FAMID)) {
            $modifiedColumns[':p' . $index++]  = 'can_famID';
        }
        if ($this->isColumnModified(CanvassDataTableMap::COL_CAN_CANVASSER)) {
            $modifiedColumns[':p' . $index++]  = 'can_Canvasser';
        }
        if ($this->isColumnModified(CanvassDataTableMap::COL_CAN_FYID)) {
            $modifiedColumns[':p' . $index++]  = 'can_FYID';
        }
        if ($this->isColumnModified(CanvassDataTableMap::COL_CAN_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'can_date';
        }
        if ($this->isColumnModified(CanvassDataTableMap::COL_CAN_POSITIVE)) {
            $modifiedColumns[':p' . $index++]  = 'can_Positive';
        }
        if ($this->isColumnModified(CanvassDataTableMap::COL_CAN_CRITICAL)) {
            $modifiedColumns[':p' . $index++]  = 'can_Critical';
        }
        if ($this->isColumnModified(CanvassDataTableMap::COL_CAN_INSIGHTFUL)) {
            $modifiedColumns[':p' . $index++]  = 'can_Insightful';
        }
        if ($this->isColumnModified(CanvassDataTableMap::COL_CAN_FINANCIAL)) {
            $modifiedColumns[':p' . $index++]  = 'can_Financial';
        }
        if ($this->isColumnModified(CanvassDataTableMap::COL_CAN_SUGGESTION)) {
            $modifiedColumns[':p' . $index++]  = 'can_Suggestion';
        }
        if ($this->isColumnModified(CanvassDataTableMap::COL_CAN_NOTINTERESTED)) {
            $modifiedColumns[':p' . $index++]  = 'can_NotInterested';
        }
        if ($this->isColumnModified(CanvassDataTableMap::COL_CAN_WHYNOTINTERESTED)) {
            $modifiedColumns[':p' . $index++]  = 'can_WhyNotInterested';
        }

        $sql = sprintf(
            'INSERT INTO canvassdata_can (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'can_ID':
                        $stmt->bindValue($identifier, $this->can_id, PDO::PARAM_INT);
                        break;
                    case 'can_famID':
                        $stmt->bindValue($identifier, $this->can_famid, PDO::PARAM_INT);
                        break;
                    case 'can_Canvasser':
                        $stmt->bindValue($identifier, $this->can_canvasser, PDO::PARAM_INT);
                        break;
                    case 'can_FYID':
                        $stmt->bindValue($identifier, $this->can_fyid, PDO::PARAM_INT);
                        break;
                    case 'can_date':
                        $stmt->bindValue($identifier, $this->can_date ? $this->can_date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'can_Positive':
                        $stmt->bindValue($identifier, $this->can_positive, PDO::PARAM_STR);
                        break;
                    case 'can_Critical':
                        $stmt->bindValue($identifier, $this->can_critical, PDO::PARAM_STR);
                        break;
                    case 'can_Insightful':
                        $stmt->bindValue($identifier, $this->can_insightful, PDO::PARAM_STR);
                        break;
                    case 'can_Financial':
                        $stmt->bindValue($identifier, $this->can_financial, PDO::PARAM_STR);
                        break;
                    case 'can_Suggestion':
                        $stmt->bindValue($identifier, $this->can_suggestion, PDO::PARAM_STR);
                        break;
                    case 'can_NotInterested':
                        $stmt->bindValue($identifier, (int) $this->can_notinterested, PDO::PARAM_INT);
                        break;
                    case 'can_WhyNotInterested':
                        $stmt->bindValue($identifier, $this->can_whynotinterested, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = CanvassDataTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getFamilyId();
                break;
            case 2:
                return $this->getCanvasser();
                break;
            case 3:
                return $this->getFyid();
                break;
            case 4:
                return $this->getDate();
                break;
            case 5:
                return $this->getPositive();
                break;
            case 6:
                return $this->getCritical();
                break;
            case 7:
                return $this->getInsightful();
                break;
            case 8:
                return $this->getFinancial();
                break;
            case 9:
                return $this->getSuggestion();
                break;
            case 10:
                return $this->getNotInterested();
                break;
            case 11:
                return $this->getWhyNotInterested();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['CanvassData'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['CanvassData'][$this->hashCode()] = true;
        $keys = CanvassDataTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getFamilyId(),
            $keys[2] => $this->getCanvasser(),
            $keys[3] => $this->getFyid(),
            $keys[4] => $this->getDate(),
            $keys[5] => $this->getPositive(),
            $keys[6] => $this->getCritical(),
            $keys[7] => $this->getInsightful(),
            $keys[8] => $this->getFinancial(),
            $keys[9] => $this->getSuggestion(),
            $keys[10] => $this->getNotInterested(),
            $keys[11] => $this->getWhyNotInterested(),
        );
        if ($result[$keys[4]] instanceof \DateTimeInterface) {
            $result[$keys[4]] = $result[$keys[4]]->format('Y-m-d');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }


        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\ChurchCRM\model\ChurchCRM\CanvassData
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = CanvassDataTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\ChurchCRM\model\ChurchCRM\CanvassData
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setFamilyId($value);
                break;
            case 2:
                $this->setCanvasser($value);
                break;
            case 3:
                $this->setFyid($value);
                break;
            case 4:
                $this->setDate($value);
                break;
            case 5:
                $this->setPositive($value);
                break;
            case 6:
                $this->setCritical($value);
                break;
            case 7:
                $this->setInsightful($value);
                break;
            case 8:
                $this->setFinancial($value);
                break;
            case 9:
                $this->setSuggestion($value);
                break;
            case 10:
                $this->setNotInterested($value);
                break;
            case 11:
                $this->setWhyNotInterested($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = CanvassDataTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setFamilyId($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setCanvasser($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setFyid($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setDate($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setPositive($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setCritical($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setInsightful($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setFinancial($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setSuggestion($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setNotInterested($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setWhyNotInterested($arr[$keys[11]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\ChurchCRM\model\ChurchCRM\CanvassData The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(CanvassDataTableMap::DATABASE_NAME);

        if ($this->isColumnModified(CanvassDataTableMap::COL_CAN_ID)) {
            $criteria->add(CanvassDataTableMap::COL_CAN_ID, $this->can_id);
        }
        if ($this->isColumnModified(CanvassDataTableMap::COL_CAN_FAMID)) {
            $criteria->add(CanvassDataTableMap::COL_CAN_FAMID, $this->can_famid);
        }
        if ($this->isColumnModified(CanvassDataTableMap::COL_CAN_CANVASSER)) {
            $criteria->add(CanvassDataTableMap::COL_CAN_CANVASSER, $this->can_canvasser);
        }
        if ($this->isColumnModified(CanvassDataTableMap::COL_CAN_FYID)) {
            $criteria->add(CanvassDataTableMap::COL_CAN_FYID, $this->can_fyid);
        }
        if ($this->isColumnModified(CanvassDataTableMap::COL_CAN_DATE)) {
            $criteria->add(CanvassDataTableMap::COL_CAN_DATE, $this->can_date);
        }
        if ($this->isColumnModified(CanvassDataTableMap::COL_CAN_POSITIVE)) {
            $criteria->add(CanvassDataTableMap::COL_CAN_POSITIVE, $this->can_positive);
        }
        if ($this->isColumnModified(CanvassDataTableMap::COL_CAN_CRITICAL)) {
            $criteria->add(CanvassDataTableMap::COL_CAN_CRITICAL, $this->can_critical);
        }
        if ($this->isColumnModified(CanvassDataTableMap::COL_CAN_INSIGHTFUL)) {
            $criteria->add(CanvassDataTableMap::COL_CAN_INSIGHTFUL, $this->can_insightful);
        }
        if ($this->isColumnModified(CanvassDataTableMap::COL_CAN_FINANCIAL)) {
            $criteria->add(CanvassDataTableMap::COL_CAN_FINANCIAL, $this->can_financial);
        }
        if ($this->isColumnModified(CanvassDataTableMap::COL_CAN_SUGGESTION)) {
            $criteria->add(CanvassDataTableMap::COL_CAN_SUGGESTION, $this->can_suggestion);
        }
        if ($this->isColumnModified(CanvassDataTableMap::COL_CAN_NOTINTERESTED)) {
            $criteria->add(CanvassDataTableMap::COL_CAN_NOTINTERESTED, $this->can_notinterested);
        }
        if ($this->isColumnModified(CanvassDataTableMap::COL_CAN_WHYNOTINTERESTED)) {
            $criteria->add(CanvassDataTableMap::COL_CAN_WHYNOTINTERESTED, $this->can_whynotinterested);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildCanvassDataQuery::create();
        $criteria->add(CanvassDataTableMap::COL_CAN_ID, $this->can_id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (can_id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \ChurchCRM\model\ChurchCRM\CanvassData (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFamilyId($this->getFamilyId());
        $copyObj->setCanvasser($this->getCanvasser());
        $copyObj->setFyid($this->getFyid());
        $copyObj->setDate($this->getDate());
        $copyObj->setPositive($this->getPositive());
        $copyObj->setCritical($this->getCritical());
        $copyObj->setInsightful($this->getInsightful());
        $copyObj->setFinancial($this->getFinancial());
        $copyObj->setSuggestion($this->getSuggestion());
        $copyObj->setNotInterested($this->getNotInterested());
        $copyObj->setWhyNotInterested($this->getWhyNotInterested());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \ChurchCRM\model\ChurchCRM\CanvassData Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->can_id = null;
        $this->can_famid = null;
        $this->can_canvasser = null;
        $this->can_fyid = null;
        $this->can_date = null;
        $this->can_positive = null;
        $this->can_critical = null;
        $this->can_insightful = null;
        $this->can_financial = null;
        $this->can_suggestion = null;
        $this->can_notinterested = null;
        $this->can_whynotinterested = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(CanvassDataTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
                return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
            }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
                return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
            }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
                return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
            }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
                return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
            }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
