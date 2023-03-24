<?php 
$url = "https://dev.kidopilabs.com.br/exercicio/covid.php?listar_paises=1";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$resulado = json_decode(curl_exec($ch));
?>
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
        <form action="comparar.php" method="post">
          <p>Selecione dois países para comparar suas taxas de morte</p>
          <div class="div-options">
            <select name="Pais1" id="lista1" required>
            <option value="" disabled selected hidden>Selecione</option>
              <?php
                foreach($resulado as $pais){
                  echo "<option value=\"".$pais."\">".$pais."</option>";
                }
              ?>
            </select>
            
            <select name="Pais2" id="lista2" required>
            <option value="" disabled selected hidden>Selecione</option>
              <?php
                foreach($resulado as $pais){
                  echo "<option value=\"".$pais."\">".$pais."</option>";
                }
              ?>
            </select>
          </div>
          <button type="submit" name="submit">Comparar</button>
      </form>
      <div class="div-table">
      <?php
            if(isset($_POST['Pais1']) && isset($_POST['Pais2'])){
                $pais1 = $_POST['Pais1'];
                $pais2 = $_POST['Pais2'];
                $confirmados1 = 0;
                $mortos1 = 0;
                $confirmados2 = 0;
                $mortos2 = 0;


                $url1 = "https://dev.kidopilabs.com.br/exercicio/covid.php?pais=".$pais1;
                $url2 = "https://dev.kidopilabs.com.br/exercicio/covid.php?pais=".$pais2;
                $ch1 = curl_init($url1);
                $ch2 = curl_init($url2);
                curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
                $resulado1 = json_decode(curl_exec($ch1));
                curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
                $resulado2 = json_decode(curl_exec($ch2));

                foreach($resulado1 as $p1){
                  $confirmados1+=$p1->Confirmados;
                  $mortos1+=$p1->Mortos;
                }

                foreach($resulado2 as $p2){
                  $confirmados2+=$p2->Confirmados;
                  $mortos2+=$p2->Mortos;
                }
                
                $taxaPais1 = $mortos1/$confirmados1;
                $taxaPais2 = $mortos2/$confirmados2;
                $taxaDif = $taxaPais1 - $taxaPais2
                ?>
                <h2>Taxas de morte</h2>
                  <table>
                    <thead>
                      <tr>
                        <?php
                          echo "<th>". $pais1 . "</th>";
                          echo "<th>". $pais2 . "</th>";
                          echo "<th>Diferença</th>";
                        ?>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php
                          echo "<td>". number_format($taxaPais1 * 100, 2, '.', '') ."%</td>";
                          echo "<td>". number_format($taxaPais2 * 100, 2, '.', '') ."%</td>";
                          echo "<td>". number_format($taxaDif * 100, 2, '.', '') ."%</td>";
                        ?>
                      </tr>
                    </tbody>
                </table>
            <?php
            }
            ?>
      </div>
    </main>
    <button id="btnTopo"></button>
    <footer>
      <p>Desenvolvido por <a href="https://github.com/EndryoMachado">Endryo Machado</a></p>
    </footer>
</body>
</html>