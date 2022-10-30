<?php
header('Access-control-Allow-Headers: *');
header('Access-control-Allow-Origin: *');
header('Access-control-Allow-Methods: POST, GET');
$db = new SQLite3('data.sqlite');

$sql = "select * from matchInfo ";
$dump = $db->query($sql);
?>
<html>
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    </head>
    <body>
        <h1 style="text-align: center">Click Record Database</h1>
        <div class="container mt-5">
            <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Match Id</th>
                    <th>Team 1</th>
                    <th>Team 2</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while ($row = $dump->fetchArray(SQLITE3_ASSOC)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['matchId']; ?></td>
                    <td><?php echo $row['team1']; ?></td>
                    <td><?php echo $row['team2']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
            <script>
                $(document).ready(function () {
                    $('#example').DataTable();
                });
            </script>
    </body>
</html>


<!-- while ($row = $dump->fetchArray(SQLITE3_ASSOC)) {
    echo "<pre>";
    print_r($row);
    echo "<pre>";
} -->