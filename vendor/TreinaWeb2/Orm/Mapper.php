<?php
namespace TreinaWeb2\Orm;

use TreinaWeb2\Orm\TableGatway;
use TreinaWeb2\Db\Adapter\DbInterface;

class Mapper extends TableGateway
{

    protected $primaryKey = null;

    protected $rowClass = '\\TreinaWeb2\\Orm\ActiveRecord';

    public static $defaultAdapter = null;

    public function __construct($table = null, $primaryKey = null, $adapter = null)
    {
        if (! is_null($primaryKey)) {
            $this->primaryKey = $primaryKey;
        }
        if (! is_null($table) && ! is_null($adapter)) {
            parent::_contruct($table, $adapter);
        }
        if (null !== self::$defaultAdapter) {
            $this->adapter = self::$defaultAdapter;
        }
    }

    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    public function getTable()
    {
        return $this->table;
    }

    public function insert(array $cols)
    {
        $this->adapter->insert($this->table, $cols);
    }

    public function update(array $cols, $where)
    {
        $this->adapter->update($this->table, $where);
    }

    public function delete($where)
    {
        $this->adapter->delete($this->table, $where);
    }

    public function newRow()
    {
        $element = $this->adapter->getFields($this->table);
        $row = new ActiveRecord($element, $this->adapter, $this, array(
            'state' => 'new'
        ));
        return $row;
    }
}
