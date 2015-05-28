<?php
class Export_data extends CI_model {
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper('datatable');
		$this->load->library("session");
	}


	public function exportdata_pageview()
	{
		//SELECT  usrs.name,pages.page_title,time_spent,viewed_date,usr_views.user_id as userid from user_page_views usr_views JOIN users usrs ON usrs.id=usr_views.user_id JOIN app_pages pages ON usr_views.page_id=pages.id GROUP BY usr_views.user_id
		$this->db->select('usrs.name as "User Name",pages.page_title as "Page Title",concat(time_spent) as "Time Spent",viewed_date as "Logged On"',FALSE);
		$this->db->from('user_page_views as usr_views');
		$this->db->join('users as usrs', 'usrs.id=usr_views.user_id');
		$this->db->join('app_pages as pages', 'usr_views.page_id = pages.id');
		$query = $this->db->get();
        $ret = $query->result();

        //echo $this->db->last_query();exit;
        //print_r($ret);
        return $ret;			 
	}

	public function exportdata_goals()
	{
		$create_coulmn = '(CASE WHEN `goal`.`modified_date` IS NULL THEN `goal`.`created_date`  ELSE `goal`.`modified_date` END)';
		$this->db->select('usr.name as "User Name",quantity as "Quantity",kinds as "Kinds",'.$create_coulmn.' as "Goal Date"');
		$this->db->from('goals goal');
		$this->db->join('users as usr','goal.user_id=usr.id');
		$query = $this->db->get();
		$ret = $query->result();
		return $ret;
	}

	public function exportdata_advicesliked()
	{
		$rec_status_coulmn = '(CASE WHEN `adv_lk`.`rec_status` =1 THEN "Liked"  ELSE "Not Liked" END)';
		$this->db->select('usrs.name as "User Name",adv.advice_description as "Advice Description",liked_date as "Liked Date",'.$rec_status_coulmn.' as "Status",p_advices.pushed_date as "Advices Pushed Date"');
		$this->db->from('advices_liked adv_lk');
		$this->db->join('advice_cards as adv','adv.id=adv_lk.advice_id');
		$this->db->join('users as usrs','usrs.id=adv_lk.user_id');
		$this->db->join('user_pushed_advices as p_advices','p_advices.advice_id=adv_lk.advice_id');
		$query = $this->db->get();
		        $ret = $query->result();
		        return $ret;

	}

	public function exportdata_veglog()
	{
	
		$this->db->select('name as "User Name",item_title as "Veggie Item",servings_count as "Quantity",veglog.created_date as "Veglog Date"');
		$this->db->from('users usr');
		$this->db->join('veg_logging as veglog','usr.id=veglog.user_id');
		$this->db->join('veg_items as vegitem','veglog.veg_item_id=vegitem.id');
		$query = $this->db->get();
		        $ret = $query->result();
		        return $ret;
    }

    public function exportdata_challenges()
	{
		$this->db->select('usrs.name as "User Name",chlngs.challenge_name as "Challenge Name",pushed_chlngs.pushed_date as "Pushed Challenge Date",user_chlngs.challenge_date as "Accepted Date",user_chlngs.modified_date as "Declined Date",user_chlngs.challenge_status_datetime as "Fullfilled Challenge Date"');
		$this->db->from('user_challenges as user_chlngs');
		$this->db->join('users as usrs', 'usrs.id=user_chlngs.user_id');
		$this->db->join('challenges as chlngs','chlngs.id=user_chlngs.challenge_id');
		$this->db->join('user_pushed_challenges as pushed_chlngs','pushed_chlngs.challenge_id=user_chlngs.challenge_id','LEFT');
		$this->db->where('user_chlngs.challenge_status = 1');
		$this->db->ORDER_BY('usrs.name ASC');	 
		$query = $this->db->get();
		        $ret = $query->result();
		        //echo $this->db->last_query();exit;
		        return $ret;
    }
    
    public function exportdata_users()
    {
    	$rec_status_coulmn = '(CASE WHEN `gender` =1 THEN "male"  ELSE "Female" END)';
    	$this->db->select('name as "User Name",email as "Email",stanford_code as "Stanford Code",created_date as "Resgister Date",'.$rec_status_coulmn.' as Gender,age as "Age",height as "Height",weight as "Weight",consume_servings as "Consume Servings"');
    	$this->db->from('users');
    	$this->db->ORDER_BY('name ASC');	 
		$query = $this->db->get();
		        $ret = $query->result();
		        return $ret;
    }

}