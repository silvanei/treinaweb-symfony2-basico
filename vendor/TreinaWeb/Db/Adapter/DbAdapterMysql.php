<?php
namespace TreinaWeb\Db\Adapter;

use TreinaWeb\Util\Iterator\Collection;

class DbAdapterMysql extends \PDO implements DbInterface
{

    public function __construct(array $config)
    {
        $dsn = "mysql:dbname={$config['dbname']};host={$config['host']}";
        parent::__construct($dsn, $config['username'], $config['passwd']);
        
        $this->setAttribute(self::ATTR_DEFAULT_FETCH_MODE, self::FETCH_ASSOC);
    }

    public function insert($table, array $fields)
    {
        $columns = '';
        $values = '';
        
        foreach ($fields as $column => $value) {
            $columns .= $column . ',';
            $values .= (is_string($value) ? "'$value'" : $value) . ',';
        }
        // Remove a ultima ','
        $columns = substr($columns, 0, strlen($columns) - 1);
        $values = substr($values, 0, strlen($values) - 1);
        
        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
        $this->exec($sql);
    }

    public function update($table, array $fields, $where = '')
    {
        $sets = '';
        foreach ($fields as $column => $value) {
            $sets .= $column . ' = ';
            $sets .= (is_string($value) ?"'{$value}'" : $value ) . ',';
        }
        $sets = substr($sets, 0, strlen($sets) - 1);
        
        if ('' != $where) {
            $where = 'WHERE ' . $where;
        }
        
        $sql = "UPDATE {$table} SET {$sets} {$where}";
        $this->exec($sql);
    }

    public function delete($table, $where = '')
    {
        if ('' != $where) {
            $where = 'WHERE ' . $where;;
        }        
        $sql = "DELETE FROM {$table} {$where}";
        $this->exec($sql);
        
    }
    
    public function select($table, $cols = '*', $where = null)
    {
        $cols = is_array($cols) ? implode(',', $cols) : $cols;
        $sql = "SELECT {$cols} FROM {$table} " . (empty($where) ? '' : "WHERE {$where}");
        $stm = $this->query($sql);
        return new Collection($stm->fetchAll());
    }
    
    
    public function getFields($table)
    {
        $sql = "DESCRIBE {$table};"; 
        $stmt = $this->query($sql);
        $results = $stmt->fetchAll();
        
        $metadata = array();
        foreach ($results as $result) {
            $metadata[$result['Field']] = null;
        }
        
        return $metadata;
    }
    
}
