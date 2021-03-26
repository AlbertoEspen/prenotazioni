<?php
include_once "config.php";

/**
 * @param int $length Lunghezza in byte del codice generato
 * @return string Il codice generato sotto forma di stringa esadecimale
 * @throws Exception
 */
function crea_codice(int $length)
{
    $bytes = random_bytes($length);
    $codice = bin2hex($bytes);
    return $codice;
}

//Variabili valorizzate tramite POST
$codice_fiscale = $_POST['codice'];
$giorno = $_POST['giorno'];
$codice_univoco = crea_codice($LUNGHEZZA_CODICE);

//Controllo sul numero di persone per giorno
$sql = "SELECT COUNT(*) AS persone FROM prenotazioni WHERE giorno = :giorno_scelto";

//Query di inserimento preparata
$sql = "INSERT INTO prenotazioni VALUES(null, :codice_fiscale, :giorno,
:codice_univoco)";

//Inviamo la query al database che la tiene in pancia
$stmt = $pdo->prepare($sql);

//Inviamo i dati correnti che verranno messi al posto dei segnaposto
$stmt->execute(
    [
        'giorno_scelto' => $giorno
    ]
);



    //Ridirige il browser verso la pagina indicata nella location
//Serve come modo diretto per vedere attraverso il browser che la pagina
//ha effettivamente prodotto un risultato

//Reindirizza alla pagine che fornisce un codice univoco all'utente
header('Location:mostra_codice.php?codice=' . $codice_univoco);



