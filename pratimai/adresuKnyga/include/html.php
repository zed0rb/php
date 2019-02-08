<?php
function head() {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Adresu Knyga</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
    <?php
}
function frontPanel ($limit) {
    ?>
<div class="wrapper">
    <h2>Adresu duomenys</h2>
    <div id="frontDiv">
        <form method="post" class="float-left">
            <button name="add" value="1" id="add" type='submit' class='btn btn-success btn-lg'>Įvesti naują įrašą</button>
        </form>
        <button id="filter" type='button' class='btn btn-info btn-lg float-left'>Filtruoti</button>
    </div>
    <div id="searchForm" class="hidden">
        <form method="get">
            <table>
                <tr>
                    <th><label>Vardas</label></th>
                    <td><input id="nameSearch" type="text" name="name" value="<?php echo (isset($_GET['name']) && isset($_GET['search'])) ? $_GET['name'] : ''; ?>"></td>
                </tr>
                <tr>
                    <th><label>Pavardė</label></th>
                    <td><input id="last_nameSearch" type="text" name="last_name" value="<?php echo (isset($_GET['last_name']) && isset($_GET['search'])) ? $_GET['last_name'] : ''; ?>"></td>
                </tr>
                <tr>
                    <th><label>Telefono numeris</label></th>
                    <td><input id="numberSearch" type="text" name="number" value="<?php echo (isset($_GET['number']) && isset($_GET['search'])) ? $_GET['number'] : ''; ?>"></td>
                </tr>
                <tr class="text-center">
                    <td colspan="4">
                        <input class="btn btn-primary btn-lgt" type="submit" name="search" >
                        <input type='hidden' name='limit' value='<?php echo $limit;?>'>
                    </td>
                    <td colspan="0.5"><button id="clean" type='button' class='btn btn-warning btn-lgt'>Išvalyti</button></td>
                    <td colspan="0.5"><button id="hide" type='button' class='btn btn-warning btn-lgt'>Slėpti</button></td>
                </tr>
            </table>
        </form>
    </div>
    <div>
    <?php
}
function table ($result, $offset, $limit) {
    ?>
    <div class="w-75 p-3 mx-auto">
        <table id="datatable" class="table table-striped table-hover text-center" cellspacing="0" width="100%">
            <thead class="thead-dark">
            <tr>
                <th>Nr</th>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>Telefono numeris</th>
                <th>Keisti/Trinti</th>
            </tr>
            </thead>
            <?php
            $eilesNr=1 + $offset;
            if (!empty($result)) {
                ?>
                <tbody>
                <?php
                if($result->num_rows == $limit +1) {
                    $totalRows = $limit;
                } else {
                    $totalRows = $result->num_rows;
                }
                for ($i = 0; $i<$totalRows; $i++) {
                    $row = $result->fetch_assoc();
                    $id = $row['id'];
                    $name = $row['name'];
                    $last_name = $row['last_name'];
                    $number = $row['number'];
                    ?>
                    <tr>
                        <td><?php echo $eilesNr++; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $last_name; ?></td>
                        <td><?php echo $number; ?></td>
                        <td>
                            <form method="post">
                                <button name="edit" value="<?php echo $id; ?>" id="edit" type='submit' class='btn btn-warning btn-lg tableButton'><span><i class='fas fa-edit'></i></span></button>
                                <button name="delete" value="<?php echo $id; ?>" id="delete" type='submit' class='btn btn-danger btn-lg tableButton'><span><i class="fas fa-trash-alt"></i></span></button>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
                <?php
            }
            ?>
        </table>
        <?php
        if (empty($result)) echo "<h3 class='text-center'>Nėra duomenų</h3>";
        ?>
    </div>
    <?php
}

function foot() {
    ?>
    </body>
    </html>
    <?php
}
function pagesList($result, $limit, $offset, $offsetLink, $searchParameters) {
    ?>
    <nav>
        <ul id="pagination" class="pagination float-right">
            <?php
            if ($offset > 0) {
                echo "<li class='page-item'><a class='page-link' href='?". $offsetLink . "&offset=" . ($offset - $limit) . "'>Atgal </a></li>";
            } else {
                echo "<li class='page-item'><a class='page-link disabled' >Atgal </a></li>";
            }
            $number = 0;
            while (totalRows(connection(), $searchParameters)-($limit*$number) > 0) {
                $sk = "";
                if ($limit*$number == $offset) {
                    $sk="active";
                }
                echo "<li class='page-item'><a" . " class='page-link ".$sk .  "' href='?" . $offsetLink . "&offset=" . ($number * $limit) . "'> " . ($number+1) . " </a></li>";
                $number++;
            }
            if (empty($result)) {
                echo "<li class='page-item'><a class='page-link disabled'> Pirmyn</a></li>";
            } else if ($result->num_rows == $limit + 1) {
                echo "<li class='page-item'><a class='page-link' href='?" . $offsetLink . "&offset=" . ($offset + $limit) . "'> Pirmyn</a></li>";
            } else {
                echo "<li class='page-item'><a class='page-link disabled'> Pirmyn</a></li>";
            }
            ?>
        </ul>
    </nav>
    <?php
}
function selection() {
    ?>
    <div class="form-group float-right">
        <select class="btn btn-secondary" id="limitSelect" >
            <option value="10" <?php if(isset($_GET['limit']) && $_GET['limit']==10) echo "selected";?>>10</option>
            <option value="30" <?php if(isset($_GET['limit']) && $_GET['limit']==30) echo "selected";?>>30</option>
            <option value="50" <?php if(isset($_GET['limit']) && $_GET['limit']==50) echo "selected";?>>50</option>
        </select>
    </div>
    <?php
}
?>