<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class product extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helpers('uisite_helper');
        $this->load->model('article_model');
        $this->banner_id = 33;
        $this->seo_id = 32;
    }

    public function index($type = 9, $page = 1)
    {
        // seo
        $data['header'] = header_seoinfo($this->seo_id, 0);
        $data['banner'] = tag_photo(tag_single($this->banner_id, "photo"));

        $data['active_type'] = tag_coltypes($type);

        if ($data['active_type']['fid'] == 0)
        {
            $fid = $data['active_type']['id'];
        }
        else
        {
            $fid = $data['active_type']['fid'];
        }

        $data['type_f'] = $this->db->order_by('sort_id', 'asc')->get_where('coltypes', array('cid' => 34, 'fid' => 0))->result_array();
        $data['type'] = $this->db->order_by('sort_id', 'asc')->get_where('coltypes', array('cid' => 34, 'fid' => $fid))->result_array();
        $data['type_ids'] = array();
        foreach ($data['type'] as $k => $v)
        {
            $data['type_ids'][] = $v['id'];
        }

        /*分页*/
        $config['base_url'] = SITE_URL . 'product/index/' . $type . '/';//分页地址
        $config['uri_segment'] = 4;//页码所在URI段
        //计算当前页面新闻总条数

        if ($data['active_type']['fid'] == 0)
        {
            $where = array('audit' => 1, 'cid' => 34);
            $config['total_rows'] = $this->db->where($where)->where_in('ctype', $data['type_ids'])->from('product')->count_all_results();
        }
        else
        {
            $where = array('audit' => 1, 'cid' => 34, 'ctype' => $type);
            $config['total_rows'] = $this->db->where($where)->from('product')->count_all_results();
        }


        $config['per_page'] = 4;//每页显示的条数
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
        if ($data['active_type']['fid'] == 0)
        {
            $data['fenye'] = $this->article_model->product_page($config, $page, $where, null, $data['type_ids']);
        }
        else
        {
            $data['fenye'] = $this->article_model->product_page($config, $page, $where);
        }

        if (!empty($data['fenye']['new_con']))
        {
            foreach ($data['fenye']['new_con'] as $key => $item)
            {
                $data['fenye']['new_con'][$key]['trait'] = explode(',', $item['trait']);
            }
        }


        $this->load->view('product/index', $data);
    }

    public function info($id = '')
    {
        $data['banner'] = tag_photo(tag_single($this->banner_id, "photo"));

        $data['info'] = $this->db->get_where('product', array('cid' => 34, 'audit' => 1, 'id' => $id))->row_array();
        $data['info_photo'] = $this->duo_img($data['info']['photo']);
        $data['info']['trait'] = explode(',', $data['info']['trait']);

        $data['active_type'] = tag_coltypes($data['info']['ctype']);

        if ($data['active_type']['fid'] == 0)
        {
            $fid = $data['active_type']['id'];
        }
        else
        {
            $fid = $data['active_type']['fid'];
        }

        $data['type_f'] = $this->db->order_by('sort_id', 'asc')->get_where('coltypes', array('cid' => 34, 'fid' => 0))->result_array();
        $data['type'] = $this->db->order_by('sort_id', 'asc')->get_where('coltypes', array('cid' => 34, 'fid' => $fid))->result_array();

        /*seo*/
        $data['header'] = header_seoinfo($this->seo_id, 0);
        $data['seo'] = $this->db->get_where('product', array('id' => $id))->row_array();//获取seo

        //关联产品
        $data['relation_product'] = $this->db->order_by('sort_id', 'desc')->limit(5)->get_where('product', array('cid' => 34, 'audit' => 1, 'ctype' => $data['active_type']['id']))->result_array();

        $data['updown'] = $this->article_model->product_change_type_page($id, $cid = 34);

        $this->load->view('product/info', $data);
    }

    public function search($page = 1)
    {
        // seo
        $data['header'] = header_seoinfo($this->seo_id, 0);
        $data['banner'] = tag_photo(tag_single($this->banner_id, "photo"));

        $data['type_f'] = $this->db->order_by('sort_id', 'asc')->get_where('coltypes', array('cid' => 34, 'fid' => 0))->result_array();
        $data['type'] = $this->db->order_by('sort_id', 'asc')->get_where('coltypes', array('cid' => 34, 'fid' => 9))->result_array();


        $search = $this->input->post('search');

        /*分页*/
        $config['base_url'] = SITE_URL . 'product/search/';//分页地址
        $config['uri_segment'] = 3;//页码所在URI段
        //计算当前页面新闻总条数

        $where = array('audit' => 1, 'cid' => 34);
        $config['total_rows'] = $this->db->where($where)->like('title', $search)->from('product')->count_all_results();


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
        $data['fenye'] = $this->article_model->product_page($config, $page, $where, array('title', $search));

        if (!empty($data['fenye']['new_con']))
        {
            foreach ($data['fenye']['new_con'] as $key => $item)
            {
                $data['fenye']['new_con'][$key]['trait'] = explode(',', $item['trait']);
            }
        }

        $this->load->view('product/search', $data);
    }


    function duo_img($photo)
    {
        if (empty($photo))
        {
            $img = '';
        }
        else
        {
            $img = array();
            if (strstr($photo, ','))
            {
                $img_id = explode(",", $photo);
                foreach ($img_id as $k => $v)
                {
                    $img_one = tag_photo($v);
                    $img[] = $img_one;
                }
            }
            else
            {
                $img_one = tag_photo($photo);
                $img['0'] = $img_one;
            }
        }
        return $img;
    }


    public function down($id = '')
    {
        $p_url = $this->db->get_where('upload', array('id' => $id))->row_array();
        if (count($p_url) < 1)
        {
            exit();
        }
        else
        {
            $url = $p_url['url'];
            $dir = UPLOAD_PATH . $url; //获取
            $PATH = dirname(dirname(dirname(dirname($dir)))) . '/';
            if ($PATH != UPLOAD_PATH)
            {
                echo 'forbidden';
                exit();
            }
            $file = fopen($dir, "r"); // 打开文件
            Header("Content-type: application/octet-stream");
            Header("Accept-Ranges: bytes");
            Header("Accept-Length: " . filesize($dir));
            Header("Content-Disposition: attachment; filename=" . $p_url['origin_name']);
            ob_clean();
            flush();
            echo fread($file, filesize($dir));
            fclose($file);
            exit;
        }
    }



//    public function modelajax()
//    {
//        $page = $this->input->get('page');
//        // $ctype=$this->input->get('ctype');
//        $s = $page * 12;
//        $list = $this->mnews->get_list(12, $s, array('sort_id' => 'desc'), array('cid' => 8, 'audit' => 1));
//        $data['list'] = $list;
//
//        $this->load->view('news/modelajax', $data);
//
//    }


}
