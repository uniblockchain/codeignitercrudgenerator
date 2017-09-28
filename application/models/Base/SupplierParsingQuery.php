<?php

namespace Base;

use \SupplierParsing as ChildSupplierParsing;
use \SupplierParsingQuery as ChildSupplierParsingQuery;
use \Exception;
use \PDO;
use Map\SupplierParsingTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'supplier_parsing' table.
 *
 *
 *
 * @method     ChildSupplierParsingQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildSupplierParsingQuery orderByIdSupplier($order = Criteria::ASC) Order by the id_supplier column
 * @method     ChildSupplierParsingQuery orderBySukses($order = Criteria::ASC) Order by the sukses column
 * @method     ChildSupplierParsingQuery orderByGagal($order = Criteria::ASC) Order by the gagal column
 * @method     ChildSupplierParsingQuery orderBySn1($order = Criteria::ASC) Order by the sn1 column
 * @method     ChildSupplierParsingQuery orderBySn2($order = Criteria::ASC) Order by the sn2 column
 * @method     ChildSupplierParsingQuery orderBySn3($order = Criteria::ASC) Order by the sn3 column
 * @method     ChildSupplierParsingQuery orderBySn4($order = Criteria::ASC) Order by the sn4 column
 * @method     ChildSupplierParsingQuery orderBySn5($order = Criteria::ASC) Order by the sn5 column
 * @method     ChildSupplierParsingQuery orderBySn6($order = Criteria::ASC) Order by the sn6 column
 * @method     ChildSupplierParsingQuery orderByHargaBeli($order = Criteria::ASC) Order by the harga_beli column
 * @method     ChildSupplierParsingQuery orderBySaldo($order = Criteria::ASC) Order by the saldo column
 * @method     ChildSupplierParsingQuery orderByKodeProduk($order = Criteria::ASC) Order by the kode_produk column
 * @method     ChildSupplierParsingQuery orderByNoTujuan($order = Criteria::ASC) Order by the no_tujuan column
 *
 * @method     ChildSupplierParsingQuery groupById() Group by the id column
 * @method     ChildSupplierParsingQuery groupByIdSupplier() Group by the id_supplier column
 * @method     ChildSupplierParsingQuery groupBySukses() Group by the sukses column
 * @method     ChildSupplierParsingQuery groupByGagal() Group by the gagal column
 * @method     ChildSupplierParsingQuery groupBySn1() Group by the sn1 column
 * @method     ChildSupplierParsingQuery groupBySn2() Group by the sn2 column
 * @method     ChildSupplierParsingQuery groupBySn3() Group by the sn3 column
 * @method     ChildSupplierParsingQuery groupBySn4() Group by the sn4 column
 * @method     ChildSupplierParsingQuery groupBySn5() Group by the sn5 column
 * @method     ChildSupplierParsingQuery groupBySn6() Group by the sn6 column
 * @method     ChildSupplierParsingQuery groupByHargaBeli() Group by the harga_beli column
 * @method     ChildSupplierParsingQuery groupBySaldo() Group by the saldo column
 * @method     ChildSupplierParsingQuery groupByKodeProduk() Group by the kode_produk column
 * @method     ChildSupplierParsingQuery groupByNoTujuan() Group by the no_tujuan column
 *
 * @method     ChildSupplierParsingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSupplierParsingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSupplierParsingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSupplierParsingQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSupplierParsingQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSupplierParsingQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSupplierParsingQuery leftJoinSupplier($relationAlias = null) Adds a LEFT JOIN clause to the query using the Supplier relation
 * @method     ChildSupplierParsingQuery rightJoinSupplier($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Supplier relation
 * @method     ChildSupplierParsingQuery innerJoinSupplier($relationAlias = null) Adds a INNER JOIN clause to the query using the Supplier relation
 *
 * @method     ChildSupplierParsingQuery joinWithSupplier($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Supplier relation
 *
 * @method     ChildSupplierParsingQuery leftJoinWithSupplier() Adds a LEFT JOIN clause and with to the query using the Supplier relation
 * @method     ChildSupplierParsingQuery rightJoinWithSupplier() Adds a RIGHT JOIN clause and with to the query using the Supplier relation
 * @method     ChildSupplierParsingQuery innerJoinWithSupplier() Adds a INNER JOIN clause and with to the query using the Supplier relation
 *
 * @method     \SupplierQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSupplierParsing findOne(ConnectionInterface $con = null) Return the first ChildSupplierParsing matching the query
 * @method     ChildSupplierParsing findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSupplierParsing matching the query, or a new ChildSupplierParsing object populated from the query conditions when no match is found
 *
 * @method     ChildSupplierParsing findOneById(int $id) Return the first ChildSupplierParsing filtered by the id column
 * @method     ChildSupplierParsing findOneByIdSupplier(int $id_supplier) Return the first ChildSupplierParsing filtered by the id_supplier column
 * @method     ChildSupplierParsing findOneBySukses(string $sukses) Return the first ChildSupplierParsing filtered by the sukses column
 * @method     ChildSupplierParsing findOneByGagal(string $gagal) Return the first ChildSupplierParsing filtered by the gagal column
 * @method     ChildSupplierParsing findOneBySn1(string $sn1) Return the first ChildSupplierParsing filtered by the sn1 column
 * @method     ChildSupplierParsing findOneBySn2(string $sn2) Return the first ChildSupplierParsing filtered by the sn2 column
 * @method     ChildSupplierParsing findOneBySn3(string $sn3) Return the first ChildSupplierParsing filtered by the sn3 column
 * @method     ChildSupplierParsing findOneBySn4(string $sn4) Return the first ChildSupplierParsing filtered by the sn4 column
 * @method     ChildSupplierParsing findOneBySn5(string $sn5) Return the first ChildSupplierParsing filtered by the sn5 column
 * @method     ChildSupplierParsing findOneBySn6(string $sn6) Return the first ChildSupplierParsing filtered by the sn6 column
 * @method     ChildSupplierParsing findOneByHargaBeli(string $harga_beli) Return the first ChildSupplierParsing filtered by the harga_beli column
 * @method     ChildSupplierParsing findOneBySaldo(string $saldo) Return the first ChildSupplierParsing filtered by the saldo column
 * @method     ChildSupplierParsing findOneByKodeProduk(string $kode_produk) Return the first ChildSupplierParsing filtered by the kode_produk column
 * @method     ChildSupplierParsing findOneByNoTujuan(string $no_tujuan) Return the first ChildSupplierParsing filtered by the no_tujuan column *

 * @method     ChildSupplierParsing requirePk($key, ConnectionInterface $con = null) Return the ChildSupplierParsing by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplierParsing requireOne(ConnectionInterface $con = null) Return the first ChildSupplierParsing matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSupplierParsing requireOneById(int $id) Return the first ChildSupplierParsing filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplierParsing requireOneByIdSupplier(int $id_supplier) Return the first ChildSupplierParsing filtered by the id_supplier column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplierParsing requireOneBySukses(string $sukses) Return the first ChildSupplierParsing filtered by the sukses column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplierParsing requireOneByGagal(string $gagal) Return the first ChildSupplierParsing filtered by the gagal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplierParsing requireOneBySn1(string $sn1) Return the first ChildSupplierParsing filtered by the sn1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplierParsing requireOneBySn2(string $sn2) Return the first ChildSupplierParsing filtered by the sn2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplierParsing requireOneBySn3(string $sn3) Return the first ChildSupplierParsing filtered by the sn3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplierParsing requireOneBySn4(string $sn4) Return the first ChildSupplierParsing filtered by the sn4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplierParsing requireOneBySn5(string $sn5) Return the first ChildSupplierParsing filtered by the sn5 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplierParsing requireOneBySn6(string $sn6) Return the first ChildSupplierParsing filtered by the sn6 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplierParsing requireOneByHargaBeli(string $harga_beli) Return the first ChildSupplierParsing filtered by the harga_beli column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplierParsing requireOneBySaldo(string $saldo) Return the first ChildSupplierParsing filtered by the saldo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplierParsing requireOneByKodeProduk(string $kode_produk) Return the first ChildSupplierParsing filtered by the kode_produk column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplierParsing requireOneByNoTujuan(string $no_tujuan) Return the first ChildSupplierParsing filtered by the no_tujuan column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSupplierParsing[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSupplierParsing objects based on current ModelCriteria
 * @method     ChildSupplierParsing[]|ObjectCollection findById(int $id) Return ChildSupplierParsing objects filtered by the id column
 * @method     ChildSupplierParsing[]|ObjectCollection findByIdSupplier(int $id_supplier) Return ChildSupplierParsing objects filtered by the id_supplier column
 * @method     ChildSupplierParsing[]|ObjectCollection findBySukses(string $sukses) Return ChildSupplierParsing objects filtered by the sukses column
 * @method     ChildSupplierParsing[]|ObjectCollection findByGagal(string $gagal) Return ChildSupplierParsing objects filtered by the gagal column
 * @method     ChildSupplierParsing[]|ObjectCollection findBySn1(string $sn1) Return ChildSupplierParsing objects filtered by the sn1 column
 * @method     ChildSupplierParsing[]|ObjectCollection findBySn2(string $sn2) Return ChildSupplierParsing objects filtered by the sn2 column
 * @method     ChildSupplierParsing[]|ObjectCollection findBySn3(string $sn3) Return ChildSupplierParsing objects filtered by the sn3 column
 * @method     ChildSupplierParsing[]|ObjectCollection findBySn4(string $sn4) Return ChildSupplierParsing objects filtered by the sn4 column
 * @method     ChildSupplierParsing[]|ObjectCollection findBySn5(string $sn5) Return ChildSupplierParsing objects filtered by the sn5 column
 * @method     ChildSupplierParsing[]|ObjectCollection findBySn6(string $sn6) Return ChildSupplierParsing objects filtered by the sn6 column
 * @method     ChildSupplierParsing[]|ObjectCollection findByHargaBeli(string $harga_beli) Return ChildSupplierParsing objects filtered by the harga_beli column
 * @method     ChildSupplierParsing[]|ObjectCollection findBySaldo(string $saldo) Return ChildSupplierParsing objects filtered by the saldo column
 * @method     ChildSupplierParsing[]|ObjectCollection findByKodeProduk(string $kode_produk) Return ChildSupplierParsing objects filtered by the kode_produk column
 * @method     ChildSupplierParsing[]|ObjectCollection findByNoTujuan(string $no_tujuan) Return ChildSupplierParsing objects filtered by the no_tujuan column
 * @method     ChildSupplierParsing[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SupplierParsingQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\SupplierParsingQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\SupplierParsing', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSupplierParsingQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSupplierParsingQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSupplierParsingQuery) {
            return $criteria;
        }
        $query = new ChildSupplierParsingQuery();
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
     * @return ChildSupplierParsing|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SupplierParsingTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = SupplierParsingTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildSupplierParsing A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, id_supplier, sukses, gagal, sn1, sn2, sn3, sn4, sn5, sn6, harga_beli, saldo, kode_produk, no_tujuan FROM supplier_parsing WHERE id = :p0';
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
            /** @var ChildSupplierParsing $obj */
            $obj = new ChildSupplierParsing();
            $obj->hydrate($row);
            SupplierParsingTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildSupplierParsing|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSupplierParsingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SupplierParsingTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSupplierParsingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SupplierParsingTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildSupplierParsingQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(SupplierParsingTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SupplierParsingTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SupplierParsingTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildSupplierParsingQuery The current query, for fluid interface
     */
    public function filterByIdSupplier($idSupplier = null, $comparison = null)
    {
        if (is_array($idSupplier)) {
            $useMinMax = false;
            if (isset($idSupplier['min'])) {
                $this->addUsingAlias(SupplierParsingTableMap::COL_ID_SUPPLIER, $idSupplier['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSupplier['max'])) {
                $this->addUsingAlias(SupplierParsingTableMap::COL_ID_SUPPLIER, $idSupplier['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SupplierParsingTableMap::COL_ID_SUPPLIER, $idSupplier, $comparison);
    }

    /**
     * Filter the query on the sukses column
     *
     * Example usage:
     * <code>
     * $query->filterBySukses('fooValue');   // WHERE sukses = 'fooValue'
     * $query->filterBySukses('%fooValue%', Criteria::LIKE); // WHERE sukses LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sukses The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSupplierParsingQuery The current query, for fluid interface
     */
    public function filterBySukses($sukses = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sukses)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SupplierParsingTableMap::COL_SUKSES, $sukses, $comparison);
    }

    /**
     * Filter the query on the gagal column
     *
     * Example usage:
     * <code>
     * $query->filterByGagal('fooValue');   // WHERE gagal = 'fooValue'
     * $query->filterByGagal('%fooValue%', Criteria::LIKE); // WHERE gagal LIKE '%fooValue%'
     * </code>
     *
     * @param     string $gagal The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSupplierParsingQuery The current query, for fluid interface
     */
    public function filterByGagal($gagal = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($gagal)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SupplierParsingTableMap::COL_GAGAL, $gagal, $comparison);
    }

    /**
     * Filter the query on the sn1 column
     *
     * Example usage:
     * <code>
     * $query->filterBySn1('fooValue');   // WHERE sn1 = 'fooValue'
     * $query->filterBySn1('%fooValue%', Criteria::LIKE); // WHERE sn1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sn1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSupplierParsingQuery The current query, for fluid interface
     */
    public function filterBySn1($sn1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sn1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SupplierParsingTableMap::COL_SN1, $sn1, $comparison);
    }

    /**
     * Filter the query on the sn2 column
     *
     * Example usage:
     * <code>
     * $query->filterBySn2('fooValue');   // WHERE sn2 = 'fooValue'
     * $query->filterBySn2('%fooValue%', Criteria::LIKE); // WHERE sn2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sn2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSupplierParsingQuery The current query, for fluid interface
     */
    public function filterBySn2($sn2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sn2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SupplierParsingTableMap::COL_SN2, $sn2, $comparison);
    }

    /**
     * Filter the query on the sn3 column
     *
     * Example usage:
     * <code>
     * $query->filterBySn3('fooValue');   // WHERE sn3 = 'fooValue'
     * $query->filterBySn3('%fooValue%', Criteria::LIKE); // WHERE sn3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sn3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSupplierParsingQuery The current query, for fluid interface
     */
    public function filterBySn3($sn3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sn3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SupplierParsingTableMap::COL_SN3, $sn3, $comparison);
    }

    /**
     * Filter the query on the sn4 column
     *
     * Example usage:
     * <code>
     * $query->filterBySn4('fooValue');   // WHERE sn4 = 'fooValue'
     * $query->filterBySn4('%fooValue%', Criteria::LIKE); // WHERE sn4 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sn4 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSupplierParsingQuery The current query, for fluid interface
     */
    public function filterBySn4($sn4 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sn4)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SupplierParsingTableMap::COL_SN4, $sn4, $comparison);
    }

    /**
     * Filter the query on the sn5 column
     *
     * Example usage:
     * <code>
     * $query->filterBySn5('fooValue');   // WHERE sn5 = 'fooValue'
     * $query->filterBySn5('%fooValue%', Criteria::LIKE); // WHERE sn5 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sn5 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSupplierParsingQuery The current query, for fluid interface
     */
    public function filterBySn5($sn5 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sn5)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SupplierParsingTableMap::COL_SN5, $sn5, $comparison);
    }

    /**
     * Filter the query on the sn6 column
     *
     * Example usage:
     * <code>
     * $query->filterBySn6('fooValue');   // WHERE sn6 = 'fooValue'
     * $query->filterBySn6('%fooValue%', Criteria::LIKE); // WHERE sn6 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sn6 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSupplierParsingQuery The current query, for fluid interface
     */
    public function filterBySn6($sn6 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sn6)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SupplierParsingTableMap::COL_SN6, $sn6, $comparison);
    }

    /**
     * Filter the query on the harga_beli column
     *
     * Example usage:
     * <code>
     * $query->filterByHargaBeli('fooValue');   // WHERE harga_beli = 'fooValue'
     * $query->filterByHargaBeli('%fooValue%', Criteria::LIKE); // WHERE harga_beli LIKE '%fooValue%'
     * </code>
     *
     * @param     string $hargaBeli The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSupplierParsingQuery The current query, for fluid interface
     */
    public function filterByHargaBeli($hargaBeli = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hargaBeli)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SupplierParsingTableMap::COL_HARGA_BELI, $hargaBeli, $comparison);
    }

    /**
     * Filter the query on the saldo column
     *
     * Example usage:
     * <code>
     * $query->filterBySaldo('fooValue');   // WHERE saldo = 'fooValue'
     * $query->filterBySaldo('%fooValue%', Criteria::LIKE); // WHERE saldo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $saldo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSupplierParsingQuery The current query, for fluid interface
     */
    public function filterBySaldo($saldo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saldo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SupplierParsingTableMap::COL_SALDO, $saldo, $comparison);
    }

    /**
     * Filter the query on the kode_produk column
     *
     * Example usage:
     * <code>
     * $query->filterByKodeProduk('fooValue');   // WHERE kode_produk = 'fooValue'
     * $query->filterByKodeProduk('%fooValue%', Criteria::LIKE); // WHERE kode_produk LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kodeProduk The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSupplierParsingQuery The current query, for fluid interface
     */
    public function filterByKodeProduk($kodeProduk = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kodeProduk)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SupplierParsingTableMap::COL_KODE_PRODUK, $kodeProduk, $comparison);
    }

    /**
     * Filter the query on the no_tujuan column
     *
     * Example usage:
     * <code>
     * $query->filterByNoTujuan('fooValue');   // WHERE no_tujuan = 'fooValue'
     * $query->filterByNoTujuan('%fooValue%', Criteria::LIKE); // WHERE no_tujuan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noTujuan The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSupplierParsingQuery The current query, for fluid interface
     */
    public function filterByNoTujuan($noTujuan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noTujuan)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SupplierParsingTableMap::COL_NO_TUJUAN, $noTujuan, $comparison);
    }

    /**
     * Filter the query by a related \Supplier object
     *
     * @param \Supplier|ObjectCollection $supplier The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSupplierParsingQuery The current query, for fluid interface
     */
    public function filterBySupplier($supplier, $comparison = null)
    {
        if ($supplier instanceof \Supplier) {
            return $this
                ->addUsingAlias(SupplierParsingTableMap::COL_ID_SUPPLIER, $supplier->getId(), $comparison);
        } elseif ($supplier instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SupplierParsingTableMap::COL_ID_SUPPLIER, $supplier->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildSupplierParsingQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildSupplierParsing $supplierParsing Object to remove from the list of results
     *
     * @return $this|ChildSupplierParsingQuery The current query, for fluid interface
     */
    public function prune($supplierParsing = null)
    {
        if ($supplierParsing) {
            $this->addUsingAlias(SupplierParsingTableMap::COL_ID, $supplierParsing->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the supplier_parsing table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SupplierParsingTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SupplierParsingTableMap::clearInstancePool();
            SupplierParsingTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SupplierParsingTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SupplierParsingTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SupplierParsingTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SupplierParsingTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SupplierParsingQuery
