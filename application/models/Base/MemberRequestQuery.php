<?php

namespace Base;

use \MemberRequest as ChildMemberRequest;
use \MemberRequestQuery as ChildMemberRequestQuery;
use \Exception;
use \PDO;
use Map\MemberRequestTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'member_request' table.
 *
 *
 *
 * @method     ChildMemberRequestQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildMemberRequestQuery orderByIdMember($order = Criteria::ASC) Order by the id_member column
 * @method     ChildMemberRequestQuery orderByNoTujuan($order = Criteria::ASC) Order by the no_tujuan column
 * @method     ChildMemberRequestQuery orderByIdProduk($order = Criteria::ASC) Order by the id_produk column
 * @method     ChildMemberRequestQuery orderByRequest($order = Criteria::ASC) Order by the request column
 * @method     ChildMemberRequestQuery orderByTanggal($order = Criteria::ASC) Order by the tanggal column
 * @method     ChildMemberRequestQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildMemberRequestQuery orderByTrxId($order = Criteria::ASC) Order by the trx_id column
 *
 * @method     ChildMemberRequestQuery groupById() Group by the id column
 * @method     ChildMemberRequestQuery groupByIdMember() Group by the id_member column
 * @method     ChildMemberRequestQuery groupByNoTujuan() Group by the no_tujuan column
 * @method     ChildMemberRequestQuery groupByIdProduk() Group by the id_produk column
 * @method     ChildMemberRequestQuery groupByRequest() Group by the request column
 * @method     ChildMemberRequestQuery groupByTanggal() Group by the tanggal column
 * @method     ChildMemberRequestQuery groupByStatus() Group by the status column
 * @method     ChildMemberRequestQuery groupByTrxId() Group by the trx_id column
 *
 * @method     ChildMemberRequestQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMemberRequestQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMemberRequestQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMemberRequestQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMemberRequestQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMemberRequestQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMemberRequestQuery leftJoinProduk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Produk relation
 * @method     ChildMemberRequestQuery rightJoinProduk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Produk relation
 * @method     ChildMemberRequestQuery innerJoinProduk($relationAlias = null) Adds a INNER JOIN clause to the query using the Produk relation
 *
 * @method     ChildMemberRequestQuery joinWithProduk($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Produk relation
 *
 * @method     ChildMemberRequestQuery leftJoinWithProduk() Adds a LEFT JOIN clause and with to the query using the Produk relation
 * @method     ChildMemberRequestQuery rightJoinWithProduk() Adds a RIGHT JOIN clause and with to the query using the Produk relation
 * @method     ChildMemberRequestQuery innerJoinWithProduk() Adds a INNER JOIN clause and with to the query using the Produk relation
 *
 * @method     ChildMemberRequestQuery leftJoinMember($relationAlias = null) Adds a LEFT JOIN clause to the query using the Member relation
 * @method     ChildMemberRequestQuery rightJoinMember($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Member relation
 * @method     ChildMemberRequestQuery innerJoinMember($relationAlias = null) Adds a INNER JOIN clause to the query using the Member relation
 *
 * @method     ChildMemberRequestQuery joinWithMember($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Member relation
 *
 * @method     ChildMemberRequestQuery leftJoinWithMember() Adds a LEFT JOIN clause and with to the query using the Member relation
 * @method     ChildMemberRequestQuery rightJoinWithMember() Adds a RIGHT JOIN clause and with to the query using the Member relation
 * @method     ChildMemberRequestQuery innerJoinWithMember() Adds a INNER JOIN clause and with to the query using the Member relation
 *
 * @method     \ProdukQuery|\MemberQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildMemberRequest findOne(ConnectionInterface $con = null) Return the first ChildMemberRequest matching the query
 * @method     ChildMemberRequest findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMemberRequest matching the query, or a new ChildMemberRequest object populated from the query conditions when no match is found
 *
 * @method     ChildMemberRequest findOneById(int $id) Return the first ChildMemberRequest filtered by the id column
 * @method     ChildMemberRequest findOneByIdMember(string $id_member) Return the first ChildMemberRequest filtered by the id_member column
 * @method     ChildMemberRequest findOneByNoTujuan(string $no_tujuan) Return the first ChildMemberRequest filtered by the no_tujuan column
 * @method     ChildMemberRequest findOneByIdProduk(int $id_produk) Return the first ChildMemberRequest filtered by the id_produk column
 * @method     ChildMemberRequest findOneByRequest(string $request) Return the first ChildMemberRequest filtered by the request column
 * @method     ChildMemberRequest findOneByTanggal(string $tanggal) Return the first ChildMemberRequest filtered by the tanggal column
 * @method     ChildMemberRequest findOneByStatus(int $status) Return the first ChildMemberRequest filtered by the status column
 * @method     ChildMemberRequest findOneByTrxId(int $trx_id) Return the first ChildMemberRequest filtered by the trx_id column *

 * @method     ChildMemberRequest requirePk($key, ConnectionInterface $con = null) Return the ChildMemberRequest by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberRequest requireOne(ConnectionInterface $con = null) Return the first ChildMemberRequest matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMemberRequest requireOneById(int $id) Return the first ChildMemberRequest filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberRequest requireOneByIdMember(string $id_member) Return the first ChildMemberRequest filtered by the id_member column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberRequest requireOneByNoTujuan(string $no_tujuan) Return the first ChildMemberRequest filtered by the no_tujuan column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberRequest requireOneByIdProduk(int $id_produk) Return the first ChildMemberRequest filtered by the id_produk column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberRequest requireOneByRequest(string $request) Return the first ChildMemberRequest filtered by the request column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberRequest requireOneByTanggal(string $tanggal) Return the first ChildMemberRequest filtered by the tanggal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberRequest requireOneByStatus(int $status) Return the first ChildMemberRequest filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberRequest requireOneByTrxId(int $trx_id) Return the first ChildMemberRequest filtered by the trx_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMemberRequest[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMemberRequest objects based on current ModelCriteria
 * @method     ChildMemberRequest[]|ObjectCollection findById(int $id) Return ChildMemberRequest objects filtered by the id column
 * @method     ChildMemberRequest[]|ObjectCollection findByIdMember(string $id_member) Return ChildMemberRequest objects filtered by the id_member column
 * @method     ChildMemberRequest[]|ObjectCollection findByNoTujuan(string $no_tujuan) Return ChildMemberRequest objects filtered by the no_tujuan column
 * @method     ChildMemberRequest[]|ObjectCollection findByIdProduk(int $id_produk) Return ChildMemberRequest objects filtered by the id_produk column
 * @method     ChildMemberRequest[]|ObjectCollection findByRequest(string $request) Return ChildMemberRequest objects filtered by the request column
 * @method     ChildMemberRequest[]|ObjectCollection findByTanggal(string $tanggal) Return ChildMemberRequest objects filtered by the tanggal column
 * @method     ChildMemberRequest[]|ObjectCollection findByStatus(int $status) Return ChildMemberRequest objects filtered by the status column
 * @method     ChildMemberRequest[]|ObjectCollection findByTrxId(int $trx_id) Return ChildMemberRequest objects filtered by the trx_id column
 * @method     ChildMemberRequest[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MemberRequestQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\MemberRequestQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\MemberRequest', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMemberRequestQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMemberRequestQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMemberRequestQuery) {
            return $criteria;
        }
        $query = new ChildMemberRequestQuery();
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
     * @return ChildMemberRequest|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MemberRequestTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = MemberRequestTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildMemberRequest A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, id_member, no_tujuan, id_produk, request, tanggal, status, trx_id FROM member_request WHERE id = :p0';
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
            /** @var ChildMemberRequest $obj */
            $obj = new ChildMemberRequest();
            $obj->hydrate($row);
            MemberRequestTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildMemberRequest|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMemberRequestQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MemberRequestTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMemberRequestQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MemberRequestTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildMemberRequestQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(MemberRequestTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(MemberRequestTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberRequestTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the id_member column
     *
     * Example usage:
     * <code>
     * $query->filterByIdMember('fooValue');   // WHERE id_member = 'fooValue'
     * $query->filterByIdMember('%fooValue%', Criteria::LIKE); // WHERE id_member LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idMember The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMemberRequestQuery The current query, for fluid interface
     */
    public function filterByIdMember($idMember = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idMember)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberRequestTableMap::COL_ID_MEMBER, $idMember, $comparison);
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
     * @return $this|ChildMemberRequestQuery The current query, for fluid interface
     */
    public function filterByNoTujuan($noTujuan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noTujuan)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberRequestTableMap::COL_NO_TUJUAN, $noTujuan, $comparison);
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
     * @return $this|ChildMemberRequestQuery The current query, for fluid interface
     */
    public function filterByIdProduk($idProduk = null, $comparison = null)
    {
        if (is_array($idProduk)) {
            $useMinMax = false;
            if (isset($idProduk['min'])) {
                $this->addUsingAlias(MemberRequestTableMap::COL_ID_PRODUK, $idProduk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idProduk['max'])) {
                $this->addUsingAlias(MemberRequestTableMap::COL_ID_PRODUK, $idProduk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberRequestTableMap::COL_ID_PRODUK, $idProduk, $comparison);
    }

    /**
     * Filter the query on the request column
     *
     * Example usage:
     * <code>
     * $query->filterByRequest('fooValue');   // WHERE request = 'fooValue'
     * $query->filterByRequest('%fooValue%', Criteria::LIKE); // WHERE request LIKE '%fooValue%'
     * </code>
     *
     * @param     string $request The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMemberRequestQuery The current query, for fluid interface
     */
    public function filterByRequest($request = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($request)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberRequestTableMap::COL_REQUEST, $request, $comparison);
    }

    /**
     * Filter the query on the tanggal column
     *
     * Example usage:
     * <code>
     * $query->filterByTanggal('2011-03-14'); // WHERE tanggal = '2011-03-14'
     * $query->filterByTanggal('now'); // WHERE tanggal = '2011-03-14'
     * $query->filterByTanggal(array('max' => 'yesterday')); // WHERE tanggal > '2011-03-13'
     * </code>
     *
     * @param     mixed $tanggal The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMemberRequestQuery The current query, for fluid interface
     */
    public function filterByTanggal($tanggal = null, $comparison = null)
    {
        if (is_array($tanggal)) {
            $useMinMax = false;
            if (isset($tanggal['min'])) {
                $this->addUsingAlias(MemberRequestTableMap::COL_TANGGAL, $tanggal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggal['max'])) {
                $this->addUsingAlias(MemberRequestTableMap::COL_TANGGAL, $tanggal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberRequestTableMap::COL_TANGGAL, $tanggal, $comparison);
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
     * @return $this|ChildMemberRequestQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(MemberRequestTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(MemberRequestTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberRequestTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the trx_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTrxId(1234); // WHERE trx_id = 1234
     * $query->filterByTrxId(array(12, 34)); // WHERE trx_id IN (12, 34)
     * $query->filterByTrxId(array('min' => 12)); // WHERE trx_id > 12
     * </code>
     *
     * @param     mixed $trxId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMemberRequestQuery The current query, for fluid interface
     */
    public function filterByTrxId($trxId = null, $comparison = null)
    {
        if (is_array($trxId)) {
            $useMinMax = false;
            if (isset($trxId['min'])) {
                $this->addUsingAlias(MemberRequestTableMap::COL_TRX_ID, $trxId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trxId['max'])) {
                $this->addUsingAlias(MemberRequestTableMap::COL_TRX_ID, $trxId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberRequestTableMap::COL_TRX_ID, $trxId, $comparison);
    }

    /**
     * Filter the query by a related \Produk object
     *
     * @param \Produk|ObjectCollection $produk The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildMemberRequestQuery The current query, for fluid interface
     */
    public function filterByProduk($produk, $comparison = null)
    {
        if ($produk instanceof \Produk) {
            return $this
                ->addUsingAlias(MemberRequestTableMap::COL_ID_PRODUK, $produk->getId(), $comparison);
        } elseif ($produk instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MemberRequestTableMap::COL_ID_PRODUK, $produk->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildMemberRequestQuery The current query, for fluid interface
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
     * Filter the query by a related \Member object
     *
     * @param \Member|ObjectCollection $member The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildMemberRequestQuery The current query, for fluid interface
     */
    public function filterByMember($member, $comparison = null)
    {
        if ($member instanceof \Member) {
            return $this
                ->addUsingAlias(MemberRequestTableMap::COL_ID_MEMBER, $member->getId(), $comparison);
        } elseif ($member instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MemberRequestTableMap::COL_ID_MEMBER, $member->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildMemberRequestQuery The current query, for fluid interface
     */
    public function joinMember($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useMemberQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMember($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Member', '\MemberQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMemberRequest $memberRequest Object to remove from the list of results
     *
     * @return $this|ChildMemberRequestQuery The current query, for fluid interface
     */
    public function prune($memberRequest = null)
    {
        if ($memberRequest) {
            $this->addUsingAlias(MemberRequestTableMap::COL_ID, $memberRequest->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the member_request table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MemberRequestTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MemberRequestTableMap::clearInstancePool();
            MemberRequestTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MemberRequestTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MemberRequestTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MemberRequestTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MemberRequestTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MemberRequestQuery
