<?php
    function mintadata($host, $port, $pesan){
        
        // create socket
        $socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
        //koneksi socket
        $result  = socket_connect($socket, $host, $port);
        //test socket connection
        if($result == false) return false; // apabila gagal

        // menguji koneksi
        socket_write($socket, $pesan, strlen($pesan));
        // tangkap respon dari nodeMCU
        $data_diterima = socket_read($socket, $port); // port 0 - 65.535
        //clpse socket
        socket_close($socket);

        return $data_diterima;
    }

    // eksekusi function
    $hasil = mintadata('...', '1223', 'minta');
    echo $hasil;
?>