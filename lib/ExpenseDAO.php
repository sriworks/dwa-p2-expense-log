<?php
namespace ExpenseManagement;

/**
 * Expense Data Access Object
 */
class ExpenseDAO 
{
    
    # Properties
    private $expenses;
    private $expensedatafile;
    
    /**
     * Constructor for Expense Data Access Object
     */
    public function __construct($jsonDatafile)
    {
        $this->expensedatafile = $jsonDatafile;
    }
    
    # Public Methods
    
    /**
     * Public Method to get all expenses.
     * @param reload forces reload of all expenses.
     */
    public function getAllExpenses($reload = false){
        if(!isset($expenses) || $reload){
            $this->_loadAllExpenses();
        }
        return $this->expenses;
    }
    
    public function createNewExpense($expense){
        $expenses_raw  = file_get_contents($this->expensedatafile);
        $expenses_json = json_decode($expenses_raw);
        array_push($expenses_json, $expense);
        $expenses_raw = json_encode($expenses_json);
        file_put_contents($this->expensedatafile, $expenses_raw);
    }    
    
    
    # Private Methods
    
    
    /**
     * Public Method to get all expenses.
     * @param reload forces reload of all expenses.
     */
    private function _loadAllExpenses(){
        $expenses_raw = file_get_contents($this->expensedatafile);
        $this->expenses = json_decode($expenses_raw,true);
    }
}