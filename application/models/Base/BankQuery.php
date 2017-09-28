<?php

namespace Base;

use \Bank as ChildBank;
use \BankQuery as ChildBankQuery;
use \Exception;
use \PDO;
use Map\BankTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'bank' table.
 *
 *
 *
 * @method     ChildBankQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildBankQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method     ChildBankQuery orderByNorek($order = Criteria::ASC) Order by the norek column
 * @method     ChildBankQuery orderByPemilik($order = Criteria::ASC) Order by the pemilik column
 * @method     ChildBankQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method     ChildBankQuery groupById() Group by the id column
 * @method     ChildBankQuery groupByNama() Group by the nama column
 * @method     ChildBankQuery groupByNorek() Group by the norek column
 * @method     ChildBankQuery groupByPemilik() Group by the pemilik column
 * @method     ChildBankQuery groupByStatus() Group by the status column
 *
 * @method     ChildBankQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBankQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBankQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBankQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBankQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBankQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBank findOne(ConnectionInterface $con = null) Return the first ChildBank matching the query
 * @method     ChildBank findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBank matching the query, or a new ChildBank object populated from the query conditions when no match is found
 *
 * @method     ChildBank findOneById(int $id) Return the first ChildBank filtered by the id column
 * @method     ChildBank findOneByNama(string $nama) Return the first ChildBank filtered by the nama column
 * @method     ChildBank findOneByNorek(string $norek) Return the first ChildBank filtered by the norek column
 * @method     ChildBank findOneByPemilik(string $pemilik) Return the first ChildBank filtered by the pemilik column
 * @method     ChildBank findOneByStatus(int $status) Return the first ChildBank filtered by the status column *

 * @method     ChildBank requirePk($key, ConnectionInterface $con = null) Return the ChildBank by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBank requireOne(ConnectionInterface $con = null) Return the first ChildBank matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBank requireOneById(int $id) Return the first ChildBank filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBank requireOneByNama(string $nama) Return the first ChildBank filtered by the nama column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBank requireOneByNorek(string $norek) Return the first ChildBank filtered by the norek column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBank requireOneByPemilik(string $pemilik) Return the first ChildBank filtered by the pemilik column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBank requireOneByStatus(int $status) Return the first ChildBank filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBank[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBank objects based on current ModelCriteria
 * @method     ChildBank[]|ObjectCollection findById(int $id) Return ChildBank objects filtered by the id column
 * @method     ChildBank[]|ObjectCollection findByNama(string $nama) Return ChildBank objects filtered by the nama column
 * @method     ChildBank[]|ObjectCollection findByNorek(string $norek) Return ChildBank objects filtered by the norek column
 * @method     ChildBank[]|ObjectCollection findByPemilik(string $pemilik) Return ChildBank objects filtered by the pemilik column
 * @method     ChildBank[]|ObjectCollection findByStatus(int $status) Return ChildBank objects filtered by the status column
 * @method     ChildBank[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BankQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\BankQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Bank', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBankQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBankQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBankQuery) {
            return $criteria;
        }
        $query = new ChildBankQuery();
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
     * @return ChildBank|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BankTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = BankTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildBank A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, nama, norek, pemilik, status FROM bank WHERE id = :p0';
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
            /** @var ChildBank $obj */
            $obj = new ChildBank();
            $obj->hydrate($row);
            BankTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildBank|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildBankQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BankTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBankQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BankTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildBankQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(BankTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(BankTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BankTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the nama column
     *
     * Example usage:
     * <code>
     * $query->filterByNama('fooValue');   // WHERE nama = 'fooValue'
     * $query->filterByNama('%fooValue%', Criteria::LIKE); // WHERE nama LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nama The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBankQuery The current query, for fluid interface
     */
    public function filterByNama($nama = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nama)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BankTableMap::COL_NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the norek column
     *
     * Example usage:
     * <code>
     * $query->filterByNorek('fooValue');   // WHERE norek = 'fooValue'
     * $query->filterByNorek('%fooValue%', Criteria::LIKE); // WHERE norek LIKE '%fooValue%'
     * </code>
     *
     * @param     string $norek The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBankQuery The current query, for fluid interface
     */
    public function filterByNorek($norek = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($norek)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BankTableMap::COL_NOREK, $norek, $comparison);
    }

    /**
     * Filter the query on the pemilik column
     *
     * Example usage:
     * <code>
     * $query->filterByPemilik('fooValue');   // WHERE pemilik = 'fooValue'
     * $query->filterByPemilik('%fooValue%', Criteria::LIKE); // WHERE pemilik LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pemilik The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBankQuery The current query, for fluid interface
     */
    public function filterByPemilik($pemilik = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pemilik)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BankTableMap::COL_PEMILIK, $pemilik, $comparison);
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
     * @return $this|ChildBankQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(BankTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(BankTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BankTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildBank $bank Object to remove from the list of results
     *
     * @return $this|ChildBankQuery The current query, for fluid interface
     */
    public function prune($bank = null)
    {
        if ($bank) {
            $this->addUsingAlias(BankTableMap::COL_ID, $bank->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the bank table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BankTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BankTableMap::clearInstancePool();
            BankTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(BankTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BankTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BankTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BankTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // BankQuery
