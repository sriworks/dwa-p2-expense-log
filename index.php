<!DOCTYPE html>
<!-- Php Includes -->
<?php require('lib/expenses-mgmt.php'); ?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Expense Management - Log your expenses!</title>
    <!-- Bootstrap CSS - load it from CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2 class="text-center">Expense Management</h2>
        <div class="row">
            <div class="col-md-6 center col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Log your Expense</h3>
                    </div>
                    <div class="panel-body">
                        <?php if (!empty($errors)) : ?>
                            <div class='alert alert-danger'>
                                <strong>Error Occured:</strong>
                                <ul>
                                    <?php foreach ($errors as $error) : ?>
                                        <li><?=$error?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif ?>
                        <?php if (empty($errors) && $form->isSubmitted() && isset($expense_create_success)) : ?>
                            <div class='alert alert-success'>
                                <strong>Success!</strong>
                                <p>Expense for <?= $form->prefill('amount') ?> created under <?= $form->prefill('category') ?>  category! </p>    
                            </div>
                        <?php endif ?>
                        
                        <form method="post">
                            <div class="form-group">
                                <label for="category">Expense Category<span class="text-danger">*</span></label>
                                <?php $selected_category = $form->prefill('category', ''); ?>
                                <select class="form-control" id="category" name="category" >
                                    <?php foreach ($expense_categories as $key=>$value) : ?>
                                        <option value="<?=$key?>" <?php if($selected_category == $key){ echo 'selected'; } else { echo ''; } ?> ><?=$value?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="transaction_date">Transaction Date<span class="text-danger">*</span></label>
                                <input type="text" name="transaction_date" class="form-control" id="transaction_date"  value='<?=$form->prefill('transaction_date', '')?>' required>
                            </div>
                            <div class="form-group">
                                <label for="amount">Expense Amount In USD<span class="text-danger">*</span></label>
                                <input type="text" name="amount" class="form-control" id="amount" placeholder="Amount" value='<?=$form->prefill('amount', '')?>' required>
                            </div>
                            <div class="form-group">
                                <label for="memo">Memo</label>
                                <input type="text" class="form-control" id="memo" name="memo" placeholder="Memo" value='<?=$form->prefill('memo', '')?>'>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="exclude_from_budget" name="exclude_from_budget" value='<?=$form->isChosen('exclude_from_budget', '')?>'> Exclude from Budget?
                                </label>
                            </div>
                            <div class="text-right">
                                <input type="submit" class="btn btn-primary" />
                            </div>
                        </form>
                    </div>
                    <h3 class="text-center">Current Expenses</h3>
                    <table class="table table-hover">
                        <tr>
                            <th>Expense</th>
                            <th>Transaction Date</th>
                            <th>Amount</th>
                            <th>Exclude from Budget?</th>
                        </tr>
                        <?php foreach($all_expenses as $expense){ ?>
                        <tr>
                            <td><b><?= $expense['category'] ?></b>
                                <br/>
                                <?= $expense['memo'] ?>
                            </td>
                            <td>
                                <?= date($expense['transaction_date']) ?>
                            </td>
                            <td>
                                <?= $expense['amount'] ?>
                            </td>
                            <td>
                                <?= $expense['options']['exclude_from_budget'] ? 'Yes': 'No' ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>