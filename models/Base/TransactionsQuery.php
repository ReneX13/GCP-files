<?php

namespace Base;

use \Transactions as ChildTransactions;
use \TransactionsQuery as ChildTransactionsQuery;
use \Exception;
use \PDO;
use Map\TransactionsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Transactions' table.
 *
 *
 *
 * @method     ChildTransactionsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildTransactionsQuery orderByReciept($order = Criteria::ASC) Order by the reciept column
 * @method     ChildTransactionsQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     ChildTransactionsQuery orderByMailingId($order = Criteria::ASC) Order by the mailing_id column
 *
 * @method     ChildTransactionsQuery groupById() Group by the id column
 * @method     ChildTransactionsQuery groupByReciept() Group by the reciept column
 * @method     ChildTransactionsQuery groupByUserId() Group by the user_id column
 * @method     ChildTransactionsQuery groupByMailingId() Group by the mailing_id column
 *
 * @method     ChildTransactionsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTransactionsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTransactionsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTransactionsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTransactionsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTransactionsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTransactionsQuery leftJoinMailingaddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the Mailingaddress relation
 * @method     ChildTransactionsQuery rightJoinMailingaddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Mailingaddress relation
 * @method     ChildTransactionsQuery innerJoinMailingaddress($relationAlias = null) Adds a INNER JOIN clause to the query using the Mailingaddress relation
 *
 * @method     ChildTransactionsQuery joinWithMailingaddress($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Mailingaddress relation
 *
 * @method     ChildTransactionsQuery leftJoinWithMailingaddress() Adds a LEFT JOIN clause and with to the query using the Mailingaddress relation
 * @method     ChildTransactionsQuery rightJoinWithMailingaddress() Adds a RIGHT JOIN clause and with to the query using the Mailingaddress relation
 * @method     ChildTransactionsQuery innerJoinWithMailingaddress() Adds a INNER JOIN clause and with to the query using the Mailingaddress relation
 *
 * @method     ChildTransactionsQuery leftJoinUsers($relationAlias = null) Adds a LEFT JOIN clause to the query using the Users relation
 * @method     ChildTransactionsQuery rightJoinUsers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Users relation
 * @method     ChildTransactionsQuery innerJoinUsers($relationAlias = null) Adds a INNER JOIN clause to the query using the Users relation
 *
 * @method     ChildTransactionsQuery joinWithUsers($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Users relation
 *
 * @method     ChildTransactionsQuery leftJoinWithUsers() Adds a LEFT JOIN clause and with to the query using the Users relation
 * @method     ChildTransactionsQuery rightJoinWithUsers() Adds a RIGHT JOIN clause and with to the query using the Users relation
 * @method     ChildTransactionsQuery innerJoinWithUsers() Adds a INNER JOIN clause and with to the query using the Users relation
 *
 * @method     \MailingaddressQuery|\UsersQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTransactions findOne(ConnectionInterface $con = null) Return the first ChildTransactions matching the query
 * @method     ChildTransactions findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTransactions matching the query, or a new ChildTransactions object populated from the query conditions when no match is found
 *
 * @method     ChildTransactions findOneById(int $id) Return the first ChildTransactions filtered by the id column
 * @method     ChildTransactions findOneByReciept(string $reciept) Return the first ChildTransactions filtered by the reciept column
 * @method     ChildTransactions findOneByUserId(int $user_id) Return the first ChildTransactions filtered by the user_id column
 * @method     ChildTransactions findOneByMailingId(int $mailing_id) Return the first ChildTransactions filtered by the mailing_id column *

 * @method     ChildTransactions requirePk($key, ConnectionInterface $con = null) Return the ChildTransactions by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTransactions requireOne(ConnectionInterface $con = null) Return the first ChildTransactions matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTransactions requireOneById(int $id) Return the first ChildTransactions filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTransactions requireOneByReciept(string $reciept) Return the first ChildTransactions filtered by the reciept column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTransactions requireOneByUserId(int $user_id) Return the first ChildTransactions filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTransactions requireOneByMailingId(int $mailing_id) Return the first ChildTransactions filtered by the mailing_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTransactions[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTransactions objects based on current ModelCriteria
 * @method     ChildTransactions[]|ObjectCollection findById(int $id) Return ChildTransactions objects filtered by the id column
 * @method     ChildTransactions[]|ObjectCollection findByReciept(string $reciept) Return ChildTransactions objects filtered by the reciept column
 * @method     ChildTransactions[]|ObjectCollection findByUserId(int $user_id) Return ChildTransactions objects filtered by the user_id column
 * @method     ChildTransactions[]|ObjectCollection findByMailingId(int $mailing_id) Return ChildTransactions objects filtered by the mailing_id column
 * @method     ChildTransactions[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TransactionsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TransactionsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Transactions', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTransactionsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTransactionsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTransactionsQuery) {
            return $criteria;
        }
        $query = new ChildTransactionsQuery();
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
     * @return ChildTransactions|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TransactionsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TransactionsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTransactions A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, reciept, user_id, mailing_id FROM Transactions WHERE id = :p0';
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
            /** @var ChildTransactions $obj */
            $obj = new ChildTransactions();
            $obj->hydrate($row);
            TransactionsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTransactions|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTransactionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TransactionsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTransactionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TransactionsTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildTransactionsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(TransactionsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(TransactionsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TransactionsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the reciept column
     *
     * Example usage:
     * <code>
     * $query->filterByReciept('fooValue');   // WHERE reciept = 'fooValue'
     * $query->filterByReciept('%fooValue%', Criteria::LIKE); // WHERE reciept LIKE '%fooValue%'
     * </code>
     *
     * @param     string $reciept The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTransactionsQuery The current query, for fluid interface
     */
    public function filterByReciept($reciept = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($reciept)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TransactionsTableMap::COL_RECIEPT, $reciept, $comparison);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
     * </code>
     *
     * @see       filterByUsers()
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTransactionsQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(TransactionsTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(TransactionsTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TransactionsTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the mailing_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMailingId(1234); // WHERE mailing_id = 1234
     * $query->filterByMailingId(array(12, 34)); // WHERE mailing_id IN (12, 34)
     * $query->filterByMailingId(array('min' => 12)); // WHERE mailing_id > 12
     * </code>
     *
     * @see       filterByMailingaddress()
     *
     * @param     mixed $mailingId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTransactionsQuery The current query, for fluid interface
     */
    public function filterByMailingId($mailingId = null, $comparison = null)
    {
        if (is_array($mailingId)) {
            $useMinMax = false;
            if (isset($mailingId['min'])) {
                $this->addUsingAlias(TransactionsTableMap::COL_MAILING_ID, $mailingId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mailingId['max'])) {
                $this->addUsingAlias(TransactionsTableMap::COL_MAILING_ID, $mailingId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TransactionsTableMap::COL_MAILING_ID, $mailingId, $comparison);
    }

    /**
     * Filter the query by a related \Mailingaddress object
     *
     * @param \Mailingaddress|ObjectCollection $mailingaddress The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTransactionsQuery The current query, for fluid interface
     */
    public function filterByMailingaddress($mailingaddress, $comparison = null)
    {
        if ($mailingaddress instanceof \Mailingaddress) {
            return $this
                ->addUsingAlias(TransactionsTableMap::COL_MAILING_ID, $mailingaddress->getId(), $comparison);
        } elseif ($mailingaddress instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TransactionsTableMap::COL_MAILING_ID, $mailingaddress->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByMailingaddress() only accepts arguments of type \Mailingaddress or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Mailingaddress relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTransactionsQuery The current query, for fluid interface
     */
    public function joinMailingaddress($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Mailingaddress');

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
            $this->addJoinObject($join, 'Mailingaddress');
        }

        return $this;
    }

    /**
     * Use the Mailingaddress relation Mailingaddress object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MailingaddressQuery A secondary query class using the current class as primary query
     */
    public function useMailingaddressQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMailingaddress($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Mailingaddress', '\MailingaddressQuery');
    }

    /**
     * Filter the query by a related \Users object
     *
     * @param \Users|ObjectCollection $users The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTransactionsQuery The current query, for fluid interface
     */
    public function filterByUsers($users, $comparison = null)
    {
        if ($users instanceof \Users) {
            return $this
                ->addUsingAlias(TransactionsTableMap::COL_USER_ID, $users->getId(), $comparison);
        } elseif ($users instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TransactionsTableMap::COL_USER_ID, $users->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUsers() only accepts arguments of type \Users or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Users relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTransactionsQuery The current query, for fluid interface
     */
    public function joinUsers($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Users');

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
            $this->addJoinObject($join, 'Users');
        }

        return $this;
    }

    /**
     * Use the Users relation Users object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UsersQuery A secondary query class using the current class as primary query
     */
    public function useUsersQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUsers($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Users', '\UsersQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTransactions $transactions Object to remove from the list of results
     *
     * @return $this|ChildTransactionsQuery The current query, for fluid interface
     */
    public function prune($transactions = null)
    {
        if ($transactions) {
            $this->addUsingAlias(TransactionsTableMap::COL_ID, $transactions->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Transactions table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TransactionsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TransactionsTableMap::clearInstancePool();
            TransactionsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TransactionsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TransactionsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TransactionsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TransactionsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TransactionsQuery
