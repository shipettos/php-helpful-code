    public function indexFormPost(){
        $email = $_POST['aid_array'];
        //blabla

        $response = [
            "message" => "OK",
            "model" => $model
        ];

        return new JsonResponse($response);
        //return $this->render('home/IndexForm.html.twig');
    }
