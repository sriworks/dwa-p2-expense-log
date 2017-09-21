<!DOCTYPE html>
<!-- Php Includes -->
<?php require('lib/expenses-mgmt.php'); ?>
<html>

<head>
    <meta charset="UTF-8">
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
                        <form action="/" method="post">
                            <div class="form-group">
                                <label for="category">Expense Category<span class="text-danger">*</span></label>
                                <select class="form-control" id="category" name="category" required>
                                    <option value="Loans">Loans</option>
                                    <option value="Shopping">Shopping</option>
                                    <option value="Dining">Dining</option>
                                    <option value="Entertainment">Entertainment</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="transaction_date">Transaction Date<span class="text-danger">*</span></label>
                                <input type="date" name="transaction_date" class="form-control" id="transaction_date" placeholder="Transaction Date" required>
                            </div>
                            <div class="form-group">
                                <label for="amount">Expense Amount In USD<span class="text-danger">*</span></label>
                                <input type="number" name="amount" class="form-control" id="amount" placeholder="Amount" required>
                            </div>
                            <div class="form-group">
                                <label for="memo">Memo</label>
                                <input type="text" class="form-control" id="memo" name="memo" placeholder="Memo">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="exclude_from_budget" name="exclude_from_budget"> Exclude from Budget?
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