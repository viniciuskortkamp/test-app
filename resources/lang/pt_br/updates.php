<?php
return [
    /*
      |--------------------------------------------------------------------------
      | All update lines
      |--------------------------------------------------------------------------
      */
    // BuzzyEditor

    'BuzzyEditor' => [
        'lang' => [
            'lang_1' => 'Você tem certeza?',
            'lang_2' => 'Você não será capaz de recuperar isso!',
            'lang_3' => 'Sim, exclua!',
            'lang_4' => 'Cancelar',
            'lang_5' => "Digite a URL da imagem!",
            'lang_6' => 'URL para imagem',
            'lang_7' => 'Você precisa escrever algo!',
            'lang_8' => 'URL de imagem inválido!',
            'lang_9' => 'Por favor, tente link completo',
            'lang_10' => 'Adicione alguma entrada',
            'lang_11' => 'URL inválida',
            'lang_12' => 'Você não pode selecionar mais que uma entrada por página.',
            'lang_13' => "Digite o URL da postagem!",
            'lang_14' => 'Colar uma URL de postagem',
            'lang_15' => 'OK',
            'lang_16' => 'Are you sure? Unsaved content will be lost!',
        ],
        'TextEditor' => [
            'normalText' => 'Texto normal',
            'title' => 'Título',
            'blockquote' => 'Bloco de citação',
            'bold' => 'Negrito',
            'italic' => 'Italic',
            'link' => 'Link',
            'text' => 'Texto',
            'linkText' => 'Texto do link',
            'linkUrl' => 'URL',
            'removeLink' => 'Remover Link',
            'ol' => 'Lista de números',
            'ul' => 'Lista',
            'strikethrough' => 'Strikethrough',
            'underline' => 'Underline',
        ],
    ],

    // general
    'loadmore'        => 'Carregue mais',
    'more'            => 'Mais',

    // user pages
    'live-in'         => 'Onde você mora?',
    'abouttext'       => 'Adicione algum texto sobre você.',
    'useravatar'      => 'ESCOLHER FOTO PARA O PERFIL',
    'male'            => 'Masculino',
    'female'          => 'Fêmea',
    'other'           => 'outros',

    // create pages
    'urltovideo'      => 'URL para vídeo',
    'get'             => 'Obter',
    'tweet'           => 'Tweet',
    'urltotweet'      => 'Url da postagem no Tweet',
    'admininfo'       => 'Você pode editar este post porque é seu',
    'instagram'       => 'Instagram',
    'urltoinstagram'  => 'Url da postagem no Instagram',
    'soundcloud'      => 'SoundCloud',
    'urltosoundcloud' => 'Url da postagem no SoundCloud',

    //new v1.1.1
    'getfromurl'      => 'Obter pela URL',
    'or'              => 'ou',
    'searchfor'       => 'Buscar resultados para ":word"',
    'facebookurl'     => 'Facebook Url',
    'twitterurl'      => 'Twitter Url',
    'weburl'          => 'Web Url',


    //new lines on v1.1.3
    'usertypeadmin'     => 'Admin',
    'usertypestaff'     => 'Editor',
    'usertypebanned'    => 'Banido',

    //new lines on v1.2
    'entryerrors'    => 'Entrada #:numberofentry  Erro: :error',
    'error'          => 'Error',
    'movedtotrash'   => 'Movido para o lixo',
    'pagination'     => 'Número de Entradas por Página',
    'usersplash'      => 'ESCOLHER IMAGEM DO CABEÇALHO DO USUÁRIO',

    'reaction' => [
        'yourreaction'    => 'SUA REAÇÃO!',
        'awesome'       => 'AWESOME!',
        'nice'          => 'NICE!',
        'loved'         => 'LOVED!',
        'lol'           => 'LOL!',
        'funny'         => "FUNNY",
        'fail'          => 'FAIL!',
        'omg'           => 'OMG',
        'ew'            => 'EW'
    ],

    'connectvkontakte'        => 'Connect with Vkontakte',

    'all'    => 'Todos',
    'vote'    => 'Voto: :count',

    //new lines on v1.3
    'facebookpost'           => 'Facebook Post',
    'urltofacebookpost'      => 'Url da postagem no Facebook',

    'registermail'          => 'Olá :UserName!<br>
                                Obrigado por se juntar a nós. Por favor, dedique um curto período de tempo e ative sua conta com este URL:<br> <b>:ActivateLink</b>',

    'registermailsubject'   => 'Ative sua conta',

    'registerloginreqired'  => 'Por favor, faça o login antes de ativar sua conta!',
    'registeractivate'      => 'Sua conta foi ativada com sucesso!',

    'saveasdraft'           => 'Salvar como rascunho',
    'thisdraftpost'         => 'Este é um rascunho',

    'followers'    => 'Seguidores',
    'following'    => 'Seguindo',
    'allfollow'    => 'Todos (:count)',

    'followingposts'    => 'Seguindo Postagem',
    'feedposts'    => 'Feed da Postagem',

    'followinguser'    => 'Seguindo',
    'follow'    => 'Seguir',


    // new lines on v2

    'views'    => 'Visto',
    'tags'    => 'Tags',
    'addatag'    => 'add uma tag',
    'tag'    => 'tag',
    'success'    => 'Sucesso',
    'copyright'    => ' Copyright © ' . date("Y") . ' ' . get_buzzy_config("sitename") . '. Todos os direitos reservados.',
    'shared'    => 'Compartilhar',

    'home'    => 'Home',
    'heycommunity'    => 'Nossa ' . get_buzzy_config("sitename") . ' Comunidade!',
    'heycommunitydesc'    => '<a href="/login">Log in</a> ou <a href="/register">Cadastre-se</a> para criar seus próprios posts.',
    'heycommunitydesc2'    => '<a href="/create">Crie</a> seus próprios posts.',
    'nodata'    => 'Não há dados disponíveis para este URL',
];
