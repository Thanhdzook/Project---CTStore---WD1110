<?php 
    class MessagesModel extends DB{

        public function insertChat($data1 , $data2){
            $outgoing_id = $_SESSION['unique_id'];
            $incoming_id = mysqli_real_escape_string($this->con, $data1);
            $message = mysqli_real_escape_string($this->con, $data2);
            if(!empty($message)){
                $sql = "INSERT INTO messages (incomming_msg_id, outcomming_msg_id, msg)
                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')";
                mysqli_query($this->con, $sql) or die();
            }
        }
    
        public function getChat($data){
            $outgoing_id = $_SESSION['unique_id'];
            // $incoming_id = mysqli_real_escape_string($this->con, $data);
            $output = "";
            $sql = "SELECT * FROM messages LEFT JOIN account ON account.unique_id = messages.outcomming_msg_id
                    WHERE (outcomming_msg_id = {$outgoing_id} AND incomming_msg_id = {$data})
                    OR (outcomming_msg_id = {$data} AND incomming_msg_id = {$outgoing_id}) ORDER BY msg_id";
            $query = mysqli_query($this->con, $sql);
            if(mysqli_num_rows($query)>0){
                while ($row = mysqli_fetch_assoc($query)){
                    if($row['outcomming_msg_id'] === $outgoing_id){
                        $output .= '<div class="chat outgoing">
                                      <div class="details">
                                        <p>'.$row['msg'].'</p>
                                      </div>
                                    </div>';
                    } else {
                        $output .= '<div class="chat incoming">
                                      <div class="details">
                                        <p>'.$row['msg'].'</p>
                                      </div>
                                    </div>';
                    }
                }
            } else {
                $output .= "<div class='text'>Không có tin nhắn. Khi bạn có, tin nhắn sẽ hiện tại đây.</div>";
            }
            return $output;
        }

        public function getUser($data){
            $rs = '';
            $query = mysqli_query($this->con , $data);
            while($row = mysqli_fetch_assoc($query)){
                // select one last message
                $sql = "SELECT * FROM messages WHERE 
                                 (incomming_msg_id = ".$row['unique_id']." OR outcomming_msg_id = ".$row['unique_id'].") 
                             AND (outcomming_msg_id = ".$_SESSION['unique_id']." OR incomming_msg_id = ".$_SESSION['unique_id'].")
                             ORDER BY msg_id DESC LIMIT 1";
                $query2 = mysqli_query($this->con, $sql);
                $data = mysqli_fetch_assoc($query2);
    
                $last_mess = '';
                if(mysqli_num_rows($query2)>0){
                    $last_mess = $data['msg'];
                }else{
                    $last_mess = "Không có tin nhắn";
                }
    
                if(strlen($last_mess) > 28){
                    $last_mess = substr($last_mess, 0, 28) . '...';
                }
    
                // if you are the last rep person
                $you = "";
                if(isset($data['outcomming_msg_id'])){
                    ($_SESSION['unique_id'] == $data['outcomming_msg_id']) ? $you = "Bạn: " : $you = "";
                }
    
                // answerer activity
                // ($row['status'] == "Không hoạt động") ? $offline = "offline" : $offline = "";
    
                // content
                $rs .= '<a href="/Project---CTStore---WD1110/Messages/View_chat/'.$row["unique_id"].'">
                      <div class="content">
                        <div class="details">
                          <span>'.$row['full_name'].'</span>
                          <div>'.$you . $last_mess .'</div>
                        </div>
                      </div>
                    </a>';
            }
            return $rs;
        }

        public function getData(){
            $sql = "SELECT * FROM account WHERE NOT unique_id = {$_SESSION['unique_id']} ORDER BY  account_id DESC";
            $query = mysqli_query($this->con , $sql);
            $output = "";
    
            if(mysqli_num_rows($query) == 0){
                $output .= "Không có người dùng nào :((";
            }elseif(mysqli_num_rows($query)>0){
                $output = $this->getUser($sql);
            }
            return $output;
        }

        public function searchUser($data){
            $searchTerm = mysqli_real_escape_string($this->con, $data);
            $sql = "SELECT * FROM account 
                    WHERE NOT unique_id = {$_SESSION['unique_id']} 
                      AND (full_name LIKE '%{$searchTerm}%')";
            $output = "";
            $query = mysqli_query($this->con, $sql);
            if(mysqli_num_rows($query) > 0){
                $output .= $this->getUser($sql);
            }else{
                $output .= "Không tìm thấy người dùng liên quan đến từ khóa";
            }
            return $output;
        }
    }
?>