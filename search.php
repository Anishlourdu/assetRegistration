<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Search</title>
    <style>
        body{
           background-color: black;
        }
        h1{
          text-align: center;
          background-color:#fb8197;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h1 style="color:#34a853">Asset Details </h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        <a href="first.html"><input type="button" value="Go Back"></a>                                        
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr style="color:#4285f4">
                                    <th>ID</th>
                                    <th>A_Name</th>
                                    <th>A_Make</th>
                                    <th>A_Date</th>
                                    <th>Asset_ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","asset");

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM asset1 WHERE CONCAT(ID,AName,AMake,ADate,AssetID) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['ID']; ?></td>
                                                    <td><?= $items['AName']; ?></td>
                                                    <td><?= $items['AMake']; ?></td>
                                                    <td><?= $items['ADate']; ?></td>
                                                    <td><?= $items['AssetID']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="5">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>