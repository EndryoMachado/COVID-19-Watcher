<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script defer src="script.js"></script>
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
                $sql = "SELECT * FROM `consultas` order by data desc, hora desc";
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
    <button id="btnTopo"></button>
    <footer>
        <p>Desenvolvido por <a href="https://github.com/EndryoMachado">Endryo Machado</a></p>
    </footer>
</body>
</html>