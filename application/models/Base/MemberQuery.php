<?php

namespace Base;

use \Member as ChildMember;
use \MemberQuery as ChildMemberQuery;
use \Exception;
use \PDO;
use Map\MemberTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'member' table.
 *
 *
 *
 * @method     ChildMemberQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildMemberQuery orderByKodeMember($order = Criteria::ASC) Order by the kode_member column
 * @method     ChildMemberQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method     ChildMemberQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     ChildMemberQuery orderByNohp($order = Criteria::ASC) Order by the nohp column
 * @method     ChildMemberQuery orderByAlamat($order = Criteria::ASC) Order by the alamat column
 * @method     ChildMemberQuery orderByIdKota($order = Criteria::ASC) Order by the id_kota column
 * @method     ChildMemberQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildMemberQuery orderByPin($order = Criteria::ASC) Order by the pin column
 * @method     ChildMemberQuery orderByLevel($order = Criteria::ASC) Order by the level column
 * @method     ChildMemberQuery orderBySaldo($order = Criteria::ASC) Order by the saldo column
 * @method     ChildMemberQuery orderByReff($order = Criteria::ASC) Order by the reff column
 * @method     ChildMemberQuery orderByTglDaftar($order = Criteria::ASC) Order by the tgl_daftar column
 * @method     ChildMemberQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method     ChildMemberQuery groupById() Group by the id column
 * @method     ChildMemberQuery groupByKodeMember() Group by the kode_member column
 * @method     ChildMemberQuery groupByNama() Group by the nama column
 * @method     ChildMemberQuery groupByPassword() Group by the password column
 * @method     ChildMemberQuery groupByNohp() Group by the nohp column
 * @method     ChildMemberQuery groupByAlamat() Group by the alamat column
 * @method     ChildMemberQuery groupByIdKota() Group by the id_kota column
 * @method     ChildMemberQuery groupByEmail() Group by the email column
 * @method     ChildMemberQuery groupByPin() Group by the pin column
 * @method     ChildMemberQuery groupByLevel() Group by the level column
 * @method     ChildMemberQuery groupBySaldo() Group by the saldo column
 * @method     ChildMemberQuery groupByReff() Group by the reff column
 * @method     ChildMemberQuery groupByTglDaftar() Group by the tgl_daftar column
 * @method     ChildMemberQuery groupByStatus() Group by the status column
 *
 * @method     ChildMemberQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMemberQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMemberQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMemberQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMemberQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMemberQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMemberQuery leftJoinMemberMutasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the MemberMutasi relation
 * @method     ChildMemberQuery rightJoinMemberMutasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MemberMutasi relation
 * @method     ChildMemberQuery innerJoinMemberMutasi($relationAlias = null) Adds a INNER JOIN clause to the query using the MemberMutasi relation
 *
 * @method     ChildMemberQuery joinWithMemberMutasi($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the MemberMutasi relation
 *
 * @method     ChildMemberQuery leftJoinWithMemberMutasi() Adds a LEFT JOIN clause and with to the query using the MemberMutasi relation
 * @method     ChildMemberQuery rightJoinWithMemberMutasi() Adds a RIGHT JOIN clause and with to the query using the MemberMutasi relation
 * @method     ChildMemberQuery innerJoinWithMemberMutasi() Adds a INNER JOIN clause and with to the query using the MemberMutasi relation
 *
 * @method     ChildMemberQuery leftJoinMemberRequest($relationAlias = null) Adds a LEFT JOIN clause to the query using the MemberRequest relation
 * @method     ChildMemberQuery rightJoinMemberRequest($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MemberRequest relation
 * @method     ChildMemberQuery innerJoinMemberRequest($relationAlias = null) Adds a INNER JOIN clause to the query using the MemberRequest relation
 *
 * @method     ChildMemberQuery joinWithMemberRequest($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the MemberRequest relation
 *
 * @method     ChildMemberQuery leftJoinWithMemberRequest() Adds a LEFT JOIN clause and with to the query using the MemberRequest relation
 * @method     ChildMemberQuery rightJoinWithMemberRequest() Adds a RIGHT JOIN clause and with to the query using the MemberRequest relation
 * @method     ChildMemberQuery innerJoinWithMemberRequest() Adds a INNER JOIN clause and with to the query using the MemberRequest relation
 *
 * @method     ChildMemberQuery leftJoinMemberTiket($relationAlias = null) Adds a LEFT JOIN clause to the query using the MemberTiket relation
 * @method     ChildMemberQuery rightJoinMemberTiket($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MemberTiket relation
 * @method     ChildMemberQuery innerJoinMemberTiket($relationAlias = null) Adds a INNER JOIN clause to the query using the MemberTiket relation
 *
 * @method     ChildMemberQuery joinWithMemberTiket($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the MemberTiket relation
 *
 * @method     ChildMemberQuery leftJoinWithMemberTiket() Adds a LEFT JOIN clause and with to the query using the MemberTiket relation
 * @method     ChildMemberQuery rightJoinWithMemberTiket() Adds a RIGHT JOIN clause and with to the query using the MemberTiket relation
 * @method     ChildMemberQuery innerJoinWithMemberTiket() Adds a INNER JOIN clause and with to the query using the MemberTiket relation
 *
 * @method     ChildMemberQuery leftJoinMemberTrx($relationAlias = null) Adds a LEFT JOIN clause to the query using the MemberTrx relation
 * @method     ChildMemberQuery rightJoinMemberTrx($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MemberTrx relation
 * @method     ChildMemberQuery innerJoinMemberTrx($relationAlias = null) Adds a INNER JOIN clause to the query using the MemberTrx relation
 *
 * @method     ChildMemberQuery joinWithMemberTrx($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the MemberTrx relation
 *
 * @method     ChildMemberQuery leftJoinWithMemberTrx() Adds a LEFT JOIN clause and with to the query using the MemberTrx relation
 * @method     ChildMemberQuery rightJoinWithMemberTrx() Adds a RIGHT JOIN clause and with to the query using the MemberTrx relation
 * @method     ChildMemberQuery innerJoinWithMemberTrx() Adds a INNER JOIN clause and with to the query using the MemberTrx relation
 *
 * @method     \MemberMutasiQuery|\MemberRequestQuery|\MemberTiketQuery|\MemberTrxQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildMember findOne(ConnectionInterface $con = null) Return the first ChildMember matching the query
 * @method     ChildMember findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMember matching the query, or a new ChildMember object populated from the query conditions when no match is found
 *
 * @method     ChildMember findOneById(int $id) Return the first ChildMember filtered by the id column
 * @method     ChildMember findOneByKodeMember(string $kode_member) Return the first ChildMember filtered by the kode_member column
 * @method     ChildMember findOneByNama(string $nama) Return the first ChildMember filtered by the nama column
 * @method     ChildMember findOneByPassword(string $password) Return the first ChildMember filtered by the password column
 * @method     ChildMember findOneByNohp(string $nohp) Return the first ChildMember filtered by the nohp column
 * @method     ChildMember findOneByAlamat(string $alamat) Return the first ChildMember filtered by the alamat column
 * @method     ChildMember findOneByIdKota(int $id_kota) Return the first ChildMember filtered by the id_kota column
 * @method     ChildMember findOneByEmail(string $email) Return the first ChildMember filtered by the email column
 * @method     ChildMember findOneByPin(int $pin) Return the first ChildMember filtered by the pin column
 * @method     ChildMember findOneByLevel(int $level) Return the first ChildMember filtered by the level column
 * @method     ChildMember findOneBySaldo(int $saldo) Return the first ChildMember filtered by the saldo column
 * @method     ChildMember findOneByReff(string $reff) Return the first ChildMember filtered by the reff column
 * @method     ChildMember findOneByTglDaftar(string $tgl_daftar) Return the first ChildMember filtered by the tgl_daftar column
 * @method     ChildMember findOneByStatus(int $status) Return the first ChildMember filtered by the status column *

 * @method     ChildMember requirePk($key, ConnectionInterface $con = null) Return the ChildMember by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMember requireOne(ConnectionInterface $con = null) Return the first ChildMember matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMember requireOneById(int $id) Return the first ChildMember filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMember requireOneByKodeMember(string $kode_member) Return the first ChildMember filtered by the kode_member column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMember requireOneByNama(string $nama) Return the first ChildMember filtered by the nama column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMember requireOneByPassword(string $password) Return the first ChildMember filtered by the password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMember requireOneByNohp(string $nohp) Return the first ChildMember filtered by the nohp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMember requireOneByAlamat(string $alamat) Return the first ChildMember filtered by the alamat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMember requireOneByIdKota(int $id_kota) Return the first ChildMember filtered by the id_kota column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMember requireOneByEmail(string $email) Return the first ChildMember filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMember requireOneByPin(int $pin) Return the first ChildMember filtered by the pin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMember requireOneByLevel(int $level) Return the first ChildMember filtered by the level column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMember requireOneBySaldo(int $saldo) Return the first ChildMember filtered by the saldo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMember requireOneByReff(string $reff) Return the first ChildMember filtered by the reff column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMember requireOneByTglDaftar(string $tgl_daftar) Return the first ChildMember filtered by the tgl_daftar column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMember requireOneByStatus(int $status) Return the first ChildMember filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMember[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMember objects based on current ModelCriteria
 * @method     ChildMember[]|ObjectCollection findById(int $id) Return ChildMember objects filtered by the id column
 * @method     ChildMember[]|ObjectCollection findByKodeMember(string $kode_member) Return ChildMember objects filtered by the kode_member column
 * @method     ChildMember[]|ObjectCollection findByNama(string $nama) Return ChildMember objects filtered by the nama column
 * @method     ChildMember[]|ObjectCollection findByPassword(string $password) Return ChildMember objects filtered by the password column
 * @method     ChildMember[]|ObjectCollection findByNohp(string $nohp) Return ChildMember objects filtered by the nohp column
 * @method     ChildMember[]|ObjectCollection findByAlamat(string $alamat) Return ChildMember objects filtered by the alamat column
 * @method     ChildMember[]|ObjectCollection findByIdKota(int $id_kota) Return ChildMember objects filtered by the id_kota column
 * @method     ChildMember[]|ObjectCollection findByEmail(string $email) Return ChildMember objects filtered by the email column
 * @method     ChildMember[]|ObjectCollection findByPin(int $pin) Return ChildMember objects filtered by the pin column
 * @method     ChildMember[]|ObjectCollection findByLevel(int $level) Return ChildMember objects filtered by the level column
 * @method     ChildMember[]|ObjectCollection findBySaldo(int $saldo) Return ChildMember objects filtered by the saldo column
 * @method     ChildMember[]|ObjectCollection findByReff(string $reff) Return ChildMember objects filtered by the reff column
 * @method     ChildMember[]|ObjectCollection findByTglDaftar(string $tgl_daftar) Return ChildMember objects filtered by the tgl_daftar column
 * @method     ChildMember[]|ObjectCollection findByStatus(int $status) Return ChildMember objects filtered by the status column
 * @method     ChildMember[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MemberQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\MemberQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Member', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMemberQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMemberQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMemberQuery) {
            return $criteria;
        }
        $query = new ChildMemberQuery();
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
     * @return ChildMember|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MemberTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = MemberTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildMember A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, kode_member, nama, password, nohp, alamat, id_kota, email, pin, level, saldo, reff, tgl_daftar, status FROM member WHERE id = :p0';
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
            /** @var ChildMember $obj */
            $obj = new ChildMember();
            $obj->hydrate($row);
            MemberTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildMember|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMemberQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MemberTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMemberQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MemberTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildMemberQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(MemberTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(MemberTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the kode_member column
     *
     * Example usage:
     * <code>
     * $query->filterByKodeMember('fooValue');   // WHERE kode_member = 'fooValue'
     * $query->filterByKodeMember('%fooValue%', Criteria::LIKE); // WHERE kode_member LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kodeMember The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMemberQuery The current query, for fluid interface
     */
    public function filterByKodeMember($kodeMember = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kodeMember)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberTableMap::COL_KODE_MEMBER, $kodeMember, $comparison);
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
     * @return $this|ChildMemberQuery The current query, for fluid interface
     */
    public function filterByNama($nama = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nama)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberTableMap::COL_NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%', Criteria::LIKE); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMemberQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberTableMap::COL_PASSWORD, $password, $comparison);
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
     * @return $this|ChildMemberQuery The current query, for fluid interface
     */
    public function filterByNohp($nohp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nohp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberTableMap::COL_NOHP, $nohp, $comparison);
    }

    /**
     * Filter the query on the alamat column
     *
     * Example usage:
     * <code>
     * $query->filterByAlamat('fooValue');   // WHERE alamat = 'fooValue'
     * $query->filterByAlamat('%fooValue%', Criteria::LIKE); // WHERE alamat LIKE '%fooValue%'
     * </code>
     *
     * @param     string $alamat The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMemberQuery The current query, for fluid interface
     */
    public function filterByAlamat($alamat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($alamat)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberTableMap::COL_ALAMAT, $alamat, $comparison);
    }

    /**
     * Filter the query on the id_kota column
     *
     * Example usage:
     * <code>
     * $query->filterByIdKota(1234); // WHERE id_kota = 1234
     * $query->filterByIdKota(array(12, 34)); // WHERE id_kota IN (12, 34)
     * $query->filterByIdKota(array('min' => 12)); // WHERE id_kota > 12
     * </code>
     *
     * @param     mixed $idKota The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMemberQuery The current query, for fluid interface
     */
    public function filterByIdKota($idKota = null, $comparison = null)
    {
        if (is_array($idKota)) {
            $useMinMax = false;
            if (isset($idKota['min'])) {
                $this->addUsingAlias(MemberTableMap::COL_ID_KOTA, $idKota['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idKota['max'])) {
                $this->addUsingAlias(MemberTableMap::COL_ID_KOTA, $idKota['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberTableMap::COL_ID_KOTA, $idKota, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMemberQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the pin column
     *
     * Example usage:
     * <code>
     * $query->filterByPin(1234); // WHERE pin = 1234
     * $query->filterByPin(array(12, 34)); // WHERE pin IN (12, 34)
     * $query->filterByPin(array('min' => 12)); // WHERE pin > 12
     * </code>
     *
     * @param     mixed $pin The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMemberQuery The current query, for fluid interface
     */
    public function filterByPin($pin = null, $comparison = null)
    {
        if (is_array($pin)) {
            $useMinMax = false;
            if (isset($pin['min'])) {
                $this->addUsingAlias(MemberTableMap::COL_PIN, $pin['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pin['max'])) {
                $this->addUsingAlias(MemberTableMap::COL_PIN, $pin['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberTableMap::COL_PIN, $pin, $comparison);
    }

    /**
     * Filter the query on the level column
     *
     * Example usage:
     * <code>
     * $query->filterByLevel(1234); // WHERE level = 1234
     * $query->filterByLevel(array(12, 34)); // WHERE level IN (12, 34)
     * $query->filterByLevel(array('min' => 12)); // WHERE level > 12
     * </code>
     *
     * @param     mixed $level The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMemberQuery The current query, for fluid interface
     */
    public function filterByLevel($level = null, $comparison = null)
    {
        if (is_array($level)) {
            $useMinMax = false;
            if (isset($level['min'])) {
                $this->addUsingAlias(MemberTableMap::COL_LEVEL, $level['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($level['max'])) {
                $this->addUsingAlias(MemberTableMap::COL_LEVEL, $level['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberTableMap::COL_LEVEL, $level, $comparison);
    }

    /**
     * Filter the query on the saldo column
     *
     * Example usage:
     * <code>
     * $query->filterBySaldo(1234); // WHERE saldo = 1234
     * $query->filterBySaldo(array(12, 34)); // WHERE saldo IN (12, 34)
     * $query->filterBySaldo(array('min' => 12)); // WHERE saldo > 12
     * </code>
     *
     * @param     mixed $saldo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMemberQuery The current query, for fluid interface
     */
    public function filterBySaldo($saldo = null, $comparison = null)
    {
        if (is_array($saldo)) {
            $useMinMax = false;
            if (isset($saldo['min'])) {
                $this->addUsingAlias(MemberTableMap::COL_SALDO, $saldo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($saldo['max'])) {
                $this->addUsingAlias(MemberTableMap::COL_SALDO, $saldo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberTableMap::COL_SALDO, $saldo, $comparison);
    }

    /**
     * Filter the query on the reff column
     *
     * Example usage:
     * <code>
     * $query->filterByReff('fooValue');   // WHERE reff = 'fooValue'
     * $query->filterByReff('%fooValue%', Criteria::LIKE); // WHERE reff LIKE '%fooValue%'
     * </code>
     *
     * @param     string $reff The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMemberQuery The current query, for fluid interface
     */
    public function filterByReff($reff = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($reff)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberTableMap::COL_REFF, $reff, $comparison);
    }

    /**
     * Filter the query on the tgl_daftar column
     *
     * Example usage:
     * <code>
     * $query->filterByTglDaftar('2011-03-14'); // WHERE tgl_daftar = '2011-03-14'
     * $query->filterByTglDaftar('now'); // WHERE tgl_daftar = '2011-03-14'
     * $query->filterByTglDaftar(array('max' => 'yesterday')); // WHERE tgl_daftar > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglDaftar The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMemberQuery The current query, for fluid interface
     */
    public function filterByTglDaftar($tglDaftar = null, $comparison = null)
    {
        if (is_array($tglDaftar)) {
            $useMinMax = false;
            if (isset($tglDaftar['min'])) {
                $this->addUsingAlias(MemberTableMap::COL_TGL_DAFTAR, $tglDaftar['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglDaftar['max'])) {
                $this->addUsingAlias(MemberTableMap::COL_TGL_DAFTAR, $tglDaftar['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberTableMap::COL_TGL_DAFTAR, $tglDaftar, $comparison);
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
     * @return $this|ChildMemberQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(MemberTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(MemberTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query by a related \MemberMutasi object
     *
     * @param \MemberMutasi|ObjectCollection $memberMutasi the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildMemberQuery The current query, for fluid interface
     */
    public function filterByMemberMutasi($memberMutasi, $comparison = null)
    {
        if ($memberMutasi instanceof \MemberMutasi) {
            return $this
                ->addUsingAlias(MemberTableMap::COL_ID, $memberMutasi->getIdMember(), $comparison);
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
     * @return $this|ChildMemberQuery The current query, for fluid interface
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
     * Filter the query by a related \MemberRequest object
     *
     * @param \MemberRequest|ObjectCollection $memberRequest the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildMemberQuery The current query, for fluid interface
     */
    public function filterByMemberRequest($memberRequest, $comparison = null)
    {
        if ($memberRequest instanceof \MemberRequest) {
            return $this
                ->addUsingAlias(MemberTableMap::COL_ID, $memberRequest->getIdMember(), $comparison);
        } elseif ($memberRequest instanceof ObjectCollection) {
            return $this
                ->useMemberRequestQuery()
                ->filterByPrimaryKeys($memberRequest->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMemberRequest() only accepts arguments of type \MemberRequest or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MemberRequest relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildMemberQuery The current query, for fluid interface
     */
    public function joinMemberRequest($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MemberRequest');

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
            $this->addJoinObject($join, 'MemberRequest');
        }

        return $this;
    }

    /**
     * Use the MemberRequest relation MemberRequest object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MemberRequestQuery A secondary query class using the current class as primary query
     */
    public function useMemberRequestQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMemberRequest($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MemberRequest', '\MemberRequestQuery');
    }

    /**
     * Filter the query by a related \MemberTiket object
     *
     * @param \MemberTiket|ObjectCollection $memberTiket the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildMemberQuery The current query, for fluid interface
     */
    public function filterByMemberTiket($memberTiket, $comparison = null)
    {
        if ($memberTiket instanceof \MemberTiket) {
            return $this
                ->addUsingAlias(MemberTableMap::COL_ID, $memberTiket->getIdMember(), $comparison);
        } elseif ($memberTiket instanceof ObjectCollection) {
            return $this
                ->useMemberTiketQuery()
                ->filterByPrimaryKeys($memberTiket->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMemberTiket() only accepts arguments of type \MemberTiket or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MemberTiket relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildMemberQuery The current query, for fluid interface
     */
    public function joinMemberTiket($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MemberTiket');

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
            $this->addJoinObject($join, 'MemberTiket');
        }

        return $this;
    }

    /**
     * Use the MemberTiket relation MemberTiket object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MemberTiketQuery A secondary query class using the current class as primary query
     */
    public function useMemberTiketQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMemberTiket($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MemberTiket', '\MemberTiketQuery');
    }

    /**
     * Filter the query by a related \MemberTrx object
     *
     * @param \MemberTrx|ObjectCollection $memberTrx the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildMemberQuery The current query, for fluid interface
     */
    public function filterByMemberTrx($memberTrx, $comparison = null)
    {
        if ($memberTrx instanceof \MemberTrx) {
            return $this
                ->addUsingAlias(MemberTableMap::COL_ID, $memberTrx->getIdMember(), $comparison);
        } elseif ($memberTrx instanceof ObjectCollection) {
            return $this
                ->useMemberTrxQuery()
                ->filterByPrimaryKeys($memberTrx->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildMemberQuery The current query, for fluid interface
     */
    public function joinMemberTrx($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useMemberTrxQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMemberTrx($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MemberTrx', '\MemberTrxQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMember $member Object to remove from the list of results
     *
     * @return $this|ChildMemberQuery The current query, for fluid interface
     */
    public function prune($member = null)
    {
        if ($member) {
            $this->addUsingAlias(MemberTableMap::COL_ID, $member->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the member table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MemberTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MemberTableMap::clearInstancePool();
            MemberTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MemberTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MemberTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MemberTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MemberTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MemberQuery
