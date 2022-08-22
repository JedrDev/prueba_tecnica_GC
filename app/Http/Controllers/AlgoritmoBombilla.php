<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlgoritmoBombilla extends Controller
{
    public $cuartoiluminado = array();

    public function getBombillas(Request $request){
        //Leer archivo y de ahi obtener el array para analizarlo

        if (isset($request->file)) {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = $file->getPathname();
                $cuarto = $this->leerArchivo($filename);
            }else{
                $cuarto = $this->leerArchivo('archivo.txt');
            }

        }



        //return $cuarto;
        $bombillas = 0;

        $this->cuartoiluminado = $cuarto;

        $posicionVertical = 0;

        ///return $this->cuartoiluminado;
        try {
            do {
                $posicionHorizontal = 0;
                do {
                    switch ($cuarto[$posicionVertical][$posicionHorizontal]) {
                        case '1':
                            # No hago nada
                            break;
                        case '0':
                            if (!$this->verificarBombillaEnVertical($posicionVertical,$posicionHorizontal) && !$this->verificarBombillaEnHorizontal($posicionVertical,$posicionHorizontal)) {
                                $bombillas++;
                                $this->cuartoiluminado[$posicionVertical][$posicionHorizontal] = 3;
                            }
                            break;
                        default:
                            # code...
                            break;
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

    public function paredIzquierda ($x,$y){
        $y--;
        if ($y < 0) {
            return true;
        } else{
            if ($this->cuartoiluminado[$x][$y] == 1) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function paredDerecha ($x,$y){
        $y++;
        if ($y >= count($this->cuartoiluminado[$x])) {
            return true;
        } else{
            if ($this->cuartoiluminado[$x][$y] == 1) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function paredArriba ($x,$y){
        $x--;
        if ($x < 0) {
            return true;
        } else{
            if ($this->cuartoiluminado[$x][$y] == 1) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function paredAbajo ($x,$y){
        $x++;
        if ($x >= count($this->cuartoiluminado)) {
            return true;
        } else{
            if ($this->cuartoiluminado[$x][$y] == 1) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function verificarBombillaEnVertical($x,$y){
        //3 es para bombillas
        $hayBombilla = false;
        for ($i = 0; $i < count($this->cuartoiluminado); $i++) {
            if ($this->cuartoiluminado[$i][$y] == 3) {
                $hayBombilla = true;
            }

            if ($hayBombilla) {
                if (!$this->cuartoiluminado[$i][$y] == 3) {

                    if($this->paredAbajo($i,$y)){
                        $this->cuartoiluminado[$i][$y] = 2;
                        break;
                    }

                    $this->cuartoiluminado[$i][$y] = 2;
                }
            }
        }

        return $hayBombilla;
    }

    public function verificarBombillaEnHorizontal($x,$y){
        //3 es para bombillas
        $hayBombilla = false;
        for ($i = 0; $i < count($this->cuartoiluminado[$x]); $i++) {
            if ($this->cuartoiluminado[$x][$i] == 3) {
                $hayBombilla = true;
            }
            if ($hayBombilla) {
                if (!$this->cuartoiluminado[$x][$i] == 3) {
                    if($this->paredDerecha($x,$i)){
                        $this->cuartoiluminado[$x][$i] = 2;
                        break;
                    }
                    $this->cuartoiluminado[$x][$i] = 2;
                }
            }
        }
        return $hayBombilla;
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
