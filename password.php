<?php

//~ creare un input per inserire la password che deve rispettare i seguenti criteri:
//~ - deve essere lunga almeno 8 caratteri
//~ -  deve contenere almeno un numero
//~ - deve contenere almeno un carattere speciale
//~ - deve contenere almeno una lettera maiuscola


function checkPassword(){
    
    do {
        $isValid = true;
        $password = readline('Inserisci la tua password: ');
        
        //~ VERIFICA NUMERO CARATTERI
        if (strlen($password) < 8) {
            echo 'La password deve contenere almeno 8 caratteri' . "\n";
            $isValid = false;
        }
        
        //~ VERIFICA CARATTERE NUMERICO
        $containNumber = false;
        for ($i=0; $i < strlen($password); $i++) {
            if (is_numeric($password[$i])) {
                $containNumber = true;
                break;
            }
        }
        if (!$containNumber) {
            echo 'La password deve contenere almeno un numero' . "\n";
            $isValid = false;
        }
        
        //~ VERIFICA CARATTERE SPECIALE
        $specialChars = ['!','?','@','#','%','&','+','-','_'];
        $containSpecialChars = false;
        for ($i=0; $i < strlen($password); $i++) {
            if (in_array($password[$i], $specialChars)) {
                $containSpecialChars = true;
                break;
            }
        }
        if (!$containSpecialChars) {
            echo 'La password deve contenere almeno uno dei seguenti caratteri speciali: ! ? @ # % & + - _' . "\n";
            $isValid = false;
        }
        
        //~ VERIFICA LETTERA MAIUSCOLA
        $containUpperChar = false;
        for ($i=0; $i < strlen($password); $i++) {
            if (ctype_upper($password[$i])) {
                $containUpperChar = true;
                break;
            }
        }
        if (!$containUpperChar) {
            echo 'La password deve contenere almeno una lettera maiuscola' . "\n";
            $isValid = false;
        }
    } while ($isValid == false);

    return $isValid;
}

$isValid = checkPassword();
var_dump ($isValid);
if ($isValid == true) {
    echo 'La password è valida';
}














?>