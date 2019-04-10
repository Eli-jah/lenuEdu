<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // seo
        $data['header'] = header_seoinfo(0, 0);

        $data['banner'] = $this->duo_img(tag_single(15, "photo"));

//        $data['product'] = $this->db->order_by('sort_id', 'desc')->limit(4)->get_where('product', array('cid' => 34, 'audit' => 1, 'flag' => 1))->result_array();
//
//        $data['product_11'] = $this->db->order_by('sort_id', 'desc')->limit(4)->get_where('product', array('cid' => 34, 'ctype' => 11, 'audit' => 1))->result_array();
//        $data['product_12'] = $this->db->order_by('sort_id', 'desc')->limit(4)->get_where('product', array('cid' => 34, 'ctype' => 12, 'audit' => 1))->result_array();
//        $data['product_13'] = $this->db->order_by('sort_id', 'desc')->limit(4)->get_where('product', array('cid' => 34, 'ctype' => 13, 'audit' => 1))->result_array();
//
//        $data['equipment'] = $this->db->order_by('sort_id', 'desc')->limit(6)->get_where('infos', array('cid' => 44, 'audit' => 1, 'flag' => 1))->result_array();
//
        $data['links'] = $this->db->order_by('sort_id', 'desc')->get_where('links', array('cid' => 95, 'audit' => 1))->result_array();
//
        $data['news'] = $this->db->order_by('sort_id', 'desc')->limit(3)->get_where('article', array('cid' => 31, 'audit' => 1, 'flag' => 1))->result_array();


//        $data['type_all'] = $this->db->order_by('sort_id', 'desc')->get_where('dealer', array('cid' => 55, 'audit' => 1))->result_array();

//        $data['product_flag'] = $this->db->order_by('sort_id', 'desc')->limit(4)->get_where('product', array('cid' => 34, 'audit' => 1, 'flag' => 1))->result_array();

//        $data['news'] = $this->db->select('article.*,coltypes.title as c_title')->order_by('article.sort_id', 'desc')->limit(3)->join('coltypes', 'coltypes.id = article.ctype')->get_where('article', array('article.cid' => 31, 'article.audit' => 1, 'article.flag' => 1))->result_array();


//        var_dump($data['banner']);
//        exit();

        $this->load->view('welcome', $data);

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


}
