<?php
    function CalcolaCognome($cognome)
    {
        $cognome = strtoupper($cognome);
        $cons = "";
        for($i=0; $i<strlen($cognome); $i++)
        {
            if($cognome[$i] != 'A' && $cognome[$i] !== 'E' && $cognome[$i] !== 'I' && $cognome[$i] !== 'O' && $cognome[$i] !== 'U')
                $cons .= $cognome[$i];
            if(strlen($cons) == 3)
                $i = strlen($cognome) + 1;
        }
        if(strlen($cons)<3)
        {
            for($i=0; i<strlen($cognome); $i++)
            {
                if($cognome[$i] == 'A' || $cognome[$i] == 'E' || $cognome[$i] == 'I' || $cognome[$i] == 'O' || $cognome[$i] == 'U') 
                    $cons .= $cognome[$i];
                if(strlen($cons) == 3)
                    $i = strlen($cognome) + 1;
            }
        }

        if(strlen($cons)<3)
        {
            for(;strlen($cons<3);)
                $cons .= 'x';
        }

        return $cons;
    }

    function CalcolaNome($nome)
    {
        $nome = strtoupper($nome);
        $cons = "";

        for($i=0; $i<strlen($nome); $i++) //controlla solo consonanti
        {
            if($nome[$i] !== 'A' && $nome[$i] !== 'E' && $nome[$i] !== 'I' && $nome[$i] !== 'O' && $nome[$i] !== 'U')    
            {
                $cons .= $nome[$i];
                
            }
            if(strlen($cons) == 3)
                $i = strlen($nome) + 1;
        }
        if(strlen($cons)<3) //controlla solo vocali
        {
            for($i=0; $i<strlen($nome); $i++)
            {
                if($nome[$i] == 'A' || $nome[$i] == 'E' || $nome[$i] == 'I' || $nome[$i] == 'O' || $nome[$i] == 'U') 
                    $cons .= $nome[$i];
                if(strlen($cons) == 3)
                    $i = strlen($nome) + 1;
            }
        }

        while(strlen($cons)<3) //aggiunge x
                $cons .= 'X';

        return $cons;
    }
        
    function Anno($anno){
        $annoStringa = substr($anno, -2);
        return $annoStringa;
    }

    function Mese($mese){
        $mesiLettera = array("A", "B", "C", "D", "E", "H", "L", "M", "P", "R", "S", "T");
        $lettera = $mesiLettera[$mese - 1];
        return $lettera;
    }

    function Giorno($giorno, $sesso){
        $giornoFinale = $giorno;
        if($sesso == 'F')
            $giornoFinale += 40;
        return $giornoFinale;
    }

    function Concat(){
        return Anno("2005").Mese('1').Giorno('10', 'M');
    }

    class MyChar {
        public $char;
        public $value;

        function __construct($char, $value) {
            $this->char = $char;
            $this->value = $value;
        }
    }

    $evenChars = array(new MyChar('A', 0), new MyChar('0', 0), new MyChar('B', 1), new MyChar('1', 1), new MyChar('C', 2),
                        new MyChar('2', 2), new MyChar('D', 3), new MyChar('3', 3), new MyChar('E', 4), new MyChar('4', 4), 
                        new MyChar('F', 5), new MyChar('5', 5), new MyChar('G', 6), new MyChar('6', 6), new MyChar('H', 7),
                        new MyChar('7', 7), new MyChar('I', 8), new MyChar('8', 8), new MyChar('J', 9), new MyChar('9', 9),
                        new MyChar('K', 10), new MyChar('L', 11), new MyChar('M', 12), new MyChar('N', 13), new MyChar('O', 14),
                        new MyChar('P', 15), new MyChar('Q', 16), new MyChar('R', 17), new MyChar('S', 18), new MyChar('T', 19),
                        new MyChar('U', 20), new MyChar('V', 21), new MyChar('W', 22), new MyChar('X', 23), new MyChar('Y', 24),
                        new MyChar('Z', 25));

    $oddChars = array(new MyChar('A', 1), new MyChar('0', 1), new MyChar('B', 0), new MyChar('1', 0), new MyChar('C', 5),
                        new MyChar('2', 5), new MyChar('D', 7), new MyChar('3', 7), new MyChar('E', 9), new MyChar('4', 9), 
                        new MyChar('F', 13), new MyChar('5', 13), new MyChar('G', 15), new MyChar('6', 15), new MyChar('H', 17),
                        new MyChar('7', 17), new MyChar('I', 19), new MyChar('8', 19), new MyChar('J', 21), new MyChar('9', 21),
                        new MyChar('K', 2), new MyChar('L', 4), new MyChar('M', 18), new MyChar('N', 20), new MyChar('O', 1),
                        new MyChar('P', 3), new MyChar('Q', 6), new MyChar('R', 8), new MyChar('S', 12), new MyChar('T', 14),
                        new MyChar('U', 16), new MyChar('V', 10), new MyChar('W', 22), new MyChar('X', 25), new MyChar('Y', 24),
                        new MyChar('Z', 23));

    $checkDigit = array(new MyChar('A', 0), new MyChar('B', 1), new MyChar('C', 2),
                        new MyChar('D', 3), new MyChar('E', 4), new MyChar('F', 5), 
                        new MyChar('G', 6), new MyChar('H', 7), new MyChar('I', 8), 
                        new MyChar('J', 9), new MyChar('K', 10), new MyChar('L', 11), 
                        new MyChar('M', 12), new MyChar('N', 13), new MyChar('O', 14),
                        new MyChar('P', 15), new MyChar('Q', 16), new MyChar('R', 17), 
                        new MyChar('S', 18), new MyChar('T', 19), new MyChar('U', 20), 
                        new MyChar('V', 21), new MyChar('W', 22), new MyChar('X', 23), 
                        new MyChar('Y', 24), new MyChar('Z', 25));

    function FinalCharacter($partialCode) {
        global $evenChars, $oddChars, $checkDigit;

        $sum = 0;
        for ($i = 0; $i < strlen($partialCode); $i++) {
            if (($i + 1)%2 == 0) {
                for ($j = 0; $j < count($evenChars); $j++) {
                    if ($partialCode[$i] == $evenChars[$j]->char) {
                        $sum += $evenChars[$j]->value;
                    }
                }
            }
            else {
                for ($j = 0; $j < count($oddChars); $j++) {
                    if ($partialCode[$i] == $oddChars[$j]->char) {
                        $sum += $oddChars[$j]->value;
                    }
                }
            }
        }

        $char;
        for ($i = 0; $i < count($checkDigit); $i++) {
            if ($sum%26 == $checkDigit[$i]->value) {
                $char = $checkDigit[$i]->char;
                break;
            }
        }

        return $char;
    }

    function searchCodiceCatastale($file, $nomeCitta, $sigla, $straniero) {
        $jsonArray = [];
        
        $json = file_get_contents($file);
        $jsonArray = array_merge($jsonArray, json_decode($json, true));

        foreach ($jsonArray as $citta) {
            if (($citta['nome'] === $nomeCitta && $straniero) || ($citta['nome'] === $nomeCitta && $citta['sigla'] === $sigla && !$straniero)) {
                if (!$straniero)
                    return $citta['codiceCatastale'];
                else
                    return $citta['codice'];
            }
        }

        return null;
    }

    function calcolaCodiceFiscale($cognome, $nome, $sesso, $giorno, $mese, $anno, $luogoNascita, $sigla, $straniero) {
        $codice = "";

        $codice .= CalcolaCognome($cognome);
        $codice .= CalcolaNome($nome);
        $codice .= Anno($anno);
        $codice .= Mese($mese);
        $codice .= Giorno($giorno, $sesso);

        $comuniItaliani = './codiciCatastali/comuni.json';
        $statiEsteri = './codiciCatastali/statiesteri.json';
        
        if (!$straniero)
            $codice .= searchCodiceCatastale($comuniItaliani, $luogoNascita, $sigla, $straniero);
        else
            $codice .= searchCodiceCatastale($statiEsteri, $luogoNascita, $sigla, $straniero);

        $codice .= FinalCharacter($codice);

        return $codice;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recupera i dati dal modulo
        $cognome = $_POST["cognome"];
        $nome = $_POST["nome"];
        $sesso = $_POST["sesso"];
        $giorno = $_POST["giorno"];
        $mese = $_POST["mese"];
        $anno = $_POST["anno"];
        $luogoNascita;
        $sigla;
        $luogo = $_POST['luogoNascita'];
        $parti = explode("(", $luogo);
        $straniero;
        
        if (count($parti) === 2) {
            $luogoNascita = trim($parti[0]);
            $sigla = strtoupper(trim(str_replace(')', '', $parti[1])));
            $straniero = false;
        } else {
            $luogoNascita = trim($_POST['luogoNascita']);
            $sigla = '';
            $straniero = true;
        }
        
        
        // Ora hai i dati e puoi eseguire le operazioni necessarie per calcolare il codice fiscale
        // Esempio di calcolo del codice fiscale (sostituiscilo con la tua logica):
        $codiceFiscaleCalcolato = calcolaCodiceFiscale($cognome, $nome, $sesso, $giorno, $mese, $anno, $luogoNascita, $sigla, $straniero);
        
        // Restituisci il codice fiscale come risposta  
        // $risposta = array("codiceFiscale" => $codiceFiscaleCalcolato);
        // header("Content-Type: application/json");
        // echo json_encode($risposta);
        // echo $codiceFiscaleCalcolato;
        setcookie("codice_fiscale_calcolato", $codiceFiscaleCalcolato);
        header("Location: index.html");
    } else {
        // La richiesta non è una richiesta POST, gestisci di conseguenza
        echo "Richiesta non valida.";
    }


    // $files = [$comuniItaliani, $statiEsteri];

    // if ($codiceCatastale) {
    //     echo "Codice Catastale di $nomeCitta: " . $codiceCatastale;
    // } else {
    //     echo "Città non trovata";
    // }

?>
