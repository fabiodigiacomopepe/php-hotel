<!-- RICHIESTA
Stampare tutti i nostri hotel con tutti i dati disponibili.

Iniziare in modo graduale:
Prima stampate in pagina i dati, senza preoccuparvi dello stile (vedi var_dump). Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.

Bonus:
-Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio
-Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)

Nota Bene
Deve essere possibile utilizzare entrambi i filtri contemporaneamente (es. ottenere una lista con hotel che dispongono di parcheggio e che hanno un voto di tre stelle o superiore)
Se non viene specificato nessun filtro, visualizzare come in precedenza tutti gli hotel
-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <title>PHP Hotel</title>
        <style>

        </style>
    </head>

    <body>
        <form class="container my-2 mx-0">
            <label for="parcheggio">Parcheggio:</label>

            <input type="radio" id="parcheggio_SI" name="parking" value="si">
            <label for="parcheggio_SI">Si</label>

            <input type="radio" id="parcheggio_NO" name="parking" value="no">
            <label for="parcheggio_NO">No</label>

            <br>

            <label for="voto">Voto</label>
            <select name="vote" id="vote">
                <option value="-1"></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>    
            </select>

            <input type="submit" value="Cerca">
        </form> 

        <?php
            $hotels = [
                [
                    'name' => 'Hotel Belvedere',
                    'description' => 'Hotel Belvedere Descrizione',
                    'parking' => true,
                    'vote' => 4,
                    'distance_to_center' => 10.4
                ],
                [
                    'name' => 'Hotel Futuro',
                    'description' => 'Hotel Futuro Descrizione',
                    'parking' => true,
                    'vote' => 2,
                    'distance_to_center' => 2
                ],
                [
                    'name' => 'Hotel Rivamare',
                    'description' => 'Hotel Rivamare Descrizione',
                    'parking' => false,
                    'vote' => 1,
                    'distance_to_center' => 1
                ],
                [
                    'name' => 'Hotel Bellavista',
                    'description' => 'Hotel Bellavista Descrizione',
                    'parking' => false,
                    'vote' => 5,
                    'distance_to_center' => 5.5
                ],
                [
                    'name' => 'Hotel Milano',
                    'description' => 'Hotel Milano Descrizione',
                    'parking' => true,
                    'vote' => 2,
                    'distance_to_center' => 50
                ],
            ];

            /* echo "<pre>";
            var_dump($hotels);
            echo "</pre>"; */

            $parking = $_GET['parking'];
            echo "parking";
            var_dump($parking);
    
            echo "<br />";
    
            $vote = $_GET['vote'] ?? -1;
            echo "vote";
            var_dump($vote);
        ?>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Parcheggio</th>
                    <th scope="col">Voto</th>
                    <th scope="col">Distanza dal centro</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($hotels as $hotel) {

                    if (($parking === null  
                        || ($parking === "si" && $hotel['parking'])
                        || ($parking === "no" && !$hotel['parking']))
                        && $vote <= $hotel['vote']) {

                        echo '<tr>';
                        echo '<td>' . $hotel['name'] . '</td>';
                        echo '<td>' . $hotel['description'] . '</td>';
                        echo '<td>' . ($hotel['parking'] ? "Si" : "No") . '</td>';
                        echo '<td>' . $hotel['vote'] . '</td>';
                        echo '<td>' . $hotel['distance_to_center'] . ' Km' . '</td>';
                        echo '</tr>';
                    }
                }
            ?>
            </tbody>
        </table>
    </body>
</html>