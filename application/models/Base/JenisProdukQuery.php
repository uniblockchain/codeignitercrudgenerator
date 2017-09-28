<?php

namespace Base;

use \JenisProduk as ChildJenisProduk;
use \JenisProdukQuery as ChildJenisProdukQuery;
use \Exception;
use \PDO;
use Map\JenisProdukTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'jenis_produk' table.
 *
 *
 *
 * @method     ChildJenisProdukQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildJenisProdukQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method     ChildJenisProdukQuery orderByIdKategoriProduk($order = Criteria::ASC) Order by the id_kategori_produk column
 * @method     ChildJenisProdukQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method     ChildJenisProdukQuery groupById() Group by the id column
 * @method     ChildJenisProdukQuery groupByNama() Group by the nama column
 * @method     ChildJenisProdukQuery groupByIdKategoriProduk() Group by the id_kategori_produk column
 * @method     ChildJenisProdukQuery groupByStatus() Group by the status column
 *
 * @method     ChildJenisProdukQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildJenisProdukQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildJenisProdukQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildJenisProdukQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildJenisProdukQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildJenisProdukQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildJenisProdukQuery leftJoinKategoriProduk($relationAlias = null) Adds a LEFT JOIN clause to the query using the KategoriProduk relation
 * @method     ChildJenisProdukQuery rightJoinKategoriProduk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the KategoriProduk relation
 * @method     ChildJenisProdukQuery innerJoinKategoriProduk($relationAlias = null) Adds a INNER JOIN clause to the query using the KategoriProduk relation
 *
 * @method     ChildJenisProdukQuery joinWithKategoriProduk($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the KategoriProduk relation
 *
 * @method     ChildJenisProdukQuery leftJoinWithKategoriProduk() Adds a LEFT JOIN clause and with to the query using the KategoriProduk relation
 * @method     ChildJenisProdukQuery rightJoinWithKategoriProduk() Adds a RIGHT JOIN clause and with to the query using the KategoriProduk relation
 * @method     ChildJenisProdukQuery innerJoinWithKategoriProduk() Adds a INNER JOIN clause and with to the query using the KategoriProduk relation
 *
 * @method     ChildJenisProdukQuery leftJoinProduk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Produk relation
 * @method     ChildJenisProdukQuery rightJoinProduk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Produk relation
 * @method     ChildJenisProdukQuery innerJoinProduk($relationAlias = null) Adds a INNER JOIN clause to the query using the Produk relation
 *
 * @method     ChildJenisProdukQuery joinWithProduk($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Produk relation
 *
 * @method     ChildJenisProdukQuery leftJoinWithProduk() Adds a LEFT JOIN clause and with to the query using the Produk relation
 * @method     ChildJenisProdukQuery rightJoinWithProduk() Adds a RIGHT JOIN clause and with to the query using the Produk relation
 * @method     ChildJenisProdukQuery innerJoinWithProduk() Adds a INNER JOIN clause and with to the query using the Produk relation
 *
 * @method     \KategoriProdukQuery|\ProdukQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildJenisProduk findOne(ConnectionInterface $con = null) Return the first ChildJenisProduk matching the query
 * @method     ChildJenisProduk findOneOrCreate(ConnectionInterface $con = null) Return the first ChildJenisProduk matching the query, or a new ChildJenisProduk object populated from the query conditions when no match is found
 *
 * @method     ChildJenisProduk findOneById(int $id) Return the first ChildJenisProduk filtered by the id column
 * @method     ChildJenisProduk findOneByNama(string $nama) Return the first ChildJenisProduk filtered by the nama column
 * @method     ChildJenisProduk findOneByIdKategoriProduk(int $id_kategori_produk) Return the first ChildJenisProduk filtered by the id_kategori_produk column
 * @method     ChildJenisProduk findOneByStatus(int $status) Return the first ChildJenisProduk filtered by the status column *

 * @method     ChildJenisProduk requirePk($key, ConnectionInterface $con = null) Return the ChildJenisProduk by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJenisProduk requireOne(ConnectionInterface $con = null) Return the first ChildJenisProduk matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildJenisProduk requireOneById(int $id) Return the first ChildJenisProduk filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJenisProduk requireOneByNama(string $nama) Return the first ChildJenisProduk filtered by the nama column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJenisProduk requireOneByIdKategoriProduk(int $id_kategori_produk) Return the first ChildJenisProduk filtered by the id_kategori_produk column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJenisProduk requireOneByStatus(int $status) Return the first ChildJenisProduk filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildJenisProduk[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildJenisProduk objects based on current ModelCriteria
 * @method     ChildJenisProduk[]|ObjectCollection findById(int $id) Return ChildJenisProduk objects filtered by the id column
 * @method     ChildJenisProduk[]|ObjectCollection findByNama(string $nama) Return ChildJenisProduk objects filtered by the nama column
 * @method     ChildJenisProduk[]|ObjectCollection findByIdKategoriProduk(int $id_kategori_produk) Return ChildJenisProduk objects filtered by the id_kategori_produk column
 * @method     ChildJenisProduk[]|ObjectCollection findByStatus(int $status) Return ChildJenisProduk objects filtered by the status column
 * @method     ChildJenisProduk[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class JenisProdukQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\JenisProdukQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\JenisProduk', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildJenisProdukQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildJenisProdukQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildJenisProdukQuery) {
            return $criteria;
        }
        $query = new ChildJenisProdukQuery();
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
     * @return ChildJenisProduk|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(JenisProdukTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = JenisProdukTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildJenisProduk A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, nama, id_kategori_produk, status FROM jenis_produk WHERE id = :p0';
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
            /** @var ChildJenisProduk $obj */
            $obj = new ChildJenisProduk();
            $obj->hydrate($row);
            JenisProdukTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildJenisProduk|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildJenisProdukQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JenisProdukTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildJenisProdukQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JenisProdukTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildJenisProdukQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(JenisProdukTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(JenisProdukTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisProdukTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildJenisProdukQuery The current query, for fluid interface
     */
    public function filterByNama($nama = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nama)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisProdukTableMap::COL_NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the id_kategori_produk column
     *
     * Example usage:
     * <code>
     * $query->filterByIdKategoriProduk(1234); // WHERE id_kategori_produk = 1234
     * $query->filterByIdKategoriProduk(array(12, 34)); // WHERE id_kategori_produk IN (12, 34)
     * $query->filterByIdKategoriProduk(array('min' => 12)); // WHERE id_kategori_produk > 12
     * </code>
     *
     * @see       filterByKategoriProduk()
     *
     * @param     mixed $idKategoriProduk The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildJenisProdukQuery The current query, for fluid interface
     */
    public function filterByIdKategoriProduk($idKategoriProduk = null, $comparison = null)
    {
        if (is_array($idKategoriProduk)) {
            $useMinMax = false;
            if (isset($idKategoriProduk['min'])) {
                $this->addUsingAlias(JenisProdukTableMap::COL_ID_KATEGORI_PRODUK, $idKategoriProduk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idKategoriProduk['max'])) {
                $this->addUsingAlias(JenisProdukTableMap::COL_ID_KATEGORI_PRODUK, $idKategoriProduk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisProdukTableMap::COL_ID_KATEGORI_PRODUK, $idKategoriProduk, $comparison);
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
     * @return $this|ChildJenisProdukQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(JenisProdukTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(JenisProdukTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisProdukTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query by a related \KategoriProduk object
     *
     * @param \KategoriProduk|ObjectCollection $kategoriProduk The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildJenisProdukQuery The current query, for fluid interface
     */
    public function filterByKategoriProduk($kategoriProduk, $comparison = null)
    {
        if ($kategoriProduk instanceof \KategoriProduk) {
            return $this
                ->addUsingAlias(JenisProdukTableMap::COL_ID_KATEGORI_PRODUK, $kategoriProduk->getId(), $comparison);
        } elseif ($kategoriProduk instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JenisProdukTableMap::COL_ID_KATEGORI_PRODUK, $kategoriProduk->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByKategoriProduk() only accepts arguments of type \KategoriProduk or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the KategoriProduk relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildJenisProdukQuery The current query, for fluid interface
     */
    public function joinKategoriProduk($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('KategoriProduk');

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
            $this->addJoinObject($join, 'KategoriProduk');
        }

        return $this;
    }

    /**
     * Use the KategoriProduk relation KategoriProduk object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \KategoriProdukQuery A secondary query class using the current class as primary query
     */
    public function useKategoriProdukQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinKategoriProduk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'KategoriProduk', '\KategoriProdukQuery');
    }

    /**
     * Filter the query by a related \Produk object
     *
     * @param \Produk|ObjectCollection $produk the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildJenisProdukQuery The current query, for fluid interface
     */
    public function filterByProduk($produk, $comparison = null)
    {
        if ($produk instanceof \Produk) {
            return $this
                ->addUsingAlias(JenisProdukTableMap::COL_ID, $produk->getIdJenisProduk(), $comparison);
        } elseif ($produk instanceof ObjectCollection) {
            return $this
                ->useProdukQuery()
                ->filterByPrimaryKeys($produk->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildJenisProdukQuery The current query, for fluid interface
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
     * @param   ChildJenisProduk $jenisProduk Object to remove from the list of results
     *
     * @return $this|ChildJenisProdukQuery The current query, for fluid interface
     */
    public function prune($jenisProduk = null)
    {
        if ($jenisProduk) {
            $this->addUsingAlias(JenisProdukTableMap::COL_ID, $jenisProduk->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the jenis_produk table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(JenisProdukTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            JenisProdukTableMap::clearInstancePool();
            JenisProdukTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(JenisProdukTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(JenisProdukTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            JenisProdukTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            JenisProdukTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // JenisProdukQuery
