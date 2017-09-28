<?php

namespace Base;

use \Produk as ChildProduk;
use \ProdukQuery as ChildProdukQuery;
use \Exception;
use \PDO;
use Map\ProdukTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'produk' table.
 *
 *
 *
 * @method     ChildProdukQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildProdukQuery orderByKodeProduk($order = Criteria::ASC) Order by the kode_produk column
 * @method     ChildProdukQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method     ChildProdukQuery orderByIdNominal($order = Criteria::ASC) Order by the id_nominal column
 * @method     ChildProdukQuery orderByIdJenisProduk($order = Criteria::ASC) Order by the id_jenis_produk column
 * @method     ChildProdukQuery orderByIdOperator($order = Criteria::ASC) Order by the id_operator column
 * @method     ChildProdukQuery orderByHargaJual($order = Criteria::ASC) Order by the harga_jual column
 * @method     ChildProdukQuery orderByMasaAktif($order = Criteria::ASC) Order by the masa_aktif column
 * @method     ChildProdukQuery orderByKeterangan($order = Criteria::ASC) Order by the keterangan column
 * @method     ChildProdukQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method     ChildProdukQuery groupById() Group by the id column
 * @method     ChildProdukQuery groupByKodeProduk() Group by the kode_produk column
 * @method     ChildProdukQuery groupByNama() Group by the nama column
 * @method     ChildProdukQuery groupByIdNominal() Group by the id_nominal column
 * @method     ChildProdukQuery groupByIdJenisProduk() Group by the id_jenis_produk column
 * @method     ChildProdukQuery groupByIdOperator() Group by the id_operator column
 * @method     ChildProdukQuery groupByHargaJual() Group by the harga_jual column
 * @method     ChildProdukQuery groupByMasaAktif() Group by the masa_aktif column
 * @method     ChildProdukQuery groupByKeterangan() Group by the keterangan column
 * @method     ChildProdukQuery groupByStatus() Group by the status column
 *
 * @method     ChildProdukQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildProdukQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildProdukQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildProdukQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildProdukQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildProdukQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildProdukQuery leftJoinNominal($relationAlias = null) Adds a LEFT JOIN clause to the query using the Nominal relation
 * @method     ChildProdukQuery rightJoinNominal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Nominal relation
 * @method     ChildProdukQuery innerJoinNominal($relationAlias = null) Adds a INNER JOIN clause to the query using the Nominal relation
 *
 * @method     ChildProdukQuery joinWithNominal($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Nominal relation
 *
 * @method     ChildProdukQuery leftJoinWithNominal() Adds a LEFT JOIN clause and with to the query using the Nominal relation
 * @method     ChildProdukQuery rightJoinWithNominal() Adds a RIGHT JOIN clause and with to the query using the Nominal relation
 * @method     ChildProdukQuery innerJoinWithNominal() Adds a INNER JOIN clause and with to the query using the Nominal relation
 *
 * @method     ChildProdukQuery leftJoinJenisProduk($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisProduk relation
 * @method     ChildProdukQuery rightJoinJenisProduk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisProduk relation
 * @method     ChildProdukQuery innerJoinJenisProduk($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisProduk relation
 *
 * @method     ChildProdukQuery joinWithJenisProduk($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the JenisProduk relation
 *
 * @method     ChildProdukQuery leftJoinWithJenisProduk() Adds a LEFT JOIN clause and with to the query using the JenisProduk relation
 * @method     ChildProdukQuery rightJoinWithJenisProduk() Adds a RIGHT JOIN clause and with to the query using the JenisProduk relation
 * @method     ChildProdukQuery innerJoinWithJenisProduk() Adds a INNER JOIN clause and with to the query using the JenisProduk relation
 *
 * @method     ChildProdukQuery leftJoinOperator($relationAlias = null) Adds a LEFT JOIN clause to the query using the Operator relation
 * @method     ChildProdukQuery rightJoinOperator($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Operator relation
 * @method     ChildProdukQuery innerJoinOperator($relationAlias = null) Adds a INNER JOIN clause to the query using the Operator relation
 *
 * @method     ChildProdukQuery joinWithOperator($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Operator relation
 *
 * @method     ChildProdukQuery leftJoinWithOperator() Adds a LEFT JOIN clause and with to the query using the Operator relation
 * @method     ChildProdukQuery rightJoinWithOperator() Adds a RIGHT JOIN clause and with to the query using the Operator relation
 * @method     ChildProdukQuery innerJoinWithOperator() Adds a INNER JOIN clause and with to the query using the Operator relation
 *
 * @method     ChildProdukQuery leftJoinMemberRequest($relationAlias = null) Adds a LEFT JOIN clause to the query using the MemberRequest relation
 * @method     ChildProdukQuery rightJoinMemberRequest($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MemberRequest relation
 * @method     ChildProdukQuery innerJoinMemberRequest($relationAlias = null) Adds a INNER JOIN clause to the query using the MemberRequest relation
 *
 * @method     ChildProdukQuery joinWithMemberRequest($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the MemberRequest relation
 *
 * @method     ChildProdukQuery leftJoinWithMemberRequest() Adds a LEFT JOIN clause and with to the query using the MemberRequest relation
 * @method     ChildProdukQuery rightJoinWithMemberRequest() Adds a RIGHT JOIN clause and with to the query using the MemberRequest relation
 * @method     ChildProdukQuery innerJoinWithMemberRequest() Adds a INNER JOIN clause and with to the query using the MemberRequest relation
 *
 * @method     ChildProdukQuery leftJoinMemberRespone($relationAlias = null) Adds a LEFT JOIN clause to the query using the MemberRespone relation
 * @method     ChildProdukQuery rightJoinMemberRespone($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MemberRespone relation
 * @method     ChildProdukQuery innerJoinMemberRespone($relationAlias = null) Adds a INNER JOIN clause to the query using the MemberRespone relation
 *
 * @method     ChildProdukQuery joinWithMemberRespone($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the MemberRespone relation
 *
 * @method     ChildProdukQuery leftJoinWithMemberRespone() Adds a LEFT JOIN clause and with to the query using the MemberRespone relation
 * @method     ChildProdukQuery rightJoinWithMemberRespone() Adds a RIGHT JOIN clause and with to the query using the MemberRespone relation
 * @method     ChildProdukQuery innerJoinWithMemberRespone() Adds a INNER JOIN clause and with to the query using the MemberRespone relation
 *
 * @method     ChildProdukQuery leftJoinMemberTrx($relationAlias = null) Adds a LEFT JOIN clause to the query using the MemberTrx relation
 * @method     ChildProdukQuery rightJoinMemberTrx($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MemberTrx relation
 * @method     ChildProdukQuery innerJoinMemberTrx($relationAlias = null) Adds a INNER JOIN clause to the query using the MemberTrx relation
 *
 * @method     ChildProdukQuery joinWithMemberTrx($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the MemberTrx relation
 *
 * @method     ChildProdukQuery leftJoinWithMemberTrx() Adds a LEFT JOIN clause and with to the query using the MemberTrx relation
 * @method     ChildProdukQuery rightJoinWithMemberTrx() Adds a RIGHT JOIN clause and with to the query using the MemberTrx relation
 * @method     ChildProdukQuery innerJoinWithMemberTrx() Adds a INNER JOIN clause and with to the query using the MemberTrx relation
 *
 * @method     ChildProdukQuery leftJoinProdukSupplier($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProdukSupplier relation
 * @method     ChildProdukQuery rightJoinProdukSupplier($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProdukSupplier relation
 * @method     ChildProdukQuery innerJoinProdukSupplier($relationAlias = null) Adds a INNER JOIN clause to the query using the ProdukSupplier relation
 *
 * @method     ChildProdukQuery joinWithProdukSupplier($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ProdukSupplier relation
 *
 * @method     ChildProdukQuery leftJoinWithProdukSupplier() Adds a LEFT JOIN clause and with to the query using the ProdukSupplier relation
 * @method     ChildProdukQuery rightJoinWithProdukSupplier() Adds a RIGHT JOIN clause and with to the query using the ProdukSupplier relation
 * @method     ChildProdukQuery innerJoinWithProdukSupplier() Adds a INNER JOIN clause and with to the query using the ProdukSupplier relation
 *
 * @method     \NominalQuery|\JenisProdukQuery|\OperatorQuery|\MemberRequestQuery|\MemberResponeQuery|\MemberTrxQuery|\ProdukSupplierQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildProduk findOne(ConnectionInterface $con = null) Return the first ChildProduk matching the query
 * @method     ChildProduk findOneOrCreate(ConnectionInterface $con = null) Return the first ChildProduk matching the query, or a new ChildProduk object populated from the query conditions when no match is found
 *
 * @method     ChildProduk findOneById(int $id) Return the first ChildProduk filtered by the id column
 * @method     ChildProduk findOneByKodeProduk(string $kode_produk) Return the first ChildProduk filtered by the kode_produk column
 * @method     ChildProduk findOneByNama(string $nama) Return the first ChildProduk filtered by the nama column
 * @method     ChildProduk findOneByIdNominal(int $id_nominal) Return the first ChildProduk filtered by the id_nominal column
 * @method     ChildProduk findOneByIdJenisProduk(int $id_jenis_produk) Return the first ChildProduk filtered by the id_jenis_produk column
 * @method     ChildProduk findOneByIdOperator(int $id_operator) Return the first ChildProduk filtered by the id_operator column
 * @method     ChildProduk findOneByHargaJual(int $harga_jual) Return the first ChildProduk filtered by the harga_jual column
 * @method     ChildProduk findOneByMasaAktif(string $masa_aktif) Return the first ChildProduk filtered by the masa_aktif column
 * @method     ChildProduk findOneByKeterangan(string $keterangan) Return the first ChildProduk filtered by the keterangan column
 * @method     ChildProduk findOneByStatus(int $status) Return the first ChildProduk filtered by the status column *

 * @method     ChildProduk requirePk($key, ConnectionInterface $con = null) Return the ChildProduk by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduk requireOne(ConnectionInterface $con = null) Return the first ChildProduk matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProduk requireOneById(int $id) Return the first ChildProduk filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduk requireOneByKodeProduk(string $kode_produk) Return the first ChildProduk filtered by the kode_produk column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduk requireOneByNama(string $nama) Return the first ChildProduk filtered by the nama column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduk requireOneByIdNominal(int $id_nominal) Return the first ChildProduk filtered by the id_nominal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduk requireOneByIdJenisProduk(int $id_jenis_produk) Return the first ChildProduk filtered by the id_jenis_produk column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduk requireOneByIdOperator(int $id_operator) Return the first ChildProduk filtered by the id_operator column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduk requireOneByHargaJual(int $harga_jual) Return the first ChildProduk filtered by the harga_jual column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduk requireOneByMasaAktif(string $masa_aktif) Return the first ChildProduk filtered by the masa_aktif column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduk requireOneByKeterangan(string $keterangan) Return the first ChildProduk filtered by the keterangan column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduk requireOneByStatus(int $status) Return the first ChildProduk filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProduk[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildProduk objects based on current ModelCriteria
 * @method     ChildProduk[]|ObjectCollection findById(int $id) Return ChildProduk objects filtered by the id column
 * @method     ChildProduk[]|ObjectCollection findByKodeProduk(string $kode_produk) Return ChildProduk objects filtered by the kode_produk column
 * @method     ChildProduk[]|ObjectCollection findByNama(string $nama) Return ChildProduk objects filtered by the nama column
 * @method     ChildProduk[]|ObjectCollection findByIdNominal(int $id_nominal) Return ChildProduk objects filtered by the id_nominal column
 * @method     ChildProduk[]|ObjectCollection findByIdJenisProduk(int $id_jenis_produk) Return ChildProduk objects filtered by the id_jenis_produk column
 * @method     ChildProduk[]|ObjectCollection findByIdOperator(int $id_operator) Return ChildProduk objects filtered by the id_operator column
 * @method     ChildProduk[]|ObjectCollection findByHargaJual(int $harga_jual) Return ChildProduk objects filtered by the harga_jual column
 * @method     ChildProduk[]|ObjectCollection findByMasaAktif(string $masa_aktif) Return ChildProduk objects filtered by the masa_aktif column
 * @method     ChildProduk[]|ObjectCollection findByKeterangan(string $keterangan) Return ChildProduk objects filtered by the keterangan column
 * @method     ChildProduk[]|ObjectCollection findByStatus(int $status) Return ChildProduk objects filtered by the status column
 * @method     ChildProduk[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ProdukQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ProdukQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Produk', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildProdukQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildProdukQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildProdukQuery) {
            return $criteria;
        }
        $query = new ChildProdukQuery();
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
     * @return ChildProduk|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ProdukTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ProdukTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildProduk A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, kode_produk, nama, id_nominal, id_jenis_produk, id_operator, harga_jual, masa_aktif, keterangan, status FROM produk WHERE id = :p0';
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
            /** @var ChildProduk $obj */
            $obj = new ChildProduk();
            $obj->hydrate($row);
            ProdukTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildProduk|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildProdukQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProdukTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildProdukQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProdukTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildProdukQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ProdukTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ProdukTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProdukTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the kode_produk column
     *
     * Example usage:
     * <code>
     * $query->filterByKodeProduk('fooValue');   // WHERE kode_produk = 'fooValue'
     * $query->filterByKodeProduk('%fooValue%', Criteria::LIKE); // WHERE kode_produk LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kodeProduk The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProdukQuery The current query, for fluid interface
     */
    public function filterByKodeProduk($kodeProduk = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kodeProduk)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProdukTableMap::COL_KODE_PRODUK, $kodeProduk, $comparison);
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
     * @return $this|ChildProdukQuery The current query, for fluid interface
     */
    public function filterByNama($nama = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nama)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProdukTableMap::COL_NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the id_nominal column
     *
     * Example usage:
     * <code>
     * $query->filterByIdNominal(1234); // WHERE id_nominal = 1234
     * $query->filterByIdNominal(array(12, 34)); // WHERE id_nominal IN (12, 34)
     * $query->filterByIdNominal(array('min' => 12)); // WHERE id_nominal > 12
     * </code>
     *
     * @see       filterByNominal()
     *
     * @param     mixed $idNominal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProdukQuery The current query, for fluid interface
     */
    public function filterByIdNominal($idNominal = null, $comparison = null)
    {
        if (is_array($idNominal)) {
            $useMinMax = false;
            if (isset($idNominal['min'])) {
                $this->addUsingAlias(ProdukTableMap::COL_ID_NOMINAL, $idNominal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idNominal['max'])) {
                $this->addUsingAlias(ProdukTableMap::COL_ID_NOMINAL, $idNominal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProdukTableMap::COL_ID_NOMINAL, $idNominal, $comparison);
    }

    /**
     * Filter the query on the id_jenis_produk column
     *
     * Example usage:
     * <code>
     * $query->filterByIdJenisProduk(1234); // WHERE id_jenis_produk = 1234
     * $query->filterByIdJenisProduk(array(12, 34)); // WHERE id_jenis_produk IN (12, 34)
     * $query->filterByIdJenisProduk(array('min' => 12)); // WHERE id_jenis_produk > 12
     * </code>
     *
     * @see       filterByJenisProduk()
     *
     * @param     mixed $idJenisProduk The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProdukQuery The current query, for fluid interface
     */
    public function filterByIdJenisProduk($idJenisProduk = null, $comparison = null)
    {
        if (is_array($idJenisProduk)) {
            $useMinMax = false;
            if (isset($idJenisProduk['min'])) {
                $this->addUsingAlias(ProdukTableMap::COL_ID_JENIS_PRODUK, $idJenisProduk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idJenisProduk['max'])) {
                $this->addUsingAlias(ProdukTableMap::COL_ID_JENIS_PRODUK, $idJenisProduk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProdukTableMap::COL_ID_JENIS_PRODUK, $idJenisProduk, $comparison);
    }

    /**
     * Filter the query on the id_operator column
     *
     * Example usage:
     * <code>
     * $query->filterByIdOperator(1234); // WHERE id_operator = 1234
     * $query->filterByIdOperator(array(12, 34)); // WHERE id_operator IN (12, 34)
     * $query->filterByIdOperator(array('min' => 12)); // WHERE id_operator > 12
     * </code>
     *
     * @see       filterByOperator()
     *
     * @param     mixed $idOperator The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProdukQuery The current query, for fluid interface
     */
    public function filterByIdOperator($idOperator = null, $comparison = null)
    {
        if (is_array($idOperator)) {
            $useMinMax = false;
            if (isset($idOperator['min'])) {
                $this->addUsingAlias(ProdukTableMap::COL_ID_OPERATOR, $idOperator['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idOperator['max'])) {
                $this->addUsingAlias(ProdukTableMap::COL_ID_OPERATOR, $idOperator['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProdukTableMap::COL_ID_OPERATOR, $idOperator, $comparison);
    }

    /**
     * Filter the query on the harga_jual column
     *
     * Example usage:
     * <code>
     * $query->filterByHargaJual(1234); // WHERE harga_jual = 1234
     * $query->filterByHargaJual(array(12, 34)); // WHERE harga_jual IN (12, 34)
     * $query->filterByHargaJual(array('min' => 12)); // WHERE harga_jual > 12
     * </code>
     *
     * @param     mixed $hargaJual The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProdukQuery The current query, for fluid interface
     */
    public function filterByHargaJual($hargaJual = null, $comparison = null)
    {
        if (is_array($hargaJual)) {
            $useMinMax = false;
            if (isset($hargaJual['min'])) {
                $this->addUsingAlias(ProdukTableMap::COL_HARGA_JUAL, $hargaJual['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hargaJual['max'])) {
                $this->addUsingAlias(ProdukTableMap::COL_HARGA_JUAL, $hargaJual['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProdukTableMap::COL_HARGA_JUAL, $hargaJual, $comparison);
    }

    /**
     * Filter the query on the masa_aktif column
     *
     * Example usage:
     * <code>
     * $query->filterByMasaAktif('fooValue');   // WHERE masa_aktif = 'fooValue'
     * $query->filterByMasaAktif('%fooValue%', Criteria::LIKE); // WHERE masa_aktif LIKE '%fooValue%'
     * </code>
     *
     * @param     string $masaAktif The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProdukQuery The current query, for fluid interface
     */
    public function filterByMasaAktif($masaAktif = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($masaAktif)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProdukTableMap::COL_MASA_AKTIF, $masaAktif, $comparison);
    }

    /**
     * Filter the query on the keterangan column
     *
     * Example usage:
     * <code>
     * $query->filterByKeterangan('fooValue');   // WHERE keterangan = 'fooValue'
     * $query->filterByKeterangan('%fooValue%', Criteria::LIKE); // WHERE keterangan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $keterangan The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProdukQuery The current query, for fluid interface
     */
    public function filterByKeterangan($keterangan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($keterangan)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProdukTableMap::COL_KETERANGAN, $keterangan, $comparison);
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
     * @return $this|ChildProdukQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(ProdukTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(ProdukTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProdukTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query by a related \Nominal object
     *
     * @param \Nominal|ObjectCollection $nominal The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildProdukQuery The current query, for fluid interface
     */
    public function filterByNominal($nominal, $comparison = null)
    {
        if ($nominal instanceof \Nominal) {
            return $this
                ->addUsingAlias(ProdukTableMap::COL_ID_NOMINAL, $nominal->getId(), $comparison);
        } elseif ($nominal instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProdukTableMap::COL_ID_NOMINAL, $nominal->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByNominal() only accepts arguments of type \Nominal or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Nominal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildProdukQuery The current query, for fluid interface
     */
    public function joinNominal($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Nominal');

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
            $this->addJoinObject($join, 'Nominal');
        }

        return $this;
    }

    /**
     * Use the Nominal relation Nominal object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \NominalQuery A secondary query class using the current class as primary query
     */
    public function useNominalQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinNominal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Nominal', '\NominalQuery');
    }

    /**
     * Filter the query by a related \JenisProduk object
     *
     * @param \JenisProduk|ObjectCollection $jenisProduk The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildProdukQuery The current query, for fluid interface
     */
    public function filterByJenisProduk($jenisProduk, $comparison = null)
    {
        if ($jenisProduk instanceof \JenisProduk) {
            return $this
                ->addUsingAlias(ProdukTableMap::COL_ID_JENIS_PRODUK, $jenisProduk->getId(), $comparison);
        } elseif ($jenisProduk instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProdukTableMap::COL_ID_JENIS_PRODUK, $jenisProduk->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildProdukQuery The current query, for fluid interface
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
     * Filter the query by a related \Operator object
     *
     * @param \Operator|ObjectCollection $operator The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildProdukQuery The current query, for fluid interface
     */
    public function filterByOperator($operator, $comparison = null)
    {
        if ($operator instanceof \Operator) {
            return $this
                ->addUsingAlias(ProdukTableMap::COL_ID_OPERATOR, $operator->getId(), $comparison);
        } elseif ($operator instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProdukTableMap::COL_ID_OPERATOR, $operator->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByOperator() only accepts arguments of type \Operator or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Operator relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildProdukQuery The current query, for fluid interface
     */
    public function joinOperator($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Operator');

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
            $this->addJoinObject($join, 'Operator');
        }

        return $this;
    }

    /**
     * Use the Operator relation Operator object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \OperatorQuery A secondary query class using the current class as primary query
     */
    public function useOperatorQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinOperator($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Operator', '\OperatorQuery');
    }

    /**
     * Filter the query by a related \MemberRequest object
     *
     * @param \MemberRequest|ObjectCollection $memberRequest the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildProdukQuery The current query, for fluid interface
     */
    public function filterByMemberRequest($memberRequest, $comparison = null)
    {
        if ($memberRequest instanceof \MemberRequest) {
            return $this
                ->addUsingAlias(ProdukTableMap::COL_ID, $memberRequest->getIdProduk(), $comparison);
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
     * @return $this|ChildProdukQuery The current query, for fluid interface
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
     * Filter the query by a related \MemberRespone object
     *
     * @param \MemberRespone|ObjectCollection $memberRespone the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildProdukQuery The current query, for fluid interface
     */
    public function filterByMemberRespone($memberRespone, $comparison = null)
    {
        if ($memberRespone instanceof \MemberRespone) {
            return $this
                ->addUsingAlias(ProdukTableMap::COL_ID, $memberRespone->getIdProduk(), $comparison);
        } elseif ($memberRespone instanceof ObjectCollection) {
            return $this
                ->useMemberResponeQuery()
                ->filterByPrimaryKeys($memberRespone->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMemberRespone() only accepts arguments of type \MemberRespone or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MemberRespone relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildProdukQuery The current query, for fluid interface
     */
    public function joinMemberRespone($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MemberRespone');

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
            $this->addJoinObject($join, 'MemberRespone');
        }

        return $this;
    }

    /**
     * Use the MemberRespone relation MemberRespone object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MemberResponeQuery A secondary query class using the current class as primary query
     */
    public function useMemberResponeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMemberRespone($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MemberRespone', '\MemberResponeQuery');
    }

    /**
     * Filter the query by a related \MemberTrx object
     *
     * @param \MemberTrx|ObjectCollection $memberTrx the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildProdukQuery The current query, for fluid interface
     */
    public function filterByMemberTrx($memberTrx, $comparison = null)
    {
        if ($memberTrx instanceof \MemberTrx) {
            return $this
                ->addUsingAlias(ProdukTableMap::COL_ID, $memberTrx->getIdProduk(), $comparison);
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
     * @return $this|ChildProdukQuery The current query, for fluid interface
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
     * Filter the query by a related \ProdukSupplier object
     *
     * @param \ProdukSupplier|ObjectCollection $produkSupplier the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildProdukQuery The current query, for fluid interface
     */
    public function filterByProdukSupplier($produkSupplier, $comparison = null)
    {
        if ($produkSupplier instanceof \ProdukSupplier) {
            return $this
                ->addUsingAlias(ProdukTableMap::COL_ID, $produkSupplier->getIdProduk(), $comparison);
        } elseif ($produkSupplier instanceof ObjectCollection) {
            return $this
                ->useProdukSupplierQuery()
                ->filterByPrimaryKeys($produkSupplier->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProdukSupplier() only accepts arguments of type \ProdukSupplier or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProdukSupplier relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildProdukQuery The current query, for fluid interface
     */
    public function joinProdukSupplier($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProdukSupplier');

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
            $this->addJoinObject($join, 'ProdukSupplier');
        }

        return $this;
    }

    /**
     * Use the ProdukSupplier relation ProdukSupplier object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ProdukSupplierQuery A secondary query class using the current class as primary query
     */
    public function useProdukSupplierQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinProdukSupplier($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProdukSupplier', '\ProdukSupplierQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildProduk $produk Object to remove from the list of results
     *
     * @return $this|ChildProdukQuery The current query, for fluid interface
     */
    public function prune($produk = null)
    {
        if ($produk) {
            $this->addUsingAlias(ProdukTableMap::COL_ID, $produk->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the produk table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProdukTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ProdukTableMap::clearInstancePool();
            ProdukTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ProdukTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ProdukTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ProdukTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ProdukTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ProdukQuery
