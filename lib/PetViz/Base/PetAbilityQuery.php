<?php

namespace PetViz\Base;

use \Exception;
use \PDO;
use PetViz\PetAbility as ChildPetAbility;
use PetViz\PetAbilityQuery as ChildPetAbilityQuery;
use PetViz\Map\PetAbilityTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'pet_abilities' table.
 *
 *
 *
 * @method     ChildPetAbilityQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildPetAbilityQuery orderByAbilityId($order = Criteria::ASC) Order by the ability_id column
 * @method     ChildPetAbilityQuery orderByPetId($order = Criteria::ASC) Order by the pet_id column
 * @method     ChildPetAbilityQuery orderBySlot($order = Criteria::ASC) Order by the slot column
 * @method     ChildPetAbilityQuery orderByLevel($order = Criteria::ASC) Order by the level column
 * @method     ChildPetAbilityQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildPetAbilityQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildPetAbilityQuery groupById() Group by the id column
 * @method     ChildPetAbilityQuery groupByAbilityId() Group by the ability_id column
 * @method     ChildPetAbilityQuery groupByPetId() Group by the pet_id column
 * @method     ChildPetAbilityQuery groupBySlot() Group by the slot column
 * @method     ChildPetAbilityQuery groupByLevel() Group by the level column
 * @method     ChildPetAbilityQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildPetAbilityQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildPetAbilityQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPetAbilityQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPetAbilityQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPetAbilityQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPetAbilityQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPetAbilityQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPetAbility findOne(ConnectionInterface $con = null) Return the first ChildPetAbility matching the query
 * @method     ChildPetAbility findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPetAbility matching the query, or a new ChildPetAbility object populated from the query conditions when no match is found
 *
 * @method     ChildPetAbility findOneById(int $id) Return the first ChildPetAbility filtered by the id column
 * @method     ChildPetAbility findOneByAbilityId(int $ability_id) Return the first ChildPetAbility filtered by the ability_id column
 * @method     ChildPetAbility findOneByPetId(int $pet_id) Return the first ChildPetAbility filtered by the pet_id column
 * @method     ChildPetAbility findOneBySlot(int $slot) Return the first ChildPetAbility filtered by the slot column
 * @method     ChildPetAbility findOneByLevel(int $level) Return the first ChildPetAbility filtered by the level column
 * @method     ChildPetAbility findOneByCreatedAt(string $created_at) Return the first ChildPetAbility filtered by the created_at column
 * @method     ChildPetAbility findOneByUpdatedAt(string $updated_at) Return the first ChildPetAbility filtered by the updated_at column *

 * @method     ChildPetAbility requirePk($key, ConnectionInterface $con = null) Return the ChildPetAbility by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPetAbility requireOne(ConnectionInterface $con = null) Return the first ChildPetAbility matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPetAbility requireOneById(int $id) Return the first ChildPetAbility filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPetAbility requireOneByAbilityId(int $ability_id) Return the first ChildPetAbility filtered by the ability_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPetAbility requireOneByPetId(int $pet_id) Return the first ChildPetAbility filtered by the pet_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPetAbility requireOneBySlot(int $slot) Return the first ChildPetAbility filtered by the slot column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPetAbility requireOneByLevel(int $level) Return the first ChildPetAbility filtered by the level column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPetAbility requireOneByCreatedAt(string $created_at) Return the first ChildPetAbility filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPetAbility requireOneByUpdatedAt(string $updated_at) Return the first ChildPetAbility filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPetAbility[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPetAbility objects based on current ModelCriteria
 * @method     ChildPetAbility[]|ObjectCollection findById(int $id) Return ChildPetAbility objects filtered by the id column
 * @method     ChildPetAbility[]|ObjectCollection findByAbilityId(int $ability_id) Return ChildPetAbility objects filtered by the ability_id column
 * @method     ChildPetAbility[]|ObjectCollection findByPetId(int $pet_id) Return ChildPetAbility objects filtered by the pet_id column
 * @method     ChildPetAbility[]|ObjectCollection findBySlot(int $slot) Return ChildPetAbility objects filtered by the slot column
 * @method     ChildPetAbility[]|ObjectCollection findByLevel(int $level) Return ChildPetAbility objects filtered by the level column
 * @method     ChildPetAbility[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildPetAbility objects filtered by the created_at column
 * @method     ChildPetAbility[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildPetAbility objects filtered by the updated_at column
 * @method     ChildPetAbility[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PetAbilityQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \PetViz\Base\PetAbilityQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\PetViz\\PetAbility', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPetAbilityQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPetAbilityQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPetAbilityQuery) {
            return $criteria;
        }
        $query = new ChildPetAbilityQuery();
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
     * @return ChildPetAbility|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PetAbilityTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PetAbilityTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildPetAbility A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, ability_id, pet_id, slot, level, created_at, updated_at FROM pet_abilities WHERE id = :p0';
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
            /** @var ChildPetAbility $obj */
            $obj = new ChildPetAbility();
            $obj->hydrate($row);
            PetAbilityTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildPetAbility|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPetAbilityQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PetAbilityTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPetAbilityQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PetAbilityTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildPetAbilityQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PetAbilityTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PetAbilityTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PetAbilityTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the ability_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAbilityId(1234); // WHERE ability_id = 1234
     * $query->filterByAbilityId(array(12, 34)); // WHERE ability_id IN (12, 34)
     * $query->filterByAbilityId(array('min' => 12)); // WHERE ability_id > 12
     * </code>
     *
     * @param     mixed $abilityId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPetAbilityQuery The current query, for fluid interface
     */
    public function filterByAbilityId($abilityId = null, $comparison = null)
    {
        if (is_array($abilityId)) {
            $useMinMax = false;
            if (isset($abilityId['min'])) {
                $this->addUsingAlias(PetAbilityTableMap::COL_ABILITY_ID, $abilityId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($abilityId['max'])) {
                $this->addUsingAlias(PetAbilityTableMap::COL_ABILITY_ID, $abilityId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PetAbilityTableMap::COL_ABILITY_ID, $abilityId, $comparison);
    }

    /**
     * Filter the query on the pet_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPetId(1234); // WHERE pet_id = 1234
     * $query->filterByPetId(array(12, 34)); // WHERE pet_id IN (12, 34)
     * $query->filterByPetId(array('min' => 12)); // WHERE pet_id > 12
     * </code>
     *
     * @param     mixed $petId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPetAbilityQuery The current query, for fluid interface
     */
    public function filterByPetId($petId = null, $comparison = null)
    {
        if (is_array($petId)) {
            $useMinMax = false;
            if (isset($petId['min'])) {
                $this->addUsingAlias(PetAbilityTableMap::COL_PET_ID, $petId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($petId['max'])) {
                $this->addUsingAlias(PetAbilityTableMap::COL_PET_ID, $petId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PetAbilityTableMap::COL_PET_ID, $petId, $comparison);
    }

    /**
     * Filter the query on the slot column
     *
     * Example usage:
     * <code>
     * $query->filterBySlot(1234); // WHERE slot = 1234
     * $query->filterBySlot(array(12, 34)); // WHERE slot IN (12, 34)
     * $query->filterBySlot(array('min' => 12)); // WHERE slot > 12
     * </code>
     *
     * @param     mixed $slot The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPetAbilityQuery The current query, for fluid interface
     */
    public function filterBySlot($slot = null, $comparison = null)
    {
        if (is_array($slot)) {
            $useMinMax = false;
            if (isset($slot['min'])) {
                $this->addUsingAlias(PetAbilityTableMap::COL_SLOT, $slot['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($slot['max'])) {
                $this->addUsingAlias(PetAbilityTableMap::COL_SLOT, $slot['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PetAbilityTableMap::COL_SLOT, $slot, $comparison);
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
     * @return $this|ChildPetAbilityQuery The current query, for fluid interface
     */
    public function filterByLevel($level = null, $comparison = null)
    {
        if (is_array($level)) {
            $useMinMax = false;
            if (isset($level['min'])) {
                $this->addUsingAlias(PetAbilityTableMap::COL_LEVEL, $level['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($level['max'])) {
                $this->addUsingAlias(PetAbilityTableMap::COL_LEVEL, $level['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PetAbilityTableMap::COL_LEVEL, $level, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPetAbilityQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(PetAbilityTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(PetAbilityTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PetAbilityTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPetAbilityQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(PetAbilityTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(PetAbilityTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PetAbilityTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPetAbility $petAbility Object to remove from the list of results
     *
     * @return $this|ChildPetAbilityQuery The current query, for fluid interface
     */
    public function prune($petAbility = null)
    {
        if ($petAbility) {
            $this->addUsingAlias(PetAbilityTableMap::COL_ID, $petAbility->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the pet_abilities table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PetAbilityTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PetAbilityTableMap::clearInstancePool();
            PetAbilityTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PetAbilityTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PetAbilityTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PetAbilityTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PetAbilityTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildPetAbilityQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(PetAbilityTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildPetAbilityQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(PetAbilityTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildPetAbilityQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(PetAbilityTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildPetAbilityQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(PetAbilityTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildPetAbilityQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(PetAbilityTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildPetAbilityQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(PetAbilityTableMap::COL_CREATED_AT);
    }

} // PetAbilityQuery
