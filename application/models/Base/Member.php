<?php

namespace Base;

use \Member as ChildMember;
use \MemberMutasi as ChildMemberMutasi;
use \MemberMutasiQuery as ChildMemberMutasiQuery;
use \MemberQuery as ChildMemberQuery;
use \MemberRequest as ChildMemberRequest;
use \MemberRequestQuery as ChildMemberRequestQuery;
use \MemberTiket as ChildMemberTiket;
use \MemberTiketQuery as ChildMemberTiketQuery;
use \MemberTrx as ChildMemberTrx;
use \MemberTrxQuery as ChildMemberTrxQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\MemberMutasiTableMap;
use Map\MemberRequestTableMap;
use Map\MemberTableMap;
use Map\MemberTiketTableMap;
use Map\MemberTrxTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'member' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Member implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\MemberTableMap';


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
     * The value for the id field.
     *
     * @var        int
     */
    protected $id;

    /**
     * The value for the kode_member field.
     *
     * @var        string
     */
    protected $kode_member;

    /**
     * The value for the nama field.
     *
     * @var        string
     */
    protected $nama;

    /**
     * The value for the password field.
     *
     * @var        string
     */
    protected $password;

    /**
     * The value for the nohp field.
     *
     * @var        string
     */
    protected $nohp;

    /**
     * The value for the alamat field.
     *
     * @var        string
     */
    protected $alamat;

    /**
     * The value for the id_kota field.
     *
     * @var        int
     */
    protected $id_kota;

    /**
     * The value for the email field.
     *
     * @var        string
     */
    protected $email;

    /**
     * The value for the pin field.
     *
     * @var        int
     */
    protected $pin;

    /**
     * The value for the level field.
     *
     * @var        int
     */
    protected $level;

    /**
     * The value for the saldo field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $saldo;

    /**
     * The value for the reff field.
     *
     * @var        string
     */
    protected $reff;

    /**
     * The value for the tgl_daftar field.
     *
     * @var        DateTime
     */
    protected $tgl_daftar;

    /**
     * The value for the status field.
     *
     * @var        int
     */
    protected $status;

    /**
     * @var        ObjectCollection|ChildMemberMutasi[] Collection to store aggregation of ChildMemberMutasi objects.
     */
    protected $collMemberMutasis;
    protected $collMemberMutasisPartial;

    /**
     * @var        ObjectCollection|ChildMemberRequest[] Collection to store aggregation of ChildMemberRequest objects.
     */
    protected $collMemberRequests;
    protected $collMemberRequestsPartial;

    /**
     * @var        ObjectCollection|ChildMemberTiket[] Collection to store aggregation of ChildMemberTiket objects.
     */
    protected $collMemberTikets;
    protected $collMemberTiketsPartial;

    /**
     * @var        ObjectCollection|ChildMemberTrx[] Collection to store aggregation of ChildMemberTrx objects.
     */
    protected $collMemberTrxes;
    protected $collMemberTrxesPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildMemberMutasi[]
     */
    protected $memberMutasisScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildMemberRequest[]
     */
    protected $memberRequestsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildMemberTiket[]
     */
    protected $memberTiketsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildMemberTrx[]
     */
    protected $memberTrxesScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->saldo = 0;
    }

    /**
     * Initializes internal state of Base\Member object.
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
     * Compares this with another <code>Member</code> instance.  If
     * <code>obj</code> is an instance of <code>Member</code>, delegates to
     * <code>equals(Member)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Member The current object, for fluid interface
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
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
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
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [kode_member] column value.
     *
     * @return string
     */
    public function getKodeMember()
    {
        return $this->kode_member;
    }

    /**
     * Get the [nama] column value.
     *
     * @return string
     */
    public function getNama()
    {
        return $this->nama;
    }

    /**
     * Get the [password] column value.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the [nohp] column value.
     *
     * @return string
     */
    public function getNohp()
    {
        return $this->nohp;
    }

    /**
     * Get the [alamat] column value.
     *
     * @return string
     */
    public function getAlamat()
    {
        return $this->alamat;
    }

    /**
     * Get the [id_kota] column value.
     *
     * @return int
     */
    public function getIdKota()
    {
        return $this->id_kota;
    }

    /**
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the [pin] column value.
     *
     * @return int
     */
    public function getPin()
    {
        return $this->pin;
    }

    /**
     * Get the [level] column value.
     *
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Get the [saldo] column value.
     *
     * @return int
     */
    public function getSaldo()
    {
        return $this->saldo;
    }

    /**
     * Get the [reff] column value.
     *
     * @return string
     */
    public function getReff()
    {
        return $this->reff;
    }

    /**
     * Get the [optionally formatted] temporal [tgl_daftar] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTglDaftar($format = NULL)
    {
        if ($format === null) {
            return $this->tgl_daftar;
        } else {
            return $this->tgl_daftar instanceof \DateTimeInterface ? $this->tgl_daftar->format($format) : null;
        }
    }

    /**
     * Get the [status] column value.
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\Member The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[MemberTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [kode_member] column.
     *
     * @param string $v new value
     * @return $this|\Member The current object (for fluent API support)
     */
    public function setKodeMember($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->kode_member !== $v) {
            $this->kode_member = $v;
            $this->modifiedColumns[MemberTableMap::COL_KODE_MEMBER] = true;
        }

        return $this;
    } // setKodeMember()

    /**
     * Set the value of [nama] column.
     *
     * @param string $v new value
     * @return $this|\Member The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[MemberTableMap::COL_NAMA] = true;
        }

        return $this;
    } // setNama()

    /**
     * Set the value of [password] column.
     *
     * @param string $v new value
     * @return $this|\Member The current object (for fluent API support)
     */
    public function setPassword($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->password !== $v) {
            $this->password = $v;
            $this->modifiedColumns[MemberTableMap::COL_PASSWORD] = true;
        }

        return $this;
    } // setPassword()

    /**
     * Set the value of [nohp] column.
     *
     * @param string $v new value
     * @return $this|\Member The current object (for fluent API support)
     */
    public function setNohp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nohp !== $v) {
            $this->nohp = $v;
            $this->modifiedColumns[MemberTableMap::COL_NOHP] = true;
        }

        return $this;
    } // setNohp()

    /**
     * Set the value of [alamat] column.
     *
     * @param string $v new value
     * @return $this|\Member The current object (for fluent API support)
     */
    public function setAlamat($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->alamat !== $v) {
            $this->alamat = $v;
            $this->modifiedColumns[MemberTableMap::COL_ALAMAT] = true;
        }

        return $this;
    } // setAlamat()

    /**
     * Set the value of [id_kota] column.
     *
     * @param int $v new value
     * @return $this|\Member The current object (for fluent API support)
     */
    public function setIdKota($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_kota !== $v) {
            $this->id_kota = $v;
            $this->modifiedColumns[MemberTableMap::COL_ID_KOTA] = true;
        }

        return $this;
    } // setIdKota()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return $this|\Member The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[MemberTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Set the value of [pin] column.
     *
     * @param int $v new value
     * @return $this|\Member The current object (for fluent API support)
     */
    public function setPin($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pin !== $v) {
            $this->pin = $v;
            $this->modifiedColumns[MemberTableMap::COL_PIN] = true;
        }

        return $this;
    } // setPin()

    /**
     * Set the value of [level] column.
     *
     * @param int $v new value
     * @return $this|\Member The current object (for fluent API support)
     */
    public function setLevel($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->level !== $v) {
            $this->level = $v;
            $this->modifiedColumns[MemberTableMap::COL_LEVEL] = true;
        }

        return $this;
    } // setLevel()

    /**
     * Set the value of [saldo] column.
     *
     * @param int $v new value
     * @return $this|\Member The current object (for fluent API support)
     */
    public function setSaldo($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->saldo !== $v) {
            $this->saldo = $v;
            $this->modifiedColumns[MemberTableMap::COL_SALDO] = true;
        }

        return $this;
    } // setSaldo()

    /**
     * Set the value of [reff] column.
     *
     * @param string $v new value
     * @return $this|\Member The current object (for fluent API support)
     */
    public function setReff($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->reff !== $v) {
            $this->reff = $v;
            $this->modifiedColumns[MemberTableMap::COL_REFF] = true;
        }

        return $this;
    } // setReff()

    /**
     * Sets the value of [tgl_daftar] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Member The current object (for fluent API support)
     */
    public function setTglDaftar($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tgl_daftar !== null || $dt !== null) {
            if ($this->tgl_daftar === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->tgl_daftar->format("Y-m-d H:i:s.u")) {
                $this->tgl_daftar = $dt === null ? null : clone $dt;
                $this->modifiedColumns[MemberTableMap::COL_TGL_DAFTAR] = true;
            }
        } // if either are not null

        return $this;
    } // setTglDaftar()

    /**
     * Set the value of [status] column.
     *
     * @param int $v new value
     * @return $this|\Member The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[MemberTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

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
            if ($this->saldo !== 0) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : MemberTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : MemberTableMap::translateFieldName('KodeMember', TableMap::TYPE_PHPNAME, $indexType)];
            $this->kode_member = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : MemberTableMap::translateFieldName('Nama', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nama = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : MemberTableMap::translateFieldName('Password', TableMap::TYPE_PHPNAME, $indexType)];
            $this->password = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : MemberTableMap::translateFieldName('Nohp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nohp = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : MemberTableMap::translateFieldName('Alamat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->alamat = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : MemberTableMap::translateFieldName('IdKota', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_kota = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : MemberTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : MemberTableMap::translateFieldName('Pin', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pin = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : MemberTableMap::translateFieldName('Level', TableMap::TYPE_PHPNAME, $indexType)];
            $this->level = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : MemberTableMap::translateFieldName('Saldo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->saldo = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : MemberTableMap::translateFieldName('Reff', TableMap::TYPE_PHPNAME, $indexType)];
            $this->reff = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : MemberTableMap::translateFieldName('TglDaftar', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->tgl_daftar = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : MemberTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 14; // 14 = MemberTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Member'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(MemberTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildMemberQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collMemberMutasis = null;

            $this->collMemberRequests = null;

            $this->collMemberTikets = null;

            $this->collMemberTrxes = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Member::setDeleted()
     * @see Member::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(MemberTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildMemberQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(MemberTableMap::DATABASE_NAME);
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
                MemberTableMap::addInstanceToPool($this);
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

            if ($this->memberMutasisScheduledForDeletion !== null) {
                if (!$this->memberMutasisScheduledForDeletion->isEmpty()) {
                    foreach ($this->memberMutasisScheduledForDeletion as $memberMutasi) {
                        // need to save related object because we set the relation to null
                        $memberMutasi->save($con);
                    }
                    $this->memberMutasisScheduledForDeletion = null;
                }
            }

            if ($this->collMemberMutasis !== null) {
                foreach ($this->collMemberMutasis as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->memberRequestsScheduledForDeletion !== null) {
                if (!$this->memberRequestsScheduledForDeletion->isEmpty()) {
                    foreach ($this->memberRequestsScheduledForDeletion as $memberRequest) {
                        // need to save related object because we set the relation to null
                        $memberRequest->save($con);
                    }
                    $this->memberRequestsScheduledForDeletion = null;
                }
            }

            if ($this->collMemberRequests !== null) {
                foreach ($this->collMemberRequests as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->memberTiketsScheduledForDeletion !== null) {
                if (!$this->memberTiketsScheduledForDeletion->isEmpty()) {
                    foreach ($this->memberTiketsScheduledForDeletion as $memberTiket) {
                        // need to save related object because we set the relation to null
                        $memberTiket->save($con);
                    }
                    $this->memberTiketsScheduledForDeletion = null;
                }
            }

            if ($this->collMemberTikets !== null) {
                foreach ($this->collMemberTikets as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->memberTrxesScheduledForDeletion !== null) {
                if (!$this->memberTrxesScheduledForDeletion->isEmpty()) {
                    \MemberTrxQuery::create()
                        ->filterByPrimaryKeys($this->memberTrxesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->memberTrxesScheduledForDeletion = null;
                }
            }

            if ($this->collMemberTrxes !== null) {
                foreach ($this->collMemberTrxes as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
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

        $this->modifiedColumns[MemberTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . MemberTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(MemberTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(MemberTableMap::COL_KODE_MEMBER)) {
            $modifiedColumns[':p' . $index++]  = 'kode_member';
        }
        if ($this->isColumnModified(MemberTableMap::COL_NAMA)) {
            $modifiedColumns[':p' . $index++]  = 'nama';
        }
        if ($this->isColumnModified(MemberTableMap::COL_PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = 'password';
        }
        if ($this->isColumnModified(MemberTableMap::COL_NOHP)) {
            $modifiedColumns[':p' . $index++]  = 'nohp';
        }
        if ($this->isColumnModified(MemberTableMap::COL_ALAMAT)) {
            $modifiedColumns[':p' . $index++]  = 'alamat';
        }
        if ($this->isColumnModified(MemberTableMap::COL_ID_KOTA)) {
            $modifiedColumns[':p' . $index++]  = 'id_kota';
        }
        if ($this->isColumnModified(MemberTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'email';
        }
        if ($this->isColumnModified(MemberTableMap::COL_PIN)) {
            $modifiedColumns[':p' . $index++]  = 'pin';
        }
        if ($this->isColumnModified(MemberTableMap::COL_LEVEL)) {
            $modifiedColumns[':p' . $index++]  = 'level';
        }
        if ($this->isColumnModified(MemberTableMap::COL_SALDO)) {
            $modifiedColumns[':p' . $index++]  = 'saldo';
        }
        if ($this->isColumnModified(MemberTableMap::COL_REFF)) {
            $modifiedColumns[':p' . $index++]  = 'reff';
        }
        if ($this->isColumnModified(MemberTableMap::COL_TGL_DAFTAR)) {
            $modifiedColumns[':p' . $index++]  = 'tgl_daftar';
        }
        if ($this->isColumnModified(MemberTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }

        $sql = sprintf(
            'INSERT INTO member (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'kode_member':
                        $stmt->bindValue($identifier, $this->kode_member, PDO::PARAM_STR);
                        break;
                    case 'nama':
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case 'password':
                        $stmt->bindValue($identifier, $this->password, PDO::PARAM_STR);
                        break;
                    case 'nohp':
                        $stmt->bindValue($identifier, $this->nohp, PDO::PARAM_STR);
                        break;
                    case 'alamat':
                        $stmt->bindValue($identifier, $this->alamat, PDO::PARAM_STR);
                        break;
                    case 'id_kota':
                        $stmt->bindValue($identifier, $this->id_kota, PDO::PARAM_INT);
                        break;
                    case 'email':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case 'pin':
                        $stmt->bindValue($identifier, $this->pin, PDO::PARAM_INT);
                        break;
                    case 'level':
                        $stmt->bindValue($identifier, $this->level, PDO::PARAM_INT);
                        break;
                    case 'saldo':
                        $stmt->bindValue($identifier, $this->saldo, PDO::PARAM_INT);
                        break;
                    case 'reff':
                        $stmt->bindValue($identifier, $this->reff, PDO::PARAM_STR);
                        break;
                    case 'tgl_daftar':
                        $stmt->bindValue($identifier, $this->tgl_daftar ? $this->tgl_daftar->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'status':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_INT);
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
        $pos = MemberTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getKodeMember();
                break;
            case 2:
                return $this->getNama();
                break;
            case 3:
                return $this->getPassword();
                break;
            case 4:
                return $this->getNohp();
                break;
            case 5:
                return $this->getAlamat();
                break;
            case 6:
                return $this->getIdKota();
                break;
            case 7:
                return $this->getEmail();
                break;
            case 8:
                return $this->getPin();
                break;
            case 9:
                return $this->getLevel();
                break;
            case 10:
                return $this->getSaldo();
                break;
            case 11:
                return $this->getReff();
                break;
            case 12:
                return $this->getTglDaftar();
                break;
            case 13:
                return $this->getStatus();
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
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['Member'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Member'][$this->hashCode()] = true;
        $keys = MemberTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getKodeMember(),
            $keys[2] => $this->getNama(),
            $keys[3] => $this->getPassword(),
            $keys[4] => $this->getNohp(),
            $keys[5] => $this->getAlamat(),
            $keys[6] => $this->getIdKota(),
            $keys[7] => $this->getEmail(),
            $keys[8] => $this->getPin(),
            $keys[9] => $this->getLevel(),
            $keys[10] => $this->getSaldo(),
            $keys[11] => $this->getReff(),
            $keys[12] => $this->getTglDaftar(),
            $keys[13] => $this->getStatus(),
        );
        if ($result[$keys[12]] instanceof \DateTimeInterface) {
            $result[$keys[12]] = $result[$keys[12]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collMemberMutasis) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'memberMutasis';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'member_mutasis';
                        break;
                    default:
                        $key = 'MemberMutasis';
                }

                $result[$key] = $this->collMemberMutasis->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMemberRequests) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'memberRequests';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'member_requests';
                        break;
                    default:
                        $key = 'MemberRequests';
                }

                $result[$key] = $this->collMemberRequests->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMemberTikets) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'memberTikets';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'member_tikets';
                        break;
                    default:
                        $key = 'MemberTikets';
                }

                $result[$key] = $this->collMemberTikets->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMemberTrxes) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'memberTrxes';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'member_trxes';
                        break;
                    default:
                        $key = 'MemberTrxes';
                }

                $result[$key] = $this->collMemberTrxes->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
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
     * @return $this|\Member
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = MemberTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Member
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setKodeMember($value);
                break;
            case 2:
                $this->setNama($value);
                break;
            case 3:
                $this->setPassword($value);
                break;
            case 4:
                $this->setNohp($value);
                break;
            case 5:
                $this->setAlamat($value);
                break;
            case 6:
                $this->setIdKota($value);
                break;
            case 7:
                $this->setEmail($value);
                break;
            case 8:
                $this->setPin($value);
                break;
            case 9:
                $this->setLevel($value);
                break;
            case 10:
                $this->setSaldo($value);
                break;
            case 11:
                $this->setReff($value);
                break;
            case 12:
                $this->setTglDaftar($value);
                break;
            case 13:
                $this->setStatus($value);
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
        $keys = MemberTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setKodeMember($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setNama($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setPassword($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setNohp($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setAlamat($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setIdKota($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setEmail($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setPin($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setLevel($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setSaldo($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setReff($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setTglDaftar($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setStatus($arr[$keys[13]]);
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
     * @return $this|\Member The current object, for fluid interface
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
        $criteria = new Criteria(MemberTableMap::DATABASE_NAME);

        if ($this->isColumnModified(MemberTableMap::COL_ID)) {
            $criteria->add(MemberTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(MemberTableMap::COL_KODE_MEMBER)) {
            $criteria->add(MemberTableMap::COL_KODE_MEMBER, $this->kode_member);
        }
        if ($this->isColumnModified(MemberTableMap::COL_NAMA)) {
            $criteria->add(MemberTableMap::COL_NAMA, $this->nama);
        }
        if ($this->isColumnModified(MemberTableMap::COL_PASSWORD)) {
            $criteria->add(MemberTableMap::COL_PASSWORD, $this->password);
        }
        if ($this->isColumnModified(MemberTableMap::COL_NOHP)) {
            $criteria->add(MemberTableMap::COL_NOHP, $this->nohp);
        }
        if ($this->isColumnModified(MemberTableMap::COL_ALAMAT)) {
            $criteria->add(MemberTableMap::COL_ALAMAT, $this->alamat);
        }
        if ($this->isColumnModified(MemberTableMap::COL_ID_KOTA)) {
            $criteria->add(MemberTableMap::COL_ID_KOTA, $this->id_kota);
        }
        if ($this->isColumnModified(MemberTableMap::COL_EMAIL)) {
            $criteria->add(MemberTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(MemberTableMap::COL_PIN)) {
            $criteria->add(MemberTableMap::COL_PIN, $this->pin);
        }
        if ($this->isColumnModified(MemberTableMap::COL_LEVEL)) {
            $criteria->add(MemberTableMap::COL_LEVEL, $this->level);
        }
        if ($this->isColumnModified(MemberTableMap::COL_SALDO)) {
            $criteria->add(MemberTableMap::COL_SALDO, $this->saldo);
        }
        if ($this->isColumnModified(MemberTableMap::COL_REFF)) {
            $criteria->add(MemberTableMap::COL_REFF, $this->reff);
        }
        if ($this->isColumnModified(MemberTableMap::COL_TGL_DAFTAR)) {
            $criteria->add(MemberTableMap::COL_TGL_DAFTAR, $this->tgl_daftar);
        }
        if ($this->isColumnModified(MemberTableMap::COL_STATUS)) {
            $criteria->add(MemberTableMap::COL_STATUS, $this->status);
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
        $criteria = ChildMemberQuery::create();
        $criteria->add(MemberTableMap::COL_ID, $this->id);

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
     * Generic method to set the primary key (id column).
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
     * @param      object $copyObj An object of \Member (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setKodeMember($this->getKodeMember());
        $copyObj->setNama($this->getNama());
        $copyObj->setPassword($this->getPassword());
        $copyObj->setNohp($this->getNohp());
        $copyObj->setAlamat($this->getAlamat());
        $copyObj->setIdKota($this->getIdKota());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setPin($this->getPin());
        $copyObj->setLevel($this->getLevel());
        $copyObj->setSaldo($this->getSaldo());
        $copyObj->setReff($this->getReff());
        $copyObj->setTglDaftar($this->getTglDaftar());
        $copyObj->setStatus($this->getStatus());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getMemberMutasis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMemberMutasi($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMemberRequests() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMemberRequest($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMemberTikets() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMemberTiket($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMemberTrxes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMemberTrx($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

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
     * @return \Member Clone of current object.
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
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('MemberMutasi' == $relationName) {
            $this->initMemberMutasis();
            return;
        }
        if ('MemberRequest' == $relationName) {
            $this->initMemberRequests();
            return;
        }
        if ('MemberTiket' == $relationName) {
            $this->initMemberTikets();
            return;
        }
        if ('MemberTrx' == $relationName) {
            $this->initMemberTrxes();
            return;
        }
    }

    /**
     * Clears out the collMemberMutasis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addMemberMutasis()
     */
    public function clearMemberMutasis()
    {
        $this->collMemberMutasis = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collMemberMutasis collection loaded partially.
     */
    public function resetPartialMemberMutasis($v = true)
    {
        $this->collMemberMutasisPartial = $v;
    }

    /**
     * Initializes the collMemberMutasis collection.
     *
     * By default this just sets the collMemberMutasis collection to an empty array (like clearcollMemberMutasis());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMemberMutasis($overrideExisting = true)
    {
        if (null !== $this->collMemberMutasis && !$overrideExisting) {
            return;
        }

        $collectionClassName = MemberMutasiTableMap::getTableMap()->getCollectionClassName();

        $this->collMemberMutasis = new $collectionClassName;
        $this->collMemberMutasis->setModel('\MemberMutasi');
    }

    /**
     * Gets an array of ChildMemberMutasi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildMember is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildMemberMutasi[] List of ChildMemberMutasi objects
     * @throws PropelException
     */
    public function getMemberMutasis(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collMemberMutasisPartial && !$this->isNew();
        if (null === $this->collMemberMutasis || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMemberMutasis) {
                // return empty collection
                $this->initMemberMutasis();
            } else {
                $collMemberMutasis = ChildMemberMutasiQuery::create(null, $criteria)
                    ->filterByMember($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collMemberMutasisPartial && count($collMemberMutasis)) {
                        $this->initMemberMutasis(false);

                        foreach ($collMemberMutasis as $obj) {
                            if (false == $this->collMemberMutasis->contains($obj)) {
                                $this->collMemberMutasis->append($obj);
                            }
                        }

                        $this->collMemberMutasisPartial = true;
                    }

                    return $collMemberMutasis;
                }

                if ($partial && $this->collMemberMutasis) {
                    foreach ($this->collMemberMutasis as $obj) {
                        if ($obj->isNew()) {
                            $collMemberMutasis[] = $obj;
                        }
                    }
                }

                $this->collMemberMutasis = $collMemberMutasis;
                $this->collMemberMutasisPartial = false;
            }
        }

        return $this->collMemberMutasis;
    }

    /**
     * Sets a collection of ChildMemberMutasi objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $memberMutasis A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildMember The current object (for fluent API support)
     */
    public function setMemberMutasis(Collection $memberMutasis, ConnectionInterface $con = null)
    {
        /** @var ChildMemberMutasi[] $memberMutasisToDelete */
        $memberMutasisToDelete = $this->getMemberMutasis(new Criteria(), $con)->diff($memberMutasis);


        $this->memberMutasisScheduledForDeletion = $memberMutasisToDelete;

        foreach ($memberMutasisToDelete as $memberMutasiRemoved) {
            $memberMutasiRemoved->setMember(null);
        }

        $this->collMemberMutasis = null;
        foreach ($memberMutasis as $memberMutasi) {
            $this->addMemberMutasi($memberMutasi);
        }

        $this->collMemberMutasis = $memberMutasis;
        $this->collMemberMutasisPartial = false;

        return $this;
    }

    /**
     * Returns the number of related MemberMutasi objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related MemberMutasi objects.
     * @throws PropelException
     */
    public function countMemberMutasis(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collMemberMutasisPartial && !$this->isNew();
        if (null === $this->collMemberMutasis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMemberMutasis) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMemberMutasis());
            }

            $query = ChildMemberMutasiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMember($this)
                ->count($con);
        }

        return count($this->collMemberMutasis);
    }

    /**
     * Method called to associate a ChildMemberMutasi object to this object
     * through the ChildMemberMutasi foreign key attribute.
     *
     * @param  ChildMemberMutasi $l ChildMemberMutasi
     * @return $this|\Member The current object (for fluent API support)
     */
    public function addMemberMutasi(ChildMemberMutasi $l)
    {
        if ($this->collMemberMutasis === null) {
            $this->initMemberMutasis();
            $this->collMemberMutasisPartial = true;
        }

        if (!$this->collMemberMutasis->contains($l)) {
            $this->doAddMemberMutasi($l);

            if ($this->memberMutasisScheduledForDeletion and $this->memberMutasisScheduledForDeletion->contains($l)) {
                $this->memberMutasisScheduledForDeletion->remove($this->memberMutasisScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildMemberMutasi $memberMutasi The ChildMemberMutasi object to add.
     */
    protected function doAddMemberMutasi(ChildMemberMutasi $memberMutasi)
    {
        $this->collMemberMutasis[]= $memberMutasi;
        $memberMutasi->setMember($this);
    }

    /**
     * @param  ChildMemberMutasi $memberMutasi The ChildMemberMutasi object to remove.
     * @return $this|ChildMember The current object (for fluent API support)
     */
    public function removeMemberMutasi(ChildMemberMutasi $memberMutasi)
    {
        if ($this->getMemberMutasis()->contains($memberMutasi)) {
            $pos = $this->collMemberMutasis->search($memberMutasi);
            $this->collMemberMutasis->remove($pos);
            if (null === $this->memberMutasisScheduledForDeletion) {
                $this->memberMutasisScheduledForDeletion = clone $this->collMemberMutasis;
                $this->memberMutasisScheduledForDeletion->clear();
            }
            $this->memberMutasisScheduledForDeletion[]= $memberMutasi;
            $memberMutasi->setMember(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Member is new, it will return
     * an empty collection; or if this Member has previously
     * been saved, it will retrieve related MemberMutasis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Member.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildMemberMutasi[] List of ChildMemberMutasi objects
     */
    public function getMemberMutasisJoinSupplier(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildMemberMutasiQuery::create(null, $criteria);
        $query->joinWith('Supplier', $joinBehavior);

        return $this->getMemberMutasis($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Member is new, it will return
     * an empty collection; or if this Member has previously
     * been saved, it will retrieve related MemberMutasis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Member.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildMemberMutasi[] List of ChildMemberMutasi objects
     */
    public function getMemberMutasisJoinMemberTrx(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildMemberMutasiQuery::create(null, $criteria);
        $query->joinWith('MemberTrx', $joinBehavior);

        return $this->getMemberMutasis($query, $con);
    }

    /**
     * Clears out the collMemberRequests collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addMemberRequests()
     */
    public function clearMemberRequests()
    {
        $this->collMemberRequests = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collMemberRequests collection loaded partially.
     */
    public function resetPartialMemberRequests($v = true)
    {
        $this->collMemberRequestsPartial = $v;
    }

    /**
     * Initializes the collMemberRequests collection.
     *
     * By default this just sets the collMemberRequests collection to an empty array (like clearcollMemberRequests());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMemberRequests($overrideExisting = true)
    {
        if (null !== $this->collMemberRequests && !$overrideExisting) {
            return;
        }

        $collectionClassName = MemberRequestTableMap::getTableMap()->getCollectionClassName();

        $this->collMemberRequests = new $collectionClassName;
        $this->collMemberRequests->setModel('\MemberRequest');
    }

    /**
     * Gets an array of ChildMemberRequest objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildMember is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildMemberRequest[] List of ChildMemberRequest objects
     * @throws PropelException
     */
    public function getMemberRequests(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collMemberRequestsPartial && !$this->isNew();
        if (null === $this->collMemberRequests || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMemberRequests) {
                // return empty collection
                $this->initMemberRequests();
            } else {
                $collMemberRequests = ChildMemberRequestQuery::create(null, $criteria)
                    ->filterByMember($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collMemberRequestsPartial && count($collMemberRequests)) {
                        $this->initMemberRequests(false);

                        foreach ($collMemberRequests as $obj) {
                            if (false == $this->collMemberRequests->contains($obj)) {
                                $this->collMemberRequests->append($obj);
                            }
                        }

                        $this->collMemberRequestsPartial = true;
                    }

                    return $collMemberRequests;
                }

                if ($partial && $this->collMemberRequests) {
                    foreach ($this->collMemberRequests as $obj) {
                        if ($obj->isNew()) {
                            $collMemberRequests[] = $obj;
                        }
                    }
                }

                $this->collMemberRequests = $collMemberRequests;
                $this->collMemberRequestsPartial = false;
            }
        }

        return $this->collMemberRequests;
    }

    /**
     * Sets a collection of ChildMemberRequest objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $memberRequests A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildMember The current object (for fluent API support)
     */
    public function setMemberRequests(Collection $memberRequests, ConnectionInterface $con = null)
    {
        /** @var ChildMemberRequest[] $memberRequestsToDelete */
        $memberRequestsToDelete = $this->getMemberRequests(new Criteria(), $con)->diff($memberRequests);


        $this->memberRequestsScheduledForDeletion = $memberRequestsToDelete;

        foreach ($memberRequestsToDelete as $memberRequestRemoved) {
            $memberRequestRemoved->setMember(null);
        }

        $this->collMemberRequests = null;
        foreach ($memberRequests as $memberRequest) {
            $this->addMemberRequest($memberRequest);
        }

        $this->collMemberRequests = $memberRequests;
        $this->collMemberRequestsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related MemberRequest objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related MemberRequest objects.
     * @throws PropelException
     */
    public function countMemberRequests(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collMemberRequestsPartial && !$this->isNew();
        if (null === $this->collMemberRequests || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMemberRequests) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMemberRequests());
            }

            $query = ChildMemberRequestQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMember($this)
                ->count($con);
        }

        return count($this->collMemberRequests);
    }

    /**
     * Method called to associate a ChildMemberRequest object to this object
     * through the ChildMemberRequest foreign key attribute.
     *
     * @param  ChildMemberRequest $l ChildMemberRequest
     * @return $this|\Member The current object (for fluent API support)
     */
    public function addMemberRequest(ChildMemberRequest $l)
    {
        if ($this->collMemberRequests === null) {
            $this->initMemberRequests();
            $this->collMemberRequestsPartial = true;
        }

        if (!$this->collMemberRequests->contains($l)) {
            $this->doAddMemberRequest($l);

            if ($this->memberRequestsScheduledForDeletion and $this->memberRequestsScheduledForDeletion->contains($l)) {
                $this->memberRequestsScheduledForDeletion->remove($this->memberRequestsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildMemberRequest $memberRequest The ChildMemberRequest object to add.
     */
    protected function doAddMemberRequest(ChildMemberRequest $memberRequest)
    {
        $this->collMemberRequests[]= $memberRequest;
        $memberRequest->setMember($this);
    }

    /**
     * @param  ChildMemberRequest $memberRequest The ChildMemberRequest object to remove.
     * @return $this|ChildMember The current object (for fluent API support)
     */
    public function removeMemberRequest(ChildMemberRequest $memberRequest)
    {
        if ($this->getMemberRequests()->contains($memberRequest)) {
            $pos = $this->collMemberRequests->search($memberRequest);
            $this->collMemberRequests->remove($pos);
            if (null === $this->memberRequestsScheduledForDeletion) {
                $this->memberRequestsScheduledForDeletion = clone $this->collMemberRequests;
                $this->memberRequestsScheduledForDeletion->clear();
            }
            $this->memberRequestsScheduledForDeletion[]= $memberRequest;
            $memberRequest->setMember(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Member is new, it will return
     * an empty collection; or if this Member has previously
     * been saved, it will retrieve related MemberRequests from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Member.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildMemberRequest[] List of ChildMemberRequest objects
     */
    public function getMemberRequestsJoinProduk(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildMemberRequestQuery::create(null, $criteria);
        $query->joinWith('Produk', $joinBehavior);

        return $this->getMemberRequests($query, $con);
    }

    /**
     * Clears out the collMemberTikets collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addMemberTikets()
     */
    public function clearMemberTikets()
    {
        $this->collMemberTikets = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collMemberTikets collection loaded partially.
     */
    public function resetPartialMemberTikets($v = true)
    {
        $this->collMemberTiketsPartial = $v;
    }

    /**
     * Initializes the collMemberTikets collection.
     *
     * By default this just sets the collMemberTikets collection to an empty array (like clearcollMemberTikets());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMemberTikets($overrideExisting = true)
    {
        if (null !== $this->collMemberTikets && !$overrideExisting) {
            return;
        }

        $collectionClassName = MemberTiketTableMap::getTableMap()->getCollectionClassName();

        $this->collMemberTikets = new $collectionClassName;
        $this->collMemberTikets->setModel('\MemberTiket');
    }

    /**
     * Gets an array of ChildMemberTiket objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildMember is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildMemberTiket[] List of ChildMemberTiket objects
     * @throws PropelException
     */
    public function getMemberTikets(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collMemberTiketsPartial && !$this->isNew();
        if (null === $this->collMemberTikets || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMemberTikets) {
                // return empty collection
                $this->initMemberTikets();
            } else {
                $collMemberTikets = ChildMemberTiketQuery::create(null, $criteria)
                    ->filterByMember($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collMemberTiketsPartial && count($collMemberTikets)) {
                        $this->initMemberTikets(false);

                        foreach ($collMemberTikets as $obj) {
                            if (false == $this->collMemberTikets->contains($obj)) {
                                $this->collMemberTikets->append($obj);
                            }
                        }

                        $this->collMemberTiketsPartial = true;
                    }

                    return $collMemberTikets;
                }

                if ($partial && $this->collMemberTikets) {
                    foreach ($this->collMemberTikets as $obj) {
                        if ($obj->isNew()) {
                            $collMemberTikets[] = $obj;
                        }
                    }
                }

                $this->collMemberTikets = $collMemberTikets;
                $this->collMemberTiketsPartial = false;
            }
        }

        return $this->collMemberTikets;
    }

    /**
     * Sets a collection of ChildMemberTiket objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $memberTikets A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildMember The current object (for fluent API support)
     */
    public function setMemberTikets(Collection $memberTikets, ConnectionInterface $con = null)
    {
        /** @var ChildMemberTiket[] $memberTiketsToDelete */
        $memberTiketsToDelete = $this->getMemberTikets(new Criteria(), $con)->diff($memberTikets);


        $this->memberTiketsScheduledForDeletion = $memberTiketsToDelete;

        foreach ($memberTiketsToDelete as $memberTiketRemoved) {
            $memberTiketRemoved->setMember(null);
        }

        $this->collMemberTikets = null;
        foreach ($memberTikets as $memberTiket) {
            $this->addMemberTiket($memberTiket);
        }

        $this->collMemberTikets = $memberTikets;
        $this->collMemberTiketsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related MemberTiket objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related MemberTiket objects.
     * @throws PropelException
     */
    public function countMemberTikets(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collMemberTiketsPartial && !$this->isNew();
        if (null === $this->collMemberTikets || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMemberTikets) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMemberTikets());
            }

            $query = ChildMemberTiketQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMember($this)
                ->count($con);
        }

        return count($this->collMemberTikets);
    }

    /**
     * Method called to associate a ChildMemberTiket object to this object
     * through the ChildMemberTiket foreign key attribute.
     *
     * @param  ChildMemberTiket $l ChildMemberTiket
     * @return $this|\Member The current object (for fluent API support)
     */
    public function addMemberTiket(ChildMemberTiket $l)
    {
        if ($this->collMemberTikets === null) {
            $this->initMemberTikets();
            $this->collMemberTiketsPartial = true;
        }

        if (!$this->collMemberTikets->contains($l)) {
            $this->doAddMemberTiket($l);

            if ($this->memberTiketsScheduledForDeletion and $this->memberTiketsScheduledForDeletion->contains($l)) {
                $this->memberTiketsScheduledForDeletion->remove($this->memberTiketsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildMemberTiket $memberTiket The ChildMemberTiket object to add.
     */
    protected function doAddMemberTiket(ChildMemberTiket $memberTiket)
    {
        $this->collMemberTikets[]= $memberTiket;
        $memberTiket->setMember($this);
    }

    /**
     * @param  ChildMemberTiket $memberTiket The ChildMemberTiket object to remove.
     * @return $this|ChildMember The current object (for fluent API support)
     */
    public function removeMemberTiket(ChildMemberTiket $memberTiket)
    {
        if ($this->getMemberTikets()->contains($memberTiket)) {
            $pos = $this->collMemberTikets->search($memberTiket);
            $this->collMemberTikets->remove($pos);
            if (null === $this->memberTiketsScheduledForDeletion) {
                $this->memberTiketsScheduledForDeletion = clone $this->collMemberTikets;
                $this->memberTiketsScheduledForDeletion->clear();
            }
            $this->memberTiketsScheduledForDeletion[]= $memberTiket;
            $memberTiket->setMember(null);
        }

        return $this;
    }

    /**
     * Clears out the collMemberTrxes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addMemberTrxes()
     */
    public function clearMemberTrxes()
    {
        $this->collMemberTrxes = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collMemberTrxes collection loaded partially.
     */
    public function resetPartialMemberTrxes($v = true)
    {
        $this->collMemberTrxesPartial = $v;
    }

    /**
     * Initializes the collMemberTrxes collection.
     *
     * By default this just sets the collMemberTrxes collection to an empty array (like clearcollMemberTrxes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMemberTrxes($overrideExisting = true)
    {
        if (null !== $this->collMemberTrxes && !$overrideExisting) {
            return;
        }

        $collectionClassName = MemberTrxTableMap::getTableMap()->getCollectionClassName();

        $this->collMemberTrxes = new $collectionClassName;
        $this->collMemberTrxes->setModel('\MemberTrx');
    }

    /**
     * Gets an array of ChildMemberTrx objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildMember is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildMemberTrx[] List of ChildMemberTrx objects
     * @throws PropelException
     */
    public function getMemberTrxes(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collMemberTrxesPartial && !$this->isNew();
        if (null === $this->collMemberTrxes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMemberTrxes) {
                // return empty collection
                $this->initMemberTrxes();
            } else {
                $collMemberTrxes = ChildMemberTrxQuery::create(null, $criteria)
                    ->filterByMember($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collMemberTrxesPartial && count($collMemberTrxes)) {
                        $this->initMemberTrxes(false);

                        foreach ($collMemberTrxes as $obj) {
                            if (false == $this->collMemberTrxes->contains($obj)) {
                                $this->collMemberTrxes->append($obj);
                            }
                        }

                        $this->collMemberTrxesPartial = true;
                    }

                    return $collMemberTrxes;
                }

                if ($partial && $this->collMemberTrxes) {
                    foreach ($this->collMemberTrxes as $obj) {
                        if ($obj->isNew()) {
                            $collMemberTrxes[] = $obj;
                        }
                    }
                }

                $this->collMemberTrxes = $collMemberTrxes;
                $this->collMemberTrxesPartial = false;
            }
        }

        return $this->collMemberTrxes;
    }

    /**
     * Sets a collection of ChildMemberTrx objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $memberTrxes A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildMember The current object (for fluent API support)
     */
    public function setMemberTrxes(Collection $memberTrxes, ConnectionInterface $con = null)
    {
        /** @var ChildMemberTrx[] $memberTrxesToDelete */
        $memberTrxesToDelete = $this->getMemberTrxes(new Criteria(), $con)->diff($memberTrxes);


        $this->memberTrxesScheduledForDeletion = $memberTrxesToDelete;

        foreach ($memberTrxesToDelete as $memberTrxRemoved) {
            $memberTrxRemoved->setMember(null);
        }

        $this->collMemberTrxes = null;
        foreach ($memberTrxes as $memberTrx) {
            $this->addMemberTrx($memberTrx);
        }

        $this->collMemberTrxes = $memberTrxes;
        $this->collMemberTrxesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related MemberTrx objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related MemberTrx objects.
     * @throws PropelException
     */
    public function countMemberTrxes(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collMemberTrxesPartial && !$this->isNew();
        if (null === $this->collMemberTrxes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMemberTrxes) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMemberTrxes());
            }

            $query = ChildMemberTrxQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMember($this)
                ->count($con);
        }

        return count($this->collMemberTrxes);
    }

    /**
     * Method called to associate a ChildMemberTrx object to this object
     * through the ChildMemberTrx foreign key attribute.
     *
     * @param  ChildMemberTrx $l ChildMemberTrx
     * @return $this|\Member The current object (for fluent API support)
     */
    public function addMemberTrx(ChildMemberTrx $l)
    {
        if ($this->collMemberTrxes === null) {
            $this->initMemberTrxes();
            $this->collMemberTrxesPartial = true;
        }

        if (!$this->collMemberTrxes->contains($l)) {
            $this->doAddMemberTrx($l);

            if ($this->memberTrxesScheduledForDeletion and $this->memberTrxesScheduledForDeletion->contains($l)) {
                $this->memberTrxesScheduledForDeletion->remove($this->memberTrxesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildMemberTrx $memberTrx The ChildMemberTrx object to add.
     */
    protected function doAddMemberTrx(ChildMemberTrx $memberTrx)
    {
        $this->collMemberTrxes[]= $memberTrx;
        $memberTrx->setMember($this);
    }

    /**
     * @param  ChildMemberTrx $memberTrx The ChildMemberTrx object to remove.
     * @return $this|ChildMember The current object (for fluent API support)
     */
    public function removeMemberTrx(ChildMemberTrx $memberTrx)
    {
        if ($this->getMemberTrxes()->contains($memberTrx)) {
            $pos = $this->collMemberTrxes->search($memberTrx);
            $this->collMemberTrxes->remove($pos);
            if (null === $this->memberTrxesScheduledForDeletion) {
                $this->memberTrxesScheduledForDeletion = clone $this->collMemberTrxes;
                $this->memberTrxesScheduledForDeletion->clear();
            }
            $this->memberTrxesScheduledForDeletion[]= clone $memberTrx;
            $memberTrx->setMember(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Member is new, it will return
     * an empty collection; or if this Member has previously
     * been saved, it will retrieve related MemberTrxes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Member.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildMemberTrx[] List of ChildMemberTrx objects
     */
    public function getMemberTrxesJoinProduk(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildMemberTrxQuery::create(null, $criteria);
        $query->joinWith('Produk', $joinBehavior);

        return $this->getMemberTrxes($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->id = null;
        $this->kode_member = null;
        $this->nama = null;
        $this->password = null;
        $this->nohp = null;
        $this->alamat = null;
        $this->id_kota = null;
        $this->email = null;
        $this->pin = null;
        $this->level = null;
        $this->saldo = null;
        $this->reff = null;
        $this->tgl_daftar = null;
        $this->status = null;
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
            if ($this->collMemberMutasis) {
                foreach ($this->collMemberMutasis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMemberRequests) {
                foreach ($this->collMemberRequests as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMemberTikets) {
                foreach ($this->collMemberTikets as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMemberTrxes) {
                foreach ($this->collMemberTrxes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collMemberMutasis = null;
        $this->collMemberRequests = null;
        $this->collMemberTikets = null;
        $this->collMemberTrxes = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(MemberTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
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
