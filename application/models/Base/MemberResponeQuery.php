<?php

namespace Base;

use \MemberRespone as ChildMemberRespone;
use \MemberResponeQuery as ChildMemberResponeQuery;
use \Exception;
use \PDO;
use Map\MemberResponeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'member_respone' table.
 *
 *
 *
 * @method     ChildMemberResponeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildMemberResponeQuery orderByIdRequest($order = Criteria::ASC) Order by the id_request column
 * @method     ChildMemberResponeQuery orderByNoTujuan($order = Criteria::ASC) Order by the no_tujuan column
 * @method     ChildMemberResponeQuery orderByIdProduk($order = Criteria::ASC) Order by the id_produk column
 * @method     ChildMemberResponeQuery orderByRespone($order = Criteria::ASC) Order by the respone column
 * @method     ChildMemberResponeQuery orderByTanggal($order = Criteria::ASC) Order by the tanggal column
 *
 * @method     ChildMemberResponeQuery groupById() Group by the id column
 * @method     ChildMemberResponeQuery groupByIdRequest() Group by the id_request column
 * @method     ChildMemberResponeQuery groupByNoTujuan() Group by the no_tujuan column
 * @method     ChildMemberResponeQuery groupByIdProduk() Group by the id_produk column
 * @method     ChildMemberResponeQuery groupByRespone() Group by the respone column
 * @method     ChildMemberResponeQuery groupByTanggal() Group by the tanggal column
 *
 * @method     ChildMemberResponeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMemberResponeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMemberResponeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMemberResponeQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMemberResponeQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMemberResponeQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMemberResponeQuery leftJoinProduk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Produk relation
 * @method     ChildMemberResponeQuery rightJoinProduk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Produk relation
 * @method     ChildMemberResponeQuery innerJoinProduk($relationAlias = null) Adds a INNER JOIN clause to the query using the Produk relation
 *
 * @method     ChildMemberResponeQuery joinWithProduk($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Produk relation
 *
 * @method     ChildMemberResponeQuery leftJoinWithProduk() Adds a LEFT JOIN clause and with to the query using the Produk relation
 * @method     ChildMemberResponeQuery rightJoinWithProduk() Adds a RIGHT JOIN clause and with to the query using the Produk relation
 * @method     ChildMemberResponeQuery innerJoinWithProduk() Adds a INNER JOIN clause and with to the query using the Produk relation
 *
 * @method     \ProdukQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildMemberRespone findOne(ConnectionInterface $con = null) Return the first ChildMemberRespone matching the query
 * @method     ChildMemberRespone findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMemberRespone matching the query, or a new ChildMemberRespone object populated from the query conditions when no match is found
 *
 * @method     ChildMemberRespone findOneById(int $id) Return the first ChildMemberRespone filtered by the id column
 * @method     ChildMemberRespone findOneByIdRequest(string $id_request) Return the first ChildMemberRespone filtered by the id_request column
 * @method     ChildMemberRespone findOneByNoTujuan(string $no_tujuan) Return the first ChildMemberRespone filtered by the no_tujuan column
 * @method     ChildMemberRespone findOneByIdProduk(int $id_produk) Return the first ChildMemberRespone filtered by the id_produk column
 * @method     ChildMemberRespone findOneByRespone(string $respone) Return the first ChildMemberRespone filtered by the respone column
 * @method     ChildMemberRespone findOneByTanggal(string $tanggal) Return the first ChildMemberRespone filtered by the tanggal column *

 * @method     ChildMemberRespone requirePk($key, ConnectionInterface $con = null) Return the ChildMemberRespone by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberRespone requireOne(ConnectionInterface $con = null) Return the first ChildMemberRespone matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMemberRespone requireOneById(int $id) Return the first ChildMemberRespone filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberRespone requireOneByIdRequest(string $id_request) Return the first ChildMemberRespone filtered by the id_request column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberRespone requireOneByNoTujuan(string $no_tujuan) Return the first ChildMemberRespone filtered by the no_tujuan column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberRespone requireOneByIdProduk(int $id_produk) Return the first ChildMemberRespone filtered by the id_produk column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberRespone requireOneByRespone(string $respone) Return the first ChildMemberRespone filtered by the respone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberRespone requireOneByTanggal(string $tanggal) Return the first ChildMemberRespone filtered by the tanggal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMemberRespone[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMemberRespone objects based on current ModelCriteria
 * @method     ChildMemberRespone[]|ObjectCollection findById(int $id) Return ChildMemberRespone objects filtered by the id column
 * @method     ChildMemberRespone[]|ObjectCollection findByIdRequest(string $id_request) Return ChildMemberRespone objects filtered by the id_request column
 * @method     ChildMemberRespone[]|ObjectCollection findByNoTujuan(string $no_tujuan) Return ChildMemberRespone objects filtered by the no_tujuan column
 * @method     ChildMemberRespone[]|ObjectCollection findByIdProduk(int $id_produk) Return ChildMemberRespone objects filtered by the id_produk column
 * @method     ChildMemberRespone[]|ObjectCollection findByRespone(string $respone) Return ChildMemberRespone objects filtered by the respone column
 * @method     ChildMemberRespone[]|ObjectCollection findByTanggal(string $tanggal) Return ChildMemberRespone objects filtered by the tanggal column
 * @method     ChildMemberRespone[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MemberResponeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\MemberResponeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\MemberRespone', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMemberResponeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMemberResponeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMemberResponeQuery) {
            return $criteria;
        }
        $query = new ChildMemberResponeQuery();
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
     * @return ChildMemberRespone|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MemberResponeTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = MemberResponeTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildMemberRespone A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, id_request, no_tujuan, id_produk, respone, tanggal FROM member_respone WHERE id = :p0';
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
            /** @var ChildMemberRespone $obj */
            $obj = new ChildMemberRespone();
            $obj->hydrate($row);
            MemberResponeTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildMemberRespone|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMemberResponeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MemberResponeTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMemberResponeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MemberResponeTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildMemberResponeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(MemberResponeTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(MemberResponeTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberResponeTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the id_request column
     *
     * Example usage:
     * <code>
     * $query->filterByIdRequest('fooValue');   // WHERE id_request = 'fooValue'
     * $query->filterByIdRequest('%fooValue%', Criteria::LIKE); // WHERE id_request LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idRequest The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMemberResponeQuery The current query, for fluid interface
     */
    public function filterByIdRequest($idRequest = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idRequest)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberResponeTableMap::COL_ID_REQUEST, $idRequest, $comparison);
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
     * @return $this|ChildMemberResponeQuery The current query, for fluid interface
     */
    public function filterByNoTujuan($noTujuan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noTujuan)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberResponeTableMap::COL_NO_TUJUAN, $noTujuan, $comparison);
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
     * @return $this|ChildMemberResponeQuery The current query, for fluid interface
     */
    public function filterByIdProduk($idProduk = null, $comparison = null)
    {
        if (is_array($idProduk)) {
            $useMinMax = false;
            if (isset($idProduk['min'])) {
                $this->addUsingAlias(MemberResponeTableMap::COL_ID_PRODUK, $idProduk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idProduk['max'])) {
                $this->addUsingAlias(MemberResponeTableMap::COL_ID_PRODUK, $idProduk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberResponeTableMap::COL_ID_PRODUK, $idProduk, $comparison);
    }

    /**
     * Filter the query on the respone column
     *
     * Example usage:
     * <code>
     * $query->filterByRespone('fooValue');   // WHERE respone = 'fooValue'
     * $query->filterByRespone('%fooValue%', Criteria::LIKE); // WHERE respone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $respone The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMemberResponeQuery The current query, for fluid interface
     */
    public function filterByRespone($respone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($respone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberResponeTableMap::COL_RESPONE, $respone, $comparison);
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
     * @return $this|ChildMemberResponeQuery The current query, for fluid interface
     */
    public function filterByTanggal($tanggal = null, $comparison = null)
    {
        if (is_array($tanggal)) {
            $useMinMax = false;
            if (isset($tanggal['min'])) {
                $this->addUsingAlias(MemberResponeTableMap::COL_TANGGAL, $tanggal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggal['max'])) {
                $this->addUsingAlias(MemberResponeTableMap::COL_TANGGAL, $tanggal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberResponeTableMap::COL_TANGGAL, $tanggal, $comparison);
    }

    /**
     * Filter the query by a related \Produk object
     *
     * @param \Produk|ObjectCollection $produk The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildMemberResponeQuery The current query, for fluid interface
     */
    public function filterByProduk($produk, $comparison = null)
    {
        if ($produk instanceof \Produk) {
            return $this
                ->addUsingAlias(MemberResponeTableMap::COL_ID_PRODUK, $produk->getId(), $comparison);
        } elseif ($produk instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MemberResponeTableMap::COL_ID_PRODUK, $produk->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildMemberResponeQuery The current query, for fluid interface
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
     * @param   ChildMemberRespone $memberRespone Object to remove from the list of results
     *
     * @return $this|ChildMemberResponeQuery The current query, for fluid interface
     */
    public function prune($memberRespone = null)
    {
        if ($memberRespone) {
            $this->addUsingAlias(MemberResponeTableMap::COL_ID, $memberRespone->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the member_respone table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MemberResponeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MemberResponeTableMap::clearInstancePool();
            MemberResponeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MemberResponeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MemberResponeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MemberResponeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MemberResponeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MemberResponeQuery
