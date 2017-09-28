<?php

namespace Base;

use \KategoriProduk as ChildKategoriProduk;
use \KategoriProdukQuery as ChildKategoriProdukQuery;
use \Exception;
use \PDO;
use Map\KategoriProdukTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'kategori_produk' table.
 *
 *
 *
 * @method     ChildKategoriProdukQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildKategoriProdukQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method     ChildKategoriProdukQuery orderByOperator($order = Criteria::ASC) Order by the operator column
 * @method     ChildKategoriProdukQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method     ChildKategoriProdukQuery groupById() Group by the id column
 * @method     ChildKategoriProdukQuery groupByNama() Group by the nama column
 * @method     ChildKategoriProdukQuery groupByOperator() Group by the operator column
 * @method     ChildKategoriProdukQuery groupByStatus() Group by the status column
 *
 * @method     ChildKategoriProdukQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildKategoriProdukQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildKategoriProdukQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildKategoriProdukQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildKategoriProdukQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildKategoriProdukQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildKategoriProdukQuery leftJoinJenisProduk($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisProduk relation
 * @method     ChildKategoriProdukQuery rightJoinJenisProduk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisProduk relation
 * @method     ChildKategoriProdukQuery innerJoinJenisProduk($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisProduk relation
 *
 * @method     ChildKategoriProdukQuery joinWithJenisProduk($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the JenisProduk relation
 *
 * @method     ChildKategoriProdukQuery leftJoinWithJenisProduk() Adds a LEFT JOIN clause and with to the query using the JenisProduk relation
 * @method     ChildKategoriProdukQuery rightJoinWithJenisProduk() Adds a RIGHT JOIN clause and with to the query using the JenisProduk relation
 * @method     ChildKategoriProdukQuery innerJoinWithJenisProduk() Adds a INNER JOIN clause and with to the query using the JenisProduk relation
 *
 * @method     \JenisProdukQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildKategoriProduk findOne(ConnectionInterface $con = null) Return the first ChildKategoriProduk matching the query
 * @method     ChildKategoriProduk findOneOrCreate(ConnectionInterface $con = null) Return the first ChildKategoriProduk matching the query, or a new ChildKategoriProduk object populated from the query conditions when no match is found
 *
 * @method     ChildKategoriProduk findOneById(int $id) Return the first ChildKategoriProduk filtered by the id column
 * @method     ChildKategoriProduk findOneByNama(string $nama) Return the first ChildKategoriProduk filtered by the nama column
 * @method     ChildKategoriProduk findOneByOperator(int $operator) Return the first ChildKategoriProduk filtered by the operator column
 * @method     ChildKategoriProduk findOneByStatus(int $status) Return the first ChildKategoriProduk filtered by the status column *

 * @method     ChildKategoriProduk requirePk($key, ConnectionInterface $con = null) Return the ChildKategoriProduk by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKategoriProduk requireOne(ConnectionInterface $con = null) Return the first ChildKategoriProduk matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildKategoriProduk requireOneById(int $id) Return the first ChildKategoriProduk filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKategoriProduk requireOneByNama(string $nama) Return the first ChildKategoriProduk filtered by the nama column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKategoriProduk requireOneByOperator(int $operator) Return the first ChildKategoriProduk filtered by the operator column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKategoriProduk requireOneByStatus(int $status) Return the first ChildKategoriProduk filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildKategoriProduk[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildKategoriProduk objects based on current ModelCriteria
 * @method     ChildKategoriProduk[]|ObjectCollection findById(int $id) Return ChildKategoriProduk objects filtered by the id column
 * @method     ChildKategoriProduk[]|ObjectCollection findByNama(string $nama) Return ChildKategoriProduk objects filtered by the nama column
 * @method     ChildKategoriProduk[]|ObjectCollection findByOperator(int $operator) Return ChildKategoriProduk objects filtered by the operator column
 * @method     ChildKategoriProduk[]|ObjectCollection findByStatus(int $status) Return ChildKategoriProduk objects filtered by the status column
 * @method     ChildKategoriProduk[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class KategoriProdukQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\KategoriProdukQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\KategoriProduk', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildKategoriProdukQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildKategoriProdukQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildKategoriProdukQuery) {
            return $criteria;
        }
        $query = new ChildKategoriProdukQuery();
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
     * @return ChildKategoriProduk|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(KategoriProdukTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = KategoriProdukTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildKategoriProduk A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, nama, operator, status FROM kategori_produk WHERE id = :p0';
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
            /** @var ChildKategoriProduk $obj */
            $obj = new ChildKategoriProduk();
            $obj->hydrate($row);
            KategoriProdukTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildKategoriProduk|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildKategoriProdukQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(KategoriProdukTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildKategoriProdukQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(KategoriProdukTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildKategoriProdukQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(KategoriProdukTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(KategoriProdukTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KategoriProdukTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildKategoriProdukQuery The current query, for fluid interface
     */
    public function filterByNama($nama = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nama)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KategoriProdukTableMap::COL_NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the operator column
     *
     * Example usage:
     * <code>
     * $query->filterByOperator(1234); // WHERE operator = 1234
     * $query->filterByOperator(array(12, 34)); // WHERE operator IN (12, 34)
     * $query->filterByOperator(array('min' => 12)); // WHERE operator > 12
     * </code>
     *
     * @param     mixed $operator The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKategoriProdukQuery The current query, for fluid interface
     */
    public function filterByOperator($operator = null, $comparison = null)
    {
        if (is_array($operator)) {
            $useMinMax = false;
            if (isset($operator['min'])) {
                $this->addUsingAlias(KategoriProdukTableMap::COL_OPERATOR, $operator['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($operator['max'])) {
                $this->addUsingAlias(KategoriProdukTableMap::COL_OPERATOR, $operator['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KategoriProdukTableMap::COL_OPERATOR, $operator, $comparison);
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
     * @return $this|ChildKategoriProdukQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(KategoriProdukTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(KategoriProdukTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KategoriProdukTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query by a related \JenisProduk object
     *
     * @param \JenisProduk|ObjectCollection $jenisProduk the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildKategoriProdukQuery The current query, for fluid interface
     */
    public function filterByJenisProduk($jenisProduk, $comparison = null)
    {
        if ($jenisProduk instanceof \JenisProduk) {
            return $this
                ->addUsingAlias(KategoriProdukTableMap::COL_ID, $jenisProduk->getIdKategoriProduk(), $comparison);
        } elseif ($jenisProduk instanceof ObjectCollection) {
            return $this
                ->useJenisProdukQuery()
                ->filterByPrimaryKeys($jenisProduk->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJenisProduk() only accepts arguments of type \JenisProduk or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisProduk relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildKategoriProdukQuery The current query, for fluid interface
     */
    public function joinJenisProduk($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisProduk');

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
            $this->addJoinObject($join, 'JenisProduk');
        }

        return $this;
    }

    /**
     * Use the JenisProduk relation JenisProduk object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \JenisProdukQuery A secondary query class using the current class as primary query
     */
    public function useJenisProdukQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJenisProduk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisProduk', '\JenisProdukQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildKategoriProduk $kategoriProduk Object to remove from the list of results
     *
     * @return $this|ChildKategoriProdukQuery The current query, for fluid interface
     */
    public function prune($kategoriProduk = null)
    {
        if ($kategoriProduk) {
            $this->addUsingAlias(KategoriProdukTableMap::COL_ID, $kategoriProduk->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the kategori_produk table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(KategoriProdukTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            KategoriProdukTableMap::clearInstancePool();
            KategoriProdukTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(KategoriProdukTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(KategoriProdukTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            KategoriProdukTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            KategoriProdukTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // KategoriProdukQuery
