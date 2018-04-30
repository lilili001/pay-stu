<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script _src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <div class="payment-container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Payment Header</h2></div>
                    <div class="panel-body">
                        <form action="checkout.php" method="post">
                            <div class="form-group">
                                <label for="item">Product:</label>
                                <input class="form-control" type="text" name="product">
                            </div>
                            <div class="form-group">
                                <label for="item">Price:</label>
                                <input class="form-control" type="text" name="price">
                            </div>
                            <input type="submit" class="btn btn-primary" value="pay">
                        </form>
                        <p>Your will be taken to paypal to complete your payment</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>