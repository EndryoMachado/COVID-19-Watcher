<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>COVID-19 Watcher</title>
</head>
<body>
    <header>
      <h1>COVID-19 Watcher</h1>
      <!--
      <nav>
          <a href="#">Home</a>
          <a href="#">Histórico de buscas</a>
          <a href="#">Comparar Países</a>
      </nav>
      -->
    </header>
    <main>
        <form action="index.php" method="post">
          <p>Selecione um país para consultar seus dados</p>
          <div class="div-options">
            <ul>
              <li>
                <input type="radio" name="Pais" id="australia" value="Australia">
                <label for="australia"><img src="img/australia-flag.jpg" alt="Australia"></label>
                <h3>Australia</h3>
              </li>
              <li>
                <input type="radio" name="Pais" id="brazil" value="Brazil">
                <label for="brazil"><img src="img/brazil-flag.jpg" alt="Brazil"></label>
                <h3>Brazil</h3>
              </li>
              <li>
                <input type="radio" name="Pais" id="canada" value="Canada">
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
                $pais = $_POST['Pais'];
                $totalCasos = 0; 
                $totalMortes = 0;
                $url = "https://dev.kidopilabs.com.br/exercicio/covid.php?pais=".$pais;
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
                            echo "<td>".$estado->Confirmados."</td>";
                             $totalCasos+=$estado->Confirmados;
                            echo "<td>".$estado->Mortos."</td>";
                             $totalMortes+=$estado->Mortos;
                            echo "</tr>";
                        }
                        echo "<tr>";
                            echo "<td class=\"total\">Total</td>";
                            echo "<td>".$totalCasos."</td>";
                            echo "<td>".$totalMortes."</td>";
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
      <p>Última consulta: Brazil - 15/03/2023</p>
    </footer>
</body>
</html>