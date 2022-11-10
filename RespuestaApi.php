<?php
class Consumidor{
    public function ConsumirApi($url)
    {
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $url);
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, TRUE);
        $Respuesta = curl_exec($conexion);
        curl_close($conexion);
        $json= json_decode($Respuesta, TRUE);
        return $json;
    }
}