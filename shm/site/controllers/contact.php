<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class contact extends MY_Controller
{
    protected $rules = array(
        "send" => array(
            /*array(
                "field" => "title",
                "label" => "标题",
                "rules" => "trim|required"
            ),*/
            /*array(
                "field" => "company",
                "label" => "公司名称",
                "rules" => "trim|required"
            ),*/
            array(
                "field" => "username",
                "label" => "姓名",
                "rules" => "trim|required"
            ),
            array(
                "field" => "gender",
                "label" => "性别",
                "rules" => "trim|required"
            ),
            array(
                "field" => "email",
                "label" => "邮箱",
                "rules" => "trim|required|strtolower|valid_email"
            ),
            array(
                "field" => "telphone",
                "label" => "手机",
                "rules" => "trim|required|is_mobile"
            ),
            /*array(
                "field" => "fax",
                "label" => "传真",
                "rules" => "trim|numeric|required"
            ),*/
            array(
                "field" => "content",
                "label" => "内容",
                "rules" => "trim|required"
            ),
            /*array(
                "field" => "captcha",
                "label" => "验证码",
                "rules" => "trim|callback_captcha_verify"
            ),*/

        ),
    );

    public function __construct()
    {
        parent::__construct();
        $this->load->model('feedback_model', 'mfeedback');
        $this->model = &$this->mfeedback;
        $this->banner_id = 70;
        $this->seo_id = 69;
    }

    public function index()
    {
        $this->us();
    }

    public function us()
    {
        $data['header'] = header_seoinfo(72, 0);
        $data['banner'] = tag_photo(tag_single($this->banner_id, "photo"));
        $data['content'] = $this->getContentByColumnId(72);
        $data['route'] = $this->getContentByColumnId(75);

        $this->load->view('contact/index', $data);
    }

    public function application()
    {
        // seo
        $data['header'] = header_seoinfo(0, 0);
        $data['header']['title'] = $this->mcfg->get_config('site', 'title_suffix') . '-' . '入学申请';
        $data['banner'] = tag_photo(tag_single($this->banner_id, "photo"));

        $this->load->view('contact/application', $data);
    }

    public function recruitment($type = 0)
    {
        // seo
        $data['header'] = header_seoinfo(0, 0);
        $data['header']['title'] = $this->mcfg->get_config('site', 'title_suffix') . '-' . '企业招聘';
        $data['banner'] = tag_photo(tag_single($this->banner_id, "photo"));

        $data['types'] = $this->db->order_by('sort_id', 'asc')->get_where('coltypes', array('cid' => 84))->result_array();

        if ($type == 0) {
            $where = array('cid' => 84, 'audit' => 1);
            $data['active_type'] = false;
        } else {
            $where = array('cid' => 84, 'type_id' => $type, 'audit' => 1);
            $data['active_type'] = tag_coltypes($type);
        }
        $data['jobs'] = $this->db->order_by('sort_id', 'desc')->get_where('recruit', $where)->result_array();

        $this->load->view('contact/recruitment', $data);
    }

    // 数据提交
    public function sendpost()
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules($this->rules['send']);
            $vdata = array('status' => 0, 'msg' => '未知错误！');

            if ($this->form_validation->run() == FALSE) {
                // $vdata['msg'] = validation_errors();
                $errs = form_errors();
                $vdata ['msg'] = $errs;
            } else {
                // unset($_POST['captcha']);
                $data = $this->input->post();
                $data['content'] = str_replace("\n", "<br/>", $this->input->post('content', true));
                if ($this->model->create($data)) {
                    $vdata['status'] = 1;
                    $vdata['msg'] = "已经提交信息，我们会尽快回复您！";
                }
            }
            $this->output->set_content_type('application/json')->set_output(json_encode($vdata));
        } else {
            show_404();
        }
    }
}
