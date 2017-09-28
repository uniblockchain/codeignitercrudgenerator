<?php

namespace Base;

use \OutJabber as ChildOutJabber;
use \OutJabberQuery as ChildOutJabberQuery;
use \Exception;
use \PDO;
use Map\OutJabberTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'out_jabber' table.
 *
 *
 *
 * @method     ChildOutJabberQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildOutJabberQuery orderByMessage($order = Criteria::ASC) Order by the message column
 * @method     ChildOutJabberQuery orderByTrxId($order = Criteria::ASC) Order by the trx_id column
 * @method     ChildOutJabberQuery orderByDstJabber($order = Criteria::ASC) Order by the dst_jabber column
 * @method     ChildOutJabberQuery orderBySrcJabber($order = Criteria::ASC) Order by the src_jabber column
 * @method     ChildOutJabberQuery orderByIdSupplier($order = Criteria::ASC) Order by the id_supplier column
 * @method     ChildOutJabberQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildOutJabberQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method     ChildOutJabberQuery groupById() Group by the id column
 * @method     ChildOutJabberQuery groupByMessage() Group by the message column
 * @method     ChildOutJabberQuery groupByTrxId() Group by the trx_id column
 * @method     ChildOutJabberQuery groupByDstJabber() Group by the dst_jabber column
 * @method     ChildOutJabberQuery groupBySrcJabber() Group by the src_jabber column
 * @method     ChildOutJabberQuery groupByIdSupplier() Group by the id_supplier column
 * @method     ChildOutJabberQuery groupByDate() Group by the date column
 * @method     ChildOutJabberQuery groupByStatus() Group by the status column
 *
 * @method     ChildOutJabberQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOutJabberQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOutJabberQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOutJabberQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOutJabberQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOutJabberQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOutJabber findOne(ConnectionInterface $con = null) Return the first ChildOutJabber matching the query
 * @method     ChildOutJabber findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOutJabber matching the query, or a new ChildOutJabber object populated from the query conditions when no match is found
 *
 * @method     ChildOutJabber findOneById(int $id) Return the first ChildOutJabber filtered by the id column
 * @method     ChildOutJabber findOneByMessage(string $message) Return the first ChildOutJabber filtered by the message column
 * @method     ChildOutJabber findOneByTrxId(int $trx_id) Return the first ChildOutJabber filtered by the trx_id column
 * @method     ChildOutJabber findOneByDstJabber(string $dst_jabber) Return the first ChildOutJabber filtered by the dst_jabber column
 * @method     ChildOutJabber findOneBySrcJabber(string $src_jabber) Return the first ChildOutJabber filtered by the src_jabber column
 * @method     ChildOutJabber findOneByIdSupplier(int $id_supplier) Return the first ChildOutJabber filtered by the id_supplier column
 * @method     ChildOutJabber findOneByDate(string $date) Return the first ChildOutJabber filtered by the date column
 * @method     ChildOutJabber findOneByStatus(int $status) Return the first ChildOutJabber filtered by the status column *

 * @method     ChildOutJabber requirePk($key, ConnectionInterface $con = null) Return the ChildOutJabber by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOutJabber requireOne(ConnectionInterface $con = null) Return the first ChildOutJabber matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOutJabber requireOneById(int $id) Return the first ChildOutJabber filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOutJabber requireOneByMessage(string $message) Return the first ChildOutJabber filtered by the message column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOutJabber requireOneByTrxId(int $trx_id) Return the first ChildOutJabber filtered by the trx_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOutJabber requireOneByDstJabber(string $dst_jabber) Return the first ChildOutJabber filtered by the dst_jabber column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOutJabber requireOneBySrcJabber(string $src_jabber) Return the first ChildOutJabber filtered by the src_jabber column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOutJabber requireOneByIdSupplier(int $id_supplier) Return the first ChildOutJabber filtered by the id_supplier column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOutJabber requireOneByDate(string $date) Return the first ChildOutJabber filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOutJabber requireOneByStatus(int $status) Return the first ChildOutJabber filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOutJabber[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOutJabber objects based on current ModelCriteria
 * @method     ChildOutJabber[]|ObjectCollection findById(int $id) Return ChildOutJabber objects filtered by the id column
 * @method     ChildOutJabber[]|ObjectCollection findByMessage(string $message) Return ChildOutJabber objects filtered by the message column
 * @method     ChildOutJabber[]|ObjectCollection findByTrxId(int $trx_id) Return ChildOutJabber objects filtered by the trx_id column
 * @method     ChildOutJabber[]|ObjectCollection findByDstJabber(string $dst_jabber) Return ChildOutJabber objects filtered by the dst_jabber column
 * @method     ChildOutJabber[]|ObjectCollection findBySrcJabber(string $src_jabber) Return ChildOutJabber objects filtered by the src_jabber column
 * @method     ChildOutJabber[]|ObjectCollection findByIdSupplier(int $id_supplier) Return ChildOutJabber objects filtered by the id_supplier column
 * @method     ChildOutJabber[]|ObjectCollection findByDate(string $date) Return ChildOutJabber objects filtered by the date column
 * @method     ChildOutJabber[]|ObjectCollection findByStatus(int $status) Return ChildOutJabber objects filtered by the status column
 * @method     ChildOutJabber[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OutJabberQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OutJabberQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OutJabber', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOutJabberQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOutJabberQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOutJabberQuery) {
            return $criteria;
        }
        $query = new ChildOutJabberQuery();
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
     * @return ChildOutJabber|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OutJabberTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OutJabberTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOutJabber A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, message, trx_id, dst_jabber, src_jabber, id_supplier, date, status FROM out_jabber WHERE id = :p0';
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
            /** @var ChildOutJabber $obj */
            $obj = new ChildOutJabber();
            $obj->hydrate($row);
            OutJabberTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOutJabber|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOutJabberQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OutJabberTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOutJabberQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OutJabberTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildOutJabberQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(OutJabberTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(OutJabberTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OutJabberTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the message column
     *
     * Example usage:
     * <code>
     * $query->filterByMessage('fooValue');   // WHERE message = 'fooValue'
     * $query->filterByMessage('%fooValue%', Criteria::LIKE); // WHERE message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $message The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOutJabberQuery The current query, for fluid interface
     */
    public function filterByMessage($message = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($message)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OutJabberTableMap::COL_MESSAGE, $message, $comparison);
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
     * @return $this|ChildOutJabberQuery The current query, for fluid interface
     */
    public function filterByTrxId($trxId = null, $comparison = null)
    {
        if (is_array($trxId)) {
            $useMinMax = false;
            if (isset($trxId['min'])) {
                $this->addUsingAlias(OutJabberTableMap::COL_TRX_ID, $trxId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trxId['max'])) {
                $this->addUsingAlias(OutJabberTableMap::COL_TRX_ID, $trxId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OutJabberTableMap::COL_TRX_ID, $trxId, $comparison);
    }

    /**
     * Filter the query on the dst_jabber column
     *
     * Example usage:
     * <code>
     * $query->filterByDstJabber('fooValue');   // WHERE dst_jabber = 'fooValue'
     * $query->filterByDstJabber('%fooValue%', Criteria::LIKE); // WHERE dst_jabber LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dstJabber The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOutJabberQuery The current query, for fluid interface
     */
    public function filterByDstJabber($dstJabber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dstJabber)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OutJabberTableMap::COL_DST_JABBER, $dstJabber, $comparison);
    }

    /**
     * Filter the query on the src_jabber column
     *
     * Example usage:
     * <code>
     * $query->filterBySrcJabber('fooValue');   // WHERE src_jabber = 'fooValue'
     * $query->filterBySrcJabber('%fooValue%', Criteria::LIKE); // WHERE src_jabber LIKE '%fooValue%'
     * </code>
     *
     * @param     string $srcJabber The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOutJabberQuery The current query, for fluid interface
     */
    public function filterBySrcJabber($srcJabber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($srcJabber)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OutJabberTableMap::COL_SRC_JABBER, $srcJabber, $comparison);
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
     * @param     mixed $idSupplier The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOutJabberQuery The current query, for fluid interface
     */
    public function filterByIdSupplier($idSupplier = null, $comparison = null)
    {
        if (is_array($idSupplier)) {
            $useMinMax = false;
            if (isset($idSupplier['min'])) {
                $this->addUsingAlias(OutJabberTableMap::COL_ID_SUPPLIER, $idSupplier['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSupplier['max'])) {
                $this->addUsingAlias(OutJabberTableMap::COL_ID_SUPPLIER, $idSupplier['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OutJabberTableMap::COL_ID_SUPPLIER, $idSupplier, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('2011-03-14'); // WHERE date = '2011-03-14'
     * $query->filterByDate('now'); // WHERE date = '2011-03-14'
     * $query->filterByDate(array('max' => 'yesterday')); // WHERE date > '2011-03-13'
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOutJabberQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(OutJabberTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(OutJabberTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OutJabberTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildOutJabberQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(OutJabberTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(OutJabberTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OutJabberTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOutJabber $outJabber Object to remove from the list of results
     *
     * @return $this|ChildOutJabberQuery The current query, for fluid interface
     */
    public function prune($outJabber = null)
    {
        if ($outJabber) {
            $this->addUsingAlias(OutJabberTableMap::COL_ID, $outJabber->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the out_jabber table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OutJabberTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OutJabberTableMap::clearInstancePool();
            OutJabberTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OutJabberTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OutJabberTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OutJabberTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OutJabberTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OutJabberQuery
