<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="teste.css">
    <title>COVID-19 Watcher</title>
</head>
<body>
    <header>
      <h1>COVID-19 Watcher</h1>
      
      <nav>
          <a href="index.php">Home</a>
          <a href="historico.php">Histórico de consultas</a>
          <a href="comparar.php">Comparar Países</a>
      </nav>
      
    </header>
    <main>
        <div class="div-table">
            <h1>Histórico</h1>
        <table>
            <thead>
                <tr>
                <th>Pais</th>
                <th>Data</th>
                <th>Hora</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `consultas`";
                include_once('config.php');
                $result = $conn->query($sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$row['pais']."</td>";
                    $data=new DateTime($row['data']);
                    echo "<td>".$data->format('d/m/Y')."</td>";
                    $hora=new DateTime($row['hora']);
                    echo "<td>".$hora->format('H:i:s')."</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>