<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlgoritmoBombilla extends Controller
{
    public $cuartoiluminado = array();

    public function getBombillas(Request $request){
        $cuarto = [
            [0,0,0,0,0],
            [0,0,0,1,1],
            [0,0,1,1,1],
            [0,0,1,0,0],
            [0,0,0,0,0],
        ];

        $bombillas = 0;

        $this->cuartoiluminado = $cuarto;

        $posicionVertical = 0;
        do {
            $posicionHorizontal = 0;
            do {

                if(!$this->esPared($cuarto[$posicionVertical][$posicionHorizontal])){

                    if(!$this->hayParedEnSiguienteCasilla($cuarto[$posicionVertical], $posicionHorizontal)){

                        if(!$this->hayParedAbajoDeLaCasilla($cuarto, $posicionVertical, $posicionHorizontal)){

                            if(!$this->hayBombillaEnLaCasillaAnterior($cuarto, $posicionVertical, $posicionHorizontal)){

                                if(!$this->estaIluminadoEnLaCasillaAnterior($cuarto, $posicionVertical, $posicionHorizontal)){

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
            } while ($posicionHorizontal < count($cuarto[$posicionVertical]));
            $posicionVertical++;
        } while ($posicionVertical < count($cuarto));
    }

    private function esPared($cuarto){
        if($cuarto == 1){
            return true;
        }
        return false;
    }

    private function hayParedEnSiguienteCasilla($cuarto,$horizontal){
        $horizontal++;
        if($horizontal < count($cuarto)){
            if($cuarto[$horizontal] == 1){
                return true;
            }
        }
        return false;
    }

    private function hayParedAbajoDeLaCasilla($cuarto,$vertical,$horizontal){
        $vertical++;
        if($vertical < count($cuarto)){
            if($cuarto[$vertical][$horizontal] == 1){
                return true;
            }
        }
        return false;
    }

    private function hayBombillaEnLaCasillaAnterior($cuarto,$vertical,$horizontal){
        $horizontal--;
        //si son menos a 0 no hay nada
        if(!$horizontal < 0){
            if($cuartoiluminado[$vertical][$horizontal] == 3){
                return true;
            }
            return false;
        }
        return false;
    }


    private function estaIluminadoEnLaCasillaAnterior($cuarto,$vertical,$horizontal){
        $horizontal--;
        //si son menos a 0 no hay nada
        if(!$horizontal < 0){
            if($cuartoiluminado[$vertical][$horizontal] == 2){
                return true;
            }
            return false;
        }
        return false;
    }

    private function hayBombillaArribaDeLaCasilla($cuarto,$vertical,$horizontal){
        $vertical--;
        //si son menos a 0 no hay nada
        if(!$vertical < 0){
            if($cuartoiluminado[$vertical][$horizontal] == 3){
                return true;
            }
            return false;
        }
        return false;
    }

    private function estaIluminadoArribaDeLaCasilla($cuarto,$vertical,$horizontal){
        $vertical--;
        //si son menos a 0 no hay nada
        if(!$vertical < 0){
            if($cuartoiluminado[$vertical][$horizontal] == 2){
                return true;
            }
            return false;
        }
        return false;
    }
}
