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
            array(
                "field" => "company",
                "label" => "公司名称",
                "rules" => "trim|required"
            ),
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
        $this->banner_id = 93;
        $this->seo_id = 92;
    }

    public function us()
    {
        $data['header'] = header_seoinfo($this->seo_id, 0);
        $data['banner'] = tag_photo(tag_single($this->banner_id, "photo"));

        // 青岛分公司
        $data['tsingtao'] = $this->db->get_where('page', array('cid' => 72))->row_array();
        $data['tsingtao']['titles'] = explode('|', $data['tsingtao']['intro']);
        $data['tsingtao']['photos'] = $this->multiImg($data['tsingtao']['photo']);

        // 济南分公司
        $data['jinan'] = $this->db->get_where('page', array('cid' => 72))->row_array();
        $data['jinan']['titles'] = explode('|', $data['jinan']['intro']);
        $data['jinan']['photos'] = $this->multiImg($data['jinan']['photo']);

        $this->load->view('contact/index', $data);
    }

    public function application()
    {
        // seo
        $data['header'] = header_seoinfo(0, 0);
        $data['header']['title'] = $this->mcfg->get_config('site', 'title_suffix') . '-' . '在线留言';
        $data['banner'] = tag_photo(tag_single($this->banner_id, "photo"));
        $this->load->view('contact/application', $data);
    }

    public function recruitment()
    {
        // seo
        $data['header'] = header_seoinfo(0, 0);
        $data['header']['title'] = $this->mcfg->get_config('site', 'title_suffix') . '-' . '在线留言';
        $data['banner'] = tag_photo(tag_single($this->banner_id, "photo"));
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

                unset($_POST['captcha']);
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
