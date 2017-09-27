<?php
require('ExpenseDAO.php');
require('vendor/Form.php');

use DWA\Form;
use ExpenseManagement\ExpenseDAO;

$expenses_data_file="/tmp/expenses.json";
$expenseDAO = new ExpenseDAO($GLOBALS['expenses_data_file']);
$form = new Form($_POST);
$expense_categories = array('Loans' => 'Loans', 'Shopping' => 'Shopping', 'Dining' => 'Dining', 'Entertainment' => 'Entertainment');

// Handle Form Post
 if ($form->isSubmitted()) {

    # Validate
    $errors = $form->validate([
        'category' => 'required',  // Category is required.
        'amount' => 'required|numeric',  // amount is required and have to be numeric.
        'transaction_date' => 'required|date'  // Transaction date is required and has to be a valid date.
    ]);
    
    // Create new Expense if no errors found.
    if (empty($errors)) {
        $expense = array(
            'category' => $form->get('category', ''),
            'memo' => $form->get('memo', '') ,
            'options'=> array('exclude_from_budget'=> $form->isChosen('exclude_from_budget', '')),
            'amount'=> $form->get('amount', ''),
            'transaction_date' => $form->get('transaction_date', ''));
        $expenseDAO->createNewExpense($expense);
        $expense_create_success = true;
    }
 }


// Load all existing expenses. 
$all_expenses = $expenseDAO->getAllExpenses();