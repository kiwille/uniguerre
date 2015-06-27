<?php

defined("EXEC") or die();

/*$msgs ="";
$json['error'] = '0';

$Allmsgs = ChatDAO::selectChat();
foreach($Allmsgs as $UnMsgs)
{
	$msgs .="<div class=\"well well-sm\">". $UnMsgs->GetMsgid() ." - ".$UnMsgs->GetIdsender() ." - ". $UnMsgs->GetIdrecipients() ." - ". $UnMsgs->GetMsg() ." -". $UnMsgs->GetTimemsg() ."</div>";
}
print_r($msgs);
$parse['msg'] = $msgs;*/

echo Page::construirePagePartielle('part_game_vuechat', $parse);

?>
