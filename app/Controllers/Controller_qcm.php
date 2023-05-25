<?php

class Controller_qcm extends Controller 
{   
    public function action_default()
    {
        $this->action_theme();
    }

    public function action_theme(){
        $m = Model::get_model();
        $data = 
        [
            "themes" => $m->get_theme()
        ];

        // $img_theme = [ "football" => "public/Assets/football.jpg"];
        $this->render("themes", $data);
    }

    public function action_theme_question(){
        $id_theme = $_GET['id_theme']; //ceci est l'id du theme choisi.
        $niveau = $_GET['lvl']; //le niveau choisi.
        // var_dump($niveau);
        // die();
        $m = Model::get_model();
        $data = 
        [
            "questions" => $m->get_question($id_theme, $niveau),
            "reponses" => $m->get_reponse($id_theme)
        ];
        // print '<pre>' . print_r($data['questions'], true). '</pre>';
        // print '<pre>' . print_r($data['reponses'], true). '</pre>';
        // die();
        $this->render("qcm", $data);

    }
}