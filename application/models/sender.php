<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sender extends CI_Model {

    /**
     * @author Isaias Filho
     */

	public function __construct(){

		parent::__construct();

		$this->load->library('email');
		$this->load->model('gerenciador/configs');

        $config['protocol'] = 'smtp';
        $config['charset'] = 'utf-8';
        $config['mailtype'] = 'html';
        $config['bcc_batch_mode'] = true;
        $config['bcc_batch_size'] = 500;
        $config['smtp_host'] = $this->configs->get_smtphost();
        $config['smtp_user'] = $this->configs->get_smtpuser();
        $config['smtp_pass'] = $this->configs->get_smtppass();
        $config['smtp_port'] = $this->configs->get_smtpport();

        $this->email->initialize($config);

        $this->email->set_newline("\r\n");

	}

	public function enviar_email($from_email, $from_nome, $to, $subject, $message, $cc = false, $bcc_emails = false){

	    $this->email->to($to);
	    if ($cc != false)
	       $this->email->cc($cc);

	    if ($bcc_emails != false)
	       $this->email->bcc($bcc_emails);

	    $this->email->from($from_email, $from_nome);
	    $this->email->subject($subject);
	    $this->email->message($message);

	    $this->email->send();

	    // echo $this->email->print_debugger();

	    return true;

	}

}