<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlgoritmoBombilla extends Controller
{
    public $cuartoiluminado = array();

    public function getBombillas(Request $request){
        //Leer archivo y de ahi obtener el array para analizarlo

        $cuarto = $this->leerArchivo('archivo.txt');



        /*$cuarto = [
            [0,0,0,0],
            [0,0,0,1],
            [0,0,1,1],
            [1,0,0,0],
        ];*/

        //return $cuarto;
        $bombillas = 0;

        $this->cuartoiluminado = $cuarto;

        $posicionVertical = 0;

        ///return $this->cuartoiluminado;
        try {
            do {
                $posicionHorizontal = 0;
                do {
                    //return !$this->esPared($cuarto[$posicionVertical][$posicionHorizontal]);
                    if(!$this->esPared($cuarto[$posicionVertical][$posicionHorizontal])){

                        if(!$this->hayParedEnSiguienteCasilla($cuarto[$posicionVertical], $posicionHorizontal)){
                            //return 'No hay bombillas 2';
                            if(!$this->hayParedAbajoDeLaCasilla($cuarto, $posicionVertical, $posicionHorizontal)){

                                if(!$this->hayBombillaEnLaCasillaAnterior($cuarto, $posicionVertical, $posicionHorizontal)){

                                    if(!$this->estaIluminadoEnLaCasillaAnterior($cuarto, $posicionVertical, $posicionHorizontal)){

                                        if(!$this->hayBombillaArribaDeLaCasilla($cuarto, $posicionVertical, $posicionHorizontal)){

                                            if(!$this->estaIluminadoArribaDeLaCasilla($cuarto, $posicionVertical, $posicionHorizontal)){
                                                $bombillas++;
                                                $this->cuartoiluminado[$posicionVertical][$posicionHorizontal] = 3;
                                                //return $this->cuartoiluminado;
                                            } else {
                                                $this->cuartoiluminado[$posicionVertical][$posicionHorizontal] = 2;
                                            }
                                        } else {
                                            $this->cuartoiluminado[$posicionVertical][$posicionHorizontal] = 2;
                                        }
                                    } else {
                                        if(!$this->hayBombillaArribaDeLaCasilla($cuarto, $posicionVertical, $posicionHorizontal)){
                                            if (!$this->estaIluminadoArribaDeLaCasilla($cuarto, $posicionVertical, $posicionHorizontal)) {
                                                $bombillas++;
                                                $this->cuartoiluminado[$posicionVertical][$posicionHorizontal] = 3;
                                            } else {
                                                $bombillas++;
                                                $this->cuartoiluminado[$posicionVertical][$posicionHorizontal] = 3;
                                            }
                                        } else {
                                            $this->cuartoiluminado[$posicionVertical][$posicionHorizontal] = 2;
                                        }
                                    }
                                } else {
                                    $this->cuartoiluminado[$posicionVertical][$posicionHorizontal] = 2;
                                }
                            } else {

                                if (!$this->hayBombillaEnLaCasillaAnterior($cuarto, $posicionVertical, $posicionHorizontal)) {

                                    if (!$this->estaIluminadoEnLaCasillaAnterior($cuarto, $posicionVertical, $posicionHorizontal)) {

                                        if(!$this->hayBombillaArribaDeLaCasilla($cuarto, $posicionVertical, $posicionHorizontal)){
                                            if(!$this->estaIluminadoArribaDeLaCasilla($cuarto, $posicionVertical, $posicionHorizontal)){
                                                $bombillas++;
                                                $this->cuartoiluminado[$posicionVertical][$posicionHorizontal] = 3;
                                            } else {
                                                $this->cuartoiluminado[$posicionVertical][$posicionHorizontal] = 2;
                                            }
                                        } else {
                                            $this->cuartoiluminado[$posicionVertical][$posicionHorizontal] = 2;
                                        }
                                    } else{
                                        if (!$this->hayBombillaArribaDeLaCasilla($cuarto, $posicionVertical, $posicionHorizontal)) {
                                            if (!$this->estaIluminadoArribaDeLaCasilla($cuarto, $posicionVertical, $posicionHorizontal)) {
                                                $bombillas++;
                                                $this->cuartoiluminado[$posicionVertical][$posicionHorizontal] = 3;
                                            } else {
                                                $bombillas++;
                                                $this->cuartoiluminado[$posicionVertical][$posicionHorizontal] = 3;
                                            }
                                        } else {
                                            $this->cuartoiluminado[$posicionVertical][$posicionHorizontal] = 2;
                                        }
                                    }
                                } else {
                                    $this->cuartoiluminado[$posicionVertical][$posicionHorizontal] = 2;
                                }

                            }
                        } else {
                            if (!$this->hayParedAbajoDeLaCasilla($cuarto, $posicionVertical, $posicionHorizontal)) {

                                if (!$this->hayBombillaEnLaCasillaAnterior($cuarto, $posicionVertical, $posicionHorizontal)) {

                                    if (!$this->estaIluminadoEnLaCasillaAnterior($cuarto, $posicionVertical, $posicionHorizontal)) {
                                        if (!$this->hayBombillaArribaDeLaCasilla($cuarto, $posicionVertical, $posicionHorizontal)) {
                                            if (!$this->estaIluminadoArribaDeLaCasilla($cuarto, $posicionVertical, $posicionHorizontal)) {
                                                $bombillas++;
                                                $this->cuartoiluminado[$posicionVertical][$posicionHorizontal] = 3;
                                            } else {
                                                $this->cuartoiluminado[$posicionVertical][$posicionHorizontal] = 2;
                                            }
                                        } else {
                                            $this->cuartoiluminado[$posicionVertical][$posicionHorizontal] = 2;
                                        }
                                    } else {
                                        if (!$this->hayBombillaArribaDeLaCasilla($cuarto, $posicionVertical, $posicionHorizontal)) {
                                            if (!$this->estaIluminadoArribaDeLaCasilla($cuarto, $posicionVertical, $posicionHorizontal)) {
                                                $bombillas++;
                                                $this->cuartoiluminado[$posicionVertical][$posicionHorizontal] = 3;
                                            } else {
                                                $bombillas++;
                                                $this->cuartoiluminado[$posicionVertical][$posicionHorizontal] = 3;
                                            }
                                        } else {
                                            $this->cuartoiluminado[$posicionVertical][$posicionHorizontal] = 2;
                                        }
                                    }
                                } else {
                                    $this->cuartoiluminado[$posicionVertical][$posicionHorizontal] = 2;
                                }
                            } else {
                                if (!$this->hayBombillaEnLaCasillaAnterior($cuarto, $posicionVertical, $posicionHorizontal)) {

                                    if (!$this->estaIluminadoEnLaCasillaAnterior($cuarto, $posicionVertical, $posicionHorizontal)) {
                                        if(!$this->hayBombillaArribaDeLaCasilla($cuarto, $posicionVertical, $posicionHorizontal)){
                                            if(!$this->estaIluminadoArribaDeLaCasilla($cuarto, $posicionVertical, $posicionHorizontal)){
                                                $bombillas++;
                                                $this->cuartoiluminado[$posicionVertical][$posicionHorizontal] = 3;
                                            } else {
                                                $this->cuartoiluminado[$posicionVertical][$posicionHorizontal] = 2;
                                            }
                                        } else {
                                            $this->cuartoiluminado[$posicionVertical][$posicionHorizontal] = 2;
                                        }
                                    } else {
                                        if(!$this->hayBombillaArribaDeLaCasilla($cuarto, $posicionVertical, $posicionHorizontal)){
                                            if(!$this->estaIluminadoArribaDeLaCasilla($cuarto, $posicionVertical, $posicionHorizontal)){
                                                $bombillas++;
                                                $this->cuartoiluminado[$posicionVertical][$posicionHorizontal] = 3;
                                            } else {
                                                $bombillas++;
                                                $this->cuartoiluminado[$posicionVertical][$posicionHorizontal] = 3;
                                            }
                                        } else {
                                            $this->cuartoiluminado[$posicionVertical][$posicionHorizontal] = 2;
                                        }
                                    }
                                } else {
                                    $this->cuartoiluminado[$posicionVertical][$posicionHorizontal] = 2;
                                }
                            }
                        }
                    }
                    $posicionHorizontal++;
                } while ($posicionHorizontal < count($cuarto[$posicionVertical]));
                $posicionVertical++;
            } while ($posicionVertical < count($cuarto));
            return response()->json(['bombillas' => $bombillas,'cuarto' => $this->renderTable($cuarto),'cuartoiluminado' => $this->renderTable($this->cuartoiluminado)]);
        } catch (\Exception $th) {
            //throw $th;
            return $th->getMessage();
        }


    }

    public function esPared($cuarto){
        if($cuarto == 1){
            return "true";
        }
        return 0;
    }

    public function hayParedEnSiguienteCasilla($cuarto,$horizontal){
        $horizontal++;
        if($horizontal < count($cuarto)){
            if($cuarto[$horizontal] == 1){
                return "true";
            }
        }
        return 0;
    }

    public function hayParedAbajoDeLaCasilla($cuarto,$vertical,$horizontal){
        $vertical++;
        if($vertical < count($cuarto)){
            if($cuarto[$vertical][$horizontal] == 1){
                return "true";
            }
        }
        return 0;
    }

    public function hayBombillaEnLaCasillaAnterior($cuarto,$vertical,$horizontal){
        $horizontal--;
        //si son menos a 0 no hay nada
        if(!$horizontal < 0){
            if($cuartoiluminado[$vertical][$horizontal] == 3){
                return "true";
            }
            return 0;
        }
        return 0;
    }


    public function estaIluminadoEnLaCasillaAnterior($cuarto,$vertical,$horizontal){
        $horizontal--;
        //si son menos a 0 no hay nada
        if(!$horizontal < 0){
            if($cuartoiluminado[$vertical][$horizontal] == 2){
                return "true";
            }
            return 0;
        }
        return 0;
    }

    public function hayBombillaArribaDeLaCasilla($cuarto,$vertical,$horizontal){
        $vertical--;
        //si son menos a 0 no hay nada
        if(!$vertical < 0){
            if($cuartoiluminado[$vertical][$horizontal] == 3){
                return 0;
            }
            return 0;
        }
        return 0;
    }

    public function estaIluminadoArribaDeLaCasilla($cuarto,$vertical,$horizontal){
        $vertical--;
        //si son menos a 0 no hay nada
        if(!$vertical < 0){
            if($cuartoiluminado[$vertical][$horizontal] == 2){
                return 0;
            }
            return 0;
        }
        return 0;
    }


    /**
     * It takes an array of data, passes it to a view, and returns the rendered view as a string
     *
     * @param array The array you want to display in the table.
     *
     * @return The view is being returned.
     */
    public function renderTable($array){

        return view('table', compact('array'))->render();
    }

    /**
     * It reads a file and returns an array of the lines in the file
     *
     * @param archivo the file to read
     *
     * @return the array .
     */
    public function leerArchivo($archivo){
        $cuarto = file($archivo);

        for ($i = 0; $i < count($cuarto); $i++) {
            $cuarto[$i] = explode(",", $cuarto[$i]);
        }

        //quitamos los espacios en blanco
        for ($i = 0; $i < count($cuarto); $i++) {
            for ($j = 0; $j < count($cuarto[$i]); $j++) {
                $cuarto[$i][$j] = trim($cuarto[$i][$j]);
            }
        }

        //quitamos los /r /n
        for ($i = 0; $i < count($cuarto); $i++) {
            for ($j = 0; $j < count($cuarto[$i]); $j++) {
                $cuarto[$i][$j] = str_replace("\r", "", $cuarto[$i][$j]);
                $cuarto[$i][$j] = str_replace("\n", "", $cuarto[$i][$j]);
            }
        }
        return $cuarto;
    }
}
