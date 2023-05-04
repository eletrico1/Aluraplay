<?php

    namespace Alura\Mvc\Entity;

    class Video
    {
        public readonly string $url;
        public readonly string $id;
        //metodo construtor para receber url e title do video a ser instanciado como objeto do tipo Video
        public function __construct(string  $url, public string $title)
        {
        $this->setUrl($url);
        }

        //metodo define URL
        private function setUrl(string $url):bool
        {
            if (filter_var($url,FILTER_VALIDATE_URL) === false){
               throw new \InvalidArgumentException();
            }
          return  $this->url = $url;
        }

        //metodo for define title
        public function setTitle(string $title)
        {
            if ($title === '' || $title === null) {
                echo "Digite um titulo valido";
            } else {
                $this->title = $title;
            }
        }

        public function setId(int $id):bool
        {
            return $this->id = $id;
        }


    }