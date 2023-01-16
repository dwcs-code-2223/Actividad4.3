<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Nota
 *
 * @author mfernandez
 */
class Nota {
    //put your code here
    private string $titulo;
    private string $descripcion;
    
    public function __construct(string $titulo, string $descripcion) {
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
    }

    
    public function getTitulo(): string {
        return $this->titulo;
    }

    public function getDescripcion(): string {
        return $this->descripcion;
    }
    public function __toString() {
        $cadena = $this->getTitulo(). "<br/>" . $this->getDescripcion();
        return $cadena;
    }


     
}
