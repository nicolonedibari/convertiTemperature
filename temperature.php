<?php
    $valore = "";
    $scala_da = "";
    $scala_a = "";
    $risultato = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $valore = isset($_POST["valore"]) ? trim($_POST["valore"]) : "";
        $scala_da = isset($_POST["da"]) ? trim($_POST["da"]) : "";
        $scala_a = isset($_POST["a"]) ? trim($_POST["a"]) : "";

        if($scala_da === $scala_a){
            $risultato = "La temperatura resta invariata: $valore °$scala_a";
        } else {
            switch ($scala_da) {
                case "celsius":
                    $tempC = $valore;
                    break;
                case "fahrenheit":
                    $tempC = ($valore - 32) * 5 / 9;
                    break;
                case "kelvin":
                    $tempC = $valore - 273.15;
                    break;
                default:
                    $risultato = "Scala di partenza non valida.";
            }

            if ($scala_a === "celsius"){
                $valore_finale = $tempC;
            } elseif ($scala_a === "fahrenheit") {
                $valore_finale = $tempC * 9 / 5 + 32;
            } elseif ($scala_a === "kelvin") {
                $valore_finale = $tempC + 273.15;
            }

            if($risultato === ""){
                $risultato = "Risultato: <strong>" . round($valore_finale, 2) . " °$scala_a</strong>";  
            }

        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Risultato conversione</title>
</head>
<body>
    <h2>Risultato della conversione</h2>
    <p><?php echo $risultato; ?></p>
</body>
</html>