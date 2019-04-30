<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class news extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helpers('uisite_helper');
        $this->load->model('article_model');
        $this->banner_id = 65;
        $this->seo_id = 68;
    }

    public function index($type = 3, $page = 1)
    {
        // seo
        $data['header'] = header_seoinfo($this->seo_id, 0);
        $data['banner'] = tag_photo(tag_single($this->banner_id, "photo"));
        $data['bg_image'] = $this->getPhotoByColumnId(67);

        $data['types'] = $this->db->order_by('sort_id', 'asc')->get_where('coltypes', array('cid' => $this->seo_id))->result_array();
        $data['active_type'] = tag_coltypes($type);

        /*分页*/
        $config['base_url'] = SITE_URL . 'news/index/' . $type . '/';//分页地址
        $config['uri_segment'] = 4;//页码所在URI段
        //计算当前页面新闻总条数
        if ($type == 0) {
            $where = array('audit' => 1, 'cid' => $this->seo_id);
        } else {
            $where = array('audit' => 1, 'cid' => $this->seo_id, 'type_id' => $type);
        }
        $config['total_rows'] = $this->db->order_by("sort_id", "desc")->where($where)->from('article')->count_all_results();

        $config['per_page'] = 6;//每页显示的条数
        $config['use_page_numbers'] = TRUE;//默认分页URL中是显示每页记录数,启用use_page_numbers后显示的是当前页码。
        $config['cur_tag_open'] = '<a class="active">';
        $config['cur_tag_close'] = '</a>';
        $config['full_tag_open'] = '<div class="page">';
        $config['full_tag_close'] = '</div>';
        $config['last_link'] = false;
        $config['first_link'] = false;
        $config['num_links'] = 5;
        $config['cur_tag_open'] = '<a href="#" class="active">';
        $config['cur_tag_close'] = '</a>';
        $config['prev_link'] = '<';
        $config['next_link'] = '>';
        $config['num_tag_open'] = '';
        $config['num_tag_close'] = '';
        $config['prev_tag_open'] = '';
        $config['prev_tag_close'] = '';
        $config['next_tag_open'] = '';
        $config['next_tag_close'] = '';
        $data['fenye'] = $this->article_model->article_page($config, $page, $where);

        $this->load->view('news/index', $data);
    }

    public function show($id = 1)
    {
        $data['banner'] = tag_photo(tag_single($this->banner_id, "photo"));

        $data['info'] = $this->db->get_where('article', array('cid' => $this->seo_id, 'audit' => 1, 'id' => $id))->row_array();

        $data['types'] = $this->db->order_by('sort_id', 'asc')->get_where('coltypes', array('cid' => $this->seo_id))->result_array();
        $data['active_type'] = tag_coltypes($data['info']['type_id']);

        //点击率
        $click = $data['info']['click'];
        $click++;
        $update = array('click' => $click);
        $this->db->where('id', $data['info']['id']);
        $this->db->update('article', $update);

        // 关键词
        // $data['info']['tags'] = explode(',', $data['info']['tags']);

        // 关联产品
        // $data['relation_product'] = $this->db->order_by('sort_id', 'desc')->limit(2)->get_where('product', array('cid' => 34, 'audit' => 1, 'flag' => 1))->result_array();

        /*seo*/
        // $data['header'] = header_seoinfo($this->seo_id, 0);
        // $data['seo'] = $this->db->get_where('article', array('id' => $id))->row_array();//获取seo
        $data['header'] = array('title' => $data['info']['title_seo'], 'tags' => $data['info']['tags'], 'intro' => $data['info']['intro']);

        $data['updown'] = $this->article_model->change_type_page($id, $cid = $this->seo_id);

        $this->load->view('news/show', $data);
    }

    /*public function getList()
    {
        $page = $this->input->get('page');
        // $ctype=$this->input->get('ctype');
        $s = $page * 12;
        $list = $this->mnews->get_list(12, $s, array('sort_id' => 'desc'), array('cid' => 8, 'audit' => 1));
        $data['list'] = $list;

        $this->load->view('news/modelajax', $data);
    }*/
}
