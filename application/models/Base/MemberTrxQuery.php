<?php

namespace Base;

use \MemberTrx as ChildMemberTrx;
use \MemberTrxQuery as ChildMemberTrxQuery;
use \Exception;
use \PDO;
use Map\MemberTrxTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'member_trx' table.
 *
 *
 *
 * @method     ChildMemberTrxQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildMemberTrxQuery orderByIdMember($order = Criteria::ASC) Order by the id_member column
 * @method     ChildMemberTrxQuery orderByIdProduk($order = Criteria::ASC) Order by the id_produk column
 * @method     ChildMemberTrxQuery orderByNoTujuan($order = Criteria::ASC) Order by the no_tujuan column
 * @method     ChildMemberTrxQuery orderByHargaBeli($order = Criteria::ASC) Order by the harga_beli column
 * @method     ChildMemberTrxQuery orderByHargaJual($order = Criteria::ASC) Order by the harga_jual column
 * @method     ChildMemberTrxQuery orderByLaba($order = Criteria::ASC) Order by the laba column
 * @method     ChildMemberTrxQuery orderByTgl1($order = Criteria::ASC) Order by the tgl1 column
 * @method     ChildMemberTrxQuery orderByTgl2($order = Criteria::ASC) Order by the tgl2 column
 * @method     ChildMemberTrxQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method     ChildMemberTrxQuery groupById() Group by the id column
 * @method     ChildMemberTrxQuery groupByIdMember() Group by the id_member column
 * @method     ChildMemberTrxQuery groupByIdProduk() Group by the id_produk column
 * @method     ChildMemberTrxQuery groupByNoTujuan() Group by the no_tujuan column
 * @method     ChildMemberTrxQuery groupByHargaBeli() Group by the harga_beli column
 * @method     ChildMemberTrxQuery groupByHargaJual() Group by the harga_jual column
 * @method     ChildMemberTrxQuery groupByLaba() Group by the laba column
 * @method     ChildMemberTrxQuery groupByTgl1() Group by the tgl1 column
 * @method     ChildMemberTrxQuery groupByTgl2() Group by the tgl2 column
 * @method     ChildMemberTrxQuery groupByStatus() Group by the status column
 *
 * @method     ChildMemberTrxQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMemberTrxQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMemberTrxQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMemberTrxQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMemberTrxQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMemberTrxQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMemberTrxQuery leftJoinMember($relationAlias = null) Adds a LEFT JOIN clause to the query using the Member relation
 * @method     ChildMemberTrxQuery rightJoinMember($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Member relation
 * @method     ChildMemberTrxQuery innerJoinMember($relationAlias = null) Adds a INNER JOIN clause to the query using the Member relation
 *
 * @method     ChildMemberTrxQuery joinWithMember($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Member relation
 *
 * @method     ChildMemberTrxQuery leftJoinWithMember() Adds a LEFT JOIN clause and with to the query using the Member relation
 * @method     ChildMemberTrxQuery rightJoinWithMember() Adds a RIGHT JOIN clause and with to the query using the Member relation
 * @method     ChildMemberTrxQuery innerJoinWithMember() Adds a INNER JOIN clause and with to the query using the Member relation
 *
 * @method     ChildMemberTrxQuery leftJoinProduk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Produk relation
 * @method     ChildMemberTrxQuery rightJoinProduk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Produk relation
 * @method     ChildMemberTrxQuery innerJoinProduk($relationAlias = null) Adds a INNER JOIN clause to the query using the Produk relation
 *
 * @method     ChildMemberTrxQuery joinWithProduk($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Produk relation
 *
 * @method     ChildMemberTrxQuery leftJoinWithProduk() Adds a LEFT JOIN clause and with to the query using the Produk relation
 * @method     ChildMemberTrxQuery rightJoinWithProduk() Adds a RIGHT JOIN clause and with to the query using the Produk relation
 * @method     ChildMemberTrxQuery innerJoinWithProduk() Adds a INNER JOIN clause and with to the query using the Produk relation
 *
 * @method     ChildMemberTrxQuery leftJoinMemberMutasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the MemberMutasi relation
 * @method     ChildMemberTrxQuery rightJoinMemberMutasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MemberMutasi relation
 * @method     ChildMemberTrxQuery innerJoinMemberMutasi($relationAlias = null) Adds a INNER JOIN clause to the query using the MemberMutasi relation
 *
 * @method     ChildMemberTrxQuery joinWithMemberMutasi($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the MemberMutasi relation
 *
 * @method     ChildMemberTrxQuery leftJoinWithMemberMutasi() Adds a LEFT JOIN clause and with to the query using the MemberMutasi relation
 * @method     ChildMemberTrxQuery rightJoinWithMemberMutasi() Adds a RIGHT JOIN clause and with to the query using the MemberMutasi relation
 * @method     ChildMemberTrxQuery innerJoinWithMemberMutasi() Adds a INNER JOIN clause and with to the query using the MemberMutasi relation
 *
 * @method     \MemberQuery|\ProdukQuery|\MemberMutasiQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildMemberTrx findOne(ConnectionInterface $con = null) Return the first ChildMemberTrx matching the query
 * @method     ChildMemberTrx findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMemberTrx matching the query, or a new ChildMemberTrx object populated from the query conditions when no match is found
 *
 * @method     ChildMemberTrx findOneById(int $id) Return the first ChildMemberTrx filtered by the id column
 * @method     ChildMemberTrx findOneByIdMember(int $id_member) Return the first ChildMemberTrx filtered by the id_member column
 * @method     ChildMemberTrx findOneByIdProduk(int $id_produk) Return the first ChildMemberTrx filtered by the id_produk column
 * @method     ChildMemberTrx findOneByNoTujuan(string $no_tujuan) Return the first ChildMemberTrx filtered by the no_tujuan column
 * @method     ChildMemberTrx findOneByHargaBeli(int $harga_beli) Return the first ChildMemberTrx filtered by the harga_beli column
 * @method     ChildMemberTrx findOneByHargaJual(int $harga_jual) Return the first ChildMemberTrx filtered by the harga_jual column
 * @method     ChildMemberTrx findOneByLaba(int $laba) Return the first ChildMemberTrx filtered by the laba column
 * @method     ChildMemberTrx findOneByTgl1(string $tgl1) Return the first ChildMemberTrx filtered by the tgl1 column
 * @method     ChildMemberTrx findOneByTgl2(string $tgl2) Return the first ChildMemberTrx filtered by the tgl2 column
 * @method     ChildMemberTrx findOneByStatus(int $status) Return the first ChildMemberTrx filtered by the status column *

 * @method     ChildMemberTrx requirePk($key, ConnectionInterface $con = null) Return the ChildMemberTrx by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberTrx requireOne(ConnectionInterface $con = null) Return the first ChildMemberTrx matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMemberTrx requireOneById(int $id) Return the first ChildMemberTrx filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberTrx requireOneByIdMember(int $id_member) Return the first ChildMemberTrx filtered by the id_member column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberTrx requireOneByIdProduk(int $id_produk) Return the first ChildMemberTrx filtered by the id_produk column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberTrx requireOneByNoTujuan(string $no_tujuan) Return the first ChildMemberTrx filtered by the no_tujuan column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberTrx requireOneByHargaBeli(int $harga_beli) Return the first ChildMemberTrx filtered by the harga_beli column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberTrx requireOneByHargaJual(int $harga_jual) Return the first ChildMemberTrx filtered by the harga_jual column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberTrx requireOneByLaba(int $laba) Return the first ChildMemberTrx filtered by the laba column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberTrx requireOneByTgl1(string $tgl1) Return the first ChildMemberTrx filtered by the tgl1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberTrx requireOneByTgl2(string $tgl2) Return the first ChildMemberTrx filtered by the tgl2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberTrx requireOneByStatus(int $status) Return the first ChildMemberTrx filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMemberTrx[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMemberTrx objects based on current ModelCriteria
 * @method     ChildMemberTrx[]|ObjectCollection findById(int $id) Return ChildMemberTrx objects filtered by the id column
 * @method     ChildMemberTrx[]|ObjectCollection findByIdMember(int $id_member) Return ChildMemberTrx objects filtered by the id_member column
 * @method     ChildMemberTrx[]|ObjectCollection findByIdProduk(int $id_produk) Return ChildMemberTrx objects filtered by the id_produk column
 * @method     ChildMemberTrx[]|ObjectCollection findByNoTujuan(string $no_tujuan) Return ChildMemberTrx objects filtered by the no_tujuan column
 * @method     ChildMemberTrx[]|ObjectCollection findByHargaBeli(int $harga_beli) Return ChildMemberTrx objects filtered by the harga_beli column
 * @method     ChildMemberTrx[]|ObjectCollection findByHargaJual(int $harga_jual) Return ChildMemberTrx objects filtered by the harga_jual column
 * @method     ChildMemberTrx[]|ObjectCollection findByLaba(int $laba) Return ChildMemberTrx objects filtered by the laba column
 * @method     ChildMemberTrx[]|ObjectCollection findByTgl1(string $tgl1) Return ChildMemberTrx objects filtered by the tgl1 column
 * @method     ChildMemberTrx[]|ObjectCollection findByTgl2(string $tgl2) Return ChildMemberTrx objects filtered by the tgl2 column
 * @method     ChildMemberTrx[]|ObjectCollection findByStatus(int $status) Return ChildMemberTrx objects filtered by the status column
 * @method     ChildMemberTrx[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MemberTrxQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\MemberTrxQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\MemberTrx', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMemberTrxQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMemberTrxQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMemberTrxQuery) {
            return $criteria;
        }
        $query = new ChildMemberTrxQuery();
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
     * @return ChildMemberTrx|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MemberTrxTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = MemberTrxTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildMemberTrx A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, id_member, id_produk, no_tujuan, harga_beli, harga_jual, laba, tgl1, tgl2, status FROM member_trx WHERE id = :p0';
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
            /** @var ChildMemberTrx $obj */
            $obj = new ChildMemberTrx();
            $obj->hydrate($row);
            MemberTrxTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildMemberTrx|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMemberTrxQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MemberTrxTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMemberTrxQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MemberTrxTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildMemberTrxQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(MemberTrxTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(MemberTrxTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberTrxTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the id_member column
     *
     * Example usage:
     * <code>
     * $query->filterByIdMember(1234); // WHERE id_member = 1234
     * $query->filterByIdMember(array(12, 34)); // WHERE id_member IN (12, 34)
     * $query->filterByIdMember(array('min' => 12)); // WHERE id_member > 12
     * </code>
     *
     * @see       filterByMember()
     *
     * @param     mixed $idMember The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMemberTrxQuery The current query, for fluid interface
     */
    public function filterByIdMember($idMember = null, $comparison = null)
    {
        if (is_array($idMember)) {
            $useMinMax = false;
            if (isset($idMember['min'])) {
                $this->addUsingAlias(MemberTrxTableMap::COL_ID_MEMBER, $idMember['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idMember['max'])) {
                $this->addUsingAlias(MemberTrxTableMap::COL_ID_MEMBER, $idMember['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberTrxTableMap::COL_ID_MEMBER, $idMember, $comparison);
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
     * @return $this|ChildMemberTrxQuery The current query, for fluid interface
     */
    public function filterByIdProduk($idProduk = null, $comparison = null)
    {
        if (is_array($idProduk)) {
            $useMinMax = false;
            if (isset($idProduk['min'])) {
                $this->addUsingAlias(MemberTrxTableMap::COL_ID_PRODUK, $idProduk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idProduk['max'])) {
                $this->addUsingAlias(MemberTrxTableMap::COL_ID_PRODUK, $idProduk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberTrxTableMap::COL_ID_PRODUK, $idProduk, $comparison);
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
     * @return $this|ChildMemberTrxQuery The current query, for fluid interface
     */
    public function filterByNoTujuan($noTujuan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noTujuan)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberTrxTableMap::COL_NO_TUJUAN, $noTujuan, $comparison);
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
     * @return $this|ChildMemberTrxQuery The current query, for fluid interface
     */
    public function filterByHargaBeli($hargaBeli = null, $comparison = null)
    {
        if (is_array($hargaBeli)) {
            $useMinMax = false;
            if (isset($hargaBeli['min'])) {
                $this->addUsingAlias(MemberTrxTableMap::COL_HARGA_BELI, $hargaBeli['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hargaBeli['max'])) {
                $this->addUsingAlias(MemberTrxTableMap::COL_HARGA_BELI, $hargaBeli['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberTrxTableMap::COL_HARGA_BELI, $hargaBeli, $comparison);
    }

    /**
     * Filter the query on the harga_jual column
     *
     * Example usage:
     * <code>
     * $query->filterByHargaJual(1234); // WHERE harga_jual = 1234
     * $query->filterByHargaJual(array(12, 34)); // WHERE harga_jual IN (12, 34)
     * $query->filterByHargaJual(array('min' => 12)); // WHERE harga_jual > 12
     * </code>
     *
     * @param     mixed $hargaJual The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMemberTrxQuery The current query, for fluid interface
     */
    public function filterByHargaJual($hargaJual = null, $comparison = null)
    {
        if (is_array($hargaJual)) {
            $useMinMax = false;
            if (isset($hargaJual['min'])) {
                $this->addUsingAlias(MemberTrxTableMap::COL_HARGA_JUAL, $hargaJual['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hargaJual['max'])) {
                $this->addUsingAlias(MemberTrxTableMap::COL_HARGA_JUAL, $hargaJual['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberTrxTableMap::COL_HARGA_JUAL, $hargaJual, $comparison);
    }

    /**
     * Filter the query on the laba column
     *
     * Example usage:
     * <code>
     * $query->filterByLaba(1234); // WHERE laba = 1234
     * $query->filterByLaba(array(12, 34)); // WHERE laba IN (12, 34)
     * $query->filterByLaba(array('min' => 12)); // WHERE laba > 12
     * </code>
     *
     * @param     mixed $laba The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMemberTrxQuery The current query, for fluid interface
     */
    public function filterByLaba($laba = null, $comparison = null)
    {
        if (is_array($laba)) {
            $useMinMax = false;
            if (isset($laba['min'])) {
                $this->addUsingAlias(MemberTrxTableMap::COL_LABA, $laba['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($laba['max'])) {
                $this->addUsingAlias(MemberTrxTableMap::COL_LABA, $laba['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberTrxTableMap::COL_LABA, $laba, $comparison);
    }

    /**
     * Filter the query on the tgl1 column
     *
     * Example usage:
     * <code>
     * $query->filterByTgl1('2011-03-14'); // WHERE tgl1 = '2011-03-14'
     * $query->filterByTgl1('now'); // WHERE tgl1 = '2011-03-14'
     * $query->filterByTgl1(array('max' => 'yesterday')); // WHERE tgl1 > '2011-03-13'
     * </code>
     *
     * @param     mixed $tgl1 The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMemberTrxQuery The current query, for fluid interface
     */
    public function filterByTgl1($tgl1 = null, $comparison = null)
    {
        if (is_array($tgl1)) {
            $useMinMax = false;
            if (isset($tgl1['min'])) {
                $this->addUsingAlias(MemberTrxTableMap::COL_TGL1, $tgl1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tgl1['max'])) {
                $this->addUsingAlias(MemberTrxTableMap::COL_TGL1, $tgl1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberTrxTableMap::COL_TGL1, $tgl1, $comparison);
    }

    /**
     * Filter the query on the tgl2 column
     *
     * Example usage:
     * <code>
     * $query->filterByTgl2('2011-03-14'); // WHERE tgl2 = '2011-03-14'
     * $query->filterByTgl2('now'); // WHERE tgl2 = '2011-03-14'
     * $query->filterByTgl2(array('max' => 'yesterday')); // WHERE tgl2 > '2011-03-13'
     * </code>
     *
     * @param     mixed $tgl2 The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMemberTrxQuery The current query, for fluid interface
     */
    public function filterByTgl2($tgl2 = null, $comparison = null)
    {
        if (is_array($tgl2)) {
            $useMinMax = false;
            if (isset($tgl2['min'])) {
                $this->addUsingAlias(MemberTrxTableMap::COL_TGL2, $tgl2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tgl2['max'])) {
                $this->addUsingAlias(MemberTrxTableMap::COL_TGL2, $tgl2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberTrxTableMap::COL_TGL2, $tgl2, $comparison);
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
     * @return $this|ChildMemberTrxQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(MemberTrxTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(MemberTrxTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberTrxTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query by a related \Member object
     *
     * @param \Member|ObjectCollection $member The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildMemberTrxQuery The current query, for fluid interface
     */
    public function filterByMember($member, $comparison = null)
    {
        if ($member instanceof \Member) {
            return $this
                ->addUsingAlias(MemberTrxTableMap::COL_ID_MEMBER, $member->getId(), $comparison);
        } elseif ($member instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MemberTrxTableMap::COL_ID_MEMBER, $member->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByMember() only accepts arguments of type \Member or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Member relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildMemberTrxQuery The current query, for fluid interface
     */
    public function joinMember($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Member');

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
            $this->addJoinObject($join, 'Member');
        }

        return $this;
    }

    /**
     * Use the Member relation Member object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MemberQuery A secondary query class using the current class as primary query
     */
    public function useMemberQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMember($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Member', '\MemberQuery');
    }

    /**
     * Filter the query by a related \Produk object
     *
     * @param \Produk|ObjectCollection $produk The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildMemberTrxQuery The current query, for fluid interface
     */
    public function filterByProduk($produk, $comparison = null)
    {
        if ($produk instanceof \Produk) {
            return $this
                ->addUsingAlias(MemberTrxTableMap::COL_ID_PRODUK, $produk->getId(), $comparison);
        } elseif ($produk instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MemberTrxTableMap::COL_ID_PRODUK, $produk->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildMemberTrxQuery The current query, for fluid interface
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
     * Filter the query by a related \MemberMutasi object
     *
     * @param \MemberMutasi|ObjectCollection $memberMutasi the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildMemberTrxQuery The current query, for fluid interface
     */
    public function filterByMemberMutasi($memberMutasi, $comparison = null)
    {
        if ($memberMutasi instanceof \MemberMutasi) {
            return $this
                ->addUsingAlias(MemberTrxTableMap::COL_ID, $memberMutasi->getIdMemberTrx(), $comparison);
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
     * @return $this|ChildMemberTrxQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildMemberTrx $memberTrx Object to remove from the list of results
     *
     * @return $this|ChildMemberTrxQuery The current query, for fluid interface
     */
    public function prune($memberTrx = null)
    {
        if ($memberTrx) {
            $this->addUsingAlias(MemberTrxTableMap::COL_ID, $memberTrx->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the member_trx table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MemberTrxTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MemberTrxTableMap::clearInstancePool();
            MemberTrxTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MemberTrxTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MemberTrxTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MemberTrxTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MemberTrxTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MemberTrxQuery
