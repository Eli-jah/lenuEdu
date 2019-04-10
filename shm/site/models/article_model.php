<?php
class article_model extends CI_Model{
		public $model;
		function __construct(){
			$this->model='article';
		}


    /*
     * article(文章分页)
     */
    public function infos_page($config,$page=1,$where){
        $this->load->library('pagination');//加载分页函数类
        $this->pagination->initialize($config);//初始化分页类
        $pagelink = $this->pagination->create_links();//创建分页链接
        if($config['total_rows']>0){
            //取出当前页的数据
            $data['info']=$this->db->where($where)->order_by("sort_id","desc")->
            limit($config['per_page'],($page-1)*$config['per_page'])->get('infos')->result_array();
            //循环过滤$data['info']中的数据
        }else{
            return false;
        }
        $data['pagelink'] = $pagelink;//将分页链接保存到$data数组
        $temp['pagelink']=$data['pagelink'];//将$data数组中的分页链接
        $temp['total']=$config['total_rows'];//将当前页面新闻总条数保存到$temp中传递
        $temp['new_con']=$data['info'];
        return $temp;
    }
		
		/*
		 * article(文章分页)
		 */
		public function article_page($config,$page=1,$where){
			$this->load->library('pagination');//加载分页函数类
			$this->pagination->initialize($config);//初始化分页类
			$pagelink = $this->pagination->create_links();//创建分页链接
			if($config['total_rows']>0){
				//取出当前页的数据
				$data['info']=$this->db->where($where)->order_by("sort_id","desc")->
				limit($config['per_page'],($page-1)*$config['per_page'])->get('article')->result_array();
				//循环过滤$data['info']中的数据
			}else{
				return false;
			}
			$data['pagelink'] = $pagelink;//将分页链接保存到$data数组
			$temp['pagelink']=$data['pagelink'];//将$data数组中的分页链接
			$temp['total']=$config['total_rows'];//将当前页面新闻总条数保存到$temp中传递
			$temp['new_con']=$data['info'];
			return $temp;
		}
		
		/*
		 * product(产品分页)
		 */
		public function product_page($config,$page=1,$where){
			$this->load->library('pagination');//加载分页函数类
			$this->pagination->initialize($config);//初始化分页类
			$pagelink = $this->pagination->create_links();//创建分页链接
			if($config['total_rows']>0){
				//取出当前页的数据
				$data['info']=$this->db->where($where)->order_by("sort_id","desc")->
											limit($config['per_page'],($page-1)*$config['per_page'])->get('product')->result_array();
				//循环过滤$data['info']中的数据
			}else{
				return false;
			}
			$data['pagelink'] = $pagelink;//将分页链接保存到$data数组
			$temp['pagelink']=$data['pagelink'];//将$data数组中的分页链接
			$temp['total']=$config['total_rows'];//将当前页面新闻总条数保存到$temp中传递
			$temp['new_con']=$data['info'];
			return $temp;
		}

		/*
		 * download(下载分页)
		 */
		public function download_page($config,$page=1,$where){
			$this->load->library('pagination');//加载分页函数类
			$this->pagination->initialize($config);//初始化分页类
			$pagelink = $this->pagination->create_links();//创建分页链接
			if($config['total_rows']>0){
				//取出当前页的数据
				$data['info']=$this->db->where($where)->order_by("sort_id","desc")->
				limit($config['per_page'],($page-1)*$config['per_page'])->get('download')->result_array();
				//循环过滤$data['info']中的数据
			}else{
				return false;
			}
			$data['pagelink'] = $pagelink;//将分页链接保存到$data数组
			$temp['pagelink']=$data['pagelink'];//将$data数组中的分页链接
			$temp['total']=$config['total_rows'];//将当前页面新闻总条数保存到$temp中传递
			$temp['new_con']=$data['info'];
			return $temp;
		}
		
		/*
		 * gallery(期刊分页)
		 */
		public function gallery_page($config,$page=1,$where){
			$this->load->library('pagination');//加载分页函数类
			$this->pagination->initialize($config);//初始化分页类
			$pagelink = $this->pagination->create_links();//创建分页链接
			if($config['total_rows']>0){
				//取出当前页的数据
				$data['info']=$this->db->where($where)->order_by("sort_id","desc")->
				limit($config['per_page'],($page-1)*$config['per_page'])->get('gallery')->result_array();
				//循环过滤$data['info']中的数据
			}else{
				return false;
			}
			$data['pagelink'] = $pagelink;//将分页链接保存到$data数组
			$temp['pagelink']=$data['pagelink'];//将$data数组中的分页链接
			$temp['total']=$config['total_rows'];//将当前页面新闻总条数保存到$temp中传递
			$temp['new_con']=$data['info'];
			return $temp;
		}

		
		
