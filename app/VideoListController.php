<?php

    namespace Alura\Mvc\Controller;
    use Alura\Mvc\Repository\VideoRepository;
    class VideoListController
    {
        private VideoRepository $videoRepository;

        public function __construct()
        {
            require_once 'app/conexao.php';
            $this->videoRepository = new VideoRepository($conexao);
        }

        public function processaRequisicao():void
        {
        $videoList = $this->videoRepository->all();
        }
    }