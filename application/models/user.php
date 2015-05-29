<?php
class User extends CI_model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('datatable');
        $this->load->library("session");

        $this->table = 'users';
    }

    function signin($email,$password) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array('email'=> $email, 'password' => $password));
        
        $user = $this->db->get()->row();

        if (count($user) && $user->id) {
            $this->session->set_userdata(array(
                'user_id'       => $user->id,
                'login_usertype'=>$user->user_type,
                'email'     =>$user->email,
                'first_name'    =>$user->first_name,
                'last_name' =>$user->last_name
            ));

           /* $data['last_login'] = date('Y-m-d H:i:s');
            $where['id']=$user->id;
            $this->updatedata('users',$data,$where);
            $this->session->set_userdata('ip_address',getIPaddress());

            $insert_data=array('admin_id'=>$user->id,'login_usertype'=>$user->user_type,'ip_address'=>$this->session->userdata('ip_address'),'login_time'=>date('Y-m-d H:i:s'));
            $insert_status=$this->user->createAdminSession($insert_data);*/

            if($this->session->userdata['email']!='')
            {
                    return $user->user_type;
            }
            else
            {
                    return 2;
            }
        } else {
            return 2;
        }
    }

    public function createAdminSession($data){
        try {
            $this->db->trans_begin();
            $insert = $this->db->insert('admin_sessions', $data);
            $insert_id = $this->db->insert_id();
            if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                return 0;
            }else{
                $this->db->trans_commit();
                $this->session->set_userdata(array('user_browse_session_id' => $insert_id));
                return $insert_id;
            }
        }catch (Exception $e) {
            $this->db->trans_rollback();
            return 0;
        }   
    }

    public function updateAdminSession($data,$id){
        try {
            $this->db->trans_begin();
            $insert = $this->db->update('admin_sessions', $data, array('id' => $id));
            if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                return 0;
            }else{
                $this->db->trans_commit();
                return 1;
            }
        } catch (Exception $e) {
            $this->db->trans_rollback();
            return 0;
        }
    }
    
    public function getUserByEmail($email){
        $this->db->select('b.*');
        $this->db->from($this->table.' as b');
        $this->db->where('email', $email);
        $query = $this->db->get();
        //echo $this->db->last_query();exit();
        $ret = $query->row();
        return $ret;
    }
    
    public function insert_data($table,$data){
        try{
            $this->db->trans_begin();
            $useradd=$this->db->insert($table,$data);
            if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                return 0;
            }else{
                $this->db->trans_commit();
                return 1;
            }
        } catch (Exception $e) {
            $this->db->trans_rollback();
            return 0;
        }                
    }
    
    public function signout(){
        $array_items = array('username' => $this->session->userdata['username'], 'user_id' => $this->session->userdata['user_id']);
        if($this->session->unset_userdata($array_items)){
            return 1;
    }else{
            return 0;
        }
    }
    
    public function getdata($table,$where=""){
        $this->db->select('*');
    if($where=""){
            $this->db->where($where);
    }
        $this->db->from($table);
    $query = $this->db->get();
    $ret = $query->result();
    return $ret;
    }

    public function getuserdata_like($table,$where){
        
        $this->db->select('id,concat(name,"(",email,")") name_email,name,email,age,height,stanford_code,weight,gender',FALSE);
    if(count($where)>0){
            $this->db->like($where); 
    }
    $this->db->from($table);
    $query = $this->db->get();
    $ret = $query->result_object(); 
    return $ret;
    }

    public function get_user_logdetail($where){
        
        $this->db->select("*");
    $this->db->join('user_page_views', 'user_page_views.page_id = app_pages.id');
    $this->db->from('app_pages');
    $this->db->where($where);
    $query = $this->db->get();
    $ret = $query->result_object(); 
    return $ret;
    }

    public function getadvices()
    {
        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();
        $ret = $query->result();
        return $ret;             
    }

    public function updatedata($table,$goals_data,$record_id){
    try {
            $this->db->trans_begin();
            $this->db->where($record_id);
            $this->db->update($table, $goals_data); 
            if ($this->db->trans_status() === FALSE){
        $this->db->trans_rollback();
        return 0;
            }else{
                $this->db->trans_commit();
                return 1;
            }
        } catch (Exception $e) {
            $this->db->trans_rollback();
            return 0;
        }                
    }
    public function getusersGrid($request,$user_data){
        $sql_details = array('user' => $this->db->username,'pass' => $this->db->password,'db'   => $this->db->database,'host' => $this->db->hostname);
        
        $columns = array(
                        array(  'db' => 'name',
                                'dt' => 0,
                                'formatter' => function( $d, $row ) {
                                    return ucwords(strtolower($d));
                }
                            ),
                        array(  'db' => 'email' ,
                                'dt' => 1,
                                'formatter' => function( $d, $row ) {
                                     return $d;
                                }
                             ),
                        array(  'db' => 'stanford_code' ,
                                'dt' => 2,
                                'formatter' => function( $d, $row ) {
                                    return $d;
                                }
                            ),
                        array(  'db' => 'gender' ,
                                'dt' => 3,
                                'formatter' => function( $d, $row ) {
                                    if($row['gender']==1){
                                            $action = "Male";
                                    }else{
                                            $action = "Female";
                                    }
                                    $return_value='<span >'.$action.'</span>';
                                    return $return_value;
                                }
                            ),
                        array(  'db' => 'age' ,
                                'dt' => 4,
                                'formatter' => function( $d, $row ) {
                                    return $d;
                                }
                            ),
                        array(  'db' => 'height' ,
                                'dt' => 5,
                                'formatter' => function( $d, $row ) {
                                    return $d;
                                }
                            ),
                        array(  'db' => 'weight' ,
                                'dt' => 6,
                                'formatter' => function( $d, $row ) {
                                    return $d;
                                }
                            ),
                        array(  'db' => 'consume_servings' ,
                                'dt' => 7,
                                'formatter' => function( $d, $row ) {
                                    return $d;
                                }
                            ),
                        array(  'db' => 'created_date' ,
                                'dt' => 8,
                                'formatter' => function( $d, $row ) {
                                   return $d;
                                }
                            )
            );
        
        
        $join="";
    $query_columns_array=array('name','email','username','stanford_code','id','created_date','gender','age','height','weight','consume_servings','created_date');
    $custom_where=array();
    $where ="where 1=1 ";
    
        if($user_data['search_type']==0){       //for normal search
            if($user_data['user_id']!=0){
                $custom_where[]='usr.id="'.$user_data['user_id'].'"';
            }
            if($user_data['created_date']!=0){
                $custom_where[]='DATE_FORMAT(usr.created_date,"%Y-%m-%d") ="'.$user_data['created_date'].'"';
            }
            if($user_data['age']!=0){
                $end=$user_data['age']+9;
                $start=$user_data['age'];
                $custom_where[]='(usr.age BETWEEN "'.$start.'" AND "'.$end.'")';
            }
        }else if($user_data['search_type']==1){ //for advanced search
            
            if(isset($user_data['created_date'])){
                $where .= ' AND DATE_FORMAT(usr.created_date,"%Y-%m-%d") ="'.$user_data['created_date'].'"';
            }
            if(isset($user_data['age'])){
                $end=$user_data['age']+9;
                $start=$user_data['age'];
                $where  .= ' AND (usr.age BETWEEN "'.$start.'" AND "'.$end.'") ';
            }
            if(isset($user_data['name'])){
                $where .= ' AND name LIKE "%'.$user_data['name'].'%"';
            }
            if(isset($user_data['email'])){
                $where .= ' AND email LIKE "%'.$user_data['email'].'%"';
            }
            if(isset($user_data['stanford_code'])){
                $where .= ' AND stanford_code LIKE "%'.$user_data['stanford_code'].'%" ';
            }
            if(isset($user_data['height'])){
                $where .= " AND substr(height,1,1) =".$user_data['height'];
            }
            if(isset($user_data['weight'])){
                $weight_next=$user_data['weight']+24;
                $where  .= ' AND (usr.weight BETWEEN "'.$user_data['weight'].'" AND "'.$weight_next.'") ';
            }
            if(isset($user_data['gender'])){
                $where .= ' AND gender = '.$user_data['gender'];
            }
        }

    $request['custom_where']=(count($custom_where)>0)?implode(" AND ",array_unique($custom_where)):'';
        $query_columns=implode(",",array_unique($query_columns_array));
        $sql_query='SELECT $query_columns from users usr'.$join.' '.$where;

        return datatable::simple( $request, $sql_details,$sql_query,$query_columns,$columns,false );
    
    }

    public function UpdateProfile($data,$id){

        try{
            $this->db->trans_start();
            $update=$this->db->update($this->table, $data, array('id' => $id));
            $this->db->trans_commit();
                return true;
        } catch (Exception $e) {
            $this->db->trans_rollback();
            return false;
        }
    }

    public function checkUserByParticipantID($participantid){
        $this->db->select('b.*');
        $this->db->from($this->table.' as b');
        $this->db->where('participant_id', $participantid);

        $query = $this->db->get();
        $ret = $query->row();
        if(count($ret)>0){
            return 1;
        }else{
            return 0;
        }
    }
        
    public function checkUserByEmail($email){
        $this->db->select('b.*');
        $this->db->from($this->table.' as b');
        $this->db->where('email', $email);

        $query = $this->db->get();
        $ret = $query->row();
        if(count($ret)>0){
            return 1;
        }else{
            return 0;
        }
    }

    public function insertParticipant($participant_array){
        $data = array(
            'password'=>md5($participant_array->password),
            'participant_id'=>$participant_array->participant_id,
            'first_name'=>$participant_array->first_name,
            'last_name'=>$participant_array->last_name,
            'phone'=>$participant_array->phone,
            'address'=>$participant_array->address,
            'city'=>$participant_array->city,
            'state'=>$participant_array->state,
            'zip'=>$participant_array->zip,
            'rec_status'=>1,
            'created_at'=>date('Y-m-d G:i:s'),
            'user_type'=> '0',
            'email'=>$participant_array->email
        );

        try {
            $this->db->trans_begin();
            $insert = $this->db->insert('users', $data);
            $insert_id = $this->db->insert_id();
        if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                return 0;
            }else{
                $this->db->trans_commit();
                $this->session->set_userdata(array('user_browse_session_id' => $insert_id));
                return $insert_id;
            }
        } catch (Exception $e) {
            $this->db->trans_rollback();
            return 0;
        }   
    }
    
    public function updateParticipant($participant_array){
        $data = array(
            'first_name'=>$participant_array->first_name,
            'last_name'=>$participant_array->last_name,
            'phone'=>$participant_array->phone,
            'address'=>$participant_array->address,
            'city'=>$participant_array->city,
            'state'=>$participant_array->state,
            'zip'=>$participant_array->zip,
            'modified_time'=>date('Y-m-d G:i:s'),
            'email'=>$participant_array->email
        );

        try {
            $this->db->trans_begin();
            $insert = $this->db->update('users', $data, array('participant_id' => $participant_array->participant_id));
            if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                return 0;
            }else{
                $this->db->trans_commit();
                return 1;
            }
        } catch (Exception $e) {
            $this->db->trans_rollback();
            return 0;
        }
    }
        
    public function updatePassword($email,$password){
        $data = array('password'=>md5($password));
        try {
            $this->db->trans_begin();
            $update = $this->db->update('users', $data, array('email' => $email));
            //echo $this->db->last_query();exit;
            if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                return 0;
            }else{
                $this->db->trans_commit();
                return 1;
            }
        } catch (Exception $e) {
            $this->db->trans_rollback();
            return 0;
        }
    }

    public function getParticipantsDetails($table,$columns,$where)
    {
        $this->db->select($columns);
        $this->db->from($table);
        $this->db->join('class_list', 'users.class = class_list.id', 'left');
        $this->db->where($where);

        $query = $this->db->get();
        $ret = $query->result();
        return $ret;             
    }
    public function myparticipants_details($table,$columns,$where)
    {
        $this->db->select($columns);
        $this->db->from($table);
        $this->db->join('class_names c', 'users.class = c.id');
        $this->db->where($where);

        $query = $this->db->get();
        $ret = $query->result();
        return $ret;             
    }
    public function getParticipantsList($where){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($where);
        $query = $this->db->get();
        $ret = $query->result_object();

        return $ret;
    }

    public function getClassDetails($table,$where=array())
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        $ret = $query->result();
       // $ret=$this->db->objectt
       // $ret=(array) $ret;
        //echo "<pre>";print_r($ret);exit;
        return $ret;             
    }
    public function create_class($data){
        $this->db->select('c.class_name');
        $this->db->from('class_list c');
        $this->db->like('c.class_name',$data['create_class_name']);
        $query = $this->db->get();
        $ret = $query->result();
        if(isset($ret) && count($ret)>0){
                return 2;
        }
        else{
            /*$this->db->select('u.id');
            $this->db->from('users u');
            $this->db->like('u.username',$data['class_health_educator']);
            $query = $this->db->get();
            $ret = $query->result();*/
            
            $data_array=array('class_name' => $data['create_class_name'],
                            'health_educator' => $data['class_health_educator'],
                            'location_id' => $data['location'],
                            'diet' => $data['diet'],
                            'class_time' => $data['class_time'],
                            'color' => $data['color'],
                        );

            $return=$this->db->insert('class_list',$data_array);
            $id=$this->db->insert_id();
            
            if(count($id)>0)
            { 
                //echo "<pre>";print_R($data);exit;
                for($i=0;$i<count($data['date']);$i++){
                    $data['date'][$i]=date('Y-m-d',strtotime($data['date'][$i]));
                    $this->db->select('c.dates,c.class_id');
                    $this->db->from('class_dates c');
                    $this->db->like('c.dates',$data['date'][$i],'c1.id',$id);
                
                    $this->db->join('class_list c1','c.class_id=c1.id');
                    $query = $this->db->get();
                    $ret = $query->result();
                
                    if(isset($ret)){ 
                        if(count($ret)>0){
                            $data_array[]=array('class_id' => $id,
                                'dates' => $data['date'][$i]);
                            $where=array('class_id' => $id);
                            $return=$this->db->update('class_dates',$data_array[$i],$where );
                        }else{
                            $data_array[]=array('class_id' => $id,'dates' => $data['date'][$i]);
                            $return=$this->db->insert('class_dates',$data_array[$i]);
                        }
                    }
                }
                return $return;
            }
        }
    }

    public function getDetailsGrid($request,$user_data)
  {

       $sql_details = array('user' => $this->db->username,'pass' => $this->db->password,'db'   => $this->db->database,'host' => $this->db->hostname);
      
      $columns = array(
                     array( 'db' => 'id', 
                       'dt' => 0,
                       'formatter' => function( $d, $row ) {
                             return ucwords(strtolower($d));
                          }
                    ),
                    array( 'db' => 'username', 
                       'dt' => 1,
                       'formatter' => function( $d, $row ) {
                        $return_value  =   
                                        $return_value  = '<form action="'.base_url().'index.php/admin/cohort/checklist" method="post" >';
                                        $return_value .= '<input type="hidden" value="'.$row[0].'" name="participant_id" >';
                                        $return_value .= '<input type="submit" class="a-color"style="background: none;border: none;" value="'.$d.'"></form>';
                                        return $return_value;
                          }
                    ),
                    array( 'db' => 'nickname', 
                       'dt' => 2,
                       'formatter' => function( $d, $row ) {
                             return ucwords(strtolower($d));
                          }
                    ),
                    array( 'db' => 'class', 
                       'dt' => 3,
                       'formatter' => function( $d, $row ) {
                             return ucwords(strtolower($d));
                          }
                    ),
                    array( 'db' => 'date_of_birth', 
                       'dt' => 4,
                       'formatter' => function( $d, $row ) {
                             return ucwords(strtolower($d));
                          }
                    ),
                    array( 'db' => 'email', 
                       'dt' => 5,
                       'formatter' => function( $d, $row ) {
                             return ucwords(strtolower($d));
                          }
                    ),
                     array( 'db' => 'home_phone', 
                       'dt' => 6,
                       'formatter' => function( $d, $row ) {
                             return ucwords(strtolower($d));
                          }
                    ),
                      array( 'db' => 'work_phone', 
                       'dt' => 7,
                       'formatter' => function( $d, $row ) {
                             return ucwords(strtolower($d));
                          }
                    ),
                       array( 'db' => 'cell_phone', 
                       'dt' => 8,
                       'formatter' => function( $d, $row ) {
                             return ucwords(strtolower($d));
                          }
                    ),
                    array( 'db' => 'created_at', 
                       'dt' => 9,
                       'formatter' => function( $d, $row ) {
                             return ucwords(strtolower($d));
                          }
                    )
        );
      $join="";
      $query_columns_array=array('id','username','nickname','class','date_of_birth','email','home_phone','work_phone','cell_phone','created_at');
      $custom_where=array();
      $where ="";
      $order_by=' order by id desc';

      $request['custom_where']=(count($custom_where)>0)?implode(" AND ",array_unique($custom_where)):'';
      $query_columns=implode(",",array_unique($query_columns_array));
      $sql_query='SELECT $query_columns from users where user_type="0"';

      return datatable::simple( $request, $sql_details,$sql_query,$query_columns,$columns,$order_by,'false' );
  }
   public function get_participant_videos($where){
    $query = $this->db->get_where('upload_videos',array('user_id'=> $where));
    //echo $this->db->last_query();exit;
    return $query->result();
   }
   public function get_participant_docs($where){
    $query = $this->db->get_where('upload_docs',array('user_id'=> $where));
    //echo $this->db->last_query();exit;
    return $query->result();
   }
   public function get_participant_Details($where){
    $query = $this->db->get_where('users',array('id'=> $where));
    
    return $query->result();
   }
    public function participant_Details(){
    //$query = $this->db->get_where('users',array('id'=> $where));
    //echo $this->db->last_query();exit;
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('class_names', 'users.class = class_names.id', 'left');
        $this->db->where('user_type','0');
        $query = $this->db->get();
        $ret = $query->result();
        
        return $ret;
      
   }
