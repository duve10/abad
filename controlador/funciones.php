<?php
 function escaparDatos($dato) {
    return preg_replace('/[^a-zA-Z0-9 ]/', '', $dato);
 }


?>