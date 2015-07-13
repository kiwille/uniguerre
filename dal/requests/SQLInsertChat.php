<?php


class SQLInsertChat extends SqlWrite {
    
    private $chat;
    
    public function __construct(\Chat $chat) {
        $this->chat = $chat;
    }
    
    protected function parametres() {
        $parametres = new Parameters();
        $parametres->add(T_Chat::id_sender, $this->chat->id_sender);
        $parametres->add(T_Chat::id_recipients, $this->chat->id_recipients);
        $parametres->add(T_Chat::msg, $this->chat->msg);
        $parametres->add(T_Chat::time_msg, $this->chat->time_msg);
        
        return $parametres;
    }

    protected function requeteSQL() {
        $requete = "INSERT INTO {table1} ( ";
        $requete .= T_Chat::id_sender . ", ";
        $requete .= T_Chat::id_recipients . ", ";
        $requete .= T_Chat::msg . ", ";
        $requete .= T_Chat::time_msg;
        $requete .= " ) VALUES (";
        $requete .= "   :" . T_Chat::id_sender . ", ";
        $requete .= "   :" . T_Chat::id_recipients . ", ";
        $requete .= "   :" . T_Chat::msg . ", ";
        $requete .= "   :" . T_Chat::time_msg . " ";
        $requete .= " );";
        
        return $requete;
    }

    protected function tables() {
        return array(T_Chat::NAME_TABLE);
    }

}
