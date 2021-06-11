<?php
class Pages_controller extends CI_Controller
{
        
        /**
         * view
         *  Controlador de las páginas del CI
         * @param  mixed $page
         * @return void
         */
        public function view($page = 'home')
        {
                if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                        // Whoops, we don't have a page for that!
                        // show_404();
                        die("error dins controlador");
                }

                $this->load->view('templates/header');
                $this->load->view('pages/' . $page);
                $this->load->view('templates/footer');
        }
}
