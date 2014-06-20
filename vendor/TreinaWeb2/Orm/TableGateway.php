<?php
namespace TreinaWeb2\Orm;

use TreinaWeb2\Util\Iterator\Collection;
use TreinaWeb2\Db\Adapter\DbInterface;

class TableGateway extends Collection
{

    /**
     *
     * @var string
     */
    protected $table = null;

    /**
     *
     * @var DbInterface
     */
    protected $adapter = null;

    protected $rowClass = '\\TreinaWeb\\Orm\\RowGateway';

    public function __construct($table, DbInterface $adapter)
    {
        $this->table = $table;
        $this->adapter = $adapter;
    }

    public function select($cols = '*', $where = null)
    {
        $rowClass = $this->rowClass;
        $collection = $this->adapter->select($this->table, $cols, $where);
        foreach ($collection->getElements() as $element) {
            $this->elements[] = new $rowClass($element, $this->adapter, $this);
        }
        return $this;
    }

    public function getAdapter()
    {
        return $this->adapter;
    }
}
