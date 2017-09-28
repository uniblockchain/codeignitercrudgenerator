<?php

namespace Base;

use \JenisProduk as ChildJenisProduk;
use \JenisProdukQuery as ChildJenisProdukQuery;
use \MemberRequest as ChildMemberRequest;
use \MemberRequestQuery as ChildMemberRequestQuery;
use \MemberRespone as ChildMemberRespone;
use \MemberResponeQuery as ChildMemberResponeQuery;
use \MemberTrx as ChildMemberTrx;
use \MemberTrxQuery as ChildMemberTrxQuery;
use \Nominal as ChildNominal;
use \NominalQuery as ChildNominalQuery;
use \Operator as ChildOperator;
use \OperatorQuery as ChildOperatorQuery;
use \Produk as ChildProduk;
use \ProdukQuery as ChildProdukQuery;
use \ProdukSupplier as ChildProdukSupplier;
use \ProdukSupplierQuery as ChildProdukSupplierQuery;
use \Exception;
use \PDO;
use Map\MemberRequestTableMap;
use Map\MemberResponeTableMap;
use Map\MemberTrxTableMap;
use Map\ProdukSupplierTableMap;
use Map\ProdukTableMap;
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

/**
 * Base class that represents a row from the 'produk' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Produk implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\ProdukTableMap';


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
     * The value for the kode_produk field.
     *
     * @var        string
     */
    protected $kode_produk;

    /**
     * The value for the nama field.
     *
     * @var        string
     */
    protected $nama;

    /**
     * The value for the id_nominal field.
     *
     * @var        int
     */
    protected $id_nominal;

    /**
     * The value for the id_jenis_produk field.
     *
     * @var        int
     */
    protected $id_jenis_produk;

    /**
     * The value for the id_operator field.
     *
     * @var        int
     */
    protected $id_operator;

    /**
     * The value for the harga_jual field.
     *
     * @var        int
     */
    protected $harga_jual;

    /**
     * The value for the masa_aktif field.
     *
     * @var        string
     */
    protected $masa_aktif;

    /**
     * The value for the keterangan field.
     *
     * @var        string
     */
    protected $keterangan;

    /**
     * The value for the status field.
     *
     * @var        int
     */
    protected $status;

    /**
     * @var        ChildNominal
     */
    protected $aNominal;

    /**
     * @var        ChildJenisProduk
     */
    protected $aJenisProduk;

    /**
     * @var        ChildOperator
     */
    protected $aOperator;

    /**
     * @var        ObjectCollection|ChildMemberRequest[] Collection to store aggregation of ChildMemberRequest objects.
     */
    protected $collMemberRequests;
    protected $collMemberRequestsPartial;

    /**
     * @var        ObjectCollection|ChildMemberRespone[] Collection to store aggregation of ChildMemberRespone objects.
     */
    protected $collMemberRespones;
    protected $collMemberResponesPartial;

    /**
     * @var        ObjectCollection|ChildMemberTrx[] Collection to store aggregation of ChildMemberTrx objects.
     */
    protected $collMemberTrxes;
    protected $collMemberTrxesPartial;

    /**
     * @var        ObjectCollection|ChildProdukSupplier[] Collection to store aggregation of ChildProdukSupplier objects.
     */
    protected $collProdukSuppliers;
    protected $collProdukSuppliersPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildMemberRequest[]
     */
    protected $memberRequestsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildMemberRespone[]
     */
    protected $memberResponesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildMemberTrx[]
     */
    protected $memberTrxesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildProdukSupplier[]
     */
    protected $produkSuppliersScheduledForDeletion = null;

    /**
     * Initializes internal state of Base\Produk object.
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
     * Compares this with another <code>Produk</code> instance.  If
     * <code>obj</code> is an instance of <code>Produk</code>, delegates to
     * <code>equals(Produk)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Produk The current object, for fluid interface
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
     * Get the [kode_produk] column value.
     *
     * @return string
     */
    public function getKodeProduk()
    {
        return $this->kode_produk;
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
     * Get the [id_nominal] column value.
     *
     * @return int
     */
    public function getIdNominal()
    {
        return $this->id_nominal;
    }

    /**
     * Get the [id_jenis_produk] column value.
     *
     * @return int
     */
    public function getIdJenisProduk()
    {
        return $this->id_jenis_produk;
    }

    /**
     * Get the [id_operator] column value.
     *
     * @return int
     */
    public function getIdOperator()
    {
        return $this->id_operator;
    }

    /**
     * Get the [harga_jual] column value.
     *
     * @return int
     */
    public function getHargaJual()
    {
        return $this->harga_jual;
    }

    /**
     * Get the [masa_aktif] column value.
     *
     * @return string
     */
    public function getMasaAktif()
    {
        return $this->masa_aktif;
    }

    /**
     * Get the [keterangan] column value.
     *
     * @return string
     */
    public function getKeterangan()
    {
        return $this->keterangan;
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
     * @return $this|\Produk The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[ProdukTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [kode_produk] column.
     *
     * @param string $v new value
     * @return $this|\Produk The current object (for fluent API support)
     */
    public function setKodeProduk($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->kode_produk !== $v) {
            $this->kode_produk = $v;
            $this->modifiedColumns[ProdukTableMap::COL_KODE_PRODUK] = true;
        }

        return $this;
    } // setKodeProduk()

    /**
     * Set the value of [nama] column.
     *
     * @param string $v new value
     * @return $this|\Produk The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[ProdukTableMap::COL_NAMA] = true;
        }

        return $this;
    } // setNama()

    /**
     * Set the value of [id_nominal] column.
     *
     * @param int $v new value
     * @return $this|\Produk The current object (for fluent API support)
     */
    public function setIdNominal($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_nominal !== $v) {
            $this->id_nominal = $v;
            $this->modifiedColumns[ProdukTableMap::COL_ID_NOMINAL] = true;
        }

        if ($this->aNominal !== null && $this->aNominal->getId() !== $v) {
            $this->aNominal = null;
        }

        return $this;
    } // setIdNominal()

    /**
     * Set the value of [id_jenis_produk] column.
     *
     * @param int $v new value
     * @return $this|\Produk The current object (for fluent API support)
     */
    public function setIdJenisProduk($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_jenis_produk !== $v) {
            $this->id_jenis_produk = $v;
            $this->modifiedColumns[ProdukTableMap::COL_ID_JENIS_PRODUK] = true;
        }

        if ($this->aJenisProduk !== null && $this->aJenisProduk->getId() !== $v) {
            $this->aJenisProduk = null;
        }

        return $this;
    } // setIdJenisProduk()

    /**
     * Set the value of [id_operator] column.
     *
     * @param int $v new value
     * @return $this|\Produk The current object (for fluent API support)
     */
    public function setIdOperator($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_operator !== $v) {
            $this->id_operator = $v;
            $this->modifiedColumns[ProdukTableMap::COL_ID_OPERATOR] = true;
        }

        if ($this->aOperator !== null && $this->aOperator->getId() !== $v) {
            $this->aOperator = null;
        }

        return $this;
    } // setIdOperator()

    /**
     * Set the value of [harga_jual] column.
     *
     * @param int $v new value
     * @return $this|\Produk The current object (for fluent API support)
     */
    public function setHargaJual($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->harga_jual !== $v) {
            $this->harga_jual = $v;
            $this->modifiedColumns[ProdukTableMap::COL_HARGA_JUAL] = true;
        }

        return $this;
    } // setHargaJual()

    /**
     * Set the value of [masa_aktif] column.
     *
     * @param string $v new value
     * @return $this|\Produk The current object (for fluent API support)
     */
    public function setMasaAktif($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->masa_aktif !== $v) {
            $this->masa_aktif = $v;
            $this->modifiedColumns[ProdukTableMap::COL_MASA_AKTIF] = true;
        }

        return $this;
    } // setMasaAktif()

    /**
     * Set the value of [keterangan] column.
     *
     * @param string $v new value
     * @return $this|\Produk The current object (for fluent API support)
     */
    public function setKeterangan($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->keterangan !== $v) {
            $this->keterangan = $v;
            $this->modifiedColumns[ProdukTableMap::COL_KETERANGAN] = true;
        }

        return $this;
    } // setKeterangan()

    /**
     * Set the value of [status] column.
     *
     * @param int $v new value
     * @return $this|\Produk The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[ProdukTableMap::COL_STATUS] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : ProdukTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : ProdukTableMap::translateFieldName('KodeProduk', TableMap::TYPE_PHPNAME, $indexType)];
            $this->kode_produk = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : ProdukTableMap::translateFieldName('Nama', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nama = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : ProdukTableMap::translateFieldName('IdNominal', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_nominal = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : ProdukTableMap::translateFieldName('IdJenisProduk', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_jenis_produk = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : ProdukTableMap::translateFieldName('IdOperator', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_operator = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : ProdukTableMap::translateFieldName('HargaJual', TableMap::TYPE_PHPNAME, $indexType)];
            $this->harga_jual = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : ProdukTableMap::translateFieldName('MasaAktif', TableMap::TYPE_PHPNAME, $indexType)];
            $this->masa_aktif = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : ProdukTableMap::translateFieldName('Keterangan', TableMap::TYPE_PHPNAME, $indexType)];
            $this->keterangan = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : ProdukTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 10; // 10 = ProdukTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Produk'), 0, $e);
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
        if ($this->aNominal !== null && $this->id_nominal !== $this->aNominal->getId()) {
            $this->aNominal = null;
        }
        if ($this->aJenisProduk !== null && $this->id_jenis_produk !== $this->aJenisProduk->getId()) {
            $this->aJenisProduk = null;
        }
        if ($this->aOperator !== null && $this->id_operator !== $this->aOperator->getId()) {
            $this->aOperator = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(ProdukTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildProdukQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aNominal = null;
            $this->aJenisProduk = null;
            $this->aOperator = null;
            $this->collMemberRequests = null;

            $this->collMemberRespones = null;

            $this->collMemberTrxes = null;

            $this->collProdukSuppliers = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Produk::setDeleted()
     * @see Produk::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProdukTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildProdukQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(ProdukTableMap::DATABASE_NAME);
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
                ProdukTableMap::addInstanceToPool($this);
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

            if ($this->aNominal !== null) {
                if ($this->aNominal->isModified() || $this->aNominal->isNew()) {
                    $affectedRows += $this->aNominal->save($con);
                }
                $this->setNominal($this->aNominal);
            }

            if ($this->aJenisProduk !== null) {
                if ($this->aJenisProduk->isModified() || $this->aJenisProduk->isNew()) {
                    $affectedRows += $this->aJenisProduk->save($con);
                }
                $this->setJenisProduk($this->aJenisProduk);
            }

            if ($this->aOperator !== null) {
                if ($this->aOperator->isModified() || $this->aOperator->isNew()) {
                    $affectedRows += $this->aOperator->save($con);
                }
                $this->setOperator($this->aOperator);
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

            if ($this->memberResponesScheduledForDeletion !== null) {
                if (!$this->memberResponesScheduledForDeletion->isEmpty()) {
                    foreach ($this->memberResponesScheduledForDeletion as $memberRespone) {
                        // need to save related object because we set the relation to null
                        $memberRespone->save($con);
                    }
                    $this->memberResponesScheduledForDeletion = null;
                }
            }

            if ($this->collMemberRespones !== null) {
                foreach ($this->collMemberRespones as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->memberTrxesScheduledForDeletion !== null) {
                if (!$this->memberTrxesScheduledForDeletion->isEmpty()) {
                    foreach ($this->memberTrxesScheduledForDeletion as $memberTrx) {
                        // need to save related object because we set the relation to null
                        $memberTrx->save($con);
                    }
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

            if ($this->produkSuppliersScheduledForDeletion !== null) {
                if (!$this->produkSuppliersScheduledForDeletion->isEmpty()) {
                    foreach ($this->produkSuppliersScheduledForDeletion as $produkSupplier) {
                        // need to save related object because we set the relation to null
                        $produkSupplier->save($con);
                    }
                    $this->produkSuppliersScheduledForDeletion = null;
                }
            }

            if ($this->collProdukSuppliers !== null) {
                foreach ($this->collProdukSuppliers as $referrerFK) {
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


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProdukTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(ProdukTableMap::COL_KODE_PRODUK)) {
            $modifiedColumns[':p' . $index++]  = 'kode_produk';
        }
        if ($this->isColumnModified(ProdukTableMap::COL_NAMA)) {
            $modifiedColumns[':p' . $index++]  = 'nama';
        }
        if ($this->isColumnModified(ProdukTableMap::COL_ID_NOMINAL)) {
            $modifiedColumns[':p' . $index++]  = 'id_nominal';
        }
        if ($this->isColumnModified(ProdukTableMap::COL_ID_JENIS_PRODUK)) {
            $modifiedColumns[':p' . $index++]  = 'id_jenis_produk';
        }
        if ($this->isColumnModified(ProdukTableMap::COL_ID_OPERATOR)) {
            $modifiedColumns[':p' . $index++]  = 'id_operator';
        }
        if ($this->isColumnModified(ProdukTableMap::COL_HARGA_JUAL)) {
            $modifiedColumns[':p' . $index++]  = 'harga_jual';
        }
        if ($this->isColumnModified(ProdukTableMap::COL_MASA_AKTIF)) {
            $modifiedColumns[':p' . $index++]  = 'masa_aktif';
        }
        if ($this->isColumnModified(ProdukTableMap::COL_KETERANGAN)) {
            $modifiedColumns[':p' . $index++]  = 'keterangan';
        }
        if ($this->isColumnModified(ProdukTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }

        $sql = sprintf(
            'INSERT INTO produk (%s) VALUES (%s)',
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
                    case 'kode_produk':
                        $stmt->bindValue($identifier, $this->kode_produk, PDO::PARAM_STR);
                        break;
                    case 'nama':
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case 'id_nominal':
                        $stmt->bindValue($identifier, $this->id_nominal, PDO::PARAM_INT);
                        break;
                    case 'id_jenis_produk':
                        $stmt->bindValue($identifier, $this->id_jenis_produk, PDO::PARAM_INT);
                        break;
                    case 'id_operator':
                        $stmt->bindValue($identifier, $this->id_operator, PDO::PARAM_INT);
                        break;
                    case 'harga_jual':
                        $stmt->bindValue($identifier, $this->harga_jual, PDO::PARAM_INT);
                        break;
                    case 'masa_aktif':
                        $stmt->bindValue($identifier, $this->masa_aktif, PDO::PARAM_STR);
                        break;
                    case 'keterangan':
                        $stmt->bindValue($identifier, $this->keterangan, PDO::PARAM_STR);
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
        $pos = ProdukTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getKodeProduk();
                break;
            case 2:
                return $this->getNama();
                break;
            case 3:
                return $this->getIdNominal();
                break;
            case 4:
                return $this->getIdJenisProduk();
                break;
            case 5:
                return $this->getIdOperator();
                break;
            case 6:
                return $this->getHargaJual();
                break;
            case 7:
                return $this->getMasaAktif();
                break;
            case 8:
                return $this->getKeterangan();
                break;
            case 9:
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

        if (isset($alreadyDumpedObjects['Produk'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Produk'][$this->hashCode()] = true;
        $keys = ProdukTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getKodeProduk(),
            $keys[2] => $this->getNama(),
            $keys[3] => $this->getIdNominal(),
            $keys[4] => $this->getIdJenisProduk(),
            $keys[5] => $this->getIdOperator(),
            $keys[6] => $this->getHargaJual(),
            $keys[7] => $this->getMasaAktif(),
            $keys[8] => $this->getKeterangan(),
            $keys[9] => $this->getStatus(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aNominal) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'nominal';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'nominal';
                        break;
                    default:
                        $key = 'Nominal';
                }

                $result[$key] = $this->aNominal->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJenisProduk) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'jenisProduk';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'jenis_produk';
                        break;
                    default:
                        $key = 'JenisProduk';
                }

                $result[$key] = $this->aJenisProduk->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aOperator) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'operator';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'operator';
                        break;
                    default:
                        $key = 'Operator';
                }

                $result[$key] = $this->aOperator->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
            if (null !== $this->collMemberRespones) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'memberRespones';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'member_respones';
                        break;
                    default:
                        $key = 'MemberRespones';
                }

                $result[$key] = $this->collMemberRespones->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
            if (null !== $this->collProdukSuppliers) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'produkSuppliers';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'produk_suppliers';
                        break;
                    default:
                        $key = 'ProdukSuppliers';
                }

                $result[$key] = $this->collProdukSuppliers->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Produk
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = ProdukTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Produk
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setKodeProduk($value);
                break;
            case 2:
                $this->setNama($value);
                break;
            case 3:
                $this->setIdNominal($value);
                break;
            case 4:
                $this->setIdJenisProduk($value);
                break;
            case 5:
                $this->setIdOperator($value);
                break;
            case 6:
                $this->setHargaJual($value);
                break;
            case 7:
                $this->setMasaAktif($value);
                break;
            case 8:
                $this->setKeterangan($value);
                break;
            case 9:
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
        $keys = ProdukTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setKodeProduk($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setNama($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setIdNominal($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setIdJenisProduk($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setIdOperator($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setHargaJual($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setMasaAktif($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setKeterangan($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setStatus($arr[$keys[9]]);
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
     * @return $this|\Produk The current object, for fluid interface
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
        $criteria = new Criteria(ProdukTableMap::DATABASE_NAME);

        if ($this->isColumnModified(ProdukTableMap::COL_ID)) {
            $criteria->add(ProdukTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(ProdukTableMap::COL_KODE_PRODUK)) {
            $criteria->add(ProdukTableMap::COL_KODE_PRODUK, $this->kode_produk);
        }
        if ($this->isColumnModified(ProdukTableMap::COL_NAMA)) {
            $criteria->add(ProdukTableMap::COL_NAMA, $this->nama);
        }
        if ($this->isColumnModified(ProdukTableMap::COL_ID_NOMINAL)) {
            $criteria->add(ProdukTableMap::COL_ID_NOMINAL, $this->id_nominal);
        }
        if ($this->isColumnModified(ProdukTableMap::COL_ID_JENIS_PRODUK)) {
            $criteria->add(ProdukTableMap::COL_ID_JENIS_PRODUK, $this->id_jenis_produk);
        }
        if ($this->isColumnModified(ProdukTableMap::COL_ID_OPERATOR)) {
            $criteria->add(ProdukTableMap::COL_ID_OPERATOR, $this->id_operator);
        }
        if ($this->isColumnModified(ProdukTableMap::COL_HARGA_JUAL)) {
            $criteria->add(ProdukTableMap::COL_HARGA_JUAL, $this->harga_jual);
        }
        if ($this->isColumnModified(ProdukTableMap::COL_MASA_AKTIF)) {
            $criteria->add(ProdukTableMap::COL_MASA_AKTIF, $this->masa_aktif);
        }
        if ($this->isColumnModified(ProdukTableMap::COL_KETERANGAN)) {
            $criteria->add(ProdukTableMap::COL_KETERANGAN, $this->keterangan);
        }
        if ($this->isColumnModified(ProdukTableMap::COL_STATUS)) {
            $criteria->add(ProdukTableMap::COL_STATUS, $this->status);
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
        $criteria = ChildProdukQuery::create();
        $criteria->add(ProdukTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \Produk (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setId($this->getId());
        $copyObj->setKodeProduk($this->getKodeProduk());
        $copyObj->setNama($this->getNama());
        $copyObj->setIdNominal($this->getIdNominal());
        $copyObj->setIdJenisProduk($this->getIdJenisProduk());
        $copyObj->setIdOperator($this->getIdOperator());
        $copyObj->setHargaJual($this->getHargaJual());
        $copyObj->setMasaAktif($this->getMasaAktif());
        $copyObj->setKeterangan($this->getKeterangan());
        $copyObj->setStatus($this->getStatus());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getMemberRequests() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMemberRequest($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMemberRespones() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMemberRespone($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMemberTrxes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMemberTrx($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProdukSuppliers() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProdukSupplier($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
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
     * @return \Produk Clone of current object.
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
     * Declares an association between this object and a ChildNominal object.
     *
     * @param  ChildNominal $v
     * @return $this|\Produk The current object (for fluent API support)
     * @throws PropelException
     */
    public function setNominal(ChildNominal $v = null)
    {
        if ($v === null) {
            $this->setIdNominal(NULL);
        } else {
            $this->setIdNominal($v->getId());
        }

        $this->aNominal = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildNominal object, it will not be re-added.
        if ($v !== null) {
            $v->addProduk($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildNominal object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildNominal The associated ChildNominal object.
     * @throws PropelException
     */
    public function getNominal(ConnectionInterface $con = null)
    {
        if ($this->aNominal === null && ($this->id_nominal != 0)) {
            $this->aNominal = ChildNominalQuery::create()->findPk($this->id_nominal, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aNominal->addProduks($this);
             */
        }

        return $this->aNominal;
    }

    /**
     * Declares an association between this object and a ChildJenisProduk object.
     *
     * @param  ChildJenisProduk $v
     * @return $this|\Produk The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenisProduk(ChildJenisProduk $v = null)
    {
        if ($v === null) {
            $this->setIdJenisProduk(NULL);
        } else {
            $this->setIdJenisProduk($v->getId());
        }

        $this->aJenisProduk = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildJenisProduk object, it will not be re-added.
        if ($v !== null) {
            $v->addProduk($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildJenisProduk object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildJenisProduk The associated ChildJenisProduk object.
     * @throws PropelException
     */
    public function getJenisProduk(ConnectionInterface $con = null)
    {
        if ($this->aJenisProduk === null && ($this->id_jenis_produk != 0)) {
            $this->aJenisProduk = ChildJenisProdukQuery::create()->findPk($this->id_jenis_produk, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenisProduk->addProduks($this);
             */
        }

        return $this->aJenisProduk;
    }

    /**
     * Declares an association between this object and a ChildOperator object.
     *
     * @param  ChildOperator $v
     * @return $this|\Produk The current object (for fluent API support)
     * @throws PropelException
     */
    public function setOperator(ChildOperator $v = null)
    {
        if ($v === null) {
            $this->setIdOperator(NULL);
        } else {
            $this->setIdOperator($v->getId());
        }

        $this->aOperator = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildOperator object, it will not be re-added.
        if ($v !== null) {
            $v->addProduk($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildOperator object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildOperator The associated ChildOperator object.
     * @throws PropelException
     */
    public function getOperator(ConnectionInterface $con = null)
    {
        if ($this->aOperator === null && ($this->id_operator != 0)) {
            $this->aOperator = ChildOperatorQuery::create()->findPk($this->id_operator, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aOperator->addProduks($this);
             */
        }

        return $this->aOperator;
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
        if ('MemberRequest' == $relationName) {
            $this->initMemberRequests();
            return;
        }
        if ('MemberRespone' == $relationName) {
            $this->initMemberRespones();
            return;
        }
        if ('MemberTrx' == $relationName) {
            $this->initMemberTrxes();
            return;
        }
        if ('ProdukSupplier' == $relationName) {
            $this->initProdukSuppliers();
            return;
        }
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
     * If this ChildProduk is new, it will return
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
                    ->filterByProduk($this)
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
     * @return $this|ChildProduk The current object (for fluent API support)
     */
    public function setMemberRequests(Collection $memberRequests, ConnectionInterface $con = null)
    {
        /** @var ChildMemberRequest[] $memberRequestsToDelete */
        $memberRequestsToDelete = $this->getMemberRequests(new Criteria(), $con)->diff($memberRequests);


        $this->memberRequestsScheduledForDeletion = $memberRequestsToDelete;

        foreach ($memberRequestsToDelete as $memberRequestRemoved) {
            $memberRequestRemoved->setProduk(null);
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
                ->filterByProduk($this)
                ->count($con);
        }

        return count($this->collMemberRequests);
    }

    /**
     * Method called to associate a ChildMemberRequest object to this object
     * through the ChildMemberRequest foreign key attribute.
     *
     * @param  ChildMemberRequest $l ChildMemberRequest
     * @return $this|\Produk The current object (for fluent API support)
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
        $memberRequest->setProduk($this);
    }

    /**
     * @param  ChildMemberRequest $memberRequest The ChildMemberRequest object to remove.
     * @return $this|ChildProduk The current object (for fluent API support)
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
            $memberRequest->setProduk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Produk is new, it will return
     * an empty collection; or if this Produk has previously
     * been saved, it will retrieve related MemberRequests from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Produk.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildMemberRequest[] List of ChildMemberRequest objects
     */
    public function getMemberRequestsJoinMember(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildMemberRequestQuery::create(null, $criteria);
        $query->joinWith('Member', $joinBehavior);

        return $this->getMemberRequests($query, $con);
    }

    /**
     * Clears out the collMemberRespones collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addMemberRespones()
     */
    public function clearMemberRespones()
    {
        $this->collMemberRespones = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collMemberRespones collection loaded partially.
     */
    public function resetPartialMemberRespones($v = true)
    {
        $this->collMemberResponesPartial = $v;
    }

    /**
     * Initializes the collMemberRespones collection.
     *
     * By default this just sets the collMemberRespones collection to an empty array (like clearcollMemberRespones());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMemberRespones($overrideExisting = true)
    {
        if (null !== $this->collMemberRespones && !$overrideExisting) {
            return;
        }

        $collectionClassName = MemberResponeTableMap::getTableMap()->getCollectionClassName();

        $this->collMemberRespones = new $collectionClassName;
        $this->collMemberRespones->setModel('\MemberRespone');
    }

    /**
     * Gets an array of ChildMemberRespone objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProduk is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildMemberRespone[] List of ChildMemberRespone objects
     * @throws PropelException
     */
    public function getMemberRespones(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collMemberResponesPartial && !$this->isNew();
        if (null === $this->collMemberRespones || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMemberRespones) {
                // return empty collection
                $this->initMemberRespones();
            } else {
                $collMemberRespones = ChildMemberResponeQuery::create(null, $criteria)
                    ->filterByProduk($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collMemberResponesPartial && count($collMemberRespones)) {
                        $this->initMemberRespones(false);

                        foreach ($collMemberRespones as $obj) {
                            if (false == $this->collMemberRespones->contains($obj)) {
                                $this->collMemberRespones->append($obj);
                            }
                        }

                        $this->collMemberResponesPartial = true;
                    }

                    return $collMemberRespones;
                }

                if ($partial && $this->collMemberRespones) {
                    foreach ($this->collMemberRespones as $obj) {
                        if ($obj->isNew()) {
                            $collMemberRespones[] = $obj;
                        }
                    }
                }

                $this->collMemberRespones = $collMemberRespones;
                $this->collMemberResponesPartial = false;
            }
        }

        return $this->collMemberRespones;
    }

    /**
     * Sets a collection of ChildMemberRespone objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $memberRespones A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProduk The current object (for fluent API support)
     */
    public function setMemberRespones(Collection $memberRespones, ConnectionInterface $con = null)
    {
        /** @var ChildMemberRespone[] $memberResponesToDelete */
        $memberResponesToDelete = $this->getMemberRespones(new Criteria(), $con)->diff($memberRespones);


        $this->memberResponesScheduledForDeletion = $memberResponesToDelete;

        foreach ($memberResponesToDelete as $memberResponeRemoved) {
            $memberResponeRemoved->setProduk(null);
        }

        $this->collMemberRespones = null;
        foreach ($memberRespones as $memberRespone) {
            $this->addMemberRespone($memberRespone);
        }

        $this->collMemberRespones = $memberRespones;
        $this->collMemberResponesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related MemberRespone objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related MemberRespone objects.
     * @throws PropelException
     */
    public function countMemberRespones(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collMemberResponesPartial && !$this->isNew();
        if (null === $this->collMemberRespones || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMemberRespones) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMemberRespones());
            }

            $query = ChildMemberResponeQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProduk($this)
                ->count($con);
        }

        return count($this->collMemberRespones);
    }

    /**
     * Method called to associate a ChildMemberRespone object to this object
     * through the ChildMemberRespone foreign key attribute.
     *
     * @param  ChildMemberRespone $l ChildMemberRespone
     * @return $this|\Produk The current object (for fluent API support)
     */
    public function addMemberRespone(ChildMemberRespone $l)
    {
        if ($this->collMemberRespones === null) {
            $this->initMemberRespones();
            $this->collMemberResponesPartial = true;
        }

        if (!$this->collMemberRespones->contains($l)) {
            $this->doAddMemberRespone($l);

            if ($this->memberResponesScheduledForDeletion and $this->memberResponesScheduledForDeletion->contains($l)) {
                $this->memberResponesScheduledForDeletion->remove($this->memberResponesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildMemberRespone $memberRespone The ChildMemberRespone object to add.
     */
    protected function doAddMemberRespone(ChildMemberRespone $memberRespone)
    {
        $this->collMemberRespones[]= $memberRespone;
        $memberRespone->setProduk($this);
    }

    /**
     * @param  ChildMemberRespone $memberRespone The ChildMemberRespone object to remove.
     * @return $this|ChildProduk The current object (for fluent API support)
     */
    public function removeMemberRespone(ChildMemberRespone $memberRespone)
    {
        if ($this->getMemberRespones()->contains($memberRespone)) {
            $pos = $this->collMemberRespones->search($memberRespone);
            $this->collMemberRespones->remove($pos);
            if (null === $this->memberResponesScheduledForDeletion) {
                $this->memberResponesScheduledForDeletion = clone $this->collMemberRespones;
                $this->memberResponesScheduledForDeletion->clear();
            }
            $this->memberResponesScheduledForDeletion[]= $memberRespone;
            $memberRespone->setProduk(null);
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
     * If this ChildProduk is new, it will return
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
                    ->filterByProduk($this)
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
     * @return $this|ChildProduk The current object (for fluent API support)
     */
    public function setMemberTrxes(Collection $memberTrxes, ConnectionInterface $con = null)
    {
        /** @var ChildMemberTrx[] $memberTrxesToDelete */
        $memberTrxesToDelete = $this->getMemberTrxes(new Criteria(), $con)->diff($memberTrxes);


        $this->memberTrxesScheduledForDeletion = $memberTrxesToDelete;

        foreach ($memberTrxesToDelete as $memberTrxRemoved) {
            $memberTrxRemoved->setProduk(null);
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
                ->filterByProduk($this)
                ->count($con);
        }

        return count($this->collMemberTrxes);
    }

    /**
     * Method called to associate a ChildMemberTrx object to this object
     * through the ChildMemberTrx foreign key attribute.
     *
     * @param  ChildMemberTrx $l ChildMemberTrx
     * @return $this|\Produk The current object (for fluent API support)
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
        $memberTrx->setProduk($this);
    }

    /**
     * @param  ChildMemberTrx $memberTrx The ChildMemberTrx object to remove.
     * @return $this|ChildProduk The current object (for fluent API support)
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
            $this->memberTrxesScheduledForDeletion[]= $memberTrx;
            $memberTrx->setProduk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Produk is new, it will return
     * an empty collection; or if this Produk has previously
     * been saved, it will retrieve related MemberTrxes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Produk.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildMemberTrx[] List of ChildMemberTrx objects
     */
    public function getMemberTrxesJoinMember(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildMemberTrxQuery::create(null, $criteria);
        $query->joinWith('Member', $joinBehavior);

        return $this->getMemberTrxes($query, $con);
    }

    /**
     * Clears out the collProdukSuppliers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addProdukSuppliers()
     */
    public function clearProdukSuppliers()
    {
        $this->collProdukSuppliers = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collProdukSuppliers collection loaded partially.
     */
    public function resetPartialProdukSuppliers($v = true)
    {
        $this->collProdukSuppliersPartial = $v;
    }

    /**
     * Initializes the collProdukSuppliers collection.
     *
     * By default this just sets the collProdukSuppliers collection to an empty array (like clearcollProdukSuppliers());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProdukSuppliers($overrideExisting = true)
    {
        if (null !== $this->collProdukSuppliers && !$overrideExisting) {
            return;
        }

        $collectionClassName = ProdukSupplierTableMap::getTableMap()->getCollectionClassName();

        $this->collProdukSuppliers = new $collectionClassName;
        $this->collProdukSuppliers->setModel('\ProdukSupplier');
    }

    /**
     * Gets an array of ChildProdukSupplier objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProduk is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildProdukSupplier[] List of ChildProdukSupplier objects
     * @throws PropelException
     */
    public function getProdukSuppliers(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collProdukSuppliersPartial && !$this->isNew();
        if (null === $this->collProdukSuppliers || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProdukSuppliers) {
                // return empty collection
                $this->initProdukSuppliers();
            } else {
                $collProdukSuppliers = ChildProdukSupplierQuery::create(null, $criteria)
                    ->filterByProduk($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collProdukSuppliersPartial && count($collProdukSuppliers)) {
                        $this->initProdukSuppliers(false);

                        foreach ($collProdukSuppliers as $obj) {
                            if (false == $this->collProdukSuppliers->contains($obj)) {
                                $this->collProdukSuppliers->append($obj);
                            }
                        }

                        $this->collProdukSuppliersPartial = true;
                    }

                    return $collProdukSuppliers;
                }

                if ($partial && $this->collProdukSuppliers) {
                    foreach ($this->collProdukSuppliers as $obj) {
                        if ($obj->isNew()) {
                            $collProdukSuppliers[] = $obj;
                        }
                    }
                }

                $this->collProdukSuppliers = $collProdukSuppliers;
                $this->collProdukSuppliersPartial = false;
            }
        }

        return $this->collProdukSuppliers;
    }

    /**
     * Sets a collection of ChildProdukSupplier objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $produkSuppliers A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProduk The current object (for fluent API support)
     */
    public function setProdukSuppliers(Collection $produkSuppliers, ConnectionInterface $con = null)
    {
        /** @var ChildProdukSupplier[] $produkSuppliersToDelete */
        $produkSuppliersToDelete = $this->getProdukSuppliers(new Criteria(), $con)->diff($produkSuppliers);


        $this->produkSuppliersScheduledForDeletion = $produkSuppliersToDelete;

        foreach ($produkSuppliersToDelete as $produkSupplierRemoved) {
            $produkSupplierRemoved->setProduk(null);
        }

        $this->collProdukSuppliers = null;
        foreach ($produkSuppliers as $produkSupplier) {
            $this->addProdukSupplier($produkSupplier);
        }

        $this->collProdukSuppliers = $produkSuppliers;
        $this->collProdukSuppliersPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProdukSupplier objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related ProdukSupplier objects.
     * @throws PropelException
     */
    public function countProdukSuppliers(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collProdukSuppliersPartial && !$this->isNew();
        if (null === $this->collProdukSuppliers || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProdukSuppliers) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProdukSuppliers());
            }

            $query = ChildProdukSupplierQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProduk($this)
                ->count($con);
        }

        return count($this->collProdukSuppliers);
    }

    /**
     * Method called to associate a ChildProdukSupplier object to this object
     * through the ChildProdukSupplier foreign key attribute.
     *
     * @param  ChildProdukSupplier $l ChildProdukSupplier
     * @return $this|\Produk The current object (for fluent API support)
     */
    public function addProdukSupplier(ChildProdukSupplier $l)
    {
        if ($this->collProdukSuppliers === null) {
            $this->initProdukSuppliers();
            $this->collProdukSuppliersPartial = true;
        }

        if (!$this->collProdukSuppliers->contains($l)) {
            $this->doAddProdukSupplier($l);

            if ($this->produkSuppliersScheduledForDeletion and $this->produkSuppliersScheduledForDeletion->contains($l)) {
                $this->produkSuppliersScheduledForDeletion->remove($this->produkSuppliersScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildProdukSupplier $produkSupplier The ChildProdukSupplier object to add.
     */
    protected function doAddProdukSupplier(ChildProdukSupplier $produkSupplier)
    {
        $this->collProdukSuppliers[]= $produkSupplier;
        $produkSupplier->setProduk($this);
    }

    /**
     * @param  ChildProdukSupplier $produkSupplier The ChildProdukSupplier object to remove.
     * @return $this|ChildProduk The current object (for fluent API support)
     */
    public function removeProdukSupplier(ChildProdukSupplier $produkSupplier)
    {
        if ($this->getProdukSuppliers()->contains($produkSupplier)) {
            $pos = $this->collProdukSuppliers->search($produkSupplier);
            $this->collProdukSuppliers->remove($pos);
            if (null === $this->produkSuppliersScheduledForDeletion) {
                $this->produkSuppliersScheduledForDeletion = clone $this->collProdukSuppliers;
                $this->produkSuppliersScheduledForDeletion->clear();
            }
            $this->produkSuppliersScheduledForDeletion[]= $produkSupplier;
            $produkSupplier->setProduk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Produk is new, it will return
     * an empty collection; or if this Produk has previously
     * been saved, it will retrieve related ProdukSuppliers from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Produk.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildProdukSupplier[] List of ChildProdukSupplier objects
     */
    public function getProdukSuppliersJoinSupplier(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildProdukSupplierQuery::create(null, $criteria);
        $query->joinWith('Supplier', $joinBehavior);

        return $this->getProdukSuppliers($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aNominal) {
            $this->aNominal->removeProduk($this);
        }
        if (null !== $this->aJenisProduk) {
            $this->aJenisProduk->removeProduk($this);
        }
        if (null !== $this->aOperator) {
            $this->aOperator->removeProduk($this);
        }
        $this->id = null;
        $this->kode_produk = null;
        $this->nama = null;
        $this->id_nominal = null;
        $this->id_jenis_produk = null;
        $this->id_operator = null;
        $this->harga_jual = null;
        $this->masa_aktif = null;
        $this->keterangan = null;
        $this->status = null;
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
            if ($this->collMemberRequests) {
                foreach ($this->collMemberRequests as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMemberRespones) {
                foreach ($this->collMemberRespones as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMemberTrxes) {
                foreach ($this->collMemberTrxes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProdukSuppliers) {
                foreach ($this->collProdukSuppliers as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collMemberRequests = null;
        $this->collMemberRespones = null;
        $this->collMemberTrxes = null;
        $this->collProdukSuppliers = null;
        $this->aNominal = null;
        $this->aJenisProduk = null;
        $this->aOperator = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProdukTableMap::DEFAULT_STRING_FORMAT);
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
