<?php

namespace Base;

use \MemberTiket as ChildMemberTiket;
use \MemberTiketQuery as ChildMemberTiketQuery;
use \Exception;
use \PDO;
use Map\MemberTiketTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'member_tiket' table.
 *
 *
 *
 * @method     ChildMemberTiketQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildMemberTiketQuery orderByIdMember($order = Criteria::ASC) Order by the id_member column
 * @method     ChildMemberTiketQuery orderByJumlahTiket($order = Criteria::ASC) Order by the jumlah_tiket column
 * @method     ChildMemberTiketQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildMemberTiketQuery orderByTanggal($order = Criteria::ASC) Order by the tanggal column
 *
 * @method     ChildMemberTiketQuery groupById() Group by the id column
 * @method     ChildMemberTiketQuery groupByIdMember() Group by the id_member column
 * @method     ChildMemberTiketQuery groupByJumlahTiket() Group by the jumlah_tiket column
 * @method     ChildMemberTiketQuery groupByStatus() Group by the status column
 * @method     ChildMemberTiketQuery groupByTanggal() Group by the tanggal column
 *
 * @method     ChildMemberTiketQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMemberTiketQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMemberTiketQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMemberTiketQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMemberTiketQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMemberTiketQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMemberTiketQuery leftJoinMember($relationAlias = null) Adds a LEFT JOIN clause to the query using the Member relation
 * @method     ChildMemberTiketQuery rightJoinMember($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Member relation
 * @method     ChildMemberTiketQuery innerJoinMember($relationAlias = null) Adds a INNER JOIN clause to the query using the Member relation
 *
 * @method     ChildMemberTiketQuery joinWithMember($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Member relation
 *
 * @method     ChildMemberTiketQuery leftJoinWithMember() Adds a LEFT JOIN clause and with to the query using the Member relation
 * @method     ChildMemberTiketQuery rightJoinWithMember() Adds a RIGHT JOIN clause and with to the query using the Member relation
 * @method     ChildMemberTiketQuery innerJoinWithMember() Adds a INNER JOIN clause and with to the query using the Member relation
 *
 * @method     \MemberQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildMemberTiket findOne(ConnectionInterface $con = null) Return the first ChildMemberTiket matching the query
 * @method     ChildMemberTiket findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMemberTiket matching the query, or a new ChildMemberTiket object populated from the query conditions when no match is found
 *
 * @method     ChildMemberTiket findOneById(int $id) Return the first ChildMemberTiket filtered by the id column
 * @method     ChildMemberTiket findOneByIdMember(int $id_member) Return the first ChildMemberTiket filtered by the id_member column
 * @method     ChildMemberTiket findOneByJumlahTiket(int $jumlah_tiket) Return the first ChildMemberTiket filtered by the jumlah_tiket column
 * @method     ChildMemberTiket findOneByStatus(int $status) Return the first ChildMemberTiket filtered by the status column
 * @method     ChildMemberTiket findOneByTanggal(string $tanggal) Return the first ChildMemberTiket filtered by the tanggal column *

 * @method     ChildMemberTiket requirePk($key, ConnectionInterface $con = null) Return the ChildMemberTiket by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberTiket requireOne(ConnectionInterface $con = null) Return the first ChildMemberTiket matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMemberTiket requireOneById(int $id) Return the first ChildMemberTiket filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberTiket requireOneByIdMember(int $id_member) Return the first ChildMemberTiket filtered by the id_member column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberTiket requireOneByJumlahTiket(int $jumlah_tiket) Return the first ChildMemberTiket filtered by the jumlah_tiket column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberTiket requireOneByStatus(int $status) Return the first ChildMemberTiket filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberTiket requireOneByTanggal(string $tanggal) Return the first ChildMemberTiket filtered by the tanggal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMemberTiket[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMemberTiket objects based on current ModelCriteria
 * @method     ChildMemberTiket[]|ObjectCollection findById(int $id) Return ChildMemberTiket objects filtered by the id column
 * @method     ChildMemberTiket[]|ObjectCollection findByIdMember(int $id_member) Return ChildMemberTiket objects filtered by the id_member column
 * @method     ChildMemberTiket[]|ObjectCollection findByJumlahTiket(int $jumlah_tiket) Return ChildMemberTiket objects filtered by the jumlah_tiket column
 * @method     ChildMemberTiket[]|ObjectCollection findByStatus(int $status) Return ChildMemberTiket objects filtered by the status column
 * @method     ChildMemberTiket[]|ObjectCollection findByTanggal(string $tanggal) Return ChildMemberTiket objects filtered by the tanggal column
 * @method     ChildMemberTiket[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MemberTiketQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\MemberTiketQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\MemberTiket', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMemberTiketQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMemberTiketQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMemberTiketQuery) {
            return $criteria;
        }
        $query = new ChildMemberTiketQuery();
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
     * @return ChildMemberTiket|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MemberTiketTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = MemberTiketTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildMemberTiket A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, id_member, jumlah_tiket, status, tanggal FROM member_tiket WHERE id = :p0';
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
            /** @var ChildMemberTiket $obj */
            $obj = new ChildMemberTiket();
            $obj->hydrate($row);
            MemberTiketTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildMemberTiket|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMemberTiketQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MemberTiketTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMemberTiketQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MemberTiketTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildMemberTiketQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(MemberTiketTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(MemberTiketTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberTiketTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildMemberTiketQuery The current query, for fluid interface
     */
    public function filterByIdMember($idMember = null, $comparison = null)
    {
        if (is_array($idMember)) {
            $useMinMax = false;
            if (isset($idMember['min'])) {
                $this->addUsingAlias(MemberTiketTableMap::COL_ID_MEMBER, $idMember['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idMember['max'])) {
                $this->addUsingAlias(MemberTiketTableMap::COL_ID_MEMBER, $idMember['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberTiketTableMap::COL_ID_MEMBER, $idMember, $comparison);
    }

    /**
     * Filter the query on the jumlah_tiket column
     *
     * Example usage:
     * <code>
     * $query->filterByJumlahTiket(1234); // WHERE jumlah_tiket = 1234
     * $query->filterByJumlahTiket(array(12, 34)); // WHERE jumlah_tiket IN (12, 34)
     * $query->filterByJumlahTiket(array('min' => 12)); // WHERE jumlah_tiket > 12
     * </code>
     *
     * @param     mixed $jumlahTiket The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMemberTiketQuery The current query, for fluid interface
     */
    public function filterByJumlahTiket($jumlahTiket = null, $comparison = null)
    {
        if (is_array($jumlahTiket)) {
            $useMinMax = false;
            if (isset($jumlahTiket['min'])) {
                $this->addUsingAlias(MemberTiketTableMap::COL_JUMLAH_TIKET, $jumlahTiket['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jumlahTiket['max'])) {
                $this->addUsingAlias(MemberTiketTableMap::COL_JUMLAH_TIKET, $jumlahTiket['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberTiketTableMap::COL_JUMLAH_TIKET, $jumlahTiket, $comparison);
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
     * @return $this|ChildMemberTiketQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(MemberTiketTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(MemberTiketTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberTiketTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildMemberTiketQuery The current query, for fluid interface
     */
    public function filterByTanggal($tanggal = null, $comparison = null)
    {
        if (is_array($tanggal)) {
            $useMinMax = false;
            if (isset($tanggal['min'])) {
                $this->addUsingAlias(MemberTiketTableMap::COL_TANGGAL, $tanggal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggal['max'])) {
                $this->addUsingAlias(MemberTiketTableMap::COL_TANGGAL, $tanggal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberTiketTableMap::COL_TANGGAL, $tanggal, $comparison);
    }

    /**
     * Filter the query by a related \Member object
     *
     * @param \Member|ObjectCollection $member The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildMemberTiketQuery The current query, for fluid interface
     */
    public function filterByMember($member, $comparison = null)
    {
        if ($member instanceof \Member) {
            return $this
                ->addUsingAlias(MemberTiketTableMap::COL_ID_MEMBER, $member->getId(), $comparison);
        } elseif ($member instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MemberTiketTableMap::COL_ID_MEMBER, $member->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildMemberTiketQuery The current query, for fluid interface
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
     * @param   ChildMemberTiket $memberTiket Object to remove from the list of results
     *
     * @return $this|ChildMemberTiketQuery The current query, for fluid interface
     */
    public function prune($memberTiket = null)
    {
        if ($memberTiket) {
            $this->addUsingAlias(MemberTiketTableMap::COL_ID, $memberTiket->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the member_tiket table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MemberTiketTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MemberTiketTableMap::clearInstancePool();
            MemberTiketTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MemberTiketTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MemberTiketTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MemberTiketTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MemberTiketTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MemberTiketQuery
