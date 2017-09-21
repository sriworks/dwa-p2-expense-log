<?php

$expenses_data_file="lib/expenses.json";

/**
 * Get a list of all expenses in a JSON format.
 *
 * @return Array of available expenses
 */
function get_all_expenses(){
    $expenses = file_get_contents($GLOBALS['expenses_data_file']);
    return json_decode($expenses,true);
}

/**
 * Add new expense in a JSON file.
 */
function add_new_expense($data){
    // Read current Json.
    $expenses_raw  = file_get_contents($GLOBALS['expenses_data_file']);
    $expenses_json = json_decode($expenses_raw);
    array_push($expenses_json, $data);
    $expenses_raw = json_encode($expenses_json);
    file_put_contents($GLOBALS['expenses_data_file'], $expenses_raw);
}

/**
 * Add a record in JSON file if POST is submitted. #TODO: Validation
 */
function check_for_post_data(){
  if($_POST){
      $expense = array(
            'category' => $_POST['category'],
            'memo' => $_POST['memo'],
            'options'=> array('exclude_from_budget'=>$_POST['exclude_from_budget']),
            'amount'=> $_POST['amount'],
            'transaction_date' => $_POST['transaction_date']
      );
      add_new_expense($expense);
  }
}

// Handle Form Post - #TODO Sanitization & Validation
check_for_post_data();

// Get All expenses on load.
$all_expenses = get_all_expenses();