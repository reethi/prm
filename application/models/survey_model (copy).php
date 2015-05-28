<?php
class Survey_model extends CI_model {
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper('datatable');
		$this->load->library("session");
	}


public function getdata($table)
	{
		$this->db->select('*');
		$this->db->from($table);
		$query = $this->db->get();
        $ret = $query->result();
        return $ret;			 
	}

public function view_survey()
	{
		$this->db->select('group_concat(value) as data');
		//SELECT group_concat(value) FROM `` group by response_id;
		$this->db->from('redcap_data');
		$this->db->group_by('record');
		$this->db->where('project_id',15);
		$query = $this->db->get();

		$ret = $query->result_array();

		//echo '<pre>';print_r($ret);
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

	public function updatedata($table,$goals_data,$record_id)
	{
	  try {
                $this->db->trans_begin();
				//$this->db->where($record_id);
               		$this->db->where($record_id);
					$this->db->update($table, $goals_data); 

		        if ($this->db->trans_status() === FALSE)
		        {
		            $this->db->trans_rollback();
		            return 0;
		        }
		        else
		        {
		            $this->db->trans_commit();
		            return 1;
		        }
            } catch (Exception $e) {
                $this->db->trans_rollback();
                return 0;
        	}				 
	}

	public function getadviceGrid($request)
	{
	    $sql_details = array('user' => $this->db->username,'pass' => $this->db->password,'db'   => $this->db->database,'host' => $this->db->hostname);
		$request['searchcolumns']=array();
		  
		$columns = array(
						array( 'db' => 'advice_title', 
						       'dt' => 0,
							   'formatter' => function( $d, $row ) {
											   return ucwords(strtolower($d));
											}
							),
						array( 'db' => 'advice_description' ,
	        					'dt' => 1,
							   'formatter' => function( $d, $row ) {
											   return $d;
											}
							),
						array( 'db' => 'rec_status' ,
	        					'dt' => 2,
							   'formatter' => function( $d, $row ) {
							   					if($row['rec_status']==1){
							   						$action = "Active";
													$action_class='class="btn btn-info btn-success btn-sm"';
							   					}else{
							   						$action = "Inactive";
													$action_class='class="btn btn-info btn-danger btn-sm"';
							   					}
												$return_value='<span id="action_'.$row['id'].'"><button  '.$action_class.' onclick=adviceGridstatus('.$row['id'].','.$row['rec_status'].'); >'.$action.'</button></span>';
											   return $return_value;
											}
							),
						array( 'db' => 'id' ,
	        					'dt' => 3,
							   'formatter' => function( $d, $row ) {
												$return_value  = '<form action="'.base_url().'index.php/testforms/admin/advices_edit" method="post" >';
												$return_value .= '<input type="hidden" value="'.$d.'" name="advice_id" >';
												$return_value .= '<button class="btn btn-xs btn-info" type="submit">Edit</button></form>';
											   return $return_value;
											}
							)
					);
		
		
		    $join="";
			$query_columns_array=array('id','advice_title','advice_description','rec_status');
		 	
			$custom_where=array();

		$request['custom_where']=(count($custom_where)>0)?implode(" AND ",array_unique($custom_where)):'';
        $query_columns=implode(",",array_unique($query_columns_array));
	    $sql_query='SELECT $query_columns from advice_cards adv '.$join;
	    return datatable::simple( $request, $sql_details,$sql_query,$query_columns,$columns,false );
	
	}	

	public function updatestatus($request)
	{

	  try {
                $this->db->trans_begin();
				if($request['status']==1)
				{
					$request['status']=0;
				}
				elseif($request['status']==0)
				{
					$request['status']=1;
				}
			    $data = array('rec_status' => $request['status']);
				$this->db->where('id', $request['id']);
				$this->db->update($request['tablename'], $data); 

		        if ($this->db->trans_status() === FALSE)
		        {
		            $this->db->trans_rollback();
		            return 0;
		        }
		        else
		        {
		            $this->db->trans_commit();
					return $request;
		        }
            } catch (Exception $e) {
                $this->db->trans_rollback();
                return 0;
        	}				 
	}

public function getGoalsGrid($request,$user_data)
	{
	     $sql_details = array('user' => $this->db->username,'pass' => $this->db->password,'db'   => $this->db->database,'host' => $this->db->hostname);
		  $request['searchcolumns']=array();
		  
		  $columns = array(
		  	array( 'db' => 'usr.name', 
					       'dt' => 0,
						   'formatter' => function( $d, $row ) {
										   return ucwords(strtolower($d));
										}
						  ),
					array( 'db' => 'stanford_code', 
					       'dt' => 1,
						   'formatter' => function( $d, $row ) {
										   return ucfirst(strtolower($d));
										}
						  ),
					array( 'db' => 'quantity', 
					       'dt' => 2,
						   'formatter' => function( $d, $row ) {
										   return $d;
										}
						  ),					
					array( 'db' => 'kinds' ,
        					'dt' => 3,
						   'formatter' => function( $d, $row ) {
										   return $d;
										}
						 ),
					array( 'db' => 'goal_created', 
					       'dt' => 4,
						   'formatter' => function( $d, $row ) {
						   				if(strlen($row['goal_modified'])>0){
						   					$d=$row['goal_modified'];
						   				}else{

						   				}
										   return ucfirst(strtolower($d));
										}
						  )
					
					);
		
		
		    $join="";
			$query_columns_array=array('usr.name','quantity','kinds','goal_date','stanford_code','user_id','goal.modified_date as goal_modified','goal.created_date as goal_created');
		 	
			$custom_where=array();
			$join.=" JOIN users usr ON goal.user_id=usr.id ";
			//$join.=" JOIN veg_items vegitem ON veglog.veg_item_id=vegitem.id ";
			
			if(isset($user_data['stanford_code'])){
				$custom_where[]='usr.stanford_code="'.$user_data['stanford_code'].'"';
			}
			if(isset($user_data['goal_date'])){
				$custom_where[]='goal.goal_date="'.$user_data['goal_date'].'"';
			}
			if(isset($user_data['user_id'])){
				$custom_where[]='goal.user_id="'.$user_data['user_id'].'"';
			}

		$request['custom_where']=(count($custom_where)>0)?implode(" AND ",array_unique($custom_where)):'';
        $query_columns=implode(",",array_unique($query_columns_array));
	    $sql_query='SELECT $query_columns from goals goal '.$join;
	    return datatable::simple( $request, $sql_details,$sql_query,$query_columns,$columns,false );
	
	}	

	public function getChallengesGrid($request,$user_data)
	{
	     $sql_details = array('user' => $this->db->username,'pass' => $this->db->password,'db'   => $this->db->database,'host' => $this->db->hostname);
		  $request['searchcolumns']=array();
		  
		  $columns = array(
		  	
				array( 'db' => 'usrs.name' ,
        					'dt' => 0,
						   'formatter' => function( $d, $row ) {
										return ucwords(strtolower($d));
										}
						 ),
				array( 'db' => 'usrs.stanford_code' ,
        					'dt' => 1,
						   'formatter' => function( $d, $row ) {
										return $d;
										}
						 ),

					array( 'db' => 'chlngs.challenge_name' ,
        					'dt' => 2,
						   'formatter' => function( $d, $row ) {
										   return $d;
										}
						 ),
					array( 'db' => 'pushed_chlngs.pushed_date' ,
        					'dt' => 3,
						   'formatter' => function( $d, $row ) {
						   					if($row['rec_status']==1)
						   					{
						   						$result=$d;
						   					}
						   					else{
						   						$result="---";
						   					}
										   return $result;
										}
						 ),
					array( 'db' => 'user_chlngs.challenge_date' ,
        					'dt' => 4,
						   'formatter' => function( $d, $row ) {
										   return $d;
										}
						 ),
					
					array( 'db' => 'user_chlngs.modified_date' ,
        					'dt' => 5,
						   'formatter' => function( $d, $row ) {
						   					if($row['rec_status']==1)
						   					{
						   						$result=$d;
						   					}
						   					else{
						   						$result="---";
						   					}
										   return $result;
										}
						 ),
					array( 'db' => 'user_chlngs.challenge_status_datetime' ,
        					'dt' => 6,
						   'formatter' => function( $d, $row ) {
						   					if($row['rec_status']==1)
						   					{
						   						$result=$d;
						   					}
						   					else{
						   						$result="---";
						   					}
										   return $result;
										}
						 )
					);
		
		
		    $join="";
			$query_columns_array=array('usrs.name','usrs.stanford_code','chlngs.challenge_name','user_chlngs.challenge_status','user_chlngs.user_id','user_chlngs.created_date','user_chlngs.challenge_date','pushed_chlngs.pushed_date','user_chlngs.modified_date','user_chlngs.challenge_status_datetime','user_chlngs.rec_status');
		 	
			$custom_where=array();

			$join.=" JOIN users usrs ON usrs.id=user_chlngs.user_id ";
			$join.=" JOIN challenges chlngs ON chlngs.id=user_chlngs.challenge_id ";
			$join.=" LEFT JOIN user_pushed_challenges pushed_chlngs ON pushed_chlngs.challenge_id=user_chlngs.challenge_id ";
			$custom_where[]='user_chlngs.challenge_status=1';
			if(isset($user_data['pushed_date'])){
				$custom_where[]='(  DATE_FORMAT(pushed_chlngs.pushed_date,"%Y-%m-%d")="'.$user_data['pushed_date'].'" OR 
									DATE_FORMAT(user_chlngs.created_date,"%Y-%m-%d")="'.$user_data['pushed_date'].'" OR
									DATE_FORMAT(user_chlngs.modified_date,"%Y-%m-%d")="'.$user_data['pushed_date'].'" OR
									DATE_FORMAT(user_chlngs.challenge_status_datetime,"%Y-%m-%d")="'.$user_data['pushed_date'].'"
									)';
			}
			if(isset($user_data['user_id'])){
				$custom_where[]='user_chlngs.user_id="'.$user_data['user_id'].'"';
			}
			if(isset($user_data['stanford_code'])){
				$custom_where[]='usrs.stanford_code="'.$user_data['stanford_code'].'"';
			}

		$request['custom_where']=(count($custom_where)>0)?implode(" AND ",array_unique($custom_where)):'';
        $query_columns=implode(",",array_unique($query_columns_array));
	    $sql_query='SELECT $query_columns from user_challenges user_chlngs '.$join;
	    return datatable::simple( $request, $sql_details,$sql_query,$query_columns,$columns,false );
	}	

	public function getAdvicesGrid($request,$user_data)
	{
	     $sql_details = array('user' => $this->db->username,'pass' => $this->db->password,'db'   => $this->db->database,'host' => $this->db->hostname);
		  $request['searchcolumns']=array();
		  
		  $columns = array(
		  	array( 'db' => 'usrs.name' ,
        					'dt' => 0,
						   'formatter' => function( $d, $row ) {
						   				return ucwords(strtolower($d));
										}
						 ),
		  	array( 'db' => 'usrs.stanford_code' ,
        					'dt' => 1,
						   'formatter' => function( $d, $row ) {
						   					return $d;
										}
						 ),
		  	array( 'db' => 'p_advices.pushed_date' ,
        					'dt' => 2,
						   'formatter' => function( $d, $row ) {
						   					return $d;
										}
						 ),
		  	array( 'db' => 'adv.advice_description',
        					'dt' => 3,
						   'formatter' => function( $d, $row ) {
						   					return $d;
						   				}
						 ),
		  	array( 'db' => 'adv_lk.rec_status' ,
        					'dt' => 4,
						   'formatter' => function( $d, $row ) {
						   					if($row['rec_status']==1)
						   					{
						   						$result=$d;
						   						if($result==1)
						   						{
						   							return 'Yes';
						   						}
						   						else
						   						{

						   						}
						   					}
						   					else{
						   						$result="No";
						   					}
										   return $result;
										}
						 ),
		  	
				array( 'db' => 'liked_date' ,
        					'dt' => 5,
						   'formatter' => function( $d, $row ) {
										   return $d;
										}
						 )			
									
					);
		
		
		    $join="";
			$query_columns_array=array('usrs.name','adv.advice_description','usrs.stanford_code','liked_date','adv_lk.rec_status','p_advices.pushed_date','adv_lk.user_id');
		 	
			$custom_where=array();
			
			$join.=" JOIN advice_cards adv ON adv.id=adv_lk.advice_id";
			$join.=" JOIN users usrs ON usrs.id=adv_lk.user_id";
			$join.=" JOIN user_pushed_advices  p_advices ON p_advices.advice_id=adv_lk.advice_id ";
			 if(isset($user_data['pushed_date'])){
				$custom_where[]='( DATE_FORMAT(p_advices.pushed_date,"%Y-%m-%d")="'.$user_data['pushed_date'].'" OR 
									DATE_FORMAT(liked_date,"%Y-%m-%d")="'.$user_data['pushed_date'].'" 
									)';
			}
			if(isset($user_data['user_id'])){
				$custom_where[]='adv_lk.user_id="'.$user_data['user_id'].'"';
			}

			if(isset($user_data['stanford_code'])){
				$custom_where[]='usrs.stanford_code="'.$user_data['stanford_code'].'"';
			}


		$request['custom_where']=(count($custom_where)>0)?implode(" AND ",array_unique($custom_where)):'';
        $query_columns=implode(",",array_unique($query_columns_array));
	    $sql_query='SELECT $query_columns from advices_liked adv_lk'.$join;
	    return datatable::simple( $request, $sql_details,$sql_query,$query_columns,$columns,false );
	
	}	

	public function userProgressGrid($request,$user_data)
	{
	     $sql_details = array('user' => $this->db->username,'pass' => $this->db->password,'db' => $this->db->database,'host' => $this->db->hostname);
		  $request['searchcolumns']=array();
		
		$columns = array(
		  	array( 'db' => 'usrs.name' ,
        					'dt' => 0,
						   'formatter' => function( $d, $row ) {
						   				return ucwords(strtolower($d));
										}
						 ),
		  	array( 'db' => 'stanford_code' ,
        					'dt' => 1,
						   'formatter' => function( $d, $row ) {
						   					return $d;
										}
						 ),
		  	array( 'db' => 'from_date' ,
        					'dt' => 2,
						   'formatter' => function( $d, $row ) {
						   					return $d;
										}
						 ),
		  	array( 'db' => 'to_date' ,
        					'dt' => 3,
						   'formatter' => function( $d, $row ) {
						   					return $d;
										}
						 ),
		  	array( 'db' => 'servingscount' ,
        					'dt' => 4,
						   'formatter' => function( $d, $row ) {
						   					return round($d,2);
										}
						 ),
		  	array( 'db' => 'kindscount' ,
        					'dt' => 5,
						   'formatter' => function( $d, $row ) {
						   					return round($d,2);
										}
						 ),
		  	array( 'db' => 'pointsaverage' ,
        					'dt' => 6,
						   'formatter' => function( $d, $row ) {
						   					return round($d,2);
										}
						 )
		  	
					);
			
		
		    $join="";
		    $from=$user_data["from_date"];
		    $to=$user_data["to_date"];
		    $date1 = new DateTime($from);
			$date2 = new DateTime($to);
			$diff = $date2->diff($date1)->format("%a");
			$avg_serving = "(CASE WHEN '$from'='$to' THEN SUM(servings_count)/1  ELSE SUM(servings_count)/$diff END)";
			$avg_points = "(CASE WHEN '$from'='$to' THEN SUM(points)/1  ELSE SUM(points)/$diff END)";
		    //$datescount=date_diff($to,$from);
			//$totaldates=$datescount->format("%R%a");
			//$query_columns_array=array('usrs.name',"'$from' as from_date","'$to' as to_date",'veglog_date','usrs.id','AVG(servings_count) as servingscount','usr_pnts.user_id as user_id','usr_pnts.category','count(veg_item_id)/count(distinct(veglog_date)) as kindscount','AVG(points) as pointsaverage');
			$query_columns_array=array('usrs.name',"'$from' as from_date",'stanford_code',"'$to' as to_date",'veglog_date','usrs.id',''.$avg_serving.' as servingscount','usr_pnts.user_id as user_id','usr_pnts.category','count(veg_item_id)/count(distinct(veglog_date)) as kindscount',''.$avg_points.' as pointsaverage');
			$custom_where=array();
			$where = "";

			if(isset($user_data['from_date'])){
				$where .= ' where  DATE_FORMAT(veglog_date,"%Y-%m-%d")>="'.$user_data['from_date'].'" AND
							DATE_FORMAT(veglog_date,"%Y-%m-%d")<="'.$user_data['to_date'].'" ';
			}else{
				return false;
			}

			$join.=' JOIN users usrs ON (usrs.id=veg.user_id and veg.servings_count!=0) ';
			$join.=' JOIN user_points usr_pnts ON (usr_pnts.user_id=usrs.id and usr_pnts.category=3)'.$where.' GROUP BY usr_pnts.user_id,veg.user_id ';
			 if(isset($user_data['user_id'])){
				$custom_where[]='usrs.id="'.$user_data['user_id'].'"';
			}

				//$custom_where[]='veglog.servings_count!=0';
			if(isset($user_data['stanford_code'])){
				$custom_where[]='stanford_code="'.$user_data['stanford_code'].'"';
			}

		$request['custom_where']=(count($custom_where)>0)?implode(" AND ",array_unique($custom_where)):'';
        $query_columns=implode(",",array_unique($query_columns_array));
	    $sql_query='SELECT $query_columns from veg_logging veg'.$join;
	    return datatable::simple( $request, $sql_details,$sql_query,$query_columns,$columns,false );
	
	}	

	public function userPageviewsGrid($request,$user_data)
	{
	     $sql_details = array('user' => $this->db->username,'pass' => $this->db->password,'db' => $this->db->database,'host' => $this->db->hostname);
		  $request['searchcolumns']=array();
		  
		  $columns = array(
		  	array( 'db' => 'usrs.name' ,
        					'dt' => 0,
						   'formatter' => function( $d, $row ) {
						   				return ucwords(strtolower($d));
										}
						 ),
		  	array( 'db' => 'stanford_code' ,
        					'dt' => 1,
						   'formatter' => function( $d, $row ) {
						   					return $d;
										}
						 ),
		  	array( 'db' => 'registered' ,
        					'dt' => 2,
						   'formatter' => function( $d, $row ) {
						   					return $d;
										}
						 ),
		  	array( 'db' => 'userid' ,
        					'dt' => 3,
						   'formatter' => function( $d, $row ) {
						   	$action='View More';
						   				$return_value='<button onclick="more_details('.$d.')" data-target="#more_details_popup" class="btn btn-sm btn-info">'.$action.'</button>';
											   return $return_value;
										}
						 )
		  	
					);
			
		
		    $join="";
			$query_columns_array=array('usrs.name','stanford_code','pages.page_title','time_spent','viewed_date','usrs.created_date as registered','usr_views.user_id as userid');
		 	
			$custom_where=array();
			$join.=' JOIN users usrs ON usrs.id=usr_views.user_id';			
			$join.=" JOIN app_pages pages ON usr_views.page_id=pages.id GROUP BY usr_views.user_id ";


			if(isset($user_data['log_date'])){
				$custom_where[]='DATE_FORMAT(usr_views.viewed_date,"%Y-%m-%d") ="'.$user_data['log_date'].'"';
			}
			if(isset($user_data['user_id'])){
				$custom_where[]='usr_views.user_id="'.$user_data['user_id'].'"';
			}
			if(isset($user_data['stanford_code'])){
				$custom_where[]='stanford_code="'.$user_data['stanford_code'].'"';
			}			
		$request['custom_where']=(count($custom_where)>0)?implode(" AND ",array_unique($custom_where)):'';
        $query_columns=implode(",",array_unique($query_columns_array));
	    $sql_query='SELECT $query_columns from user_page_views usr_views'.$join;
	    return datatable::simple( $request, $sql_details,$sql_query,$query_columns,$columns,false );	
	}


	
	public function userLeaderboardGrid($request,$user_data)
	{
	     $sql_details = array('user' => $this->db->username,'pass' => $this->db->password,'db' => $this->db->database,'host' => $this->db->hostname);
		  $request['searchcolumns']=array();
		
		$columns = array(
		  	array( 'db' => 'usrs.name' ,
        					'dt' => 0,
						   'formatter' => function( $d, $row ) {
						   				return ucwords(strtolower($d));
										}
						 ),
		  	array( 'db' => 'stanford_code' ,
        					'dt' => 1,
						   'formatter' => function( $d, $row ) {
						   					return $d;
										}
						 ),
		  	array( 'db' => 'score' ,
        					'dt' => 2,
						   'formatter' => function( $d, $row ) {
						   					return $d;
										}
						 ),
		  	array( 'db' => 'captured_date' ,
        					'dt' => 3,
						   'formatter' => function( $d, $row ) {
						   					return $d;
										}
						 ),
		  	array( 'db' => 'usrs.id' ,
        					'dt' => 4,
						   'formatter' => function( $d, $row ) {
						   	$action='View More';
						   			   
						   	$return_value='<input type="hidden" value="'.$row['captured_date'].'" id="capture_'.$row['ledbrd_id'].'"><button onclick="more_details('.$d.','.$row['ledbrd_id'].')" data-target="#more_details_popup" class="btn btn-sm btn-info">'.$action.'</button>';
							return $return_value;
							}
						 )
		  	
					);
			
		
		    $join="";
		    $captured_date=$user_data["captured_date"];
			$query_columns_array=array('usrs.name','stanford_code',"'$captured_date' as capture_date",'ledbrd.id as ledbrd_id','score','confederate','usrs.id','captured_date');
		 	
			$custom_where=array();
			$join.=' JOIN users usrs ON usrs.id=ledbrd.user_id ';
			//$join.=' JOIN user_points usr_pnts ON (usr_pnts.user_id=usrs.id and usr_pnts.category=3) GROUP BY usr_pnts.user_id,veg.user_id ';
			 if(isset($user_data['user_id'])){
				$custom_where[]='usrs.id="'.$user_data['user_id'].'"';
			}
			if(isset($user_data['stanford_code'])){
				$custom_where[]='stanford_code="'.$user_data['stanford_code'].'"';
			}			
				$custom_where[]='ledbrd.confederate=0';
			if(isset($user_data['captured_date'])){
				$custom_where[]=' DATE_FORMAT(captured_date,"%Y-%m-%d") ="'.$user_data['captured_date'].'"';
			}else{
				return false;
			}

		$request['custom_where']=(count($custom_where)>0)?implode(" AND ",array_unique($custom_where)):'';
        $query_columns=implode(",",array_unique($query_columns_array));
	    $sql_query='SELECT $query_columns from subject_leaderboard_data ledbrd'.$join;
	    return datatable::simple( $request, $sql_details,$sql_query,$query_columns,$columns,false );
	
	}

	public function Leaderboard_moredetails($where)
	{ 
		$this->db->select("user_id,rank,score,captured_date,servings,name,confederate");
		$this->db->join('users usr', 'ledbrd.user_id = usr.id');
		$this->db->from('subject_leaderboard_data ledbrd');
		$this->db->where('captured_date',"'".$where["captured_date"]."'",FALSE);
		unset($where["captured_date"]);
		$this->db->where($where);
		$query = $this->db->get();
		$ret = $query->result_object(); 
		return $ret;
	}
	

	public function userhomebar($request,$user_data)
	{
	     $sql_details = array('user' => $this->db->username,'pass' => $this->db->password,'db'   => $this->db->database,'host' => $this->db->hostname);
		  $request['searchcolumns']=array();
		  
		  $columns = array(
					array( 'db' => 'name', 
					       'dt' => 0,
						   'formatter' => function( $d, $row ) {
										   return ucfirst(strtolower($d));
										}
						  ),
					array( 'db' => 'stanford_code' ,
        					'dt' => 1,
						   'formatter' => function( $d, $row ) {
										   return $d;
										}
						 ),
					array( 'db' => 'kinds' ,
        					'dt' => 2,
						   'formatter' => function( $d, $row ) {
										   return $d;
										}
						 ),
					array( 'db' => 'servings', 
					       'dt' => 3,
						   'formatter' => function( $d, $row ) {
										   return ucfirst(strtolower($d));
										}
						  ),
					array( 'db' => 'challenge_points', 
					       'dt' => 4,
						   'formatter' => function( $d, $row ) {
										   return ucfirst(strtolower($d));
										}
						  ),
					array( 'db' => 'veglog_datetime', 
					       'dt' => 5,
						   'formatter' => function( $d, $row ) {
										   return ucfirst(strtolower($d));
										}
						  )
					);
		
		
		    $join="";
			$query_columns_array=array('user_id','name','stanford_code','kinds','servings','veglog_datetime','challenge_points','user_session_id');
		 	
			$custom_where=array();
			$join.=" JOIN veg_logging_timings  veglog_time ON usr.id=veglog_time.user_id ";

			if(isset($user_data['veglog_datetime'])){
				$custom_where[]='DATE_FORMAT(veglog_datetime,"%Y-%m-%d")="'.$user_data['veglog_datetime'].'"';
			}
			if(isset($user_data['user_id'])){
				$custom_where[]='veglog_time.user_id="'.$user_data['user_id'].'"';
			}
			if(isset($user_data['stanford_code'])){
				$custom_where[]='stanford_code="'.$user_data['stanford_code'].'"';
			}
		$request['custom_where']=(count($custom_where)>0)?implode(" AND ",array_unique($custom_where)):'';
        $query_columns=implode(",",array_unique($query_columns_array));
	    $sql_query='SELECT $query_columns from users usr '.$join;
	    return datatable::simple( $request, $sql_details,$sql_query,$query_columns,$columns,false );
	
	}

	public function getdata_selected($table,$select,$where="")
	{   	
		$this->db->select($select);
		if($where!=""){
			$this->db->where($where);
		}
		$this->db->from($table);
		$query = $this->db->get();
		$ret = $query->result();
		$data_array=objectToArray($ret);
		return $data_array;
	}
	public function SaveVideos($data){		
	   // print_r($data);exit;		
				
		$query = $this->db->get_where('upload_videos', array(		
	       	'video_type' => $data['files'],		
	       	'user_id' => $data['user_id']		
        ));		
	    //echo $this->db->last_query();exit;		
	    $count = $query->num_rows(); //counting result from query		
	    if ($count === 0) {		
	    	$data1=array(		
	    	'url' => $data['url'], 		
	       	'video_type' => $data['files'],		
	       	'title' => $data['title'],		
	       	'user_id' => $data['user_id']		
	    );		
	    $result = $this->db->insert('upload_videos', $data1);		
	}		
	    else{		
		//echo 'else';exit;		
		$sql="update upload_videos set video_type = '".$data['files']."', url = '".$data['url']."',title = '".$data['title']."' where video_type = '".$data['files']."'";		
	 	$result = $this->db->query($sql);		
	 	//echo $this->db->last_query();exit;		
	}		
		   if(!$result){		
		   		return false;		
		   	}		
		   else{		
		   		return true;		
			}		
	    		
	   // print_r($data1);exit;		
  }		
  public function getVideos(){		
  	$query = $this->db->get('upload_videos');		
  	return $query->result();		
 }		
 public function getDocs(){		
 	//echo 'hiiii';exit;		
  	$query = $this->db->get('upload_docs');		
  	return $query->result();		
 }	
 public function getClasses(){		
 	//echo 'hiiii';exit;		
  	$query = $this->db->get('class_names');		
  	return $query->result();		
 }		
 public function push_data(){		
 	$video_type = $this->input->post('video_type');		
	$class_push = $this->input->post('class_push');		
	$file_name = $this->input->post('doc_file');		
	$where = $this->input->post('class_push');		
			
	$sql="update users set video_type = '".$video_type."',file_name = '".$file_name."' where class = '".$class_push."'";		
	 $result = $this->db->query($sql);		
	 //echo $this->db->last_query();exit;		
	 if(!$result){		
		   		return false;		
		   	}		
		   else{		
		   		return true;		
			}		
 }		
