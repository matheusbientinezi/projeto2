<?php
/*
 * @author Cesar Szpak - Celke - cesar@celke.com.br
 * @pagina desenvolvida usando FullCalendar,
 * o código é aberto e o uso é free,
 * porém lembre-se de conceder os créditos ao desenvolvedor.
 */

include 'connect.php';


$query_events = "SELECT a.id,a.status, b.nome,c.procedimento, d.funcionario, a.data_agendada, a.hora_inicio,a.hora_final
FROM agenda a
INNER JOIN cliente b on a.id_cliente = b.id
INNER JOIN procedimento c on a.id_procedimento = c.id
INNER JOIN funcionario d on a.id_funcionario = d.id";


$resultado_events = $pdo->prepare($query_events);
$resultado_events->execute();


$eventos = [];

while($row_events = $resultado_events->fetch(PDO::FETCH_ASSOC)){
    $id = $row_events['id'];
    $procedimento = $row_events['procedimento'];
    $status = $row_events['status'];
    $hora_inicio = $row_events['hora_inicio'];
    $hora_final = $row_events['hora_final'];
    
    $eventos[] = [
        'id' => $id, 
        'procedimento' => $procedimento, 
        'status' => $status, 
        //start é hora inicio
        'start' => $hora_inicio, 
        'hora_final' => $hora_final, 
        ];
}


echo json_encode($eventos);