public function insertcsvcity($table,$data)
    {
                //  echo "<pre>"; print_r($data);exit;
      for($i=1;$i<count($data);$i++)
        {
            $date_of_birth[$i]=date("Y-m-d", strtotime($data[$i][3]));
        }
        for($i=1;$i<count($data);$i++)
        {
            if($data[$i][4]=='male')
            {
                $data[$i][4]='m';
            }
            else{
                $data[$i][4]='f';
            }
            $data_array[]=array('username' => $data[$i][0],
                                
                                'class' => $data[$i][3]);
            
        }
            //   echo "<pre>";print_r($data_array);exit;

                    $res=$this->db->update_batch('users',$data_array,'username'); 
//  echo $this->db->last_query();exit;
    }
    public function addUser($participant_array){
        try {
            $this->db->trans_begin();
            $insert = $this->db->insert('users', $participant_array);
            $insert_id = $this->db->insert_id();
            if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                return 0;
            }else{
                $this->db->trans_commit();
                return $insert_id;
            }
        } catch (Exception $e) {
            $this->db->trans_rollback();
            return 0;
        }   
    }

    public function UpdateProfilebyEmail($data,$email){
      
            $update=$this->db->update($this->table, $data, array('email' => $email));
            //echo $this->db->last_query();exit;
          if($update==1)
          {
            return 1;
        } else {
           
            return 0;
        }
    }
    public function delete_profile($data){
      
            $update=$this->db->update('users', array('profile_pic'=>$data['profile_pic']), array('email' => $data['email']));
           // echo $this->db->last_query();exit;
          if($update==1)
          {
            return 1;
        } else {
           
            return 0;
        }
    }

    public function insert_weight($data){
        try{
            $this->db->trans_begin();
            $useradd=$this->db->insert('participant_weight',$data);
            if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                return 0;
            }else{
                $this->db->trans_commit();
                return 1;
            }
        } catch (Exception $e) {
            $this->db->trans_rollback();
            return 0;
        }                
    }

    public function addAttendance($data){
        try{
            $this->db->trans_begin();
            $totcnt = count($data['participant_id']);
            for($a=0;$a<$totcnt;$a++) {
                $insarray = array();
                if($data['weight'][$a]!=''){    
                    $insarray['participant_id'] = $data['participant_id'][$a];
                    $insarray['participant_weight'] = $data['weight'][$a];
                    $insarray['participant_class'] = $data['class_val'];
                    $insarray['participant_date'] = $data['date'];
                    $insarray['participant_attend'] = $data['yes_'.$a];
                    //echo "<pre>";print_r($insarray);echo "<br>";
                    $useradd=$this->db->insert('participant_attendance',$insarray);
                }
            }
            //exit();
            
            if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                return 0;
            }else{
                $this->db->trans_commit();
                return 1;
            }
        } catch (Exception $e) {
            $this->db->trans_rollback();
            return 0;
        } 
    }
}