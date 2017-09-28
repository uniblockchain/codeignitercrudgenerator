<?php

namespace Base;

use \Supplier as ChildSupplier;
use \SupplierQuery as ChildSupplierQuery;
use \Exception;
use \PDO;
use Map\SupplierTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'supplier' table.
 *
 *
 *
 * @method     ChildSupplierQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildSupplierQuery orderByKodeSupplier($order = Criteria::ASC) Order by the kode_supplier column
 * @method     ChildSupplierQuery orderByNamaSupplier($order = Criteria::ASC) Order by the nama_supplier column
 * @method     ChildSupplierQuery orderByAlamat($order = Criteria::ASC) Order by the alamat column
 * @method     ChildSupplierQuery orderByUser($order = Criteria::ASC) Order by the user column
 * @method     ChildSupplierQuery orderByPass($order = Criteria::ASC) Order by the pass column
 * @method     ChildSupplierQuery orderByPin($order = Criteria::ASC) Order by the pin column
 * @method     ChildSupplierQuery orderByTipeTransaksi($order = Criteria::ASC) Order by the tipe_transaksi column
 * @method     ChildSupplierQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method     ChildSupplierQuery groupById() Group by the id column
 * @method     ChildSupplierQuery groupByKodeSupplier() Group by the kode_supplier column
 * @method     ChildSupplierQuery groupByNamaSupplier() Group by the nama_supplier column
 * @method     ChildSupplierQuery groupByAlamat() Group by the alamat column
 * @method     ChildSupplierQuery groupByUser() Group by the user column
 * @method     ChildSupplierQuery groupByPass() Group by the pass column
 * @method     ChildSupplierQuery groupByPin() Group by the pin column
 * @method     ChildSupplierQuery groupByTipeTransaksi() Group by the tipe_transaksi column
 * @method     ChildSupplierQuery groupByStatus() Group by the status column
 *
 * @method     ChildSupplierQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSupplierQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSupplierQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSupplierQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSupplierQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSupplierQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSupplierQuery leftJoinInJabber($relationAlias = null) Adds a LEFT JOIN clause to the query using the InJabber relation
 * @method     ChildSupplierQuery rightJoinInJabber($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InJabber relation
 * @method     ChildSupplierQuery innerJoinInJabber($relationAlias = null) Adds a INNER JOIN clause to the query using the InJabber relation
 *
 * @method     ChildSupplierQuery joinWithInJabber($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the InJabber relation
 *
 * @method     ChildSupplierQuery leftJoinWithInJabber() Adds a LEFT JOIN clause and with to the query using the InJabber relation
 * @method     ChildSupplierQuery rightJoinWithInJabber() Adds a RIGHT JOIN clause and with to the query using the InJabber relation
 * @method     ChildSupplierQuery innerJoinWithInJabber() Adds a INNER JOIN clause and with to the query using the InJabber relation
 *
 * @method     ChildSupplierQuery leftJoinMemberMutasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the MemberMutasi relation
 * @method     ChildSupplierQuery rightJoinMemberMutasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MemberMutasi relation
 * @method     ChildSupplierQuery innerJoinMemberMutasi($relationAlias = null) Adds a INNER JOIN clause to the query using the MemberMutasi relation
 *
 * @method     ChildSupplierQuery joinWithMemberMutasi($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the MemberMutasi relation
 *
 * @method     ChildSupplierQuery leftJoinWithMemberMutasi() Adds a LEFT JOIN clause and with to the query using the MemberMutasi relation
 * @method     ChildSupplierQuery rightJoinWithMemberMutasi() Adds a RIGHT JOIN clause and with to the query using the MemberMutasi relation
 * @method     ChildSupplierQuery innerJoinWithMemberMutasi() Adds a INNER JOIN clause and with to the query using the MemberMutasi relation
 *
 * @method     ChildSupplierQuery leftJoinProdukSupplier($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProdukSupplier relation
 * @method     ChildSupplierQuery rightJoinProdukSupplier($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProdukSupplier relation
 * @method     ChildSupplierQuery innerJoinProdukSupplier($relationAlias = null) Adds a INNER JOIN clause to the query using the ProdukSupplier relation
 *
 * @method     ChildSupplierQuery joinWithProdukSupplier($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ProdukSupplier relation
 *
 * @method     ChildSupplierQuery leftJoinWithProdukSupplier() Adds a LEFT JOIN clause and with to the query using the ProdukSupplier relation
 * @method     ChildSupplierQuery rightJoinWithProdukSupplier() Adds a RIGHT JOIN clause and with to the query using the ProdukSupplier relation
 * @method     ChildSupplierQuery innerJoinWithProdukSupplier() Adds a INNER JOIN clause and with to the query using the ProdukSupplier relation
 *
 * @method     ChildSupplierQuery leftJoinSupplierParsing($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierParsing relation
 * @method     ChildSupplierQuery rightJoinSupplierParsing($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierParsing relation
 * @method     ChildSupplierQuery innerJoinSupplierParsing($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierParsing relation
 *
 * @method     ChildSupplierQuery joinWithSupplierParsing($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the SupplierParsing relation
 *
 * @method     ChildSupplierQuery leftJoinWithSupplierParsing() Adds a LEFT JOIN clause and with to the query using the SupplierParsing relation
 * @method     ChildSupplierQuery rightJoinWithSupplierParsing() Adds a RIGHT JOIN clause and with to the query using the SupplierParsing relation
 * @method     ChildSupplierQuery innerJoinWithSupplierParsing() Adds a INNER JOIN clause and with to the query using the SupplierParsing relation
 *
 * @method     ChildSupplierQuery leftJoinSupplierSetting($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierSetting relation
 * @method     ChildSupplierQuery rightJoinSupplierSetting($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierSetting relation
 * @method     ChildSupplierQuery innerJoinSupplierSetting($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierSetting relation
 *
 * @method     ChildSupplierQuery joinWithSupplierSetting($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the SupplierSetting relation
 *
 * @method     ChildSupplierQuery leftJoinWithSupplierSetting() Adds a LEFT JOIN clause and with to the query using the SupplierSetting relation
 * @method     ChildSupplierQuery rightJoinWithSupplierSetting() Adds a RIGHT JOIN clause and with to the query using the SupplierSetting relation
 * @method     ChildSupplierQuery innerJoinWithSupplierSetting() Adds a INNER JOIN clause and with to the query using the SupplierSetting relation
 *
 * @method     \InJabberQuery|\MemberMutasiQuery|\ProdukSupplierQuery|\SupplierParsingQuery|\SupplierSettingQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSupplier findOne(ConnectionInterface $con = null) Return the first ChildSupplier matching the query
 * @method     ChildSupplier findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSupplier matching the query, or a new ChildSupplier object populated from the query conditions when no match is found
 *
 * @method     ChildSupplier findOneById(int $id) Return the first ChildSupplier filtered by the id column
 * @method     ChildSupplier findOneByKodeSupplier(string $kode_supplier) Return the first ChildSupplier filtered by the kode_supplier column
 * @method     ChildSupplier findOneByNamaSupplier(string $nama_supplier) Return the first ChildSupplier filtered by the nama_supplier column
 * @method     ChildSupplier findOneByAlamat(string $alamat) Return the first ChildSupplier filtered by the alamat column
 * @method     ChildSupplier findOneByUser(string $user) Return the first ChildSupplier filtered by the user column
 * @method     ChildSupplier findOneByPass(string $pass) Return the first ChildSupplier filtered by the pass column
 * @method     ChildSupplier findOneByPin(string $pin) Return the first ChildSupplier filtered by the pin column
 * @method     ChildSupplier findOneByTipeTransaksi(int $tipe_transaksi) Return the first ChildSupplier filtered by the tipe_transaksi column
 * @method     ChildSupplier findOneByStatus(int $status) Return the first ChildSupplier filtered by the status column *

 * @method     ChildSupplier requirePk($key, ConnectionInterface $con = null) Return the ChildSupplier by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplier requireOne(ConnectionInterface $con = null) Return the first ChildSupplier matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSupplier requireOneById(int $id) Return the first ChildSupplier filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplier requireOneByKodeSupplier(string $kode_supplier) Return the first ChildSupplier filtered by the kode_supplier column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplier requireOneByNamaSupplier(string $nama_supplier) Return the first ChildSupplier filtered by the nama_supplier column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplier requireOneByAlamat(string $alamat) Return the first ChildSupplier filtered by the alamat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplier requireOneByUser(string $user) Return the first ChildSupplier filtered by the user column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplier requireOneByPass(string $pass) Return the first ChildSupplier filtered by the pass column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplier requireOneByPin(string $pin) Return the first ChildSupplier filtered by the pin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplier requireOneByTipeTransaksi(int $tipe_transaksi) Return the first ChildSupplier filtered by the tipe_transaksi column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplier requireOneByStatus(int $status) Return the first ChildSupplier filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSupplier[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSupplier objects based on current ModelCriteria
 * @method     ChildSupplier[]|ObjectCollection findById(int $id) Return ChildSupplier objects filtered by the id column
 * @method     ChildSupplier[]|ObjectCollection findByKodeSupplier(string $kode_supplier) Return ChildSupplier objects filtered by the kode_supplier column
 * @method     ChildSupplier[]|ObjectCollection findByNamaSupplier(string $nama_supplier) Return ChildSupplier objects filtered by the nama_supplier column
 * @method     ChildSupplier[]|ObjectCollection findByAlamat(string $alamat) Return ChildSupplier objects filtered by the alamat column
 * @method     ChildSupplier[]|ObjectCollection findByUser(string $user) Return ChildSupplier objects filtered by the user column
 * @method     ChildSupplier[]|ObjectCollection findByPass(string $pass) Return ChildSupplier objects filtered by the pass column
 * @method     ChildSupplier[]|ObjectCollection findByPin(string $pin) Return ChildSupplier objects filtered by the pin column
 * @method     ChildSupplier[]|ObjectCollection findByTipeTransaksi(int $tipe_transaksi) Return ChildSupplier objects filtered by the tipe_transaksi column
 * @method     ChildSupplier[]|ObjectCollection findByStatus(int $status) Return ChildSupplier objects filtered by the status column
 * @method     ChildSupplier[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SupplierQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\SupplierQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Supplier', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSupplierQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSupplierQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSupplierQuery) {
            return $criteria;
        }
        $query = new ChildSupplierQuery();
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
     * @return ChildSupplier|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SupplierTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = SupplierTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildSupplier A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, kode_supplier, nama_supplier, alamat, user, pass, pin, tipe_transaksi, status FROM supplier WHERE id = :p0';
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
            /** @var ChildSupplier $obj */
            $obj = new ChildSupplier();
            $obj->hydrate($row);
            SupplierTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildSupplier|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSupplierQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SupplierTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSupplierQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SupplierTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildSupplierQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(SupplierTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SupplierTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SupplierTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the kode_supplier column
     *
     * Example usage:
     * <code>
     * $query->filterByKodeSupplier('fooValue');   // WHERE kode_supplier = 'fooValue'
     * $query->filterByKodeSupplier('%fooValue%', Criteria::LIKE); // WHERE kode_supplier LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kodeSupplier The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSupplierQuery The current query, for fluid interface
     */
    public function filterByKodeSupplier($kodeSupplier = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kodeSupplier)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SupplierTableMap::COL_KODE_SUPPLIER, $kodeSupplier, $comparison);
    }

    /**
     * Filter the query on the nama_supplier column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaSupplier('fooValue');   // WHERE nama_supplier = 'fooValue'
     * $query->filterByNamaSupplier('%fooValue%', Criteria::LIKE); // WHERE nama_supplier LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaSupplier The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSupplierQuery The current query, for fluid interface
     */
    public function filterByNamaSupplier($namaSupplier = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaSupplier)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SupplierTableMap::COL_NAMA_SUPPLIER, $namaSupplier, $comparison);
    }

    /**
     * Filter the query on the alamat column
     *
     * Example usage:
     * <code>
     * $query->filterByAlamat('fooValue');   // WHERE alamat = 'fooValue'
     * $query->filterByAlamat('%fooValue%', Criteria::LIKE); // WHERE alamat LIKE '%fooValue%'
     * </code>
     *
     * @param     string $alamat The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSupplierQuery The current query, for fluid interface
     */
    public function filterByAlamat($alamat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($alamat)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SupplierTableMap::COL_ALAMAT, $alamat, $comparison);
    }

    /**
     * Filter the query on the user column
     *
     * Example usage:
     * <code>
     * $query->filterByUser('fooValue');   // WHERE user = 'fooValue'
     * $query->filterByUser('%fooValue%', Criteria::LIKE); // WHERE user LIKE '%fooValue%'
     * </code>
     *
     * @param     string $user The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSupplierQuery The current query, for fluid interface
     */
    public function filterByUser($user = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($user)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SupplierTableMap::COL_USER, $user, $comparison);
    }

    /**
     * Filter the query on the pass column
     *
     * Example usage:
     * <code>
     * $query->filterByPass('fooValue');   // WHERE pass = 'fooValue'
     * $query->filterByPass('%fooValue%', Criteria::LIKE); // WHERE pass LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pass The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSupplierQuery The current query, for fluid interface
     */
    public function filterByPass($pass = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pass)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SupplierTableMap::COL_PASS, $pass, $comparison);
    }

    /**
     * Filter the query on the pin column
     *
     * Example usage:
     * <code>
     * $query->filterByPin('fooValue');   // WHERE pin = 'fooValue'
     * $query->filterByPin('%fooValue%', Criteria::LIKE); // WHERE pin LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pin The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSupplierQuery The current query, for fluid interface
     */
    public function filterByPin($pin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pin)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SupplierTableMap::COL_PIN, $pin, $comparison);
    }

    /**
     * Filter the query on the tipe_transaksi column
     *
     * Example usage:
     * <code>
     * $query->filterByTipeTransaksi(1234); // WHERE tipe_transaksi = 1234
     * $query->filterByTipeTransaksi(array(12, 34)); // WHERE tipe_transaksi IN (12, 34)
     * $query->filterByTipeTransaksi(array('min' => 12)); // WHERE tipe_transaksi > 12
     * </code>
     *
     * @param     mixed $tipeTransaksi The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSupplierQuery The current query, for fluid interface
     */
    public function filterByTipeTransaksi($tipeTransaksi = null, $comparison = null)
    {
        if (is_array($tipeTransaksi)) {
            $useMinMax = false;
            if (isset($tipeTransaksi['min'])) {
                $this->addUsingAlias(SupplierTableMap::COL_TIPE_TRANSAKSI, $tipeTransaksi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tipeTransaksi['max'])) {
                $this->addUsingAlias(SupplierTableMap::COL_TIPE_TRANSAKSI, $tipeTransaksi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SupplierTableMap::COL_TIPE_TRANSAKSI, $tipeTransaksi, $comparison);
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
     * @return $this|ChildSupplierQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(SupplierTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(SupplierTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SupplierTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query by a related \InJabber object
     *
     * @param \InJabber|ObjectCollection $inJabber the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSupplierQuery The current query, for fluid interface
     */
    public function filterByInJabber($inJabber, $comparison = null)
    {
        if ($inJabber instanceof \InJabber) {
            return $this
                ->addUsingAlias(SupplierTableMap::COL_ID, $inJabber->getIdSupplier(), $comparison);
        } elseif ($inJabber instanceof ObjectCollection) {
            return $this
                ->useInJabberQuery()
                ->filterByPrimaryKeys($inJabber->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInJabber() only accepts arguments of type \InJabber or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the InJabber relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSupplierQuery The current query, for fluid interface
     */
    public function joinInJabber($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('InJabber');

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
            $this->addJoinObject($join, 'InJabber');
        }

        return $this;
    }

    /**
     * Use the InJabber relation InJabber object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \InJabberQuery A secondary query class using the current class as primary query
     */
    public function useInJabberQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinInJabber($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'InJabber', '\InJabberQuery');
    }

    /**
     * Filter the query by a related \MemberMutasi object
     *
     * @param \MemberMutasi|ObjectCollection $memberMutasi the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSupplierQuery The current query, for fluid interface
     */
    public function filterByMemberMutasi($memberMutasi, $comparison = null)
    {
        if ($memberMutasi instanceof \MemberMutasi) {
            return $this
                ->addUsingAlias(SupplierTableMap::COL_ID, $memberMutasi->getIdSupplier(), $comparison);
        } elseif ($memberMutasi instanceof ObjectCollection) {
            return $this
                ->useMemberMutasiQuery()
                ->filterByPrimaryKeys($memberMutasi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMemberMutasi() only accepts arguments of type \MemberMutasi or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MemberMutasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSupplierQuery The current query, for fluid interface
     */
    public function joinMemberMutasi($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MemberMutasi');

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
            $this->addJoinObject($join, 'MemberMutasi');
        }

        return $this;
    }

    /**
     * Use the MemberMutasi relation MemberMutasi object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MemberMutasiQuery A secondary query class using the current class as primary query
     */
    public function useMemberMutasiQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMemberMutasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MemberMutasi', '\MemberMutasiQuery');
    }

    /**
     * Filter the query by a related \ProdukSupplier object
     *
     * @param \ProdukSupplier|ObjectCollection $produkSupplier the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSupplierQuery The current query, for fluid interface
     */
    public function filterByProdukSupplier($produkSupplier, $comparison = null)
    {
        if ($produkSupplier instanceof \ProdukSupplier) {
            return $this
                ->addUsingAlias(SupplierTableMap::COL_ID, $produkSupplier->getIdSupplier(), $comparison);
        } elseif ($produkSupplier instanceof ObjectCollection) {
            return $this
                ->useProdukSupplierQuery()
                ->filterByPrimaryKeys($produkSupplier->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProdukSupplier() only accepts arguments of type \ProdukSupplier or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProdukSupplier relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSupplierQuery The current query, for fluid interface
     */
    public function joinProdukSupplier($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProdukSupplier');

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
            $this->addJoinObject($join, 'ProdukSupplier');
        }

        return $this;
    }

    /**
     * Use the ProdukSupplier relation ProdukSupplier object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ProdukSupplierQuery A secondary query class using the current class as primary query
     */
    public function useProdukSupplierQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinProdukSupplier($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProdukSupplier', '\ProdukSupplierQuery');
    }

    /**
     * Filter the query by a related \SupplierParsing object
     *
     * @param \SupplierParsing|ObjectCollection $supplierParsing the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSupplierQuery The current query, for fluid interface
     */
    public function filterBySupplierParsing($supplierParsing, $comparison = null)
    {
        if ($supplierParsing instanceof \SupplierParsing) {
            return $this
                ->addUsingAlias(SupplierTableMap::COL_ID, $supplierParsing->getIdSupplier(), $comparison);
        } elseif ($supplierParsing instanceof ObjectCollection) {
            return $this
                ->useSupplierParsingQuery()
                ->filterByPrimaryKeys($supplierParsing->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySupplierParsing() only accepts arguments of type \SupplierParsing or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SupplierParsing relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSupplierQuery The current query, for fluid interface
     */
    public function joinSupplierParsing($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SupplierParsing');

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
            $this->addJoinObject($join, 'SupplierParsing');
        }

        return $this;
    }

    /**
     * Use the SupplierParsing relation SupplierParsing object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \SupplierParsingQuery A secondary query class using the current class as primary query
     */
    public function useSupplierParsingQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSupplierParsing($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SupplierParsing', '\SupplierParsingQuery');
    }

    /**
     * Filter the query by a related \SupplierSetting object
     *
     * @param \SupplierSetting|ObjectCollection $supplierSetting the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSupplierQuery The current query, for fluid interface
     */
    public function filterBySupplierSetting($supplierSetting, $comparison = null)
    {
        if ($supplierSetting instanceof \SupplierSetting) {
            return $this
                ->addUsingAlias(SupplierTableMap::COL_ID, $supplierSetting->getIdSupplier(), $comparison);
        } elseif ($supplierSetting instanceof ObjectCollection) {
            return $this
                ->useSupplierSettingQuery()
                ->filterByPrimaryKeys($supplierSetting->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySupplierSetting() only accepts arguments of type \SupplierSetting or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SupplierSetting relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSupplierQuery The current query, for fluid interface
     */
    public function joinSupplierSetting($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SupplierSetting');

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
            $this->addJoinObject($join, 'SupplierSetting');
        }

        return $this;
    }

    /**
     * Use the SupplierSetting relation SupplierSetting object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \SupplierSettingQuery A secondary query class using the current class as primary query
     */
    public function useSupplierSettingQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSupplierSetting($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SupplierSetting', '\SupplierSettingQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSupplier $supplier Object to remove from the list of results
     *
     * @return $this|ChildSupplierQuery The current query, for fluid interface
     */
    public function prune($supplier = null)
    {
        if ($supplier) {
            $this->addUsingAlias(SupplierTableMap::COL_ID, $supplier->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the supplier table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SupplierTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SupplierTableMap::clearInstancePool();
            SupplierTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SupplierTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SupplierTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SupplierTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SupplierTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SupplierQuery
