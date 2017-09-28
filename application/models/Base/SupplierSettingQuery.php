<?php

namespace Base;

use \SupplierSetting as ChildSupplierSetting;
use \SupplierSettingQuery as ChildSupplierSettingQuery;
use \Exception;
use \PDO;
use Map\SupplierSettingTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'supplier_setting' table.
 *
 *
 *
 * @method     ChildSupplierSettingQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildSupplierSettingQuery orderByIdSupplier($order = Criteria::ASC) Order by the id_supplier column
 * @method     ChildSupplierSettingQuery orderByFormatCekSaldo($order = Criteria::ASC) Order by the format_cek_saldo column
 * @method     ChildSupplierSettingQuery orderByFormatDeposit($order = Criteria::ASC) Order by the format_deposit column
 * @method     ChildSupplierSettingQuery orderByReminderSaldoMin($order = Criteria::ASC) Order by the reminder_saldo_min column
 * @method     ChildSupplierSettingQuery orderByTujuanCenter($order = Criteria::ASC) Order by the tujuan_center column
 * @method     ChildSupplierSettingQuery orderByNohp($order = Criteria::ASC) Order by the nohp column
 * @method     ChildSupplierSettingQuery orderByTelegram($order = Criteria::ASC) Order by the telegram column
 *
 * @method     ChildSupplierSettingQuery groupById() Group by the id column
 * @method     ChildSupplierSettingQuery groupByIdSupplier() Group by the id_supplier column
 * @method     ChildSupplierSettingQuery groupByFormatCekSaldo() Group by the format_cek_saldo column
 * @method     ChildSupplierSettingQuery groupByFormatDeposit() Group by the format_deposit column
 * @method     ChildSupplierSettingQuery groupByReminderSaldoMin() Group by the reminder_saldo_min column
 * @method     ChildSupplierSettingQuery groupByTujuanCenter() Group by the tujuan_center column
 * @method     ChildSupplierSettingQuery groupByNohp() Group by the nohp column
 * @method     ChildSupplierSettingQuery groupByTelegram() Group by the telegram column
 *
 * @method     ChildSupplierSettingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSupplierSettingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSupplierSettingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSupplierSettingQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSupplierSettingQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSupplierSettingQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSupplierSettingQuery leftJoinSupplier($relationAlias = null) Adds a LEFT JOIN clause to the query using the Supplier relation
 * @method     ChildSupplierSettingQuery rightJoinSupplier($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Supplier relation
 * @method     ChildSupplierSettingQuery innerJoinSupplier($relationAlias = null) Adds a INNER JOIN clause to the query using the Supplier relation
 *
 * @method     ChildSupplierSettingQuery joinWithSupplier($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Supplier relation
 *
 * @method     ChildSupplierSettingQuery leftJoinWithSupplier() Adds a LEFT JOIN clause and with to the query using the Supplier relation
 * @method     ChildSupplierSettingQuery rightJoinWithSupplier() Adds a RIGHT JOIN clause and with to the query using the Supplier relation
 * @method     ChildSupplierSettingQuery innerJoinWithSupplier() Adds a INNER JOIN clause and with to the query using the Supplier relation
 *
 * @method     \SupplierQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSupplierSetting findOne(ConnectionInterface $con = null) Return the first ChildSupplierSetting matching the query
 * @method     ChildSupplierSetting findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSupplierSetting matching the query, or a new ChildSupplierSetting object populated from the query conditions when no match is found
 *
 * @method     ChildSupplierSetting findOneById(int $id) Return the first ChildSupplierSetting filtered by the id column
 * @method     ChildSupplierSetting findOneByIdSupplier(int $id_supplier) Return the first ChildSupplierSetting filtered by the id_supplier column
 * @method     ChildSupplierSetting findOneByFormatCekSaldo(string $format_cek_saldo) Return the first ChildSupplierSetting filtered by the format_cek_saldo column
 * @method     ChildSupplierSetting findOneByFormatDeposit(string $format_deposit) Return the first ChildSupplierSetting filtered by the format_deposit column
 * @method     ChildSupplierSetting findOneByReminderSaldoMin(int $reminder_saldo_min) Return the first ChildSupplierSetting filtered by the reminder_saldo_min column
 * @method     ChildSupplierSetting findOneByTujuanCenter(string $tujuan_center) Return the first ChildSupplierSetting filtered by the tujuan_center column
 * @method     ChildSupplierSetting findOneByNohp(string $nohp) Return the first ChildSupplierSetting filtered by the nohp column
 * @method     ChildSupplierSetting findOneByTelegram(string $telegram) Return the first ChildSupplierSetting filtered by the telegram column *

 * @method     ChildSupplierSetting requirePk($key, ConnectionInterface $con = null) Return the ChildSupplierSetting by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplierSetting requireOne(ConnectionInterface $con = null) Return the first ChildSupplierSetting matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSupplierSetting requireOneById(int $id) Return the first ChildSupplierSetting filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplierSetting requireOneByIdSupplier(int $id_supplier) Return the first ChildSupplierSetting filtered by the id_supplier column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplierSetting requireOneByFormatCekSaldo(string $format_cek_saldo) Return the first ChildSupplierSetting filtered by the format_cek_saldo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplierSetting requireOneByFormatDeposit(string $format_deposit) Return the first ChildSupplierSetting filtered by the format_deposit column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplierSetting requireOneByReminderSaldoMin(int $reminder_saldo_min) Return the first ChildSupplierSetting filtered by the reminder_saldo_min column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplierSetting requireOneByTujuanCenter(string $tujuan_center) Return the first ChildSupplierSetting filtered by the tujuan_center column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplierSetting requireOneByNohp(string $nohp) Return the first ChildSupplierSetting filtered by the nohp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplierSetting requireOneByTelegram(string $telegram) Return the first ChildSupplierSetting filtered by the telegram column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSupplierSetting[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSupplierSetting objects based on current ModelCriteria
 * @method     ChildSupplierSetting[]|ObjectCollection findById(int $id) Return ChildSupplierSetting objects filtered by the id column
 * @method     ChildSupplierSetting[]|ObjectCollection findByIdSupplier(int $id_supplier) Return ChildSupplierSetting objects filtered by the id_supplier column
 * @method     ChildSupplierSetting[]|ObjectCollection findByFormatCekSaldo(string $format_cek_saldo) Return ChildSupplierSetting objects filtered by the format_cek_saldo column
 * @method     ChildSupplierSetting[]|ObjectCollection findByFormatDeposit(string $format_deposit) Return ChildSupplierSetting objects filtered by the format_deposit column
 * @method     ChildSupplierSetting[]|ObjectCollection findByReminderSaldoMin(int $reminder_saldo_min) Return ChildSupplierSetting objects filtered by the reminder_saldo_min column
 * @method     ChildSupplierSetting[]|ObjectCollection findByTujuanCenter(string $tujuan_center) Return ChildSupplierSetting objects filtered by the tujuan_center column
 * @method     ChildSupplierSetting[]|ObjectCollection findByNohp(string $nohp) Return ChildSupplierSetting objects filtered by the nohp column
 * @method     ChildSupplierSetting[]|ObjectCollection findByTelegram(string $telegram) Return ChildSupplierSetting objects filtered by the telegram column
 * @method     ChildSupplierSetting[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SupplierSettingQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\SupplierSettingQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\SupplierSetting', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSupplierSettingQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSupplierSettingQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSupplierSettingQuery) {
            return $criteria;
        }
        $query = new ChildSupplierSettingQuery();
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
     * @return ChildSupplierSetting|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SupplierSettingTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = SupplierSettingTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildSupplierSetting A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, id_supplier, format_cek_saldo, format_deposit, reminder_saldo_min, tujuan_center, nohp, telegram FROM supplier_setting WHERE id = :p0';
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
            /** @var ChildSupplierSetting $obj */
            $obj = new ChildSupplierSetting();
            $obj->hydrate($row);
            SupplierSettingTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildSupplierSetting|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSupplierSettingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SupplierSettingTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSupplierSettingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SupplierSettingTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildSupplierSettingQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(SupplierSettingTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SupplierSettingTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SupplierSettingTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildSupplierSettingQuery The current query, for fluid interface
     */
    public function filterByIdSupplier($idSupplier = null, $comparison = null)
    {
        if (is_array($idSupplier)) {
            $useMinMax = false;
            if (isset($idSupplier['min'])) {
                $this->addUsingAlias(SupplierSettingTableMap::COL_ID_SUPPLIER, $idSupplier['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSupplier['max'])) {
                $this->addUsingAlias(SupplierSettingTableMap::COL_ID_SUPPLIER, $idSupplier['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SupplierSettingTableMap::COL_ID_SUPPLIER, $idSupplier, $comparison);
    }

    /**
     * Filter the query on the format_cek_saldo column
     *
     * Example usage:
     * <code>
     * $query->filterByFormatCekSaldo('fooValue');   // WHERE format_cek_saldo = 'fooValue'
     * $query->filterByFormatCekSaldo('%fooValue%', Criteria::LIKE); // WHERE format_cek_saldo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $formatCekSaldo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSupplierSettingQuery The current query, for fluid interface
     */
    public function filterByFormatCekSaldo($formatCekSaldo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($formatCekSaldo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SupplierSettingTableMap::COL_FORMAT_CEK_SALDO, $formatCekSaldo, $comparison);
    }

    /**
     * Filter the query on the format_deposit column
     *
     * Example usage:
     * <code>
     * $query->filterByFormatDeposit('fooValue');   // WHERE format_deposit = 'fooValue'
     * $query->filterByFormatDeposit('%fooValue%', Criteria::LIKE); // WHERE format_deposit LIKE '%fooValue%'
     * </code>
     *
     * @param     string $formatDeposit The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSupplierSettingQuery The current query, for fluid interface
     */
    public function filterByFormatDeposit($formatDeposit = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($formatDeposit)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SupplierSettingTableMap::COL_FORMAT_DEPOSIT, $formatDeposit, $comparison);
    }

    /**
     * Filter the query on the reminder_saldo_min column
     *
     * Example usage:
     * <code>
     * $query->filterByReminderSaldoMin(1234); // WHERE reminder_saldo_min = 1234
     * $query->filterByReminderSaldoMin(array(12, 34)); // WHERE reminder_saldo_min IN (12, 34)
     * $query->filterByReminderSaldoMin(array('min' => 12)); // WHERE reminder_saldo_min > 12
     * </code>
     *
     * @param     mixed $reminderSaldoMin The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSupplierSettingQuery The current query, for fluid interface
     */
    public function filterByReminderSaldoMin($reminderSaldoMin = null, $comparison = null)
    {
        if (is_array($reminderSaldoMin)) {
            $useMinMax = false;
            if (isset($reminderSaldoMin['min'])) {
                $this->addUsingAlias(SupplierSettingTableMap::COL_REMINDER_SALDO_MIN, $reminderSaldoMin['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($reminderSaldoMin['max'])) {
                $this->addUsingAlias(SupplierSettingTableMap::COL_REMINDER_SALDO_MIN, $reminderSaldoMin['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SupplierSettingTableMap::COL_REMINDER_SALDO_MIN, $reminderSaldoMin, $comparison);
    }

    /**
     * Filter the query on the tujuan_center column
     *
     * Example usage:
     * <code>
     * $query->filterByTujuanCenter('fooValue');   // WHERE tujuan_center = 'fooValue'
     * $query->filterByTujuanCenter('%fooValue%', Criteria::LIKE); // WHERE tujuan_center LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tujuanCenter The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSupplierSettingQuery The current query, for fluid interface
     */
    public function filterByTujuanCenter($tujuanCenter = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tujuanCenter)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SupplierSettingTableMap::COL_TUJUAN_CENTER, $tujuanCenter, $comparison);
    }

    /**
     * Filter the query on the nohp column
     *
     * Example usage:
     * <code>
     * $query->filterByNohp('fooValue');   // WHERE nohp = 'fooValue'
     * $query->filterByNohp('%fooValue%', Criteria::LIKE); // WHERE nohp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nohp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSupplierSettingQuery The current query, for fluid interface
     */
    public function filterByNohp($nohp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nohp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SupplierSettingTableMap::COL_NOHP, $nohp, $comparison);
    }

    /**
     * Filter the query on the telegram column
     *
     * Example usage:
     * <code>
     * $query->filterByTelegram('fooValue');   // WHERE telegram = 'fooValue'
     * $query->filterByTelegram('%fooValue%', Criteria::LIKE); // WHERE telegram LIKE '%fooValue%'
     * </code>
     *
     * @param     string $telegram The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSupplierSettingQuery The current query, for fluid interface
     */
    public function filterByTelegram($telegram = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($telegram)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SupplierSettingTableMap::COL_TELEGRAM, $telegram, $comparison);
    }

    /**
     * Filter the query by a related \Supplier object
     *
     * @param \Supplier|ObjectCollection $supplier The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSupplierSettingQuery The current query, for fluid interface
     */
    public function filterBySupplier($supplier, $comparison = null)
    {
        if ($supplier instanceof \Supplier) {
            return $this
                ->addUsingAlias(SupplierSettingTableMap::COL_ID_SUPPLIER, $supplier->getId(), $comparison);
        } elseif ($supplier instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SupplierSettingTableMap::COL_ID_SUPPLIER, $supplier->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildSupplierSettingQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildSupplierSetting $supplierSetting Object to remove from the list of results
     *
     * @return $this|ChildSupplierSettingQuery The current query, for fluid interface
     */
    public function prune($supplierSetting = null)
    {
        if ($supplierSetting) {
            $this->addUsingAlias(SupplierSettingTableMap::COL_ID, $supplierSetting->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the supplier_setting table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SupplierSettingTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SupplierSettingTableMap::clearInstancePool();
            SupplierSettingTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SupplierSettingTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SupplierSettingTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SupplierSettingTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SupplierSettingTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SupplierSettingQuery
