<?php

namespace Base;

use \MemberMutasi as ChildMemberMutasi;
use \MemberMutasiQuery as ChildMemberMutasiQuery;
use \Exception;
use \PDO;
use Map\MemberMutasiTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'member_mutasi' table.
 *
 *
 *
 * @method     ChildMemberMutasiQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildMemberMutasiQuery orderByIdMemberTrx($order = Criteria::ASC) Order by the id_member_trx column
 * @method     ChildMemberMutasiQuery orderByJumlah($order = Criteria::ASC) Order by the jumlah column
 * @method     ChildMemberMutasiQuery orderByIdMember($order = Criteria::ASC) Order by the id_member column
 * @method     ChildMemberMutasiQuery orderByIdSupplier($order = Criteria::ASC) Order by the id_supplier column
 * @method     ChildMemberMutasiQuery orderBySaldoAwal($order = Criteria::ASC) Order by the saldo_awal column
 * @method     ChildMemberMutasiQuery orderBySaldoAkhir($order = Criteria::ASC) Order by the saldo_akhir column
 * @method     ChildMemberMutasiQuery orderByKetMutasi($order = Criteria::ASC) Order by the ket_mutasi column
 *
 * @method     ChildMemberMutasiQuery groupById() Group by the id column
 * @method     ChildMemberMutasiQuery groupByIdMemberTrx() Group by the id_member_trx column
 * @method     ChildMemberMutasiQuery groupByJumlah() Group by the jumlah column
 * @method     ChildMemberMutasiQuery groupByIdMember() Group by the id_member column
 * @method     ChildMemberMutasiQuery groupByIdSupplier() Group by the id_supplier column
 * @method     ChildMemberMutasiQuery groupBySaldoAwal() Group by the saldo_awal column
 * @method     ChildMemberMutasiQuery groupBySaldoAkhir() Group by the saldo_akhir column
 * @method     ChildMemberMutasiQuery groupByKetMutasi() Group by the ket_mutasi column
 *
 * @method     ChildMemberMutasiQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMemberMutasiQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMemberMutasiQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMemberMutasiQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMemberMutasiQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMemberMutasiQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMemberMutasiQuery leftJoinSupplier($relationAlias = null) Adds a LEFT JOIN clause to the query using the Supplier relation
 * @method     ChildMemberMutasiQuery rightJoinSupplier($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Supplier relation
 * @method     ChildMemberMutasiQuery innerJoinSupplier($relationAlias = null) Adds a INNER JOIN clause to the query using the Supplier relation
 *
 * @method     ChildMemberMutasiQuery joinWithSupplier($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Supplier relation
 *
 * @method     ChildMemberMutasiQuery leftJoinWithSupplier() Adds a LEFT JOIN clause and with to the query using the Supplier relation
 * @method     ChildMemberMutasiQuery rightJoinWithSupplier() Adds a RIGHT JOIN clause and with to the query using the Supplier relation
 * @method     ChildMemberMutasiQuery innerJoinWithSupplier() Adds a INNER JOIN clause and with to the query using the Supplier relation
 *
 * @method     ChildMemberMutasiQuery leftJoinMember($relationAlias = null) Adds a LEFT JOIN clause to the query using the Member relation
 * @method     ChildMemberMutasiQuery rightJoinMember($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Member relation
 * @method     ChildMemberMutasiQuery innerJoinMember($relationAlias = null) Adds a INNER JOIN clause to the query using the Member relation
 *
 * @method     ChildMemberMutasiQuery joinWithMember($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Member relation
 *
 * @method     ChildMemberMutasiQuery leftJoinWithMember() Adds a LEFT JOIN clause and with to the query using the Member relation
 * @method     ChildMemberMutasiQuery rightJoinWithMember() Adds a RIGHT JOIN clause and with to the query using the Member relation
 * @method     ChildMemberMutasiQuery innerJoinWithMember() Adds a INNER JOIN clause and with to the query using the Member relation
 *
 * @method     ChildMemberMutasiQuery leftJoinMemberTrx($relationAlias = null) Adds a LEFT JOIN clause to the query using the MemberTrx relation
 * @method     ChildMemberMutasiQuery rightJoinMemberTrx($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MemberTrx relation
 * @method     ChildMemberMutasiQuery innerJoinMemberTrx($relationAlias = null) Adds a INNER JOIN clause to the query using the MemberTrx relation
 *
 * @method     ChildMemberMutasiQuery joinWithMemberTrx($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the MemberTrx relation
 *
 * @method     ChildMemberMutasiQuery leftJoinWithMemberTrx() Adds a LEFT JOIN clause and with to the query using the MemberTrx relation
 * @method     ChildMemberMutasiQuery rightJoinWithMemberTrx() Adds a RIGHT JOIN clause and with to the query using the MemberTrx relation
 * @method     ChildMemberMutasiQuery innerJoinWithMemberTrx() Adds a INNER JOIN clause and with to the query using the MemberTrx relation
 *
 * @method     \SupplierQuery|\MemberQuery|\MemberTrxQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildMemberMutasi findOne(ConnectionInterface $con = null) Return the first ChildMemberMutasi matching the query
 * @method     ChildMemberMutasi findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMemberMutasi matching the query, or a new ChildMemberMutasi object populated from the query conditions when no match is found
 *
 * @method     ChildMemberMutasi findOneById(int $id) Return the first ChildMemberMutasi filtered by the id column
 * @method     ChildMemberMutasi findOneByIdMemberTrx(int $id_member_trx) Return the first ChildMemberMutasi filtered by the id_member_trx column
 * @method     ChildMemberMutasi findOneByJumlah(int $jumlah) Return the first ChildMemberMutasi filtered by the jumlah column
 * @method     ChildMemberMutasi findOneByIdMember(int $id_member) Return the first ChildMemberMutasi filtered by the id_member column
 * @method     ChildMemberMutasi findOneByIdSupplier(int $id_supplier) Return the first ChildMemberMutasi filtered by the id_supplier column
 * @method     ChildMemberMutasi findOneBySaldoAwal(int $saldo_awal) Return the first ChildMemberMutasi filtered by the saldo_awal column
 * @method     ChildMemberMutasi findOneBySaldoAkhir(int $saldo_akhir) Return the first ChildMemberMutasi filtered by the saldo_akhir column
 * @method     ChildMemberMutasi findOneByKetMutasi(string $ket_mutasi) Return the first ChildMemberMutasi filtered by the ket_mutasi column *

 * @method     ChildMemberMutasi requirePk($key, ConnectionInterface $con = null) Return the ChildMemberMutasi by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberMutasi requireOne(ConnectionInterface $con = null) Return the first ChildMemberMutasi matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMemberMutasi requireOneById(int $id) Return the first ChildMemberMutasi filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberMutasi requireOneByIdMemberTrx(int $id_member_trx) Return the first ChildMemberMutasi filtered by the id_member_trx column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberMutasi requireOneByJumlah(int $jumlah) Return the first ChildMemberMutasi filtered by the jumlah column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberMutasi requireOneByIdMember(int $id_member) Return the first ChildMemberMutasi filtered by the id_member column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberMutasi requireOneByIdSupplier(int $id_supplier) Return the first ChildMemberMutasi filtered by the id_supplier column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberMutasi requireOneBySaldoAwal(int $saldo_awal) Return the first ChildMemberMutasi filtered by the saldo_awal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberMutasi requireOneBySaldoAkhir(int $saldo_akhir) Return the first ChildMemberMutasi filtered by the saldo_akhir column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberMutasi requireOneByKetMutasi(string $ket_mutasi) Return the first ChildMemberMutasi filtered by the ket_mutasi column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMemberMutasi[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMemberMutasi objects based on current ModelCriteria
 * @method     ChildMemberMutasi[]|ObjectCollection findById(int $id) Return ChildMemberMutasi objects filtered by the id column
 * @method     ChildMemberMutasi[]|ObjectCollection findByIdMemberTrx(int $id_member_trx) Return ChildMemberMutasi objects filtered by the id_member_trx column
 * @method     ChildMemberMutasi[]|ObjectCollection findByJumlah(int $jumlah) Return ChildMemberMutasi objects filtered by the jumlah column
 * @method     ChildMemberMutasi[]|ObjectCollection findByIdMember(int $id_member) Return ChildMemberMutasi objects filtered by the id_member column
 * @method     ChildMemberMutasi[]|ObjectCollection findByIdSupplier(int $id_supplier) Return ChildMemberMutasi objects filtered by the id_supplier column
 * @method     ChildMemberMutasi[]|ObjectCollection findBySaldoAwal(int $saldo_awal) Return ChildMemberMutasi objects filtered by the saldo_awal column
 * @method     ChildMemberMutasi[]|ObjectCollection findBySaldoAkhir(int $saldo_akhir) Return ChildMemberMutasi objects filtered by the saldo_akhir column
 * @method     ChildMemberMutasi[]|ObjectCollection findByKetMutasi(string $ket_mutasi) Return ChildMemberMutasi objects filtered by the ket_mutasi column
 * @method     ChildMemberMutasi[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MemberMutasiQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\MemberMutasiQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\MemberMutasi', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMemberMutasiQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMemberMutasiQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMemberMutasiQuery) {
            return $criteria;
        }
        $query = new ChildMemberMutasiQuery();
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
     * @return ChildMemberMutasi|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MemberMutasiTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = MemberMutasiTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildMemberMutasi A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, id_member_trx, jumlah, id_member, id_supplier, saldo_awal, saldo_akhir, ket_mutasi FROM member_mutasi WHERE id = :p0';
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
            /** @var ChildMemberMutasi $obj */
            $obj = new ChildMemberMutasi();
            $obj->hydrate($row);
            MemberMutasiTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildMemberMutasi|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMemberMutasiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MemberMutasiTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMemberMutasiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MemberMutasiTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildMemberMutasiQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(MemberMutasiTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(MemberMutasiTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberMutasiTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the id_member_trx column
     *
     * Example usage:
     * <code>
     * $query->filterByIdMemberTrx(1234); // WHERE id_member_trx = 1234
     * $query->filterByIdMemberTrx(array(12, 34)); // WHERE id_member_trx IN (12, 34)
     * $query->filterByIdMemberTrx(array('min' => 12)); // WHERE id_member_trx > 12
     * </code>
     *
     * @see       filterByMemberTrx()
     *
     * @param     mixed $idMemberTrx The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMemberMutasiQuery The current query, for fluid interface
     */
    public function filterByIdMemberTrx($idMemberTrx = null, $comparison = null)
    {
        if (is_array($idMemberTrx)) {
            $useMinMax = false;
            if (isset($idMemberTrx['min'])) {
                $this->addUsingAlias(MemberMutasiTableMap::COL_ID_MEMBER_TRX, $idMemberTrx['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idMemberTrx['max'])) {
                $this->addUsingAlias(MemberMutasiTableMap::COL_ID_MEMBER_TRX, $idMemberTrx['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberMutasiTableMap::COL_ID_MEMBER_TRX, $idMemberTrx, $comparison);
    }

    /**
     * Filter the query on the jumlah column
     *
     * Example usage:
     * <code>
     * $query->filterByJumlah(1234); // WHERE jumlah = 1234
     * $query->filterByJumlah(array(12, 34)); // WHERE jumlah IN (12, 34)
     * $query->filterByJumlah(array('min' => 12)); // WHERE jumlah > 12
     * </code>
     *
     * @param     mixed $jumlah The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMemberMutasiQuery The current query, for fluid interface
     */
    public function filterByJumlah($jumlah = null, $comparison = null)
    {
        if (is_array($jumlah)) {
            $useMinMax = false;
            if (isset($jumlah['min'])) {
                $this->addUsingAlias(MemberMutasiTableMap::COL_JUMLAH, $jumlah['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jumlah['max'])) {
                $this->addUsingAlias(MemberMutasiTableMap::COL_JUMLAH, $jumlah['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberMutasiTableMap::COL_JUMLAH, $jumlah, $comparison);
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
     * @return $this|ChildMemberMutasiQuery The current query, for fluid interface
     */
    public function filterByIdMember($idMember = null, $comparison = null)
    {
        if (is_array($idMember)) {
            $useMinMax = false;
            if (isset($idMember['min'])) {
                $this->addUsingAlias(MemberMutasiTableMap::COL_ID_MEMBER, $idMember['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idMember['max'])) {
                $this->addUsingAlias(MemberMutasiTableMap::COL_ID_MEMBER, $idMember['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberMutasiTableMap::COL_ID_MEMBER, $idMember, $comparison);
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
     * @return $this|ChildMemberMutasiQuery The current query, for fluid interface
     */
    public function filterByIdSupplier($idSupplier = null, $comparison = null)
    {
        if (is_array($idSupplier)) {
            $useMinMax = false;
            if (isset($idSupplier['min'])) {
                $this->addUsingAlias(MemberMutasiTableMap::COL_ID_SUPPLIER, $idSupplier['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSupplier['max'])) {
                $this->addUsingAlias(MemberMutasiTableMap::COL_ID_SUPPLIER, $idSupplier['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberMutasiTableMap::COL_ID_SUPPLIER, $idSupplier, $comparison);
    }

    /**
     * Filter the query on the saldo_awal column
     *
     * Example usage:
     * <code>
     * $query->filterBySaldoAwal(1234); // WHERE saldo_awal = 1234
     * $query->filterBySaldoAwal(array(12, 34)); // WHERE saldo_awal IN (12, 34)
     * $query->filterBySaldoAwal(array('min' => 12)); // WHERE saldo_awal > 12
     * </code>
     *
     * @param     mixed $saldoAwal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMemberMutasiQuery The current query, for fluid interface
     */
    public function filterBySaldoAwal($saldoAwal = null, $comparison = null)
    {
        if (is_array($saldoAwal)) {
            $useMinMax = false;
            if (isset($saldoAwal['min'])) {
                $this->addUsingAlias(MemberMutasiTableMap::COL_SALDO_AWAL, $saldoAwal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($saldoAwal['max'])) {
                $this->addUsingAlias(MemberMutasiTableMap::COL_SALDO_AWAL, $saldoAwal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberMutasiTableMap::COL_SALDO_AWAL, $saldoAwal, $comparison);
    }

    /**
     * Filter the query on the saldo_akhir column
     *
     * Example usage:
     * <code>
     * $query->filterBySaldoAkhir(1234); // WHERE saldo_akhir = 1234
     * $query->filterBySaldoAkhir(array(12, 34)); // WHERE saldo_akhir IN (12, 34)
     * $query->filterBySaldoAkhir(array('min' => 12)); // WHERE saldo_akhir > 12
     * </code>
     *
     * @param     mixed $saldoAkhir The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMemberMutasiQuery The current query, for fluid interface
     */
    public function filterBySaldoAkhir($saldoAkhir = null, $comparison = null)
    {
        if (is_array($saldoAkhir)) {
            $useMinMax = false;
            if (isset($saldoAkhir['min'])) {
                $this->addUsingAlias(MemberMutasiTableMap::COL_SALDO_AKHIR, $saldoAkhir['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($saldoAkhir['max'])) {
                $this->addUsingAlias(MemberMutasiTableMap::COL_SALDO_AKHIR, $saldoAkhir['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberMutasiTableMap::COL_SALDO_AKHIR, $saldoAkhir, $comparison);
    }

    /**
     * Filter the query on the ket_mutasi column
     *
     * Example usage:
     * <code>
     * $query->filterByKetMutasi('fooValue');   // WHERE ket_mutasi = 'fooValue'
     * $query->filterByKetMutasi('%fooValue%', Criteria::LIKE); // WHERE ket_mutasi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketMutasi The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMemberMutasiQuery The current query, for fluid interface
     */
    public function filterByKetMutasi($ketMutasi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketMutasi)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberMutasiTableMap::COL_KET_MUTASI, $ketMutasi, $comparison);
    }

    /**
     * Filter the query by a related \Supplier object
     *
     * @param \Supplier|ObjectCollection $supplier The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildMemberMutasiQuery The current query, for fluid interface
     */
    public function filterBySupplier($supplier, $comparison = null)
    {
        if ($supplier instanceof \Supplier) {
            return $this
                ->addUsingAlias(MemberMutasiTableMap::COL_ID_SUPPLIER, $supplier->getId(), $comparison);
        } elseif ($supplier instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MemberMutasiTableMap::COL_ID_SUPPLIER, $supplier->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildMemberMutasiQuery The current query, for fluid interface
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
     * Filter the query by a related \Member object
     *
     * @param \Member|ObjectCollection $member The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildMemberMutasiQuery The current query, for fluid interface
     */
    public function filterByMember($member, $comparison = null)
    {
        if ($member instanceof \Member) {
            return $this
                ->addUsingAlias(MemberMutasiTableMap::COL_ID_MEMBER, $member->getId(), $comparison);
        } elseif ($member instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MemberMutasiTableMap::COL_ID_MEMBER, $member->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildMemberMutasiQuery The current query, for fluid interface
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
     * Filter the query by a related \MemberTrx object
     *
     * @param \MemberTrx|ObjectCollection $memberTrx The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildMemberMutasiQuery The current query, for fluid interface
     */
    public function filterByMemberTrx($memberTrx, $comparison = null)
    {
        if ($memberTrx instanceof \MemberTrx) {
            return $this
                ->addUsingAlias(MemberMutasiTableMap::COL_ID_MEMBER_TRX, $memberTrx->getId(), $comparison);
        } elseif ($memberTrx instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MemberMutasiTableMap::COL_ID_MEMBER_TRX, $memberTrx->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByMemberTrx() only accepts arguments of type \MemberTrx or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MemberTrx relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildMemberMutasiQuery The current query, for fluid interface
     */
    public function joinMemberTrx($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MemberTrx');

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
            $this->addJoinObject($join, 'MemberTrx');
        }

        return $this;
    }

    /**
     * Use the MemberTrx relation MemberTrx object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MemberTrxQuery A secondary query class using the current class as primary query
     */
    public function useMemberTrxQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMemberTrx($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MemberTrx', '\MemberTrxQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMemberMutasi $memberMutasi Object to remove from the list of results
     *
     * @return $this|ChildMemberMutasiQuery The current query, for fluid interface
     */
    public function prune($memberMutasi = null)
    {
        if ($memberMutasi) {
            $this->addUsingAlias(MemberMutasiTableMap::COL_ID, $memberMutasi->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the member_mutasi table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MemberMutasiTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MemberMutasiTableMap::clearInstancePool();
            MemberMutasiTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MemberMutasiTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MemberMutasiTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MemberMutasiTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MemberMutasiTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MemberMutasiQuery
