<?php include 'calculate.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amtis Solution</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script defer src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container p-4">
        <h1 class="my-3">Calculate</h1>
        <div class="row justify-content-center">
            <div class="col col-md">
                <form method="post">
                    <?php
                    $fields = [
                        [
                            'label' => 'Voltage', 'id' => 'voltage',
                            'name' => 'voltage', 'unit' => 'Voltage (V)',
                        ],
                        [
                            'label' => 'Current', 'id' => 'current',
                            'name' => 'current', 'unit' => 'Ampere (A)',
                        ],
                        [
                            'label' => 'Current Rate', 'id' => 'current-rate',
                            'name' => 'current-rate', 'unit' => 'sen/kWh',
                        ],
                    ];
                    foreach ($fields as $field) :
                    ?>
                        <div class="form-group">
                            <label for="<?php echo $field['id']; ?>"><?php echo $field['label']; ?></label>
                            <input type="number" min="1" step="0.01" class="form-control" id="<?php echo $field['id']; ?>" name="<?php echo $field['name']; ?>">
                            <p><?php echo $field['unit']; ?></p>
                        </div>
                    <?php endforeach; ?>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-primary">calculate</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row my-5">
            <div class="col col-md mx-auto p-3" style="outline: 1px solid lightblue;
                                        border-radius: 5px;">
                <h4 class="text-primary">POWER : 0.06156kw</h3>
                    <h4 class="my-4 text-primary">RATE : 0.218RM</h4>
            </div>
        </div>
        <div class="row">
            <h1 class="mt-3">Per Hour</h1>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Hour</th>
                        <th scope="col">Energy (kWh)</th>
                        <th scope="col">TOTAL (RM)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 1; $i <= 24; $i++) {
                        echo
                        '<tr>
                            <th scope="row">' . ($i) . '</th>
                            <td>' . ($i) . '</td>
                            <td>' . calculateHour($i)[1] . '</td>
                            <td>' . number_format(calculateHour($i)[0], 2) . '</td>
                            </tr>';
                    }
                    ?>
                </tbody>
            </table>
            </br>

        </div>
        <div class="row">
            <h1 class="mt-3">Per Day</h1>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Days</th>
                        <th scope="col">Energy (kWh)</th>
                        <th scope="col">TOTAL (RM)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 1; $i <= 31; $i++) {
                        echo
                        '<tr> 
                            <th scope="row">' . ($i) . '</th>
                            <td>' . ($i) . '</td>
                            <td>' . calculateHour($i)[1] * 30 . '</td>
                            <td>' . number_format(calculateHour($i)[0] * 30, 2) . '</td>
                            </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>