		/*
		 * coltypes(分类分页)
		 */
		public function coltypes_page($config,$where,$page=1){
			$this->load->library('pagination');//加载分页函数类
			$this->pagination->initialize($config);//初始化分页类
			$pagelink = $this->pagination->create_links();//创建分页链接
			
			if($config['total_rows']>0){
				//取出当前页的数据
				$data['info']=$this->db->where($where)->order_by("sort_id","asc")->
				limit($config['per_page'],($page-1)*$config['per_page'])->get('coltypes')->result_array();
				//循环过滤$data['info']中的数据
			}else{
				return false;
			}
			$data['pagelink'] = $pagelink;//将分页链接保存到$data数组
			$temp['pagelink']=$data['pagelink'];//将$data数组中的分页链接
			$temp['total']=$config['total_rows'];//将当前页面新闻总条数保存到$temp中传递
			$temp['new_con']=$data['info'];
			return $temp;
		}
		
		
		
		/*
		 * recruit(招聘分页)
		*/
		public function recruit_page($config,$page=1,$where){
			$this->load->library('pagination');//加载分页函数类
			$this->pagination->initialize($config);//初始化分页类
			$pagelink = $this->pagination->create_links();//创建分页链接
			if($config['total_rows']>0){
				//取出当前页的数据
				$data['info']=$this->db->where($where)->order_by("sort_id","desc")->
				limit($config['per_page'],($page-1)*$config['per_page'])->get('recruit')->result_array();
				//循环过滤$data['info']中的数据
			}else{
				$data['info']='';
			}
			$data['pagelink'] = $pagelink;//将分页链接保存到$data数组
			$temp['pagelink']=$data['pagelink'];//将$data数组中的分页链接
			$temp['total']=$config['total_rows'];//将当前页面新闻总条数保存到$temp中传递
			$temp['new_con']=$data['info'];
			return $temp;
		}
		
		
		/*
		 *(search_article)(搜索分页_文章)
		*/
		public function get_paging2($config,$page,$value){
			$this->load->library('pagination');//加载分页函数类
			$this->pagination->initialize($config);//初始化分页类
			$pagelink = $this->pagination->create_links();//创建分页链接
			if($config['total_rows']>0){
				//取出当前页的数据
				$PPP= ($page-1)*$config['per_page'];
				$data['info']=$this->db->query("SELECT * FROM shm_article where title like '%$value%' AND audit = 1 AND
						cid=4 ORDER BY sort_id desc limit $PPP,{$config['per_page']}")->result_array();
// 				$data['info']=$this->db->where($where)->order_by("sort_id","desc")->
// 				limit($config['per_page'],($page-1)*$config['per_page'])->get('article')->result_array();
				//循环过滤$data['info']中的数据
			}else{	
				return false;
			}
			$data['pagelink'] = $pagelink;//将分页链接保存到$data数组
			$temp['pagelink']=$data['pagelink'];//将$data数组中的分页链接
			$temp['total']=$config['total_rows'];//将当前页面新闻总条数保存到$temp中传递
			$temp['new_con']=$data['info'];
			return $temp;
		}

		/*
		 * ebook(电子书分页)
		*/
		public function get_ebook_paging($config,$page=1,$where){
			$this->load->library('pagination');//加载分页函数类
			$this->pagination->initialize($config);//初始化分页类
			$pagelink = $this->pagination->create_links();//创建分页链接
			if($config['total_rows']>0){
				//取出当前页的数据
				$data['info']=$this->db->where($where)->order_by("sort_id","desc")->limit($config['per_page'],($page-1)*$config['per_page'])->get('ebook')->result_array();
				//循环过滤$data['info']中的数据
			}else{
				return false;
			}
			$data['pagelink'] = $pagelink;//将分页链接保存到$data数组
			$temp['pagelink']=$data['pagelink'];//将$data数组中的分页链接
			$temp['total']=$config['total_rows'];//将当前页面新闻总条数保存到$temp中传递
			$temp['new_con']=$data['info'];
			return $temp;
		}

	/*
	 * 产品上下页_分类_product
	 */
	public function product_change_type_page($id,$cid){
		$data['one']=$this->db->get_where('product',array('id'=>$id,'cid'=>$cid,'audit'=>1))->row_array();
		//查询记录是否存在
		if(!empty($data['one'])){
			$sortId=$data['one']['sort_id'];
			//获取上一页的新闻
			$data['prev']= $this->db->where(array('sort_id <'=>$sortId,'ctype'=>$data['one']['ctype'],'audit'=>1))->order_by("sort_id","desc")->get('product')->row_array();
			//获取下一页的新闻
			$data['next']= $this->db->where(array('sort_id >'=>$sortId,'ctype'=>$data['one']['ctype'],'audit'=>1))->order_by("sort_id","asc")->get('product')->row_array();
			//返回上一页列表
			$data['back']=$this->db->where(array('id'=>$id,'ctype'=>$data['one']['ctype'],'audit'=>1))->get('product')->row_array();
		}
		return $data;
	}

	/*
	 * 期刊上下页_分类_gallery
	 */
	public function gallery_change_type_page($id,$cid){
		$data['one']=$this->db->get_where('gallery',array('id'=>$id,'cid'=>$cid,'audit'=>1))->row_array();
		//查询记录是否存在
		if(!empty($data['one'])){
			$sortId=$data['one']['sort_id'];
			//获取上一页的新闻
			$data['prev']= $this->db->where(array('sort_id <'=>$sortId,'ctype'=>$data['one']['ctype'],'audit'=>1))->order_by("sort_id","desc")->get('gallery')->row_array();
			//获取下一页的新闻
			$data['next']= $this->db->where(array('sort_id >'=>$sortId,'ctype'=>$data['one']['ctype'],'audit'=>1))->order_by("sort_id","asc")->get('gallery')->row_array();
			//返回上一页列表
			$data['back']=$this->db->where(array('id'=>$id,'ctype'=>$data['one']['ctype'],'audit'=>1))->get('gallery')->row_array();
		}
		return $data;
	}

	/*
     * 新闻上下页_分类_article
     */
	public function change_type_page($id,$cid){
		$data['one']=$this->db->get_where('article',array('id'=>$id,'cid'=>$cid,'audit'=>1))->row_array();
		//查询记录是否存在
		if(!empty($data['one'])){
			$sortId=$data['one']['sort_id'];
			//获取上一页的新闻
			$data['prev']= $this->db->where(array('sort_id <'=>$sortId,'ctype'=>$data['one']['ctype'],'audit'=>1))->order_by("sort_id","desc")->get('article')->row_array();
			//获取下一页的新闻
			$data['next']= $this->db->where(array('sort_id >'=>$sortId,'ctype'=>$data['one']['ctype'],'audit'=>1))->order_by("sort_id","asc")->get('article')->row_array();
			//返回上一页列表
			$data['back']=$this->db->where(array('id'=>$id,'ctype'=>$data['one']['ctype'],'audit'=>1))->get('article')->row_array();
		}
		return $data;
	}

	/*
	 * 新闻上下页_无分类_article
	*/
	public function change_page($id,$cid){
		$data['one']=$this->db->where(array('id'=>$id,'audit'=>1))->get('article')->row_array();
		//查询记录是否存在
		if(!empty($data['one'])){
			$data['sortId']=$data['one']['sort_id'];
			//获取上一页的新闻
			$data['prev']= $this->db->where(array('sort_id <'=>$data['sortId'],'cid'=>$cid,'audit'=>1))->order_by("sort_id","desc")->get('article')->row_array();
			//获取下一页的新闻
			$data['next']= $this->db->where(array('sort_id >'=>$data['sortId'],'cid'=>$cid,'audit'=>1))->order_by("sort_id","asc")->get('article')->row_array();
			//返回上一页列表
			$data['back']=$this->db->where(array('id'=>$id,'cid'=>$cid,'audit'=>1))->get('article')->row_array();
		}
		return $data;
	}

	/*
	 * 新闻上下页_无分类_product
	*/
	public function change_page_product($id,$cid){
		$data['one']=$this->db->where(array('id'=>$id,'audit'=>1))->get('product')->row_array();
		//查询记录是否存在
		if(!empty($data['one'])){
			$data['sortId']=$data['one']['sort_id'];
			//获取上一页的新闻
			$data['prev']= $this->db->where(array('sort_id <'=>$data['sortId'],'cid'=>$cid,'audit'=>1))->order_by("sort_id","desc")->get('product')->row_array();
			//获取下一页的新闻
			$data['next']= $this->db->where(array('sort_id >'=>$data['sortId'],'cid'=>$cid,'audit'=>1))->order_by("sort_id","asc")->get('product')->row_array();
			//返回上一页列表
			$data['back']=$this->db->where(array('id'=>$id,'cid'=>$cid,'audit'=>1))->get('product')->row_array();
		}
		return $data;
	}


	public function get_list($cid){
		//1.先判断有多个年
		$year=$this->db->query("SELECT YEAR(FROM_UNIXTIME(timeline)) as year FROM shm_article where cid = 69 AND audit = 1 GROUP BY YEAR(FROM_UNIXTIME(timeline)) ORDER BY year desc ")->result_array();
		//2.循环取出各个年下面的数据
		$data=array();
		foreach ($year as $k=>$item){
			$data[$item['year']]=$this->db->query("SELECT * FROM shm_article where cid = 69 AND audit = 1 AND YEAR(FROM_UNIXTIME(timeline)) = ".$item['year'])->result_array();
		}
		if(!empty($data)){
			foreach($data as $k=>$v){
				if(!empty($v['photo'])){
					$data[$k]['img']=$this->db->get_where('upload',array('id'=>$v['photo']))->row_array();
				}
			}
		}
		return $data;
	}

}