public function save_docs($data){		
	    //print_r($data);exit;		
		$url = $this->input->post('url');		
		$title = $this->input->post('title');		
		$push_users_date = $this->input->post('push_users_date');		
		$class_name = $this->input->post('class_name');		
		//print_r($data1);exit;		
		//$result = implode(",", $data);		
		$query = $this->db->get_where('upload_docs', array(		
	       	'file_name' => $data['files'],		
	       	'user_id' => $data['user_id']		
        ));		
	    //echo $this->db->last_query();exit;		
	    $count = $query->num_rows(); //counting result from query		
	    if ($count === 0) {		
	    	$total_data=array(		
	    	'doc_url' => $url, 		
	       	'file_name' => $data['files'],		
	       	'doc_title' => $title,		
	       	'push_users_date' => $push_users_date,		
	       	'class' => $class_name,		
	       	'user_id' => $data['user_id']		
	    );		
	    $result = $this->db->insert('upload_docs', $total_data);		
	}		
	else{		
		//echo 'else';exit;		
		$sql="update upload_docs set file_name = '".$data['files']."',doc_url = '".$url."',doc_title = '".$title."' where file_name = '".$data['files']."'";		
	 	$result = $this->db->query($sql);		
	 	//echo $this->db->last_query();exit;		
	}		
		   if(!$result){		
		   		return false;		
		   	}		
		   else{		
		   		return true;		
			}		
	    		
  }

}

