<?php

class SQLSelectChat extends SqlRead {
    
    protected function parametres() {
        return null;
    }

    protected function requeteSQL() {
        $requete = " SELECT ";
        $requete .= " * ";
        $requete .= " FROM {table1}";
        
        return $requete;
    }

    protected function tables() {
        return array(table_chat::NAME_TABLE);
    }

	protected function retours(\PDOStatement $req) {
        $row = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach($row as $key => $result)
		{
			if ($row) {
				$c = new Chat($result[table_chat::msg_id],
				$result[table_chat::id_sender],
				$result[table_chat::id_recipients],
				$result[table_chat::msg],
				$result[table_chat::time_msg]);
				$c->GetMsgid();
				$c->getIdSender();
				$c->GetIdrecipients();
				$c->GetMsg();
				$c->GetTimemsg();
				$tab[$key] = $c;
			}
		}
		return $tab;
    }
}

?>
