<?php

/**
 * Classe chat
 */
Class Chat
{
	private $_msgid;
	private $_idsender;
	private $_idrecipients;
	private $_msg;
	private $_timemsg;
	
	/* pour l'instant on met rien mais on c'est jamais */
	public function __construct($msgid,$idsender,$idrecipients,$msg,$timemsg)
	{
		$this->_msgid = $msgid;
		$this->_idsender = $idsender;
		$this->_idrecipients = $idrecipients;
		$this->_msg = $msg;
		$this->_timemsg = $timemsg;
		
    }
	
	public function GetMsgid()
	{
		return $this->_msgid;
	}
	
	public function GetIdsender()
	{
		return $this->_idsender;
	}
	
	public function GetIdrecipients()
	{
		return $this->_idrecipients;
	}
	
	public function GetMsg()
	{
		return $this->_msg;
	}
	
	public function GetTimemsg()
	{
		return $this->_timemsg;
	}

	public function SetMsgid($idmsg)
	{
		$this->_msgid = $idmsg;
	}
	
	public function SetIdsender($senderid)
	{
		$this->_idsender = $senderid;
	}
	
	public function SetIdrecipients($idrecipients)
	{
		$this->_idrecipients = $idrecipients;
	}
	
	public function SetMsg($msgs)
	{
		$this->_msg = $msgs;
	}
	
	public function SetTimemsg($timer)
	{
		$this->_timemsg = $timer;
	}
	
}