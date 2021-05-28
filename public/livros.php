<!DOCTYPE html>

<head>
    <style>
        .content {
            max-width: 694px;
            margin: auto;
        }

        table, td {
            border: 1px solid black;
        }
    </style>
</head>

<html>

<body>
    <div class="content">
        <h1>Bibliófilo's</h1>
        <h2>Livros</h2>

        <?php
            require 'mysql_server.php';

            $conexao = RetornaConexao();

            $titulo = 'titulo';
            $autor = 'autor';
            $classificacao = 'classificacao';
            $data_publicacao = 'data_publicacao';
            $num_paginas = 'num_paginas';
            $idioma = 'idioma';

            $sql = "SELECT 
                    $titulo, 
                    $autor, 
                    $classificacao, 
                    $data_publicacao, 
                    $num_paginas, 
                    $idioma FROM livros;";

            $resultado = mysqli_query($conexao, $sql);

            if (!$resultado) echo mysqli_error($conexao);

            echo "<table>
                    <tr>
                        <th>$titulo</th>
                        <th>$autor</th>
                        <th>$classificacao</th>
                        <th>$data_publicacao</th>
                        <th>$num_paginas</th>
                        <th>$idioma</th>
                    <tr>";

            if (mysqli_num_rows($resultado) > 0) {

                while ($registro = mysqli_fetch_assoc($resultado)) {

                    echo "<tr>
                        <td>$registro[$titulo]</td>
                        <td>$registro[$autor]</td>
                        <td>$registro[$classificacao]</td>
                        <td>$registro[$data_publicacao]</td>
                        <td>$registro[$num_paginas]</td>
                        <td>$registro[$idioma]</td>
                    </tr>";
                }
            }

            echo "</table>";

            FecharConexao($conexao);
        ?>
    </div>
</body>

</html>