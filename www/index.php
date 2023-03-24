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
        <form action="index.php" method="post">
          <p>Selecione um país para consultar seus dados</p>
          <div class="div-options">
            <ul>
              <li>
                <input type="radio" name="Pais" id="australia" value="Australia" required>
                <label for="australia"><img src="img/australia-flag.jpg" alt="Australia"></label>
                <h3>Australia</h3>
              </li>
              <li>
                <input type="radio" name="Pais" id="brazil" value="Brazil" required>
                <label for="brazil"><img src="img/brazil-flag.jpg" alt="Brazil"></label>
                <h3>Brazil</h3>
              </li>
              <li>
                <input type="radio" name="Pais" id="canada" value="Canada" required>
                <label for="canada"><img src="img/canada-flag.jpg" alt="Canada"></label>
                <h3>Canada</h3>
              </li>
            </ul>
          </div>
          <button type="submit" name="submit">Consultar</button>
        </form>
    
        <div class="div-table">
        <?php
            if(isset($_POST['Pais'])){
                include_once('config.php');
                $pais = $_POST['Pais'];
                //helloWorld();
                $totalCasos = 0; 
                $totalMortes = 0;
                $url = "https://dev.kidopilabs.com.br/exercicio/covid.php?pais=".$pais;
                $insert_query = mysqli_query($conn, "INSERT INTO consultas(pais) VALUES ('$pais')");
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $resulado = json_decode(curl_exec($ch));
                echo "<h2>". $pais . "</h2>";
                ?>
                <table>
                    <thead>
                        <tr>
                        <th>Estado</th>
                        <th>Casos confirmados</th>
                        <th>Mortes confirmadas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($resulado as $estado){
                            echo "<tr>";
                            echo "<td>".$estado->ProvinciaEstado."</td>";
                            echo "<td>".number_format($estado->Confirmados)."</td>";
                             $totalCasos+=$estado->Confirmados;
                            echo "<td>".number_format($estado->Mortos)."</td>";
                             $totalMortes+=$estado->Mortos;
                            echo "</tr>";
                        }
                        echo "<tr>";
                            echo "<td class=\"total\">Total</td>";
                            echo "<td>".number_format($totalCasos)."</td>";
                            echo "<td>".number_format($totalMortes)."</td>";
                        echo "</tr>";
                        ?>
                    </tbody>
                </table>
            <?php
            }
            ?>
        </div>
    </main>
    
    <footer>
    <?php
        $sql = "SELECT * FROM `consultas` WHERE data = (SELECT MAX(data) FROM `consultas`) and hora = (SELECT MAX(hora) FROM `consultas` WHERE data = (SELECT MAX(data) FROM `consultas`))";
        include_once('config.php');
        $result = $conn->query($sql);
        while ($row = mysqli_fetch_assoc($result)) {
          $data=new DateTime($row['data']);
         echo "<p>Última consulta: ".$row['pais']." - ".$data->format('d/m/Y')."</p>";
        }
      ?>
    </footer>
</body>
</html>