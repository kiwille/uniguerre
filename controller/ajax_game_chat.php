<?php

defined("EXEC") or die();

$msgs ="";
$json['error'] = '0';

$Allmsgs = ChatDAO::selectChat();
foreach ($Allmsgs as $UnMsgs)
{
	$MsgCollectif = explode(",",$UnMsgs['id_recipients']);
	if($MsgCollectif[0] == 0)
	{
		$i = 0;
		$msgs .="<div class=\"well well-sm\">".$UnMsgs['msg_id'] ." - ".$UnMsgs['id_sender']." - ".$UnMsgs['id_recipients']." - ".$UnMsgs['msg']." -".$UnMsgs['time_msg']."</div>";
		$recuparation['msgs'] = $msgs;
		$recup[$i] = $recuparation;
		$i++;
	}
}
$json['list'] = $recup; 
echo json_encode($json);
// $parse['msg'] = $msgs;
echo Page::construirePagePartielle('part_game_vuechat', $parse);

?>
