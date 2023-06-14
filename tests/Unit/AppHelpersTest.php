<?php

namespace Tests\Unit;

use App\Helpers\AesCtr;
use App\Helpers\AppHelpers;
use PHPUnit\Framework\TestCase;

class AppHelpersTest extends TestCase
{
    /** @test */
    public function updateRulesHelperTest(): void
    {
        // $this->assertTrue(true);

        /**
         * Array che simula le regole dello store di un model
         * 
         * @param array $rules
         * @var array
         */
        $arrStore = [
            "campo1" => 'required|integer',
            "campo2" => 'integer|nullable',
            "campo3" => 'string|max:45|nullable',
            "campo4" => 'required|string|max:45',
            "campo5" => 'integer|min:0|max:2|nullable',
            "campo6" => 'array|nullable',
            "campo7" => 'required|string|max:20|nullable'
        ];
        /**
         * Array che simula le regole per update di un model
         * E' il risultato finale desiderato dall'operazione
         * di trasformazione
         * 
         * 
         * @param array $rules
         * @var array
         */
        $arrUpdate = [
            "campo1" => 'integer',
            "campo2" => 'integer|nullable',
            "campo3" => 'string|max:45|nullable',
            "campo4" => 'string|max:45',
            "campo5" => 'integer|min:0|max:2|nullable',
            "campo6" => 'array|nullable',
            "campo7" => 'string|max:20|nullable'
        ];

        $arrTrasformato = AppHelpers::updateRulesHelper($arrStore);
        $this->assertEquals($arrUpdate, $arrTrasformato); // con assertEquals controllo che i parametri sono uguali
    }

    /**
     * Verfica se il $idRole ha un valore di 1 e quindi true
     * 
     * @param string $idRole
     * @return boolean
     */
    /** @test */
    public function isAdminTest()
    {
        $idRole = 1;
        $idRoleControllo = true;

        $idRoleRicevuto = AppHelpers::isAdmin($idRole);
        $this->assertEquals($idRoleControllo, $idRoleRicevuto);

        $idRole = 2;
        $idRoleControllo = false;

        $idRoleRicevuto = AppHelpers::isAdmin($idRole);
        $this->assertEquals($idRoleControllo, $idRoleRicevuto);

        $idRole = rand(2, 100);
        $idRoleControllo = true;
        $idRoleRicevuto = AppHelpers::isAdmin($idRole);
        $this->assertNotEquals($idRoleControllo, $idRoleRicevuto); //assertNotEquals è l'opposto di assertEquals

        $idRole = rand(1, 100);
        $idRoleControllo = ($idRole == 1) ? true : false;
        $this->assertEquals($idRoleControllo, $idRoleRicevuto);
    }

    /**
     * Verfica l'hash della password123
     * 
     * @param string $password
     * @param string $salt
     * @return string
     */
    /** @test */
    public function hiddenPasswordTest()
    {
        $password = 'password123';
        $salt = 'passwordSalt';

        $hashedPassword = AppHelpers::hiddenPassword($password, $salt);
        // dd($hashedPassword);


        $this->assertEquals('f7499446a965953884fb0191a7a84935f6d763441c5c2959de2528ff0b293ad210b03893c618ec245e31fc130f1e8e376cdf4b852186d994e49c5f753a38786c', $hashedPassword);
    }

    /**
     * verifica se essa restituisce la stringa originale dopo averla cifrata e decifrata.
     * 
     * @param string $text da cifrare
     * @param string $keyCrypted usata per cifrare
     * @return string crypt
     */
    /** @test */
    public function cryptTest()
    {
        $text = 'Rino The Best!';
        $keyCrypted = 'SecretJWT';

        $textCrypted = AppHelpers::crypt($text, $keyCrypted);

        // decodifica l'output in base64 per poterlo confrontare con il testo originale
        $decodedOutput = base64_decode($textCrypted);

        // decodifica l'output cifrato per poterlo confrontare con il testo originale
        $decryptedOutput = AesCtr::decrypt($decodedOutput, $keyCrypted, 256);

        $this->assertEquals($text, $decryptedOutput);
    }

    /**
     * verifica se essa restituisce correttamente il testo originale dopo averlo decifrato.
     * 
     * @param string $textCrypted decrypt
     * @param string $keyDecrypted use for decrypting
     * @return string decrypt
     */
    /** @test */
    public function decryptTest()
    {
        $textCrypted = base64_encode(AesCTR::encrypt('Rino The Best!', 'encryptedKey', 256));
        $keyDecrypted = 'encryptedKey';

        $decryptedText = AppHelpers::decrypt($textCrypted, $keyDecrypted);

        $this->assertEquals('Rino The Best!', $decryptedText);
    }

    /**
     * verifica se essa restituisce correttamente un array con i dati, il messaggio e l'errore specificati come argomenti.
     * 
     * @param array $data Data Request
     * @param string $message
     * @param array $errors
     * @return array
     */
    /** @test */
    public function answerCustomTest()
    {
        $data = ["pub" => "bar"];
        $message = "Rino The Best!";
        $error = "Rino Not The Best!";

        $result = AppHelpers::answerCustom($data, $message, $error);

        $this->assertIsArray($result); // Il metodo assertIsArray verifica se la variabile passata come primo argomento è un array.
        $this->assertArrayHasKey("data", $result); // Il metodo assertArrayHasKey invece verifica se la variabile array passata come primo argomento ha una determinata chiave.
        $this->assertEquals($data, $result["data"]);

        $this->assertArrayHasKey("message", $result);
        $this->assertEquals($message, $result["message"]);

        $this->assertArrayHasKey("error", $result);
        $this->assertEquals($error, $result["error"]);
    }
}
