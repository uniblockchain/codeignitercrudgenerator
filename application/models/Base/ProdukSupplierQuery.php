<?php

namespace Base;

use \ProdukSupplier as ChildProdukSupplier;
use \ProdukSupplierQuery as ChildProdukSupplierQuery;
use \Exception;
use \PDO;
use Map\ProdukSupplierTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'produk_supplier' table.
 *
 *
 *
 * @method     ChildProdukSupplierQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildProdukSupplierQuery orderByIdProduk($order = Criteria::ASC) Order by the id_produk column
 * @method     ChildProdukSupplierQuery orderByIdSupplier($order = Criteria::ASC) Order by the id_supplier column
 * @method     ChildProdukSupplierQuery orderByHargaBeli($order = Criteria::ASC) Order by the harga_beli column
 * @method     ChildProdukSupplierQuery orderByJamAktif($order = Criteria::ASC) Order by the jam_aktif column
 * @method     ChildProdukSupplierQuery orderByPrioritas($order = Criteria::ASC) Order by the prioritas column
 * @method     ChildProdukSupplierQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method     ChildProdukSupplierQuery groupById() Group by the id column
 * @method     ChildProdukSupplierQuery groupByIdProduk() Group by the id_produk column
 * @method     ChildProdukSupplierQuery groupByIdSupplier() Group by the id_supplier column
 * @method     ChildProdukSupplierQuery groupByHargaBeli() Group by the harga_beli column
 * @method     ChildProdukSupplierQuery groupByJamAktif() Group by the jam_aktif column
 * @method     ChildProdukSupplierQuery groupByPrioritas() Group by the prioritas column
 * @method     ChildProdukSupplierQuery groupByStatus() Group by the status column
 *
 * @method     ChildProdukSupplierQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildProdukSupplierQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildProdukSupplierQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildProdukSupplierQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildProdukSupplierQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildProdukSupplierQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildProdukSupplierQuery leftJoinSupplier($relationAlias = null) Adds a LEFT JOIN clause to the query using the Supplier relation
 * @method     ChildProdukSupplierQuery rightJoinSupplier($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Supplier relation
 * @method     ChildProdukSupplierQuery innerJoinSupplier($relationAlias = null) Adds a INNER JOIN clause to the query using the Supplier relation
 *
 * @method     ChildProdukSupplierQuery joinWithSupplier($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Supplier relation
 *
 * @method     ChildProdukSupplierQuery leftJoinWithSupplier() Adds a LEFT JOIN clause and with to the query using the Supplier relation
 * @method     ChildProdukSupplierQuery rightJoinWithSupplier() Adds a RIGHT JOIN clause and with to the query using the Supplier relation
 * @method     ChildProdukSupplierQuery innerJoinWithSupplier() Adds a INNER JOIN clause and with to the query using the Supplier relation
 *
 * @method     ChildProdukSupplierQuery leftJoinProduk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Produk relation
 * @method     ChildProdukSupplierQuery rightJoinProduk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Produk relation
 * @method     ChildProdukSupplierQuery innerJoinProduk($relationAlias = null) Adds a INNER JOIN clause to the query using the Produk relation
 *
 * @method     ChildProdukSupplierQuery joinWithProduk($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Produk relation
 *
 * @method     ChildProdukSupplierQuery leftJoinWithProduk() Adds a LEFT JOIN clause and with to the query using the Produk relation
 * @method     ChildProdukSupplierQuery rightJoinWithProduk() Adds a RIGHT JOIN clause and with to the query using the Produk relation
 * @method     ChildProdukSupplierQuery innerJoinWithProduk() Adds a INNER JOIN clause and with to the query using the Produk relation
 *
 * @method     \SupplierQuery|\ProdukQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildProdukSupplier findOne(ConnectionInterface $con = null) Return the first ChildProdukSupplier matching the query
 * @method     ChildProdukSupplier findOneOrCreate(ConnectionInterface $con = null) Return the first ChildProdukSupplier matching the query, or a new ChildProdukSupplier object populated from the query conditions when no match is found
 *
 * @method     ChildProdukSupplier findOneById(int $id) Return the first ChildProdukSupplier filtered by the id column
 * @method     ChildProdukSupplier findOneByIdProduk(int $id_produk) Return the first ChildProdukSupplier filtered by the id_produk column
 * @method     ChildProdukSupplier findOneByIdSupplier(int $id_supplier) Return the first ChildProdukSupplier filtered by the id_supplier column
 * @method     ChildProdukSupplier findOneByHargaBeli(int $harga_beli) Return the first ChildProdukSupplier filtered by the harga_beli column
 * @method     ChildProdukSupplier findOneByJamAktif(string $jam_aktif) Return the first ChildProdukSupplier filtered by the jam_aktif column
 * @method     ChildProdukSupplier findOneByPrioritas(int $prioritas) Return the first ChildProdukSupplier filtered by the prioritas column
 * @method     ChildProdukSupplier findOneByStatus(int $status) Return the first ChildProdukSupplier filtered by the status column *

 * @method     ChildProdukSupplier requirePk($key, ConnectionInterface $con = null) Return the ChildProdukSupplier by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProdukSupplier requireOne(ConnectionInterface $con = null) Return the first ChildProdukSupplier matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProdukSupplier requireOneById(int $id) Return the first ChildProdukSupplier filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProdukSupplier requireOneByIdProduk(int $id_produk) Return the first ChildProdukSupplier filtered by the id_produk column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProdukSupplier requireOneByIdSupplier(int $id_supplier) Return the first ChildProdukSupplier filtered by the id_supplier column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProdukSupplier requireOneByHargaBeli(int $harga_beli) Return the first ChildProdukSupplier filtered by the harga_beli column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProdukSupplier requireOneByJamAktif(string $jam_aktif) Return the first ChildProdukSupplier filtered by the jam_aktif column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProdukSupplier requireOneByPrioritas(int $prioritas) Return the first ChildProdukSupplier filtered by the prioritas column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProdukSupplier requireOneByStatus(int $status) Return the first ChildProdukSupplier filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProdukSupplier[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildProdukSupplier objects based on current ModelCriteria
 * @method     ChildProdukSupplier[]|ObjectCollection findById(int $id) Return ChildProdukSupplier objects filtered by the id column
 * @method     ChildProdukSupplier[]|ObjectCollection findByIdProduk(int $id_produk) Return ChildProdukSupplier objects filtered by the id_produk column
 * @method     ChildProdukSupplier[]|ObjectCollection findByIdSupplier(int $id_supplier) Return ChildProdukSupplier objects filtered by the id_supplier column
 * @method     ChildProdukSupplier[]|ObjectCollection findByHargaBeli(int $harga_beli) Return ChildProdukSupplier objects filtered by the harga_beli column
 * @method     ChildProdukSupplier[]|ObjectCollection findByJamAktif(string $jam_aktif) Return ChildProdukSupplier objects filtered by the jam_aktif column
 * @method     ChildProdukSupplier[]|ObjectCollection findByPrioritas(int $prioritas) Return ChildProdukSupplier objects filtered by the prioritas column
 * @method     ChildProdukSupplier[]|ObjectCollection findByStatus(int $status) Return ChildProdukSupplier objects filtered by the status column
 * @method     ChildProdukSupplier[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ProdukSupplierQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ProdukSupplierQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\ProdukSupplier', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildProdukSupplierQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildProdukSupplierQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildProdukSupplierQuery) {
            return $criteria;
        }
        $query = new ChildProdukSupplierQuery();
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
     * @return ChildProdukSupplier|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ProdukSupplierTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ProdukSupplierTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildProdukSupplier A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, id_produk, id_supplier, harga_beli, jam_aktif, prioritas, status FROM produk_supplier WHERE id = :p0';
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
            /** @var ChildProdukSupplier $obj */
            $obj = new ChildProdukSupplier();
            $obj->hydrate($row);
            ProdukSupplierTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildProdukSupplier|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildProdukSupplierQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProdukSupplierTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildProdukSupplierQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProdukSupplierTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProdukSupplierQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ProdukSupplierTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ProdukSupplierTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProdukSupplierTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the id_produk column
     *
     * Example usage:
     * <code>
     * $query->filterByIdProduk(1234); // WHERE id_produk = 1234
     * $query->filterByIdProduk(array(12, 34)); // WHERE id_produk IN (12, 34)
     * $query->filterByIdProduk(array('min' => 12)); // WHERE id_produk > 12
     * </code>
     *
     * @see       filterByProduk()
     *
     * @param     mixed $idProduk The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProdukSupplierQuery The current query, for fluid interface
     */
    public function filterByIdProduk($idProduk = null, $comparison = null)
    {
        if (is_array($idProduk)) {
            $useMinMax = false;
            if (isset($idProduk['min'])) {
                $this->addUsingAlias(ProdukSupplierTableMap::COL_ID_PRODUK, $idProduk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idProduk['max'])) {
                $this->addUsingAlias(ProdukSupplierTableMap::COL_ID_PRODUK, $idProduk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProdukSupplierTableMap::COL_ID_PRODUK, $idProduk, $comparison);
    }

    /**
     * Filter the query on the id_supplier column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSupplier(1234); // WHERE id_supplier = 1234
     * $query->filterByIdSupplier(array(12, 34)); // WHERE id_supplier IN (12, 34)
     * $query->filterByIdSupplier(array('min' => 12)); // WHERE id_supplier > 12
     * </code>
     *
     * @see       filterBySupplier()
     *
     * @param     mixed $idSupplier The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProdukSupplierQuery The current query, for fluid interface
     */
    public function filterByIdSupplier($idSupplier = null, $comparison = null)
    {
        if (is_array($idSupplier)) {
            $useMinMax = false;
            if (isset($idSupplier['min'])) {
                $this->addUsingAlias(ProdukSupplierTableMap::COL_ID_SUPPLIER, $idSupplier['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSupplier['max'])) {
                $this->addUsingAlias(ProdukSupplierTableMap::COL_ID_SUPPLIER, $idSupplier['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProdukSupplierTableMap::COL_ID_SUPPLIER, $idSupplier, $comparison);
    }

    /**
     * Filter the query on the harga_beli column
     *
     * Example usage:
     * <code>
     * $query->filterByHargaBeli(1234); // WHERE harga_beli = 1234
     * $query->filterByHargaBeli(array(12, 34)); // WHERE harga_beli IN (12, 34)
     * $query->filterByHargaBeli(array('min' => 12)); // WHERE harga_beli > 12
     * </code>
     *
     * @param     mixed $hargaBeli The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProdukSupplierQuery The current query, for fluid interface
     */
    public function filterByHargaBeli($hargaBeli = null, $comparison = null)
    {
        if (is_array($hargaBeli)) {
            $useMinMax = false;
            if (isset($hargaBeli['min'])) {
                $this->addUsingAlias(ProdukSupplierTableMap::COL_HARGA_BELI, $hargaBeli['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hargaBeli['max'])) {
                $this->addUsingAlias(ProdukSupplierTableMap::COL_HARGA_BELI, $hargaBeli['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProdukSupplierTableMap::COL_HARGA_BELI, $hargaBeli, $comparison);
    }

    /**
     * Filter the query on the jam_aktif column
     *
     * Example usage:
     * <code>
     * $query->filterByJamAktif('fooValue');   // WHERE jam_aktif = 'fooValue'
     * $query->filterByJamAktif('%fooValue%', Criteria::LIKE); // WHERE jam_aktif LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jamAktif The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProdukSupplierQuery The current query, for fluid interface
     */
    public function filterByJamAktif($jamAktif = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jamAktif)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProdukSupplierTableMap::COL_JAM_AKTIF, $jamAktif, $comparison);
    }

    /**
     * Filter the query on the prioritas column
     *
     * Example usage:
     * <code>
     * $query->filterByPrioritas(1234); // WHERE prioritas = 1234
     * $query->filterByPrioritas(array(12, 34)); // WHERE prioritas IN (12, 34)
     * $query->filterByPrioritas(array('min' => 12)); // WHERE prioritas > 12
     * </code>
     *
     * @param     mixed $prioritas The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProdukSupplierQuery The current query, for fluid interface
     */
    public function filterByPrioritas($prioritas = null, $comparison = null)
    {
        if (is_array($prioritas)) {
            $useMinMax = false;
            if (isset($prioritas['min'])) {
                $this->addUsingAlias(ProdukSupplierTableMap::COL_PRIORITAS, $prioritas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($prioritas['max'])) {
                $this->addUsingAlias(ProdukSupplierTableMap::COL_PRIORITAS, $prioritas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProdukSupplierTableMap::COL_PRIORITAS, $prioritas, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(1234); // WHERE status = 1234
     * $query->filterByStatus(array(12, 34)); // WHERE status IN (12, 34)
     * $query->filterByStatus(array('min' => 12)); // WHERE status > 12
     * </code>
     *
     * @param     mixed $status The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProdukSupplierQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(ProdukSupplierTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(ProdukSupplierTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProdukSupplierTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query by a related \Supplier object
     *
     * @param \Supplier|ObjectCollection $supplier The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildProdukSupplierQuery The current query, for fluid interface
     */
    public function filterBySupplier($supplier, $comparison = null)
    {
        if ($supplier instanceof \Supplier) {
            return $this
                ->addUsingAlias(ProdukSupplierTableMap::COL_ID_SUPPLIER, $supplier->getId(), $comparison);
        } elseif ($supplier instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProdukSupplierTableMap::COL_ID_SUPPLIER, $supplier->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBySupplier() only accepts arguments of type \Supplier or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Supplier relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildProdukSupplierQuery The current query, for fluid interface
     */
    public function joinSupplier($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Supplier');

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
            $this->addJoinObject($join, 'Supplier');
        }

        return $this;
    }

    /**
     * Use the Supplier relation Supplier object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \SupplierQuery A secondary query class using the current class as primary query
     */
    public function useSupplierQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSupplier($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Supplier', '\SupplierQuery');
    }

    /**
     * Filter the query by a related \Produk object
     *
     * @param \Produk|ObjectCollection $produk The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildProdukSupplierQuery The current query, for fluid interface
     */
    public function filterByProduk($produk, $comparison = null)
    {
        if ($produk instanceof \Produk) {
            return $this
                ->addUsingAlias(ProdukSupplierTableMap::COL_ID_PRODUK, $produk->getId(), $comparison);
        } elseif ($produk instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProdukSupplierTableMap::COL_ID_PRODUK, $produk->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByProduk() only accepts arguments of type \Produk or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Produk relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildProdukSupplierQuery The current query, for fluid interface
     */
    public function joinProduk($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Produk');

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
            $this->addJoinObject($join, 'Produk');
        }

        return $this;
    }

    /**
     * Use the Produk relation Produk object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ProdukQuery A secondary query class using the current class as primary query
     */
    public function useProdukQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinProduk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Produk', '\ProdukQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildProdukSupplier $produkSupplier Object to remove from the list of results
     *
     * @return $this|ChildProdukSupplierQuery The current query, for fluid interface
     */
    public function prune($produkSupplier = null)
    {
        if ($produkSupplier) {
            $this->addUsingAlias(ProdukSupplierTableMap::COL_ID, $produkSupplier->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the produk_supplier table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProdukSupplierTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ProdukSupplierTableMap::clearInstancePool();
            ProdukSupplierTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ProdukSupplierTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ProdukSupplierTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ProdukSupplierTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ProdukSupplierTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ProdukSupplierQuery
