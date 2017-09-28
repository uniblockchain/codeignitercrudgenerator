<?php

namespace Base;

use \Supplier as ChildSupplier;
use \SupplierParsingQuery as ChildSupplierParsingQuery;
use \SupplierQuery as ChildSupplierQuery;
use \Exception;
use \PDO;
use Map\SupplierParsingTableMap;
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

/**
 * Base class that represents a row from the 'supplier_parsing' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class SupplierParsing implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\SupplierParsingTableMap';


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
     * The value for the id_supplier field.
     *
     * @var        int
     */
    protected $id_supplier;

    /**
     * The value for the sukses field.
     *
     * @var        string
     */
    protected $sukses;

    /**
     * The value for the gagal field.
     *
     * @var        string
     */
    protected $gagal;

    /**
     * The value for the sn1 field.
     *
     * @var        string
     */
    protected $sn1;

    /**
     * The value for the sn2 field.
     *
     * @var        string
     */
    protected $sn2;

    /**
     * The value for the sn3 field.
     *
     * @var        string
     */
    protected $sn3;

    /**
     * The value for the sn4 field.
     *
     * @var        string
     */
    protected $sn4;

    /**
     * The value for the sn5 field.
     *
     * @var        string
     */
    protected $sn5;

    /**
     * The value for the sn6 field.
     *
     * @var        string
     */
    protected $sn6;

    /**
     * The value for the harga_beli field.
     *
     * @var        string
     */
    protected $harga_beli;

    /**
     * The value for the saldo field.
     *
     * @var        string
     */
    protected $saldo;

    /**
     * The value for the kode_produk field.
     *
     * @var        string
     */
    protected $kode_produk;

    /**
     * The value for the no_tujuan field.
     *
     * @var        string
     */
    protected $no_tujuan;

    /**
     * @var        ChildSupplier
     */
    protected $aSupplier;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Base\SupplierParsing object.
     */
    public function __construct()
    {
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
     * Compares this with another <code>SupplierParsing</code> instance.  If
     * <code>obj</code> is an instance of <code>SupplierParsing</code>, delegates to
     * <code>equals(SupplierParsing)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SupplierParsing The current object, for fluid interface
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
     * Get the [id_supplier] column value.
     *
     * @return int
     */
    public function getIdSupplier()
    {
        return $this->id_supplier;
    }

    /**
     * Get the [sukses] column value.
     *
     * @return string
     */
    public function getSukses()
    {
        return $this->sukses;
    }

    /**
     * Get the [gagal] column value.
     *
     * @return string
     */
    public function getGagal()
    {
        return $this->gagal;
    }

    /**
     * Get the [sn1] column value.
     *
     * @return string
     */
    public function getSn1()
    {
        return $this->sn1;
    }

    /**
     * Get the [sn2] column value.
     *
     * @return string
     */
    public function getSn2()
    {
        return $this->sn2;
    }

    /**
     * Get the [sn3] column value.
     *
     * @return string
     */
    public function getSn3()
    {
        return $this->sn3;
    }

    /**
     * Get the [sn4] column value.
     *
     * @return string
     */
    public function getSn4()
    {
        return $this->sn4;
    }

    /**
     * Get the [sn5] column value.
     *
     * @return string
     */
    public function getSn5()
    {
        return $this->sn5;
    }

    /**
     * Get the [sn6] column value.
     *
     * @return string
     */
    public function getSn6()
    {
        return $this->sn6;
    }

    /**
     * Get the [harga_beli] column value.
     *
     * @return string
     */
    public function getHargaBeli()
    {
        return $this->harga_beli;
    }

    /**
     * Get the [saldo] column value.
     *
     * @return string
     */
    public function getSaldo()
    {
        return $this->saldo;
    }

    /**
     * Get the [kode_produk] column value.
     *
     * @return string
     */
    public function getKodeProduk()
    {
        return $this->kode_produk;
    }

    /**
     * Get the [no_tujuan] column value.
     *
     * @return string
     */
    public function getNoTujuan()
    {
        return $this->no_tujuan;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\SupplierParsing The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[SupplierParsingTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [id_supplier] column.
     *
     * @param int $v new value
     * @return $this|\SupplierParsing The current object (for fluent API support)
     */
    public function setIdSupplier($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_supplier !== $v) {
            $this->id_supplier = $v;
            $this->modifiedColumns[SupplierParsingTableMap::COL_ID_SUPPLIER] = true;
        }

        if ($this->aSupplier !== null && $this->aSupplier->getId() !== $v) {
            $this->aSupplier = null;
        }

        return $this;
    } // setIdSupplier()

    /**
     * Set the value of [sukses] column.
     *
     * @param string $v new value
     * @return $this|\SupplierParsing The current object (for fluent API support)
     */
    public function setSukses($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sukses !== $v) {
            $this->sukses = $v;
            $this->modifiedColumns[SupplierParsingTableMap::COL_SUKSES] = true;
        }

        return $this;
    } // setSukses()

    /**
     * Set the value of [gagal] column.
     *
     * @param string $v new value
     * @return $this|\SupplierParsing The current object (for fluent API support)
     */
    public function setGagal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->gagal !== $v) {
            $this->gagal = $v;
            $this->modifiedColumns[SupplierParsingTableMap::COL_GAGAL] = true;
        }

        return $this;
    } // setGagal()

    /**
     * Set the value of [sn1] column.
     *
     * @param string $v new value
     * @return $this|\SupplierParsing The current object (for fluent API support)
     */
    public function setSn1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sn1 !== $v) {
            $this->sn1 = $v;
            $this->modifiedColumns[SupplierParsingTableMap::COL_SN1] = true;
        }

        return $this;
    } // setSn1()

    /**
     * Set the value of [sn2] column.
     *
     * @param string $v new value
     * @return $this|\SupplierParsing The current object (for fluent API support)
     */
    public function setSn2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sn2 !== $v) {
            $this->sn2 = $v;
            $this->modifiedColumns[SupplierParsingTableMap::COL_SN2] = true;
        }

        return $this;
    } // setSn2()

    /**
     * Set the value of [sn3] column.
     *
     * @param string $v new value
     * @return $this|\SupplierParsing The current object (for fluent API support)
     */
    public function setSn3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sn3 !== $v) {
            $this->sn3 = $v;
            $this->modifiedColumns[SupplierParsingTableMap::COL_SN3] = true;
        }

        return $this;
    } // setSn3()

    /**
     * Set the value of [sn4] column.
     *
     * @param string $v new value
     * @return $this|\SupplierParsing The current object (for fluent API support)
     */
    public function setSn4($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sn4 !== $v) {
            $this->sn4 = $v;
            $this->modifiedColumns[SupplierParsingTableMap::COL_SN4] = true;
        }

        return $this;
    } // setSn4()

    /**
     * Set the value of [sn5] column.
     *
     * @param string $v new value
     * @return $this|\SupplierParsing The current object (for fluent API support)
     */
    public function setSn5($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sn5 !== $v) {
            $this->sn5 = $v;
            $this->modifiedColumns[SupplierParsingTableMap::COL_SN5] = true;
        }

        return $this;
    } // setSn5()

    /**
     * Set the value of [sn6] column.
     *
     * @param string $v new value
     * @return $this|\SupplierParsing The current object (for fluent API support)
     */
    public function setSn6($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sn6 !== $v) {
            $this->sn6 = $v;
            $this->modifiedColumns[SupplierParsingTableMap::COL_SN6] = true;
        }

        return $this;
    } // setSn6()

    /**
     * Set the value of [harga_beli] column.
     *
     * @param string $v new value
     * @return $this|\SupplierParsing The current object (for fluent API support)
     */
    public function setHargaBeli($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->harga_beli !== $v) {
            $this->harga_beli = $v;
            $this->modifiedColumns[SupplierParsingTableMap::COL_HARGA_BELI] = true;
        }

        return $this;
    } // setHargaBeli()

    /**
     * Set the value of [saldo] column.
     *
     * @param string $v new value
     * @return $this|\SupplierParsing The current object (for fluent API support)
     */
    public function setSaldo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->saldo !== $v) {
            $this->saldo = $v;
            $this->modifiedColumns[SupplierParsingTableMap::COL_SALDO] = true;
        }

        return $this;
    } // setSaldo()

    /**
     * Set the value of [kode_produk] column.
     *
     * @param string $v new value
     * @return $this|\SupplierParsing The current object (for fluent API support)
     */
    public function setKodeProduk($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->kode_produk !== $v) {
            $this->kode_produk = $v;
            $this->modifiedColumns[SupplierParsingTableMap::COL_KODE_PRODUK] = true;
        }

        return $this;
    } // setKodeProduk()

    /**
     * Set the value of [no_tujuan] column.
     *
     * @param string $v new value
     * @return $this|\SupplierParsing The current object (for fluent API support)
     */
    public function setNoTujuan($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->no_tujuan !== $v) {
            $this->no_tujuan = $v;
            $this->modifiedColumns[SupplierParsingTableMap::COL_NO_TUJUAN] = true;
        }

        return $this;
    } // setNoTujuan()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SupplierParsingTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SupplierParsingTableMap::translateFieldName('IdSupplier', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_supplier = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SupplierParsingTableMap::translateFieldName('Sukses', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sukses = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SupplierParsingTableMap::translateFieldName('Gagal', TableMap::TYPE_PHPNAME, $indexType)];
            $this->gagal = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SupplierParsingTableMap::translateFieldName('Sn1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sn1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : SupplierParsingTableMap::translateFieldName('Sn2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sn2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : SupplierParsingTableMap::translateFieldName('Sn3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sn3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : SupplierParsingTableMap::translateFieldName('Sn4', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sn4 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : SupplierParsingTableMap::translateFieldName('Sn5', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sn5 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : SupplierParsingTableMap::translateFieldName('Sn6', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sn6 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : SupplierParsingTableMap::translateFieldName('HargaBeli', TableMap::TYPE_PHPNAME, $indexType)];
            $this->harga_beli = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : SupplierParsingTableMap::translateFieldName('Saldo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->saldo = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : SupplierParsingTableMap::translateFieldName('KodeProduk', TableMap::TYPE_PHPNAME, $indexType)];
            $this->kode_produk = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : SupplierParsingTableMap::translateFieldName('NoTujuan', TableMap::TYPE_PHPNAME, $indexType)];
            $this->no_tujuan = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 14; // 14 = SupplierParsingTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\SupplierParsing'), 0, $e);
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
        if ($this->aSupplier !== null && $this->id_supplier !== $this->aSupplier->getId()) {
            $this->aSupplier = null;
        }
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
            $con = Propel::getServiceContainer()->getReadConnection(SupplierParsingTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSupplierParsingQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSupplier = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SupplierParsing::setDeleted()
     * @see SupplierParsing::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SupplierParsingTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSupplierParsingQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SupplierParsingTableMap::DATABASE_NAME);
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
                SupplierParsingTableMap::addInstanceToPool($this);
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

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aSupplier !== null) {
                if ($this->aSupplier->isModified() || $this->aSupplier->isNew()) {
                    $affectedRows += $this->aSupplier->save($con);
                }
                $this->setSupplier($this->aSupplier);
            }

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

        $this->modifiedColumns[SupplierParsingTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SupplierParsingTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SupplierParsingTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(SupplierParsingTableMap::COL_ID_SUPPLIER)) {
            $modifiedColumns[':p' . $index++]  = 'id_supplier';
        }
        if ($this->isColumnModified(SupplierParsingTableMap::COL_SUKSES)) {
            $modifiedColumns[':p' . $index++]  = 'sukses';
        }
        if ($this->isColumnModified(SupplierParsingTableMap::COL_GAGAL)) {
            $modifiedColumns[':p' . $index++]  = 'gagal';
        }
        if ($this->isColumnModified(SupplierParsingTableMap::COL_SN1)) {
            $modifiedColumns[':p' . $index++]  = 'sn1';
        }
        if ($this->isColumnModified(SupplierParsingTableMap::COL_SN2)) {
            $modifiedColumns[':p' . $index++]  = 'sn2';
        }
        if ($this->isColumnModified(SupplierParsingTableMap::COL_SN3)) {
            $modifiedColumns[':p' . $index++]  = 'sn3';
        }
        if ($this->isColumnModified(SupplierParsingTableMap::COL_SN4)) {
            $modifiedColumns[':p' . $index++]  = 'sn4';
        }
        if ($this->isColumnModified(SupplierParsingTableMap::COL_SN5)) {
            $modifiedColumns[':p' . $index++]  = 'sn5';
        }
        if ($this->isColumnModified(SupplierParsingTableMap::COL_SN6)) {
            $modifiedColumns[':p' . $index++]  = 'sn6';
        }
        if ($this->isColumnModified(SupplierParsingTableMap::COL_HARGA_BELI)) {
            $modifiedColumns[':p' . $index++]  = 'harga_beli';
        }
        if ($this->isColumnModified(SupplierParsingTableMap::COL_SALDO)) {
            $modifiedColumns[':p' . $index++]  = 'saldo';
        }
        if ($this->isColumnModified(SupplierParsingTableMap::COL_KODE_PRODUK)) {
            $modifiedColumns[':p' . $index++]  = 'kode_produk';
        }
        if ($this->isColumnModified(SupplierParsingTableMap::COL_NO_TUJUAN)) {
            $modifiedColumns[':p' . $index++]  = 'no_tujuan';
        }

        $sql = sprintf(
            'INSERT INTO supplier_parsing (%s) VALUES (%s)',
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
                    case 'id_supplier':
                        $stmt->bindValue($identifier, $this->id_supplier, PDO::PARAM_INT);
                        break;
                    case 'sukses':
                        $stmt->bindValue($identifier, $this->sukses, PDO::PARAM_STR);
                        break;
                    case 'gagal':
                        $stmt->bindValue($identifier, $this->gagal, PDO::PARAM_STR);
                        break;
                    case 'sn1':
                        $stmt->bindValue($identifier, $this->sn1, PDO::PARAM_STR);
                        break;
                    case 'sn2':
                        $stmt->bindValue($identifier, $this->sn2, PDO::PARAM_STR);
                        break;
                    case 'sn3':
                        $stmt->bindValue($identifier, $this->sn3, PDO::PARAM_STR);
                        break;
                    case 'sn4':
                        $stmt->bindValue($identifier, $this->sn4, PDO::PARAM_STR);
                        break;
                    case 'sn5':
                        $stmt->bindValue($identifier, $this->sn5, PDO::PARAM_STR);
                        break;
                    case 'sn6':
                        $stmt->bindValue($identifier, $this->sn6, PDO::PARAM_STR);
                        break;
                    case 'harga_beli':
                        $stmt->bindValue($identifier, $this->harga_beli, PDO::PARAM_STR);
                        break;
                    case 'saldo':
                        $stmt->bindValue($identifier, $this->saldo, PDO::PARAM_STR);
                        break;
                    case 'kode_produk':
                        $stmt->bindValue($identifier, $this->kode_produk, PDO::PARAM_STR);
                        break;
                    case 'no_tujuan':
                        $stmt->bindValue($identifier, $this->no_tujuan, PDO::PARAM_STR);
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
        $pos = SupplierParsingTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdSupplier();
                break;
            case 2:
                return $this->getSukses();
                break;
            case 3:
                return $this->getGagal();
                break;
            case 4:
                return $this->getSn1();
                break;
            case 5:
                return $this->getSn2();
                break;
            case 6:
                return $this->getSn3();
                break;
            case 7:
                return $this->getSn4();
                break;
            case 8:
                return $this->getSn5();
                break;
            case 9:
                return $this->getSn6();
                break;
            case 10:
                return $this->getHargaBeli();
                break;
            case 11:
                return $this->getSaldo();
                break;
            case 12:
                return $this->getKodeProduk();
                break;
            case 13:
                return $this->getNoTujuan();
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

        if (isset($alreadyDumpedObjects['SupplierParsing'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SupplierParsing'][$this->hashCode()] = true;
        $keys = SupplierParsingTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getIdSupplier(),
            $keys[2] => $this->getSukses(),
            $keys[3] => $this->getGagal(),
            $keys[4] => $this->getSn1(),
            $keys[5] => $this->getSn2(),
            $keys[6] => $this->getSn3(),
            $keys[7] => $this->getSn4(),
            $keys[8] => $this->getSn5(),
            $keys[9] => $this->getSn6(),
            $keys[10] => $this->getHargaBeli(),
            $keys[11] => $this->getSaldo(),
            $keys[12] => $this->getKodeProduk(),
            $keys[13] => $this->getNoTujuan(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aSupplier) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'supplier';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'supplier';
                        break;
                    default:
                        $key = 'Supplier';
                }

                $result[$key] = $this->aSupplier->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
     * @return $this|\SupplierParsing
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = SupplierParsingTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\SupplierParsing
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setIdSupplier($value);
                break;
            case 2:
                $this->setSukses($value);
                break;
            case 3:
                $this->setGagal($value);
                break;
            case 4:
                $this->setSn1($value);
                break;
            case 5:
                $this->setSn2($value);
                break;
            case 6:
                $this->setSn3($value);
                break;
            case 7:
                $this->setSn4($value);
                break;
            case 8:
                $this->setSn5($value);
                break;
            case 9:
                $this->setSn6($value);
                break;
            case 10:
                $this->setHargaBeli($value);
                break;
            case 11:
                $this->setSaldo($value);
                break;
            case 12:
                $this->setKodeProduk($value);
                break;
            case 13:
                $this->setNoTujuan($value);
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
        $keys = SupplierParsingTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setIdSupplier($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setSukses($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setGagal($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setSn1($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setSn2($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setSn3($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setSn4($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setSn5($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setSn6($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setHargaBeli($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setSaldo($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setKodeProduk($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setNoTujuan($arr[$keys[13]]);
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
     * @return $this|\SupplierParsing The current object, for fluid interface
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
        $criteria = new Criteria(SupplierParsingTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SupplierParsingTableMap::COL_ID)) {
            $criteria->add(SupplierParsingTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(SupplierParsingTableMap::COL_ID_SUPPLIER)) {
            $criteria->add(SupplierParsingTableMap::COL_ID_SUPPLIER, $this->id_supplier);
        }
        if ($this->isColumnModified(SupplierParsingTableMap::COL_SUKSES)) {
            $criteria->add(SupplierParsingTableMap::COL_SUKSES, $this->sukses);
        }
        if ($this->isColumnModified(SupplierParsingTableMap::COL_GAGAL)) {
            $criteria->add(SupplierParsingTableMap::COL_GAGAL, $this->gagal);
        }
        if ($this->isColumnModified(SupplierParsingTableMap::COL_SN1)) {
            $criteria->add(SupplierParsingTableMap::COL_SN1, $this->sn1);
        }
        if ($this->isColumnModified(SupplierParsingTableMap::COL_SN2)) {
            $criteria->add(SupplierParsingTableMap::COL_SN2, $this->sn2);
        }
        if ($this->isColumnModified(SupplierParsingTableMap::COL_SN3)) {
            $criteria->add(SupplierParsingTableMap::COL_SN3, $this->sn3);
        }
        if ($this->isColumnModified(SupplierParsingTableMap::COL_SN4)) {
            $criteria->add(SupplierParsingTableMap::COL_SN4, $this->sn4);
        }
        if ($this->isColumnModified(SupplierParsingTableMap::COL_SN5)) {
            $criteria->add(SupplierParsingTableMap::COL_SN5, $this->sn5);
        }
        if ($this->isColumnModified(SupplierParsingTableMap::COL_SN6)) {
            $criteria->add(SupplierParsingTableMap::COL_SN6, $this->sn6);
        }
        if ($this->isColumnModified(SupplierParsingTableMap::COL_HARGA_BELI)) {
            $criteria->add(SupplierParsingTableMap::COL_HARGA_BELI, $this->harga_beli);
        }
        if ($this->isColumnModified(SupplierParsingTableMap::COL_SALDO)) {
            $criteria->add(SupplierParsingTableMap::COL_SALDO, $this->saldo);
        }
        if ($this->isColumnModified(SupplierParsingTableMap::COL_KODE_PRODUK)) {
            $criteria->add(SupplierParsingTableMap::COL_KODE_PRODUK, $this->kode_produk);
        }
        if ($this->isColumnModified(SupplierParsingTableMap::COL_NO_TUJUAN)) {
            $criteria->add(SupplierParsingTableMap::COL_NO_TUJUAN, $this->no_tujuan);
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
        $criteria = ChildSupplierParsingQuery::create();
        $criteria->add(SupplierParsingTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \SupplierParsing (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdSupplier($this->getIdSupplier());
        $copyObj->setSukses($this->getSukses());
        $copyObj->setGagal($this->getGagal());
        $copyObj->setSn1($this->getSn1());
        $copyObj->setSn2($this->getSn2());
        $copyObj->setSn3($this->getSn3());
        $copyObj->setSn4($this->getSn4());
        $copyObj->setSn5($this->getSn5());
        $copyObj->setSn6($this->getSn6());
        $copyObj->setHargaBeli($this->getHargaBeli());
        $copyObj->setSaldo($this->getSaldo());
        $copyObj->setKodeProduk($this->getKodeProduk());
        $copyObj->setNoTujuan($this->getNoTujuan());
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
     * @return \SupplierParsing Clone of current object.
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
     * Declares an association between this object and a ChildSupplier object.
     *
     * @param  ChildSupplier $v
     * @return $this|\SupplierParsing The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSupplier(ChildSupplier $v = null)
    {
        if ($v === null) {
            $this->setIdSupplier(NULL);
        } else {
            $this->setIdSupplier($v->getId());
        }

        $this->aSupplier = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSupplier object, it will not be re-added.
        if ($v !== null) {
            $v->addSupplierParsing($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSupplier object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSupplier The associated ChildSupplier object.
     * @throws PropelException
     */
    public function getSupplier(ConnectionInterface $con = null)
    {
        if ($this->aSupplier === null && ($this->id_supplier != 0)) {
            $this->aSupplier = ChildSupplierQuery::create()->findPk($this->id_supplier, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSupplier->addSupplierParsings($this);
             */
        }

        return $this->aSupplier;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aSupplier) {
            $this->aSupplier->removeSupplierParsing($this);
        }
        $this->id = null;
        $this->id_supplier = null;
        $this->sukses = null;
        $this->gagal = null;
        $this->sn1 = null;
        $this->sn2 = null;
        $this->sn3 = null;
        $this->sn4 = null;
        $this->sn5 = null;
        $this->sn6 = null;
        $this->harga_beli = null;
        $this->saldo = null;
        $this->kode_produk = null;
        $this->no_tujuan = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
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

        $this->aSupplier = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SupplierParsingTableMap::DEFAULT_STRING_FORMAT);
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
