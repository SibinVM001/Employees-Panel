<?php

class ErrorController extends Controller {
    public function notFound() {
        $this->view('404');
    }
}